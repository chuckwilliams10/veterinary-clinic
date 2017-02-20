<?php
// Extend Base_model instead of CI_model
class Laboratory_test_result_model extends Base_model
{
    public function __construct()
    {
        // List all fields of the table.
        // Primary key must be auto-increment and must be listed here first.
        $fields = array('ltr_id', 'lab_id', 'lat_id','ltr_result','ltr_remark','ltr_status');
        // Call the parent constructor with the table name and fields as parameters.
        parent::__construct('laboratory_test_result', $fields);
    }

    public function get_all( $params = array(), $order_by = array() )
    {               
        $this->db->join('laboratory_result', "laboratory_result.lab_id = {$this->table}.lab_id");               
        $this->db->join('laboratory_test', "laboratory_test.lat_id = {$this->table}.lat_id");        

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
