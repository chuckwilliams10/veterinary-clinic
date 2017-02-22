<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller 
{

	public function __construct() 
	{
		parent::__construct();
		$this->load->model('page_model');
		$this->load->helper('format');
		$this->load->helper('form');

	}
	
	public function index($slug) 
	{
		$page_params = array();
		$page = $this->page_model->get_published($slug);
		if($page !== false)
		{
			$this->template->title($page->pag_title);
			
			// Use format_image_path() to convert all relative image paths to absolute paths
			$page->pag_content = format_url_path($page->pag_content);
			$page->pag_content = format_image_path($page->pag_content);
			
			$page_params['page'] = $page;
			$this->template->content('page-index', $page_params);
			
			$this->template->show('site');
		}
		else
		{
			show_404(site_url('page/index/' . $slug));
		}
	}

	public function home()
	{
		$this->load->model("banner_model");

		$params = array();
		$params["banners"] = $this->banner_model->get_all();

		$this->template->title("Home");
		$this->template->content('page-index', $params);

		$this->template->show();
	}

	public function services()
	{
		$params = array(); 

		$this->template->title("Services");
		$this->template->content('page-services', $params);

		$this->template->show();		
	}

	public function contact_us()
	{
		$this->mythos->library("email"); 


		$this->form_validation->set_rules('email', 'Email Address', 'trim|required');
		$this->form_validation->set_rules('name', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		$params = array(); 

		if ($post = $this->extract->post()) { 	 
			if($this->form_validation->run() !== false)
			{
				$template['content'] = $this->template->get_view('welcome', $post, 'email');		
				
				//send the email
				$send_to = "blessed.veterinary2017@gmail.com";
				$subject = "Website Contact Us: ".$post["name"]; 

				$this->email->send_mail($send_to, $subject, $template);
				$this->template->notification('Email Sent!', 'success');
				redirect("page/contact_us");			
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below. 
				$this->template->notification(validation_errors(), 'error');
			}
		}

		$this->template->title("Contact Us");
		$this->template->content('page-contact_us', $params);

		$this->template->show();
	}

	public function login()
	{
		$this->load->model("account_model");

		$this->form_validation->set_rules('acc_username', 'Username', 'trim|required|email');
		$this->form_validation->set_rules('acc_password', 'Password', 'trim|required|min_length[6]|max_length[18]');

		$params = array();

		if ($post = $this->extract->post()) { 	 
			if($this->form_validation->run() !== false)
			{
				$username = $post['acc_username'];
				$password = $post['acc_password'];

				$account = $this->account_model->authenticate($username, $password);
				if($account !== false)
				{
					$this->account_model->failed_login_reset($username);
					
					$this->session->set_userdata('acc_id', $account->acc_id);
					$this->session->set_userdata('acc_username', $account->acc_username);
					$this->session->set_userdata('acc_type', $account->acc_type);
					$this->session->set_userdata('acc_first_name', $account->acc_first_name);
					$this->session->set_userdata('acc_last_name', $account->acc_last_name);
					$this->session->set_userdata('acc_name', $account->acc_first_name . ' ' . $account->acc_last_name);

					$full_name = $account->acc_first_name . ' ' . $account->acc_last_name;
					
					$this->template->notification('Welcome '.$full_name."!", 'success');

					redirect('account');
				}
				else
				{
					$this->template->notification('Invalid username or password.', 'error');
					$page['acc_username'] = $username;
				}
			}
			else
			{
				// To display validation errors caught by the Form_validation, you should have the code below. 
				$this->template->notification(validation_errors(), 'error');
			}
		}

		$this->template->title("Login");
		$this->template->content('page-login', $params);

		$this->template->show();
	}
}
