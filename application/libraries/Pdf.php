<?php
require_once APPPATH . 'third_party/composer/dompdf/autoload.inc.php'; 
use Dompdf\Dompdf;
/**
* 
*/
class PDF extends DOMPDF
{
    
    function __construct($config = array('enable_remote'=>true))
    {
        parent::__construct($config);
    } 
}