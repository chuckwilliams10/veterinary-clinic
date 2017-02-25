<?php
// Extend Base_model instead of CI_model
class Grooming_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('gro_id', 'pet_id', 'gro_description', 'gro_cost', 'gro_datetime', 'gro_status');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('grooming', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		$this->db->join('account', "account.acc_id = pet.pet_id","left");
		return parent::get_one($id);
	}

	public function get_all($params = array(), $order_by = array('gro_id'=>"DESC"))
	{				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		$this->db->join('account', "account.acc_id = pet.acc_id","left");
		if ($order_by) 
		{	
			foreach ($order_by as $key => $value) 
			{
				$this->db->order_by($key, $value); 
			}
		}
		return parent::get_all($params);
	}
}