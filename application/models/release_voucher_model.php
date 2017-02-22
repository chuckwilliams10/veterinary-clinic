<?php
// Extend Base_model instead of CI_model
class Release_voucher_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array(
			'rev_id', 
			'rev_code', 
			'acc_id', 
			'rev_admin_acc_id', 
			'pet_id', 
			'rev_or_number', 
			'rev_datetime', 
			'rev_remarks', 
			'rev_status', 
			'rev_total',
			'rev_emailed'
		);
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('release_voucher', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{

		$this->db->select('
				release_voucher.*,
				account.*,
				admin_account.acc_id as rev_acc_id,
				admin_account.acc_username as rev_acc_username,
				admin_account.acc_last_name as rev_acc_last_name,
				admin_account.acc_first_name as rev_acc_first_name,
				admin_account.acc_type as rev_acc_type,
				admin_account.acc_gender as rev_acc_gender, 
				pet.*
			');

		$this->db->join('account as account', "account.acc_id = {$this->table}.acc_id");	
		$this->db->join('account as admin_account', "admin_account.acc_id = {$this->table}.rev_admin_acc_id");				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->select('
				release_voucher.*,
				account.*,
				admin_account.acc_id as rev_acc_id,
				admin_account.acc_username as rev_acc_sername,
				admin_account.acc_last_name as rev_acc_last_name,
				admin_account.acc_first_name as rev_acc_first_name,
				admin_account.acc_type as rev_acc_type,
				admin_account.acc_gender as rev_acc_gender, 
				pet.*
			');

		$this->db->join('account as account', "account.acc_id = {$this->table}.acc_id");	
		$this->db->join('account as admin_account', "admin_account.acc_id = {$this->table}.rev_admin_acc_id");				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		return parent::get_all($params);
	}

	public function csv_all($params = array())
	{				
		$this->db->select('
				release_voucher.*,
				account.acc_username as Username, 
				account.acc_last_name as Last_name,
				account.acc_first_name as First_name,
				account.acc_type as Type, 
				account.acc_status as Status,
				account.acc_gender as Gender,
				account.acc_address as Address,
				account.acc_contact as Contact,
				admin_account.acc_username as admin_username,
				admin_account.acc_last_name as admin_last_name,
				admin_account.acc_first_name as admin_first_name, 
				admin_account.acc_gender as admin_gender,  
				pet.pet_name as Pet_Name,
				pet.pet_date_of_birth as Date_of_Birth,
				pet.pet_species as Species,
				pet.pet_breed as Breed,
				pet.pet_gender as Gender,
				pet.pet_color as Color,
				pet.pet_status as Status
			');

		$this->db->join('account as account', "account.acc_id = {$this->table}.acc_id");	
		$this->db->join('account as admin_account', "admin_account.acc_id = {$this->table}.rev_admin_acc_id");				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		return parent::get_all($params);
	}
}