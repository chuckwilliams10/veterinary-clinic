<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratory_result_images extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('laboratory_result_images_model');
		$this->load->helper('format');
		$this->mythos->library('upload');
	}

	public function index($lab_id = 0, $pet_id = 0)
	{
		$this->template->title('Laboratory Result Images');

		if ($lab_id == 0) {
			redirect('admin/index');
		}

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$lri_ids = $this->input->post('lri_ids');
				if($lri_ids !== false)
				{
					foreach($lri_ids as $lri_id)
					{
						$laboratory_result_images = $this->laboratory_result_images_model->get_one($lri_id);
						if($laboratory_result_images !== false)
						{
							$this->laboratory_result_images_model->delete($lri_id);
						}
					}
					$this->template->notification('Selected laboratory result images were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['laboratory_id'] = $lab_id;
		$page['laboratory_result_images'] = $this->laboratory_result_images_model->pagination("admin/laboratory_result_images/index/".$lab_id."/__PAGE__", 'get_all',["laboratory_results.lab_id" => $lab_id]);
		// echo $this->db->last_query();
		$page['laboratory_result_images_pagination'] = $this->laboratory_result_images_model->pagination_links();
		$this->template->content('laboratory_result_images-index', $page);
		$this->template->content('menu-laboratory_result_images', $page, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create($lab_id = 0)
	{
		if ($lab_id == 0) {
			redirect('admin/index');
		}
		
		$this->template->title('Add Laboratory Result Image');
		
		$this->load->model('laboratory_results_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('lab_id', 'Id', 'trim|integer|max_length[11]');
		$this->form_validation->set_rules('lri_image', 'Image', 'trim|max_length[100]');
		$this->form_validation->set_rules('lri_image_thumb', 'Image Thumb', 'trim|max_length[100]');
		$this->form_validation->set_rules('lri_image_original', 'Image Original', 'trim|max_length[100]');
		$this->form_validation->set_rules('lri_description', 'Description', 'trim');
		$this->form_validation->set_rules('lri_date_created', 'Date Created', 'trim|datetime');

		if($this->input->post('submit'))
		{
			$laboratory_result_images = $this->extract->post();
			$laboratory_result_images['lab_id'] = $lab_id;
			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$data = $this->upload->do_upload_resize("lri_image",300,300,'./uploads/laboratory_results/');
				$laboratory_result_images['lri_image'] = $data['upload_data']['file_name'];
				$laboratory_result_images['lri_image_thumb'] = $data['thumb_file_name'];

				$this->laboratory_result_images_model->create($laboratory_result_images, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New laboratory result images created.', 'success');
				redirect('admin/laboratory_result_images/index/'.$lab_id);
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($laboratory_result_images);
		}

		$page = array();
		$page['lab_ids'] = $this->laboratory_results_model->get_all();
		$page['laboratory_id'] = $lab_id;
		
		$this->template->content('laboratory_result_images-create', $page);
		$this->template->show();
	}

	public function edit($lri_id)
	{
		$this->template->title('Edit Laboratory Result Images');
				
		$this->load->model('laboratory_results_model');

		$this->form_validation->set_rules('lab_id', 'Id', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lri_image', 'Image', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('lri_image_thumb', 'Image Thumb', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('lri_image_original', 'Image Original', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('lri_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('lri_date_created', 'Date Created', 'trim|required|datetime');

		if($this->input->post('submit'))
		{
			$laboratory_result_images = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$laboratory_result_images['lri_id'] = $lri_id;
				$rows_affected = $this->laboratory_result_images_model->update($laboratory_result_images, $this->form_validation->get_fields());

				$this->template->notification('Laboratory result images updated.', 'success');
				redirect('admin/laboratory_result_images');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($laboratory_result_images);
		}

		$page = array();
		$page['laboratory_result_images'] = $this->laboratory_result_images_model->get_one($lri_id);

		if($page['laboratory_result_images'] === false)
		{
			$this->template->notification('Laboratory result images was not found.', 'error');
			redirect('admin/laboratory_result_images');
		}
		$page['lab_ids'] = $this->laboratory_results_model->get_all();

		$this->template->content('laboratory_result_images-edit', $page);
		$this->template->show();
	}

	public function view($laboratory_result_images_id)
	{
		$this->template->title('View Laboratory Result Images');
		
		$page = array();
		$page['laboratory_result_images'] = $this->laboratory_result_images_model->get_one($laboratory_result_images_id);

		if($page['laboratory_result_images'] === false)
		{
			$this->template->notification('Laboratory result images was not found.', 'error');
			redirect('admin/laboratory_result_images');
		}
		
		$this->template->content('laboratory_result_images-view', $page);
		$this->template->show();
	}
}