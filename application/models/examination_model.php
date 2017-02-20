<?php
// Extend Base_model instead of CI_model
class Examination_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('exm_id', 'exm_code', 'exm_name', 'exm_description', 'exm_rate', 'exm_status');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('examination', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.



}