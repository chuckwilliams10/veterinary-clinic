<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laboratory_tests extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('laboratory_test_model');
	}

	public function index()
	{
		$this->template->title('Laboratory Tests');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$lat_ids = $this->input->post('lat_ids');
				if($lat_ids !== false)
				{
					foreach($lat_ids as $lat_id)
					{
						$laboratory_test = $this->laboratory_test_model->get_one($lat_id);
						if($laboratory_test !== false)
						{
							$this->laboratory_test_model->delete($lat_id);
						}
					}
					$this->template->notification('Selected laboratory tests were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['laboratory_tests'] = $this->laboratory_test_model->pagination("admin/laboratory_tests/index/__PAGE__", 'get_all');
		$page['laboratory_tests_pagination'] = $this->laboratory_test_model->pagination_links();
		$this->template->content('laboratory_tests-index', $page);
		$this->template->content('menu-laboratory_tests', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Add Laboratory Test');

		$this->load->model('examination_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('exm_id', 'Code', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_code', 'Code', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('lat_name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('lat_sequence', 'Sequence', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_unit', 'Unit', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('lat_normal_value', 'Normal Value', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('lat_normal_value_start', 'Normal Value Start', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_normal_value_end', 'Normal Value End', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$laboratory_test = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->laboratory_test_model->create($laboratory_test, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New laboratory test created.', 'success');
				redirect('admin/laboratory_tests');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($laboratory_test);
		}

		$page = array();
		$page['exm_ids'] = $this->examination_model->get_all();

		$this->template->content('laboratory_tests-create', $page);
		$this->template->show();
	}

	public function edit($lat_id)
	{
		$this->template->title('Edit Laboratory Test');

		$this->load->model('examination_model');

		$this->form_validation->set_rules('exm_id', 'Code', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_code', 'Code', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('lat_name', 'Name', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('lat_sequence', 'Sequence', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_unit', 'Unit', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('lat_normal_value', 'Normal Value', 'trim|required|max_length[10]');
		$this->form_validation->set_rules('lat_normal_value_start', 'Normal Value Start', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_normal_value_end', 'Normal Value End', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('lat_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$laboratory_test = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$laboratory_test['lat_id'] = $lat_id;
				$rows_affected = $this->laboratory_test_model->update($laboratory_test, $this->form_validation->get_fields());

				$this->template->notification('Laboratory test updated.', 'success');
				redirect('admin/laboratory_tests');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($laboratory_test);
		}

		$page = array();
		$page['laboratory_test'] = $this->laboratory_test_model->get_one($lat_id);

		if($page['laboratory_test'] === false)
		{
			$this->template->notification('Laboratory test was not found.', 'error');
			redirect('admin/laboratory_tests');
		}
		$page['exm_ids'] = $this->examination_model->get_all();

		$this->template->content('laboratory_tests-edit', $page);
		$this->template->show();
	}

	public function view($laboratory_test_id)
	{
		$this->template->title('View Laboratory Test');

		$page = array();
		$page['laboratory_test'] = $this->laboratory_test_model->get_one($laboratory_test_id);

		if($page['laboratory_test'] === false)
		{
			$this->template->notification('Laboratory test was not found.', 'error');
			redirect('admin/laboratory_tests');
		}

		$this->template->content('laboratory_tests-view', $page);
		$this->template->show();
	}

	public function show_forms()
	{
		$page = [];

		$exm_id = $this->input->get('id');
		$page["lab_tests"] = $this->laboratory_test_model->get_all(
			[
				'laboratory_test.exm_id' => $exm_id,
				'lat_status' => 'active'
			],
			[
				'laboratory_test.lat_sequence' => "ASC"
			]
		);

		$html_string = $this->load->view('admin/laboratory_tests/form',$page,true);
		echo $html_string;
	}
}
