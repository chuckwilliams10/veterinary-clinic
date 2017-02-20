<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Release_vouchers extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('release_voucher_model');
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

	public function create()
	{
		$this->template->title('Create Release Voucher');
				
		$this->load->model('_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('rev_code', 'Code', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('acc_id', '', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_admin_acc_id', 'Admin Acc Id', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_or_number', 'Or Number', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_datetime', 'Datetime', 'trim|required|datetime');
		$this->form_validation->set_rules('rev_remarks', 'Remarks', 'trim|required');
		$this->form_validation->set_rules('rev_status', 'Status', 'trim|required');
		$this->form_validation->set_rules('rev_total', 'Total', 'trim|required|decimal');

		if($this->input->post('submit'))
		{
			$release_voucher = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->release_voucher_model->create($release_voucher, $this->form_validation->get_fields());
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
		$page['s'] = $this->_model->get_all();
		
		$this->template->content('release_vouchers-create', $page);
		$this->template->show();
	}

	public function edit($rev_id)
	{
		$this->template->title('Edit Release Voucher');
				
		$this->load->model('_model');

		$this->form_validation->set_rules('rev_code', 'Code', 'trim|required|max_length[12]');
		$this->form_validation->set_rules('acc_id', '', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('rev_admin_acc_id', 'Admin Acc Id', 'trim|required|integer|max_length[11]');
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
		$page['s'] = $this->_model->get_all();

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
		
		$this->template->content('release_vouchers-view', $page);
		$this->template->show();
	}
}