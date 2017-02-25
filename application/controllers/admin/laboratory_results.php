<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratory_results extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('pet_model');
		$this->load->model('examination_model');
		$this->load->model('laboratory_test_model');
		$this->load->model('laboratory_results_model');
		$this->load->model('laboratory_test_result_model');
		$this->load->model('laboratory_result_images_model');

	}

	public function index()
	{
		$this->template->title('Laboratory Results');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$lab_ids = $this->input->post('lab_ids');
				if($lab_ids !== false)
				{
					foreach($lab_ids as $lab_id)
					{
						$laboratory_results = $this->laboratory_results_model->get_one($lab_id);
						if($laboratory_results !== false)
						{
							$this->laboratory_results_model->delete($lab_id);
						}
					}
					$this->template->notification('Selected laboratory results were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['laboratory_results'] = $this->laboratory_results_model->pagination("admin/laboratory_results/index/__PAGE__", 'get_all');
		$page['laboratory_results_pagination'] = $this->laboratory_results_model->pagination_links();
		$this->template->content('laboratory_results-index', $page);
		$this->template->content('menu-laboratory_results', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create($pet_id = 0)
	{
		$this->template->title('Create Laboratory Results');
				
		$this->load->model('pet_model');				
		$this->load->model('examination_model');				
		$this->load->model('laboratory_test_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('pet_id', 'Id', 'trim|integer|max_length[11]');
		$this->form_validation->set_rules('exm_id', 'Code', 'trim|required|integer|max_length[11]'); 
		$this->form_validation->set_rules('lab_remark', 'Remark', 'trim|required');
		$this->form_validation->set_rules('lab_date', 'Date', 'trim'); 

		if($this->input->post('submit'))
		{
			$laboratory_results = $this->extract->post(); 

			$lab_result = [];
			$lab_result["pet_id"] = $pet_id;
			$lab_result["exm_id"] = $laboratory_results['exm_id'];
			$lab_result["lab_remark"] = $laboratory_results['lab_remark'];
			$lab_result["lab_date"]    = date("Y-m-d H:i:s");

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$id = $result = $this->laboratory_results_model->create($lab_result, $this->form_validation->get_fields());
				
				foreach ($laboratory_results["lat_id"] as $key => $value) {
					$params_items = array(
						"lab_id" => $id,
						"lat_id" => $value,
						"ltr_result" => $laboratory_results["ltr_result"][$key],
						"ltr_status" => $laboratory_results["ltr_status"][$key],
						"ltr_remark" => $laboratory_results["ltr_remark"][$key]
					);

					// echo "<pre>"; print_r($params_items); die();
					$this->laboratory_test_result_model->create($params_items);
				} 


				$this->load->library('upload');

			    $files = $_FILES;
			    $cpt = count($_FILES['lri_image']['name']);
			    for($i=0; $i<$cpt; $i++)
			    {           
			        $_FILES['lri_image']['name'] = $files['lri_image']['name'][$i];
			        $_FILES['lri_image']['type'] = $files['lri_image']['type'][$i];
			        $_FILES['lri_image']['tmp_name'] = $files['lri_image']['tmp_name'][$i];
			        $_FILES['lri_image']['error'] = $files['lri_image']['error'][$i];
			        $_FILES['lri_image']['size'] = $files['lri_image']['size'][$i];    

			        
					$this->load->helper('format');
					$this->mythos->library('upload');
					$this->upload->initialize($this->set_upload_options());
					$data = $this->upload->do_upload_resize("lri_image",300,300,'./uploads/laboratory_results/');
					
					$imgfile = array();
					$imgfile['lri_image'] = $data['upload_data']['file_name'];
	                $imgfile['lri_image_thumb'] = $data['thumb_file_name'];
	                $imgfile['lri_original'] = $data['upload_data']['orig_name'];
	                $imgfile['lab_id'] = $id;

              	 	$this->laboratory_result_images_model->create($imgfile);
			    } 

				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New laboratory results created.', 'success');
				redirect('admin/pets/view/'.$pet_id);
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($laboratory_results);
		}

		$page = array();
		$page['pet'] = $this->pet_model->get_one($pet_id);
		$page['exm_ids'] = $this->examination_model->get_all();
		$page['lat_ids'] = $this->laboratory_test_model->get_all();
		
		$this->template->content('laboratory_results-create', $page);
		$this->template->show();
	}

	public function edit($lab_id, $pet_id)
	{
		$this->template->title('Edit Laboratory Results');
				
		$this->load->model('pet_model');				
		$this->load->model('examination_model');				
		$this->load->model('laboratory_test_model'); 

		if($this->input->post('submit'))
		{
			$laboratory_results = $this->extract->post();
			foreach ($laboratory_results['ltr_id'] as $ltrid => $value) {
				$data = array();
				$data["ltr_id"] = $ltrid;
				$laboratory_results['ltr_result'][$ltrid] ? $data['ltr_result'] = $laboratory_results['ltr_result'][$ltrid] : $data['ltr_result'] = "";
				$laboratory_results['ltr_remark'][$ltrid] ? $data['ltr_remark'] = $laboratory_results['ltr_remark'][$ltrid] : $data['ltr_remark'] = "";
			
				$rows_affected = $this->laboratory_test_result_model->update($data, ["ltr_id","ltr_result","ltr_remark"]); 
			}

			$this->load->library('upload');

		    $files = $_FILES;
		    $cpt = count($_FILES['lri_image']['name']);
		    for($i=0; $i<$cpt; $i++)
		    {           
		        $_FILES['lri_image']['name'] = $files['lri_image']['name'][$i];
		        $_FILES['lri_image']['type'] = $files['lri_image']['type'][$i];
		        $_FILES['lri_image']['tmp_name'] = $files['lri_image']['tmp_name'][$i];
		        $_FILES['lri_image']['error'] = $files['lri_image']['error'][$i];
		        $_FILES['lri_image']['size'] = $files['lri_image']['size'][$i];    

		        
				$this->load->helper('format');
				$this->mythos->library('upload');
				$this->upload->initialize($this->set_upload_options());
				$data = $this->upload->do_upload_resize("lri_image",300,300,'./uploads/laboratory_results/');
				
				if (isset($data['error'])) {} else {

					$imgfile = array();
					$imgfile['lri_image'] = $data['upload_data']['file_name'];
	                $imgfile['lri_image_thumb'] = $data['thumb_file_name'];
	                $imgfile['lri_original'] = $data['upload_data']['orig_name'];
	                $imgfile['lab_id'] = $lab_id;

              	 	$this->laboratory_result_images_model->create($imgfile);
                }
                
		    } 
		}

		$page = array();
		$page['laboratory_results'] = $this->laboratory_results_model->get_one($lab_id);

		if($page['laboratory_results'] === false)
		{
			$this->template->notification('Laboratory results was not found.', 'error');
			redirect('admin/laboratory_results');
		}  

		$page['pet']     = $this->pet_model->get_one($pet_id);  
		$page['pet']     = $this->pet_model->get_one($pet_id);  		

		$ltr_params   = array("laboratory_test_result.lab_id" => $lab_id);
		$ltr_order_by = array("laboratory_test.lat_sequence" => " ASC");
		$page['laboratory_test_results'] = $this->laboratory_test_result_model->get_all_aggregated($ltr_params,$ltr_order_by);
		$page['lab_result_images'] = $this->laboratory_result_images_model->get_all(["laboratory_results.lab_id" => $lab_id]);

		$this->template->content('laboratory_results-edit', $page);
		$this->template->show();
	}

	public function view($lab_id, $pet_id )
	{
		$this->template->title('View Laboratory Results');
		
		$page = array(); 
		$page['laboratory_results'] = $this->laboratory_results_model->get_one($lab_id);		

		if($page['laboratory_results'] === false)
		{
			$this->template->notification('Laboratory results was not found.', 'error');
			redirect('admin/laboratory_results');
		}

		$page['pet']     = $this->pet_model->get_one($pet_id);  		

		$ltr_params   = array("laboratory_test_result.lab_id" => $lab_id);
		$ltr_order_by = array("laboratory_test.lat_sequence" => " ASC");
		$page['laboratory_test_results'] = $this->laboratory_test_result_model->get_all_aggregated($ltr_params,$ltr_order_by);

		$laboratory_images_params = array("laboratory_results.lab_id" => $lab_id, "lri_image_thumb !="=>"");
		$page['lab_result_images'] = $this->laboratory_result_images_model->get_all($laboratory_images_params);

		$this->template->content('laboratory_results-view', $page);
		$this->template->show();
	}

	private function set_upload_options()
	{   
	    //upload an image options
	    $config = array();
	    $config['upload_path'] = './uploads/laboratory_results/';
	    $config['allowed_types'] = 'gif|jpg|png';
	    $config['max_size']      = '0';
	    $config['overwrite']     = FALSE;
	    $config['encrypt_name'] = TRUE;

	    return $config;
	}

	// http://localhost/veterinary-clinic/admin/laboratory_results/delete_image/1
	public function delete_image($lri_id)
	{
		$image = $this->laboratory_result_images_model->get_one($lri_id);

		$this->laboratory_result_images_model->delete($lri_id); 
		redirect('admin/laboratory_results/edit/'.$image->lab_id."/".$image->pet_id);
	}
}