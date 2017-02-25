<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Csv extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->access_control->logged_in();
        $this->access_control->validate();

        $this->load->model([
            "pet_model",
            "account_model",
            "grooming_model",
            "release_voucher_model"
        ]);
        $this->load->helper('format');
        $this->mythos->library('upload');

        $this->load->helper('file');
        $this->load->helper('download');
    }

    public function index($source = "")
    {
        switch ($source) {
            case 'pets':
                $pets = $this->pet_model->csv(); 
                $this->generate($pets,"List-of-Pets-".date("F-m-d-h-i"));
                break;
            case 'accounts':
                $accounts = $this->account_model->csv(); 
                $this->generate($accounts,"List-of-Accounts-".date("F-m-d-h-i"));
                break;
            case 'vouchers':
                $vouchers = $this->release_voucher_model->csv_all(); 
                $this->generate($vouchers,"List-of-Vouchers-".date("F-m-d-h-i"));
                break;
            case 'groomings':
            $groomings = $this->grooming_model->csv_all(); 
                $this->generate($groomings,"List-of-groomings-".date("F-m-d-h-i"));
                break;
            default:
                exit();
                break;
        }
        exit();
    }

    private function generate($query,$title){
        $this->load->dbutil();
        $delimiter = ",";
        $newline = "\r\n";

        $data = $this->dbutil->csv_from_result($query, $delimiter, $newline); 
        $file = './uploads/csv/'.$title.'.csv';
        write_file( $file, $data);
        force_download($title.'.csv', file_get_contents($file));
    }
}