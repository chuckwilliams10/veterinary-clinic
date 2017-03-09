<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Examinations extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('examination_model');
		$this->load->model('laboratory_test_model');
	}

	public function index()
	{
		$this->template->title('Services');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$exm_ids = $this->input->post('exm_ids');
				if($exm_ids !== false)
				{
					foreach($exm_ids as $exm_id)
					{
						$examination = $this->examination_model->get_one($exm_id);
						if($examination !== false)
						{
							$this->examination_model->delete($exm_id);
						}
					}
					$this->template->notification('Selected service(s) were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['examinations'] = $this->examination_model->pagination("admin/examinations/index/__PAGE__", 'get_all');
		$page['examinations_pagination'] = $this->examination_model->pagination_links();
		$this->template->content('examinations-index', $page);
		$this->template->content('menu-examinations', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Add Service');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('exm_code', 'Code', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('exm_name', 'Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('exm_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('exm_rate', 'Rate', 'trim|required|decimal');
		$this->form_validation->set_rules('exm_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$examination = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->examination_model->create($examination, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New service created.', 'success');
				redirect('admin/examinations');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($examination);
		}

		$page = array();

		$this->template->content('examinations-create', $page);
		$this->template->show();
	}

	public function edit($exm_id)
	{
		$this->template->title('Edit Service');


		$this->form_validation->set_rules('exm_code', 'Code', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('exm_name', 'Name', 'trim|required|max_length[200]');
		$this->form_validation->set_rules('exm_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('exm_rate', 'Rate', 'trim|required|decimal');
		$this->form_validation->set_rules('exm_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$examination = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$examination['exm_id'] = $exm_id;
				$rows_affected = $this->examination_model->update($examination, $this->form_validation->get_fields());

				$this->template->notification('Service updated.', 'success');
				redirect('admin/examinations');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($examination);
		}

		$page = array();
		$page['examination'] = $this->examination_model->get_one($exm_id);

		if($page['examination'] === false)
		{
			$this->template->notification('Service was not found.', 'error');
			redirect('admin/examinations');
		}

		$this->template->content('examinations-edit', $page);
		$this->template->show();
	}

	public function view($examination_id)
	{
		$this->template->title('View Service');

		$page = array();
		$page['examination'] = $this->examination_model->get_one($examination_id);

		if($page['examination'] === false)
		{
			$this->template->notification('Service was not found.', 'error');
			redirect('admin/examinations');
		}

		$laboratory_test_params   = array('laboratory_test.exm_id'=>$examination_id, "lat_status" => "active");
		$page['laboratory_tests'] = $this->laboratory_test_model->get_all($laboratory_test_params);

		$this->template->content('examinations-view', $page);
		$this->template->show();
	}

	function generate_check_list($examination_id)
	{
		$this->load->library("Pdf");

		$page['examination'] = $this->examination_model->get_one($examination_id);

		if($page['examination'] === false)
		{
			$this->template->notification('Service was not found.', 'error');
			redirect('admin/examinations/');
		}

		$laboratory_test_params   = array('laboratory_test.exm_id'=>$examination_id, "lat_status" => "active");
		$page['laboratory_tests'] = $this->laboratory_test_model->get_all($laboratory_test_params);

		$checklistpage = $this->load->view("admin/examinations/checklist",$page,true);

		$pdf = new PDF();
		$pdf->load_html($checklistpage);
		$pdf->set_paper('letter', 'portrait');

		$pdf->render();
		$pdf->stream("examination.pdf");

		// $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
		exit(0);
		// echo $checklistpage;
	}
}
