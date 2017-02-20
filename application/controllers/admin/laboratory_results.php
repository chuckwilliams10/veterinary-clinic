<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratory_results extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('laboratory_results_model');
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

	public function create()
	{
		$this->template->title('Create Laboratory Results');
				
		$this->load->model('pet_model');				
		$this->load->model('examination_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('pet_id', 'Name', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('exm_id', 'Code', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lab_result', 'Result', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lab_normal_value', 'Normal Value', 'trim|required|decimal');
		$this->form_validation->set_rules('lab_normal_value_start', 'Normal Value Start', 'trim|required|decimal');
		$this->form_validation->set_rules('lab_sequence', 'Sequence', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lab_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('lab_date', 'Date', 'trim|required|datetime');
		$this->form_validation->set_rules('lab_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$laboratory_results = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->laboratory_results_model->create($laboratory_results, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New laboratory results created.', 'success');
				redirect('admin/laboratory_results');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($laboratory_results);
		}

		$page = array();
		$page['pet_ids'] = $this->pet_model->get_all();
		$page['exm_ids'] = $this->examination_model->get_all();
		
		$this->template->content('laboratory_results-create', $page);
		$this->template->show();
	}

	public function edit($lab_id)
	{
		$this->template->title('Edit Laboratory Results');
				
		$this->load->model('pet_model');				
		$this->load->model('examination_model');

		$this->form_validation->set_rules('pet_id', 'Name', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('exm_id', 'Code', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lab_result', 'Result', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lab_normal_value', 'Normal Value', 'trim|required|decimal');
		$this->form_validation->set_rules('lab_normal_value_start', 'Normal Value Start', 'trim|required|decimal');
		$this->form_validation->set_rules('lab_sequence', 'Sequence', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lab_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('lab_date', 'Date', 'trim|required|datetime');
		$this->form_validation->set_rules('lab_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$laboratory_results = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$laboratory_results['lab_id'] = $lab_id;
				$rows_affected = $this->laboratory_results_model->update($laboratory_results, $this->form_validation->get_fields());

				$this->template->notification('Laboratory results updated.', 'success');
				redirect('admin/laboratory_results');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($laboratory_results);
		}

		$page = array();
		$page['laboratory_results'] = $this->laboratory_results_model->get_one($lab_id);

		if($page['laboratory_results'] === false)
		{
			$this->template->notification('Laboratory results was not found.', 'error');
			redirect('admin/laboratory_results');
		}
		$page['pet_ids'] = $this->pet_model->get_all();
		$page['exm_ids'] = $this->examination_model->get_all();

		$this->template->content('laboratory_results-edit', $page);
		$this->template->show();
	}

	public function view($laboratory_results_id)
	{
		$this->template->title('View Laboratory Results');
		
		$page = array();
		$page['laboratory_results'] = $this->laboratory_results_model->get_one($laboratory_results_id);

		if($page['laboratory_results'] === false)
		{
			$this->template->notification('Laboratory results was not found.', 'error');
			redirect('admin/laboratory_results');
		}
		
		$this->template->content('laboratory_results-view', $page);
		$this->template->show();
	}
}