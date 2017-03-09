<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Release_vouchers extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('pet_model');
		$this->load->model('account_model');
		$this->load->model('release_voucher_model');
		$this->load->model('release_voucher_lineitem_model');
	}

	public function index()
	{
		$this->template->title('Release Vouchers');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$rev_ids = $this->input->post('rev_ids');
				if($rev_ids !== false)
				{
					foreach($rev_ids as $rev_id)
					{
						$release_voucher = $this->release_voucher_model->get_one($rev_id);
						if($release_voucher !== false)
						{
							$this->release_voucher_model->delete($rev_id);
						}
					}
					$this->template->notification('Selected release vouchers were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['release_vouchers'] = $this->release_voucher_model->pagination("admin/release_vouchers/index/__PAGE__", 'get_all');
		$page['release_vouchers_pagination'] = $this->release_voucher_model->pagination_links();
		$this->template->content('release_vouchers-index', $page);
		$this->template->content('menu-release_vouchers', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create($pet_id = 0)
	{
		$this->template->title('Add Release Voucher');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('rev_code', 'Code', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('acc_id', 'Username', 'trim|integer|max_length[11]');
		$this->form_validation->set_rules('rev_admin_acc_id', 'Admin Acc Id', 'trim|integer|max_length[11]');
		$this->form_validation->set_rules('pet_id', 'Id', 'trim|required|max_length[11]');
		$this->form_validation->set_rules('rev_or_number', 'Or Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_datetime', 'Datetime', 'trim|datetime');
		$this->form_validation->set_rules('rev_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('rev_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('rev_total', 'Total', 'trim|required|decimal');

		if($this->input->post('submit'))
		{
			$release_voucher = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$pet = $this->pet_model->get_one($pet_id);
				$current_user = $this->account_model->get_by_username($this->session->userdata("acc_username"));

				$release_voucher['acc_id'] = $pet->acc_id;
				$release_voucher['pet_id'] = $pet->pet_id;
				$release_voucher['rev_datetime'] = date("Y-m-d H:i:s");
				$release_voucher['rev_admin_acc_id'] = $current_user->acc_id;

				$rev_id = $this->release_voucher_model->create($release_voucher, $this->form_validation->get_fields());

				foreach ($release_voucher['rvl_value'] as $exm_id => $rvl_value)
				{
					$rvlineitem = array();

					$rvlineitem["rev_id"] = $rev_id;
					$rvlineitem["exm_id"] = $exm_id;
					$rvlineitem["rvl_value"] = $rvl_value;

					$this->release_voucher_lineitem_model->create($rvlineitem);
				}

				$pet_params = array();
				$pet_params["pet_id"] = $pet->pet_id;
				$pet_params["pet_status"] = "released";
				$this->pet_model->update($pet_params);

				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New release voucher created.', 'success');
				redirect('admin/release_vouchers');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($release_voucher);
		}

		$page = array();
		$page['acc_ids'] = $this->account_model->get_all();
		$page['pet_ids'] = $this->pet_model->get_all();
		$page['pet'] = $this->pet_model->get_one($pet_id);

		if($page['pet'] === false)
		{
			$this->template->notification('Pet was not found.', 'error');
			redirect('admin/pets');
		}

		$page['line_items'] = $this->get_pet($pet_id);

		$this->template->content('release_vouchers-create', $page);
		$this->template->show();
	}

	public function edit($rev_id)
	{
		$this->template->title('Edit Release Voucher');

		$this->load->model('account_model');
		$this->load->model('pet_model');

		$this->form_validation->set_rules('rev_code', 'Code', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('acc_id', 'Username', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_admin_acc_id', 'Admin Acc Id', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('pet_id', 'Id', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_or_number', 'Or Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_datetime', 'Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('rev_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('rev_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('rev_total', 'Total', 'trim|required|decimal');

		if($this->input->post('submit'))
		{
			$release_voucher = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$release_voucher['rev_id'] = $rev_id;
				$rows_affected = $this->release_voucher_model->update($release_voucher, $this->form_validation->get_fields());

				$this->template->notification('Release voucher updated.', 'success');
				redirect('admin/release_vouchers');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($release_voucher);
		}

		$page = array();
		$page['release_voucher'] = $this->release_voucher_model->get_one($rev_id);

		if($page['release_voucher'] === false)
		{
			$this->template->notification('Release voucher was not found.', 'error');
			redirect('admin/release_vouchers');
		}
		$page['acc_ids'] = $this->account_model->get_all();
		$page['pet_ids'] = $this->pet_model->get_all();

		$this->template->content('release_vouchers-edit', $page);
		$this->template->show();
	}

	public function view($release_voucher_id)
	{
		$this->template->title('View Release Voucher');

		$page = array();
		$page['release_voucher'] = $this->release_voucher_model->get_one($release_voucher_id);

		if($page['release_voucher'] === false)
		{
			$this->template->notification('Release voucher was not found.', 'error');
			redirect('admin/release_vouchers');
		}

		$page["line_items"] = $this->get_pet($page['release_voucher']->pet_id);

		$this->template->content('release_vouchers-view', $page);
		$this->template->show();
	}

	public function email_to_account($release_voucher_id)
	{
		$this->mythos->library("email");
		$page = array();
		$page['release_voucher'] = $this->release_voucher_model->get_one($release_voucher_id);

		if($page['release_voucher'] === false)
		{
			$this->template->notification('Release voucher was not found.', 'error');
			redirect('admin/release_vouchers');
		}

		$page["line_items"] = $this->get_pet($page['release_voucher']->pet_id);

		$template['content'] = $this->template->get_view('release_voucher', $page, 'email');

		//send the email
		$send_to = $page['release_voucher']->acc_username;
		$subject = "Blessed Veterinary Clinic Voucher";

		$this->email->send_mail($send_to, $subject, $template);
		$this->template->notification('Email Sent!', 'success');


		$update = array();
		$update["rev_id"] = $page['release_voucher']->rev_id;
		$update["rev_emailed"] = 1;
		$this->release_voucher_model->update($update, ["rev_id","rev_emailed"]);

		redirect('admin/release_vouchers');
	}

	public function get_pet($pet_id)
	{
		$this->load->model([
			"pet_model",
			"laboratory_results_model",
			"laboratory_test_result_model"
		]);

		$exam_sort = array( "lab_id"     => "DESC" );
		$exam_data = array( "pet.pet_id" => $pet_id );

		$pet   = $this->pet_model->get_one($pet_id);
		$exams = $this->laboratory_results_model->get_all($exam_data, $exam_sort);

		$data = array();

		foreach ($exams->result() as $examination) {

			$data[$examination->exm_id] = $examination;

			$exam_params = ["laboratory_results.lab_id" => $examination->lab_id];
			$exam_orders = ["lat_sequence"=>"ASC"];

			$examination_results = $this->laboratory_test_result_model->get_all($exam_params, $exam_orders);
			$data[$examination->exm_id]->line_item = $examination_results->result();
		}
		return $data;
	}

	public function pdf($pet_id = 0)
	{

		$this->load->library("Pdf");

		$page = array();
		$page["pet"] = $this->pet_model->get_one($pet_id);
		$page["line_items"] = $this->get_pet($page['pet']->pet_id);

		if($page["pet"] === false)
		{
			$this->template->notification('Pet was not found.', 'error');
			redirect('admin/release_vouchers');
		}


		$voucher = $this->load->view("admin/release_vouchers/receipt",$page,true);
		$pdf = new PDF();
		$pdf->load_html($voucher);
		$pdf->set_paper('letter', 'portrait');

		$pdf->render();
		$pdf->stream("voucher-".str_pad($page['pet']->pet_id, 7, "0",STR_PAD_LEFT).".pdf");
		exit(0);

	}
}
