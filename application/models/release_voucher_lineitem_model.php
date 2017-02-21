<?php
// Extend Base_model instead of CI_model
class Release_voucher_lineitem_model extends Base_model
{
	public function __construct()
	{
		// List all fields of the table.
		// Primary key must be auto-increment and must be listed here first.
		$fields = array('rvl_id', 'rev_id', 'exm_id','rvl_value');
		// Call the parent constructor with the table name and fields as parameters.
		parent::__construct('release_voucher_lineitem', $fields);
	}

	// Inherits the create, update, delete, get_one, and get_all methods of base_model.
	public function get_one($id)
	{				
		$this->db->join('release_voucher', "release_voucher.rev_id = {$this->table}.rev_id");				
		$this->db->join('examination', "examination.ltr_id = {$this->table}.exm_id");
		return parent::get_one($id);
	}

	public function get_all($params = array())
	{				
		$this->db->join('release_voucher', "release_voucher.rev_id = {$this->table}.rev_id");				
		$this->db->join('examination', "examination.ltr_id = {$this->table}.exm_id");
		return parent::get_all($params);
	}
}