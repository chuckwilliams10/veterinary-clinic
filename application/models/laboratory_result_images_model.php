<?php
// Extend Base_model instead of CI_model
class Laboratory_result_images_model extends Base_model
{
    public function __construct()
    {
        // List all fields of the table.
        // Primary key must be auto-increment and must be listed here first.
        $fields = array('lri_id', 'lab_id', 'lri_image','lri_image_thumb','lri_image_original');
        // Call the parent constructor with the table name and fields as parameters.
        parent::__construct('laboratory_result_images', $fields);
    }

    public function get_all( $params = array(), $order_by = array() )
    {               
        $this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id");        

        if ($order_by) 
        {   
            foreach ($order_by as $key => $value) 
            {
                $this->db->order_by($key, $value); 
            }
        }

        return parent::get_all($params);
    }

    public function get_one($id)
    {
        $this->db->join('laboratory_results', "laboratory_results.lab_id = {$this->table}.lab_id");   
        return parent::get_one($id);
    }

}