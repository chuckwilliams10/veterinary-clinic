<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banners extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->access_control->logged_in();
		$this->access_control->validate();

		$this->load->model('banner_model');
		$this->load->helper('format');
		$this->mythos->library('upload');
	}

	public function index()
	{
		$this->template->title('Banners');

		if($this->input->post('form_mode'))
		{
			$form_mode = $this->input->post('form_mode');

			if($form_mode == 'delete')
			{
				$bnr_ids = $this->input->post('bnr_ids');
				if($bnr_ids !== false)
				{
					foreach($bnr_ids as $bnr_id)
					{
						$banner = $this->banner_model->get_one($bnr_id);
						if($banner !== false)
						{
							$this->banner_model->delete($bnr_id);
						}
					}
					$this->template->notification('Selected banners were deleted.', 'success');
				}
			}
		}

		$page = array();
		$page['banners'] = $this->banner_model->pagination("admin/banners/index/__PAGE__", 'get_all');
		$page['banners_pagination'] = $this->banner_model->pagination_links();
		$this->template->content('banners-index', $page);
		$this->template->content('menu-banners', null, 'admin', 'page-nav');
		$this->template->show();
	}

	public function create()
	{
		$this->template->title('Create Banner');


		// Use the set_rules from the Form_validation class for form validation.
		// Already combined with jQuery. No extra coding required for JS validation.
		// We get both JS and PHP validation which makes it both secure and user friendly.
		// NOTE: Set the rules before you check if $_POST is set so that the jQuery validation will work.
		$this->form_validation->set_rules('bnr_image', 'Image', 'trim|max_length[200]');
		$this->form_validation->set_rules('bnr_image_thumb', 'Image Thumb', 'trim|max_length[200]');

		if($this->input->post('submit'))
		{
			$banner = $this->extract->post();

			// Call run method from Form_validation to check
			if($this->form_validation->run() !== false)
			{
				$data = $this->upload->do_upload_resize("bnr_image",300,300,'./uploads/banners/');
				$banner['bnr_image'] = $data['upload_data']['file_name'];
				$banner['bnr_image_thumb'] = $data['thumb_file_name'];

				$this->banner_model->create($banner, $this->form_validation->get_fields());
				// Set a notification using notification method from Template.
				// It is okay to redirect after and the notification will be displayed on the redirect page.
				$this->template->notification('New banner created.', 'success');
				redirect('admin/banners');
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below.
				$this->template->notification(validation_errors(), 'error');
			}

			$this->template->autofill($banner);
		}

		$page = array();
		
		$this->template->content('banners-create', $page);
		$this->template->show();
	}

	public function edit($bnr_id)
	{
		$this->template->title('Edit Banner');


		$this->form_validation->set_rules('bnr_image', 'Image', 'trim|max_length[200]');
		$this->form_validation->set_rules('bnr_image_thumb', 'Image Thumb', 'trim|max_length[200]');

		if($this->input->post('submit'))
		{
			$banner = $this->extract->post();
			if($this->form_validation->run() !== false)
			{
				$banner['bnr_id'] = $bnr_id;
				$data = $this->upload->do_upload_resize("bnr_image",300,300,'./uploads/banners/');
				$banner['bnr_image'] = $data['upload_data']['file_name'];
				$banner['bnr_image_thumb'] = $data['thumb_file_name'];
				$rows_affected = $this->banner_model->update($banner, $this->form_validation->get_fields());

				$this->template->notification('Banner updated.', 'success');
				redirect('admin/banners');
			}
			else
			{
				$this->template->notification(validation_errors());
			}
			$this->template->autofill($banner);
		}

		$page = array();
		$page['banner'] = $this->banner_model->get_one($bnr_id);

		if($page['banner'] === false)
		{
			$this->template->notification('Banner was not found.', 'error');
			redirect('admin/banners');
		}

		$this->template->content('banners-edit', $page);
		$this->template->show();
	}

	public function view($banner_id)
	{
		$this->template->title('View Banner');
		
		$page = array();
		$page['banner'] = $this->banner_model->get_one($banner_id);

		if($page['banner'] === false)
		{
			$this->template->notification('Banner was not found.', 'error');
			redirect('admin/banners');
		}
		
		$this->template->content('banners-view', $page);
		$this->template->show();
	}
}