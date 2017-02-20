<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pets extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('pet_model');
	}

	public function index()
	{
		$this->template->title('Pets');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$pet_ids = $this->input->post('pet_ids');
				if($pet_ids !== false)
				{
					foreach($pet_ids as $pet_id)
					{
						$pet = $this->pet_model->get_one($pet_id);
						if($pet !== false)
						{
							$this->pet_model->delete($pet_id);
						}
					}
					$this->template->notification('Selected pets were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['pets'] = $this->pet_model->pagination("admin/pets/index/__PAGE__", 'get_all');
		$page['pets_pagination'] = $this->pet_model->pagination_links();
		$this->template->content('pets-index', $page);
		$this->template->content('menu-pets', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Pet');
				
		$this->load->model('account_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('acc_id', 'Username', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('pet_name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('pet_date_of_birth', 'Date Of Birth', 'trim|date');
		$this->form_validation->set_rules('pet_species', 'Species', 'trim|required');
		$this->form_validation->set_rules('pet_breed', 'Breed', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('pet_gender', 'Gender', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('pet_color', 'Color', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('pet_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('pet_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('pet_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('pet_death_datetime', 'Death Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('pet_cause_of_death', 'Cause Of Death', 'trim|required');

		if($this->input->post('submit'))
		{
			$pet = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->pet_model->create($pet, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New pet created.', 'success');
				redirect('admin/pets');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($pet);
		}

		$page = array();
		$page['acc_ids'] = $this->account_model->get_all();
		
		$this->template->content('pets-create', $page);
		$this->template->show();
	}

	public function edit($pet_id)
	{
		$this->template->title('Edit Pet');
				
		$this->load->model('account_model');

		$this->form_validation->set_rules('acc_id', 'Username', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('pet_name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('pet_date_of_birth', 'Date Of Birth', 'trim|date');
		$this->form_validation->set_rules('pet_species', 'Species', 'trim|required');
		$this->form_validation->set_rules('pet_breed', 'Breed', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('pet_gender', 'Gender', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('pet_color', 'Color', 'trim|required|max_length[120]');
		$this->form_validation->set_rules('pet_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('pet_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('pet_date_added', 'Date Added', 'trim|required|date');
		$this->form_validation->set_rules('pet_death_datetime', 'Death Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('pet_cause_of_death', 'Cause Of Death', 'trim|required');

		if($this->input->post('submit'))
		{
			$pet = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$pet['pet_id'] = $pet_id;
				$rows_affected = $this->pet_model->update($pet, $this->form_validation->get_fields());

				$this->template->notification('Pet updated.', 'success');
				redirect('admin/pets');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($pet);
		}

		$page = array();
		$page['pet'] = $this->pet_model->get_one($pet_id);

		if($page['pet'] === false)
		{
			$this->template->notification('Pet was not found.', 'error');
			redirect('admin/pets');
		}
		$page['acc_ids'] = $this->account_model->get_all();

		$this->template->content('pets-edit', $page);
		$this->template->show();
	}

	public function view($pet_id)
	{
		$this->template->title('View Pet');
		
		$page = array();
		$page['pet'] = $this->pet_model->get_one($pet_id);

		if($page['pet'] === false)
		{
			$this->template->notification('Pet was not found.', 'error');
			redirect('admin/pets');
		}
		
		$this->template->content('pets-view', $page);
		$this->template->show();
	}
}