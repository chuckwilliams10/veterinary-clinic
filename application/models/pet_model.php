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
			'spe_id', 
			'bre_id', 
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
		$this->db->join('species', "species.spe_id = {$this->table}.spe_id",'left');
		$this->db->join('breed', "breed.bre_id = {$this->table}.bre_id",'left');
		return parent::get_one($id);
	}

	public function get_all($params = array(),$order_by = array('pet_status'=>'ASC','pet_date_added'=>'DESC'))
	{				
		$this->db->join('account', "account.acc_id = {$this->table}.acc_id");
		$this->db->join('species', "species.spe_id = {$this->table}.spe_id",'left');
		$this->db->join('breed', "breed.bre_id = {$this->table}.bre_id",'left');
		
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
			pet.pet_name as Pet_Name,
			pet.pet_date_of_birth as Date_of_Birth,
			pet.pet_species as Species,
			pet.pet_breed as Breed,
			pet.pet_gender as Gender,
			pet.pet_color as Color,
			pet.pet_status as Status,
			pet.pet_date_added as Date_Added,
			pet.pet_death_datetime as Death_Datetime,
			pet.pet_cause_of_death as Cause_of_Death, 
			pet.pet_remarks as Remarks

		");
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