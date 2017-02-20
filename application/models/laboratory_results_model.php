<?php
// Extend Base_model instead of CI_model
class Laboratory_results_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('lab_id', 'pet_id', 'exm_id', 'lab_result', 'lab_normal_value', 'lab_normal_value_start', 'lab_sequence', 'lab_remarks', 'lab_date', 'lab_status');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('laboratory_results', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");				
		$this->db->join('examination', "examination.exm_id = {$this->table}.exm_id");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('pet', "pet.pet_id = {$this->table}.pet_id");				
		$this->db->join('examination', "examination.exm_id = {$this->table}.exm_id");
		return parent::get_all($params);
	}
}