<?php
// Extend Base_model instead of CI_model
class Laboratory_test_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('lat_id', 'exm_id', 'lat_code', 'lat_name', 'lat_sequence', 'lat_unit', 'lat_normal_value', 'lat_normal_value_start', 'lat_normal_value_end', 'lat_status');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('laboratory_test', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('examination', "examination.exm_id = {$this->table}.exm_id");
		return parent::get_one($id);
	}

	public function get_all($params = array(), $order_by = array('lat_sequence'=>"ASC"))
	{				
		$this->db->join('examination', "examination.exm_id = {$this->table}.exm_id");

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