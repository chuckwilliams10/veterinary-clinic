<?php
// Extend Base_model instead of CI_model
class Release_voucher_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('rev_id', 'rev_code', 'acc_id', 'rev_admin_acc_id', 'rev_or_number', 'rev_datetime', 'rev_remarks', 'rev_status', 'rev_total');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('release_voucher', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('', ". = {$this->table}.");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('', ". = {$this->table}.");
		return parent::get_all($params);
	}
}