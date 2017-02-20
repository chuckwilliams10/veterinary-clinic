<?php
// Extend Base_model instead of CI_model
class Pet_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array(
			'pet_id', 
			'acc_id', 
			'pet_name',
			'pet_date_of_birth', 
			'pet_species', 
			'pet_breed', 
			'pet_gender', 
			'pet_color', 
			'pet_remarks', 
			'pet_status', 
			'pet_date_added', 
			'pet_death_datetime', 
			'pet_cause_of_death',
			'pet_image',
			'pet_image_thumb'
		);
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('pet', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('account', "account.acc_id = {$this->table}.acc_id");
		return parent::get_one($id);
	}

	public function get_all($params = array(),$order_by = array())
	{				
		$this->db->join('account', "account.acc_id = {$this->table}.acc_id");
		
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