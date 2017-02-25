<?php
// Extend Base_model instead of CI_model
class Breed_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('bre_id', 'spe_id', 'bre_name', 'bre_other_names');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('breed', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('species', "species.spe_id = {$this->table}.spe_id");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('species', "species.spe_id = {$this->table}.spe_id");
		return parent::get_all($params);
	}
}