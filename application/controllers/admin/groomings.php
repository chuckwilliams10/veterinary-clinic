<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Groomings extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('pet_model');
		$this->load->model('grooming_model');
	}

	public function index()
	{
		$this->template->title('Groomings');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$gro_ids = $this->input->post('gro_ids');
				if($gro_ids !== false)
				{
					foreach($gro_ids as $gro_id)
					{
						$grooming = $this->grooming_model->get_one($gro_id);
						if($grooming !== false)
						{
							$this->grooming_model->delete($gro_id);
						}
					}
					$this->template->notification('Selected groomings were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['groomings'] = $this->grooming_model->pagination("admin/groomings/index/__PAGE__", 'get_all');
		// echo $this->db->last_query(); die();
		$page['groomings_pagination'] = $this->grooming_model->pagination_links();
		$this->template->content('groomings-index', $page);
		$this->template->content('menu-groomings', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Grooming');
				
		$this->load->model('pet_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('pet_id', 'Id', 'trim|required|integer|max_length[10]|min_length[1]');
		$this->form_validation->set_rules('gro_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('gro_cost', 'Cost', 'trim|required|decimal');
		$this->form_validation->set_rules('gro_datetime', 'Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('gro_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$grooming = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->grooming_model->create($grooming, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New grooming created.', 'success');
				redirect('admin/groomings');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($grooming);
		}

		$page = array();
		$page['pet_ids'] = $this->pet_model->get_all();
		
		$this->template->content('groomings-create', $page);
		$this->template->show();
	}

	public function edit($gro_id)
	{
		$this->template->title('Edit Grooming');
				
		$this->load->model('pet_model');

		$this->form_validation->set_rules('pet_id', 'Id', 'trim|required|integer|max_length[10]|min_length[1]');
		$this->form_validation->set_rules('gro_description', 'Description', 'trim|required');
		$this->form_validation->set_rules('gro_cost', 'Cost', 'trim|required|decimal');
		$this->form_validation->set_rules('gro_datetime', 'Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('gro_status', 'Status', 'trim|required');

		if($this->input->post('submit'))
		{
			$grooming = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$grooming['gro_id'] = $gro_id;
				$rows_affected = $this->grooming_model->update($grooming, $this->form_validation->get_fields());

				$this->template->notification('Grooming updated.', 'success');
				redirect('admin/groomings');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($grooming);
		}

		$page = array();
		$page['grooming'] = $this->grooming_model->get_one($gro_id);

		if($page['grooming'] === false)
		{
			$this->template->notification('Grooming was not found.', 'error');
			redirect('admin/groomings');
		}
		$page['pet_ids'] = $this->pet_model->get_all();

		$this->template->content('groomings-edit', $page);
		$this->template->show();
	}

	public function view($grooming_id)
	{
		$this->template->title('View Grooming');
		
		$page = array();
		$page['grooming'] = $this->grooming_model->get_one($grooming_id);

		if($page['grooming'] === false)
		{
			$this->template->notification('Grooming was not found.', 'error');
			redirect('admin/groomings');
		}
		
		$this->template->content('groomings-view', $page);
		$this->template->show();
	}

	public function voucher($grooming_id)
	{
		$page['grooming'] = $this->grooming_model->get_one($grooming_id);

		if($page['grooming'] === false)
		{
			$this->template->notification('Grooming was not found.', 'error');
			redirect('admin/groomings');
		}

		$page['pet'] = $this->pet_model->get_one($page['grooming']->pet_id);
		$voucher = $this->load->view("admin/groomings/reciept.php",$page,true);
		
		$this->load->library("Pdf");
		
		$pdf = new PDF();
		$pdf->load_html($voucher); 
		$pdf->set_paper('letter', 'portrait');

		$pdf->render();
		$pdf->stream("voucher-".str_pad($page['grooming']->gro_id, 7, "0",STR_PAD_LEFT).".pdf"); 

		// $pdf->stream("dompdf_out.pdf", array("Attachment" => false));
		exit(0);
		// echo $checklistpage;
	}
}