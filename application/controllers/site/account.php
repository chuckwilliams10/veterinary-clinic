<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller 
{

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('pet_model');         
        $this->load->model('account_model');

        $this->load->model([ 
            "laboratory_results_model",
            "laboratory_test_result_model"
        ]);

        $this->load->helper('format');
        $this->load->helper('form');

    }
    
    public function index() 
    {
        if (!$this->session->userdata("acc_username")) {
            redirect('page/login');    
        }

        $params = array();

        $account_id = $this->session->userdata("acc_id");
        $params["account"] = $this->account_model->get_one($account_id);
 
        $pet_params = ["pet.acc_id"=>$account_id];
        $pet_order  = ["pet_date_added"=>"DESC"];

        $params['pets'] = $this->pet_model->pagination("account/index/__PAGE__", 'get_all',$pet_params,$pet_order);
        $params['pets_pagination'] = $this->pet_model->pagination_links();

        $this->template->title("Profile");
        $this->template->content('account-index', $params);

        $this->template->show();        
    }

    public function update($acc_id = 0)
    { 

        $this->form_validation->set_rules('acc_first_name', 'First Name', 'trim|required|max_length[60]');
        $this->form_validation->set_rules('acc_last_name', 'Last Name', 'trim|required|max_length[30]'); 
        $this->form_validation->set_rules('acc_gender', 'Gender', 'trim|required'); 
        $this->form_validation->set_rules('acc_contact', 'Contact', 'trim|required|numeric');
        $this->form_validation->set_rules('acc_address', 'Address', 'trim|required');
        
        if($this->input->post('submit'))
        {
            $account = $this->extract->post();
            if($this->form_validation->run() !== false)
            {
                $account['acc_id'] = $acc_id;
                $rows_affected = $this->account_model->update($account, $this->form_validation->get_fields());
                $this->template->notification('Account updated.', 'success');
                redirect('account/update/'.$acc_id);
            }
            else
            {
                $this->template->notification(validation_errors());
            }

        }

        if (!$this->session->userdata("acc_username")) {
            redirect('page/login');    
        }


        $account = $this->account_model->get_one($acc_id);
        if($account !== false)
        {             
            $page = array();
            $page['account'] = $account; 

            $this->template->title("Profile - Update");
            $this->template->content('account-update', $page);

            $this->template->show();
        }
        else
        {
            redirect();
        }
    }

    public function pet($pet_id = 0)
    {

        $page = array();
        $page['pet'] = $this->pet_model->get_one($pet_id);
        
        if( $page['pet'] === false )
        {
            $this->template->notification('Pet was not found.', 'error');
            redirect('account');
        }

        $exam_sort = array( "lab_id"     => "DESC" );
        $exam_data = array( "pet.pet_id" => $pet_id );

        $pet   = $this->pet_model->get_one($pet_id);
        $exams = $this->laboratory_results_model->get_all($exam_data, $exam_sort);

        $data = array();

        foreach ($exams->result() as $examination) {
            
            $data[$examination->exm_id] = $examination;

            $exam_params = ["laboratory_results.lab_id" => $examination->exm_id];
            $exam_orders = ["lat_sequence"=>"ASC"];

            $examination_results = $this->laboratory_test_result_model->get_all($exam_params, $exam_orders);
            $data[$examination->exm_id]->line_item = $examination_results->result();
        }  

        $page['line_items'] = $data;

        $this->template->title("Pet Information");
        $this->template->content('account-pet', $page);

        $this->template->show();   
    }

    public function logout()
    {
        $this->session->sess_destroy();
        $this->template->notification("Logout successful!", 'success');

        redirect();
    }
}