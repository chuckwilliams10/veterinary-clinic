<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Release_voucher_lineitems extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('release_voucher_lineitem_model');
	}

	public function index()
	{
		$this->template->title('Release Voucher Lineitems');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$rvl_ids = $this->input->post('rvl_ids');
				if($rvl_ids !== false)
				{
					foreach($rvl_ids as $rvl_id)
					{
						$release_voucher_lineitem = $this->release_voucher_lineitem_model->get_one($rvl_id);
						if($release_voucher_lineitem !== false)
						{
							$this->release_voucher_lineitem_model->delete($rvl_id);
						}
					}
					$this->template->notification('Selected release voucher lineitems were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['release_voucher_lineitems'] = $this->release_voucher_lineitem_model->pagination("admin/release_voucher_lineitems/index/__PAGE__", 'get_all');
		$page['release_voucher_lineitems_pagination'] = $this->release_voucher_lineitem_model->pagination_links();
		$this->template->content('release_voucher_lineitems-index', $page);
		$this->template->content('menu-release_voucher_lineitems', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Add Release Voucher Lineitem');

		$this->load->model('release_voucher_model');
		$this->load->model('laboratory_test_result_model');

		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('rev_id', 'Code', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('ltr_id', 'Id', 'trim|required|integer|max_length[11]');

		if($this->input->post('submit'))
		{
			$release_voucher_lineitem = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$this->release_voucher_lineitem_model->create($release_voucher_lineitem, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New release voucher lineitem created.', 'success');
				redirect('admin/release_voucher_lineitems');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($release_voucher_lineitem);
		}

		$page = array();
		$page['rev_ids'] = $this->release_voucher_model->get_all();
		$page['ltr_ids'] = $this->laboratory_test_result_model->get_all();

		$this->template->content('release_voucher_lineitems-create', $page);
		$this->template->show();
	}

	public function edit($rvl_id)
	{
		$this->template->title('Edit Release Voucher Lineitem');

		$this->load->model('release_voucher_model');
		$this->load->model('laboratory_test_result_model');

		$this->form_validation->set_rules('rev_id', 'Code', 'trim|required|integer|max_length[11]');
		$this->form_validation->set_rules('ltr_id', 'Id', 'trim|required|integer|max_length[11]');

		if($this->input->post('submit'))
		{
			$release_voucher_lineitem = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$release_voucher_lineitem['rvl_id'] = $rvl_id;
				$rows_affected = $this->release_voucher_lineitem_model->update($release_voucher_lineitem, $this->form_validation->get_fields());

				$this->template->notification('Release voucher lineitem updated.', 'success');
				redirect('admin/release_voucher_lineitems');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($release_voucher_lineitem);
		}

		$page = array();
		$page['release_voucher_lineitem'] = $this->release_voucher_lineitem_model->get_one($rvl_id);

		if($page['release_voucher_lineitem'] === false)
		{
			$this->template->notification('Release voucher lineitem was not found.', 'error');
			redirect('admin/release_voucher_lineitems');
		}
		$page['rev_ids'] = $this->release_voucher_model->get_all();
		$page['ltr_ids'] = $this->laboratory_test_result_model->get_all();

		$this->template->content('release_voucher_lineitems-edit', $page);
		$this->template->show();
	}

	public function view($release_voucher_lineitem_id)
	{
		$this->template->title('View Release Voucher Lineitem');

		$page = array();
		$page['release_voucher_lineitem'] = $this->release_voucher_lineitem_model->get_one($release_voucher_lineitem_id);

		if($page['release_voucher_lineitem'] === false)
		{
			$this->template->notification('Release voucher lineitem was not found.', 'error');
			redirect('admin/release_voucher_lineitems');
		}

		$this->template->content('release_voucher_lineitems-view', $page);
		$this->template->show();
	}
}
