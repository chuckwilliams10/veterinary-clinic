<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Species extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('species_model');
	}

	public function index()
	{
		$this->template->title('Species');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$spe_ids = $this->input->post('spe_ids');
				if($spe_ids !== false)
				{
					foreach($spe_ids as $spe_id)
					{
						$species = $this->species_model->get_one($spe_id);
						if($species !== false)
						{
							$this->species_model->delete($spe_id);
						}
					}
					$this->template->notification('Selected species were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['species'] = $this->species_model->pagination("admin/species/index/__PAGE__", 'get_all');
		$page['species_pagination'] = $this->species_model->pagination_links();
		$this->template->content('species-index', $page);
		$this->template->content('menu-species', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Species');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('spe_name', 'Name', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('spe_common_name', 'Common Name', 'trim|required|max_length[11]');

		if($this->input->post('submit'))
		{
			$species = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->species_model->create($species, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New species created.', 'success');
				redirect('admin/species');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($species);
		}

		$page = array();
		
		$this->template->content('species-create', $page);
		$this->template->show();
	}

	public function edit($spe_id)
	{
		$this->template->title('Edit Species');


		$this->form_validation->set_rules('spe_name', 'Name', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('spe_common_name', 'Common Name', 'trim|required|max_length[11]');

		if($this->input->post('submit'))
		{
			$species = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$species['spe_id'] = $spe_id;
				$rows_affected = $this->species_model->update($species, $this->form_validation->get_fields());

				$this->template->notification('Species updated.', 'success');
				redirect('admin/species');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($species);
		}

		$page = array();
		$page['species'] = $this->species_model->get_one($spe_id);

		if($page['species'] === false)
		{
			$this->template->notification('Species was not found.', 'error');
			redirect('admin/species');
		}

		$this->template->content('species-edit', $page);
		$this->template->show();
	}

	public function view($species_id)
	{
		$this->template->title('View Species');
		
		$page = array();
		$page['species'] = $this->species_model->get_one($species_id);

		if($page['species'] === false)
		{
			$this->template->notification('Species was not found.', 'error');
			redirect('admin/species');
		}
		
		$this->template->content('species-view', $page);
		$this->template->show();
	}
}