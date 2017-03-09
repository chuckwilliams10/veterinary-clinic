<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Breeds extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('breed_model');
	}

	public function index()
	{
		$this->template->title('Breeds');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$bre_ids = $this->input->post('bre_ids');
				if($bre_ids !== false)
				{
					foreach($bre_ids as $bre_id)
					{
						$breed = $this->breed_model->get_one($bre_id);
						if($breed !== false)
						{
							$this->breed_model->delete($bre_id);
						}
					}
					$this->template->notification('Selected breeds were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['breeds'] = $this->breed_model->pagination("admin/breeds/index/__PAGE__", 'get_all');
		$page['breeds_pagination'] = $this->breed_model->pagination_links();
		$this->template->content('breeds-index', $page);
		$this->template->content('menu-breeds', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Add Breed');

		$this->load->model('species_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('spe_id', 'Name', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('bre_name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('bre_other_names', 'Other Names', 'trim|max_length[300]');

		if($this->input->post('submit'))
		{
			$breed = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->breed_model->create($breed, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New breed created.', 'success');
				redirect('admin/breeds');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($breed);
		}

		$page = array();
		$page['spe_ids'] = $this->species_model->get_all();

		$this->template->content('breeds-create', $page);
		$this->template->show();
	}

	public function edit($bre_id)
	{
		$this->template->title('Edit Breed');

		$this->load->model('species_model');

		$this->form_validation->set_rules('spe_id', 'Name', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('bre_name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('bre_other_names', 'Other Names', 'trim|max_length[300]');

		if($this->input->post('submit'))
		{
			$breed = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$breed['bre_id'] = $bre_id;
				$rows_affected = $this->breed_model->update($breed, $this->form_validation->get_fields());

				$this->template->notification('Breed updated.', 'success');
				redirect('admin/breeds');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($breed);
		}

		$page = array();
		$page['breed'] = $this->breed_model->get_one($bre_id);

		if($page['breed'] === false)
		{
			$this->template->notification('Breed was not found.', 'error');
			redirect('admin/breeds');
		}
		$page['spe_ids'] = $this->species_model->get_all();

		$this->template->content('breeds-edit', $page);
		$this->template->show();
	}

	public function view($breed_id)
	{
		$this->template->title('View Breed');

		$page = array();
		$page['breed'] = $this->breed_model->get_one($breed_id);

		if($page['breed'] === false)
		{
			$this->template->notification('Breed was not found.', 'error');
			redirect('admin/breeds');
		}

		$this->template->content('breeds-view', $page);
		$this->template->show();
	}
}
