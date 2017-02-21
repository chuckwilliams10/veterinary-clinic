<?php
// Extend Base_model instead of CI_model
class Medical_record_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('mer_id', 'pet_id', 'mer_height', 'mer_height_unit', 'mer_weight', 'mer_weight_unit', 'mer_temperature', 'mer_temperature_unit', 'mer_heartrate', 'mer_nose', 'mer_skin', 'mer_anus', 'mer_throat', 'mer_fecal', 'mer_mouth', 'mer_lower_abdomen', 'mer_upper_abdomen', 'mer_limbs', 'mer_other_remarks', 'mer_status', 'mer_date');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('medical_record', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		return parent::get_one($id);
	}

	public function get_all($params = array(), $order_by = array("mer_id"=>'DESC'))
	{				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");
		return parent::get_all($params);
	}
}