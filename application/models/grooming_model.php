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

	public function get_all($params = array(), $order_by = array('gro_datetime'=>"DESC"))
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

	public function csv_all()
	{
		$grooming = $this->db->query("
			SELECT 
				grooming.gro_id as Grooming_ID,
				account.acc_id as Account_ID,
			    pet.pet_id as Pet_ID,
			    account.acc_username as Customer_email,
			    account.acc_last_name as First_Name,
			    account.acc_first_name as Last_Name,
			    account.acc_gender as Customer_Gender,
			    account.acc_address as Customer_Address,
			    account.acc_contact as Customer_Contact,
			    pet.pet_name as Pet,
			    species.spe_name as Pet_Species,
			    breed.bre_name as Breed_Name,
			    pet.pet_gender as Pet_Gender,
			    pet.pet_color as Pet_Color,
			    grooming.gro_cost as Grooming_Cost,
			    grooming.gro_datetime as Grooming_Date,
			    grooming.gro_status as Grooming_Status,
			    grooming.gro_description as Description
			    
			FROM 
				(`grooming`) 
			JOIN 
				`pet`
			    	ON 
			    	`pet`.`pet_id` = `grooming`.`pet_id` 
			JOIN 
				`account` 
			    	ON 
			        `pet`.`acc_id` = `account`.`acc_id` 
			JOIN
				species
			    	ON
			        	species.spe_id = pet.spe_id
			JOIN
				breed
			    	ON
			        	breed.bre_id = pet.bre_id
			ORDER BY `gro_id` DESC 
		"); 

		return $grooming;
	}
}