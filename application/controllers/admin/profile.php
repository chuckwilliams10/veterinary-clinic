<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller 
{

	private $species = [];

	public function __construct() 
	{
		parent::__construct();
		
		$this->access_control->logged_in();
		$this->access_control->account_type('dev', 'admin');
		$this->access_control->validate();

		$this->load->model("species_model");
		$list_species = $this->species_model->get_all();
		foreach ($list_species->result() as $specie) {
			$this->species[] = $specie->spe_name;
		}
	}
	
	public function index()
	{
		$this->load->model('account_model');
		$username = $this->session->userdata('acc_username');
		$account = $this->account_model->get_by_username($username);
		
		$this->template->title($account->acc_first_name . ' ' . $account->acc_last_name);
		
		if($account !== false)
		{
			$using_default = false;
			if($account->acc_type == 'dev')
			{
				$using_default = $this->account_model->using_default_pass($account->acc_username);
			}
			
			if($using_default !== false)
			{
				$this->template->notification("Please reset this account's password for security.", 'warning');
				redirect('admin/accounts/reset_password/' . $account->acc_id);
			}
			
			$page = array();
			$page['account'] = $account;
			$page['chart_data'] = $this->charts();
			dd($page);
			$this->template->content('profile-index', $page);
			
			$this->template->show();
		}
		else
		{
			redirect('/admin/accounts/');
		}
	}
	
	public function change_password()
	{
		$template = array();
		$this->template->title('Change Password');
		
		$this->form_validation->set_rules('old_password', 'Old Password', 'required');
		$this->form_validation->set_rules('new_password', 'New Password', 'required|min_length[6]');
		$this->form_validation->set_rules('new_password2', 'Retype New Password', 'required|matches[new_password]');
		
		if($this->input->post('submit') !== false)
		{
			$this->load->model('account_model');
			$username = $this->session->userdata('acc_username');
			$old_password = $this->input->post('old_password');
			$new_password = $this->input->post('new_password');
			$new_password2 = $this->input->post('new_password2');
			
			$account = $this->account_model->authenticate($username, $old_password);
			if($account !== false)
			{
				if($this->form_validation->run() !== false)
				{
					$this->account_model->change_password($username, $new_password);
					$this->template->notification('Password changed.', 'success');
					redirect('/admin/profile/');
				}
				else
				{
					$this->template->notification(validation_errors(), 'error');
				}
			}
			else
			{
				$this->template->notification('Incorrect old password.', 'error');
			}
		}
		
		$this->template->content('profile-change_password');
			
		$this->template->show();
	}
	

	public function charts() {
		$pet_permonth = $this->db->query("SELECT  
			    COUNT(*) as total,
			    DATE_FORMAT(pet_date_added, '%b') as month 
			FROM
				pet 
			JOIN
				species
			    	ON
			        	species.spe_id = pet.spe_id
			GROUP BY 
				DATE_FORMAT(pet_date_added, '%b')
			ORDER BY 
				MONTH(pet_date_added)
			");

		$ppm = array('title' => 'Pet registered per month','month' => array(), 'data' => array());
		foreach ($pet_permonth->result() as $ppmonth) {
			$ppm['month'][] = $ppmonth->month;
			$ppm['data'][] = $ppmonth->total;
		}
 
		
		$exam_permonth = $this->db->query("SELECT 
				DATE_FORMAT(lab_date, '%b') as month,
			    COUNT(*) as total
			FROM 
				laboratory_results
			JOIN
				examination ON examination.exm_id = laboratory_results.exm_id
			GROUP BY 
				DATE_FORMAT(lab_date, '%b')
			ORDER BY 
				MONTH(lab_date)
			"); 
		
		$epm = array('title' => 'Laboratory test per month','month' => array(), 'data' => array());
		foreach ($exam_permonth->result() as $ppmonth) {
			$epm['month'][] = $ppmonth->month;
			$epm['data'][] = $ppmonth->total;
		}



		$pet_permonth_per_species = $this->db->query("SELECT 
				species.spe_name as species,
			    COUNT(*) as total,
			    DATE_FORMAT(pet_date_added, '%b') as month 
			FROM
				pet 
			JOIN
				species
			    	ON
			        	species.spe_id = pet.spe_id
			GROUP BY 
				DATE_FORMAT(pet_date_added, '%b'), species.spe_id
			ORDER BY 
				MONTH(pet_date_added)
		");



		$ppps = array('title' => 'Laboratory test per month','month' => array(), 'data' => []);
		foreach ($pet_permonth_per_species->result() as $ppmonth) {
			if (!in_array($ppmonth->month, $ppps['month'])) {
				$ppps['month'][] = $ppmonth->month;
			}
			$ppps['data'][$ppmonth->species][] = $ppmonth->total;
		}
 
		$data = array(
			"ppm"  => $ppm,
			"epm"  => $epm,
			"ppps" => $ppps
		);

		return json_encode($data, true);
	} 


}