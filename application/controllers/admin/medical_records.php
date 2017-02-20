<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medical_records extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('medical_record_model');
	}

	public function index()
	{
		$this->template->title('Medical Records');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$mer_ids = $this->input->post('mer_ids');
				if($mer_ids !== false)
				{
					foreach($mer_ids as $mer_id)
					{
						$medical_record = $this->medical_record_model->get_one($mer_id);
						if($medical_record !== false)
						{
							$this->medical_record_model->delete($mer_id);
						}
					}
					$this->template->notification('Selected medical records were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['medical_records'] = $this->medical_record_model->pagination("admin/medical_records/index/__PAGE__", 'get_all');
		$page['medical_records_pagination'] = $this->medical_record_model->pagination_links();
		$this->template->content('medical_records-index', $page);
		$this->template->content('menu-medical_records', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Medical Record');
				
		$this->load->model('pet_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('pet_id', 'Id', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('mer_height', 'Height', 'trim|required|decimal');
		$this->form_validation->set_rules('mer_height_unit', 'Height Unit', 'trim|required');
		$this->form_validation->set_rules('mer_weight', 'Weight', 'trim|required|decimal');
		$this->form_validation->set_rules('mer_weight_unit', 'Weight Unit', 'trim|required');
		$this->form_validation->set_rules('mer_temperature', 'Temperature', 'trim|required');
		$this->form_validation->set_rules('mer_heartrate', 'Heartrate', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('mer_nose', 'Nose', 'trim|required');
		$this->form_validation->set_rules('mer_skin', 'Skin', 'trim|required');
		$this->form_validation->set_rules('mer_anus', 'Anus', 'trim|required');
		$this->form_validation->set_rules('mer_throat', 'Throat', 'trim|required');
		$this->form_validation->set_rules('mer_fecal', 'Fecal', 'trim|required');
		$this->form_validation->set_rules('mer_mouth', 'Mouth', 'trim|required');
		$this->form_validation->set_rules('mer_lower_abdomen', 'Lower Abdomen', 'trim|required');
		$this->form_validation->set_rules('mer_upper_abdomen', 'Upper Abdomen', 'trim|required');
		$this->form_validation->set_rules('mer_limbs', 'Limbs', 'trim|required');
		$this->form_validation->set_rules('mer_other_remarks', 'Other Remarks', 'trim|required');
		$this->form_validation->set_rules('mer_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('mer_date', 'Date', 'trim|required|datetime');

		if($this->input->post('submit'))
		{
			$medical_record = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->medical_record_model->create($medical_record, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New medical record created.', 'success');
				redirect('admin/medical_records');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($medical_record);
		}

		$page = array();
		$page['pet_ids'] = $this->pet_model->get_all();
		
		$this->template->content('medical_records-create', $page);
		$this->template->show();
	}

	public function edit($mer_id)
	{
		$this->template->title('Edit Medical Record');
				
		$this->load->model('pet_model');

		$this->form_validation->set_rules('pet_id', 'Id', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('mer_height', 'Height', 'trim|required|decimal');
		$this->form_validation->set_rules('mer_height_unit', 'Height Unit', 'trim|required');
		$this->form_validation->set_rules('mer_weight', 'Weight', 'trim|required|decimal');
		$this->form_validation->set_rules('mer_weight_unit', 'Weight Unit', 'trim|required');
		$this->form_validation->set_rules('mer_temperature', 'Temperature', 'trim|required');
		$this->form_validation->set_rules('mer_heartrate', 'Heartrate', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('mer_nose', 'Nose', 'trim|required');
		$this->form_validation->set_rules('mer_skin', 'Skin', 'trim|required');
		$this->form_validation->set_rules('mer_anus', 'Anus', 'trim|required');
		$this->form_validation->set_rules('mer_throat', 'Throat', 'trim|required');
		$this->form_validation->set_rules('mer_fecal', 'Fecal', 'trim|required');
		$this->form_validation->set_rules('mer_mouth', 'Mouth', 'trim|required');
		$this->form_validation->set_rules('mer_lower_abdomen', 'Lower Abdomen', 'trim|required');
		$this->form_validation->set_rules('mer_upper_abdomen', 'Upper Abdomen', 'trim|required');
		$this->form_validation->set_rules('mer_limbs', 'Limbs', 'trim|required');
		$this->form_validation->set_rules('mer_other_remarks', 'Other Remarks', 'trim|required');
		$this->form_validation->set_rules('mer_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('mer_date', 'Date', 'trim|required|datetime');

		if($this->input->post('submit'))
		{
			$medical_record = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$medical_record['mer_id'] = $mer_id;
				$rows_affected = $this->medical_record_model->update($medical_record, $this->form_validation->get_fields());

				$this->template->notification('Medical record updated.', 'success');
				redirect('admin/medical_records');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($medical_record);
		}

		$page = array();
		$page['medical_record'] = $this->medical_record_model->get_one($mer_id);

		if($page['medical_record'] === false)
		{
			$this->template->notification('Medical record was not found.', 'error');
			redirect('admin/medical_records');
		}
		$page['pet_ids'] = $this->pet_model->get_all();

		$this->template->content('medical_records-edit', $page);
		$this->template->show();
	}

	public function view($medical_record_id)
	{
		$this->template->title('View Medical Record');
		
		$page = array();
		$page['medical_record'] = $this->medical_record_model->get_one($medical_record_id);

		if($page['medical_record'] === false)
		{
			$this->template->notification('Medical record was not found.', 'error');
			redirect('admin/medical_records');
		}
		
		$this->template->content('medical_records-view', $page);
		$this->template->show();
	}
}