<?php
// Extend Base_model instead of CI_model
class Account_model extends Base_model 
{	
	private $DEFAULT_PASS = 'developer1qasw23ed';

	public function __construct() 
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array(
			'acc_id',
			'acc_username',
			'acc_password',
			'acc_last_name',
			'acc_first_name',
			'acc_type',
			'acc_failed_login',
			'acc_status',
			'acc_gender',
			'acc_contact',
			'acc_address'
		);
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('account', $fields);
	}
	
	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	
	public function get_by_username($acc_username)
	{
		$this->db->where('acc_username', $acc_username);
		$query = $this->db->get($this->table); // Use $this->table to get the table name
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	public function authenticate($acc_username, $acc_password)
	{
		$this->db->where('acc_username', $acc_username);
		$this->db->where('acc_password', md5($acc_password));
		$query = $this->db->get($this->table); 
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	public function using_default_pass($acc_username)
	{
		$result = $this->account_model->authenticate($acc_username, $this->DEFAULT_PASS);
		return ($result !== false);
	}
	
	public function change_password($acc_username, $acc_password)
	{
		$account = $this->get_by_username($acc_username);
		if($account !== false)
		{
			$data = array();
			$data['acc_id'] = $account->acc_id;
			$data['acc_password'] = md5($acc_password);
			
			$result = $this->update($data);
			return ($result == 0);
		}
		else
		{
			return false;
		}
	}
	
	public function failed_login($acc_username)
	{
		$account = $this->get_by_username($acc_username);
		if($account !== false)
		{
			$data = array();
			$data['acc_id'] = $account->acc_id;
			$data['acc_failed_login'] = $account->acc_failed_login + 1;
			
			$result = $this->update($data);
			return ($result == 0);
		}
		else
		{
			return false;
		}
	}
	
	public function failed_login_reset($acc_username)
	{
		$account = $this->get_by_username($acc_username);
		if($account !== false)
		{
			$data = array();
			$data['acc_id'] = $account->acc_id;
			$data['acc_failed_login'] = 0;
			
			$result = $this->update($data);
			return ($result == 0);
		}
		else
		{
			return false;
		}
	}

	public function get_all($params = array(), $order_by = array('acc_id'=>"DESC")) {
		if ($order_by) 
		{	
			foreach ($order_by as $key => $value) 
			{
				$this->db->order_by($key, $value); 
			}
		}
		return parent::get_all($params);
	}

	public function csv($params = array(),$order_by = array("pet.pet_id"=>"DESC"))
	{
		$this->db->select("
				account.acc_username as Username, 
				account.acc_last_name as Last_name,
				account.acc_first_name as First_name,
				account.acc_type as Type, 
				account.acc_status as Status,
				account.acc_gender as Gender,
				account.acc_address as Address,
				account.acc_contact as Contact,
				COUNT(pet_id) as Number_of_Pets 
			");
		$this->db->join("pet","pet.acc_id = {$this->table}.acc_id","left");
		$this->db->group_by("account.acc_id");

		return parent::get_all($params);
	}
}