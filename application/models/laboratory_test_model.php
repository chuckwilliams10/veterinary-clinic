<?php
// Extend Base_model instead of CI_model
class Laboratory_test_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('lat_id', 'exm_id', 'lab_code', 'lab_name', 'lab_sequence', 'lab_unit', 'lab_normal_value', 'lab_normal_value_start', 'lab_normal_value_end', 'lab_status');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('laboratory_test', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('examination', "examination.exm_id = {$this->table}.exm_id");				
		$this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('examination', "examination.exm_id = {$this->table}.exm_id");				
		$this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id");
		return parent::get_all($params);
	}
}