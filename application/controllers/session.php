<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * undocumented class
 *
 * @package default
 * @author 	Andrew Ryan
 **/
class Session extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('game_session');
	}

	/**
	 * Display all threads available to the user
	 **/
	public function index()
	{
		$this->view();
	}

	/**
	 * Create a new thread if requsted, otherwise show form to do so
	 **/
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('title', 'Session title', 'required');
		$this->form_validation->set_rules('campaign', 'Your Campaign', 'required');

		if ( ! $this->form_validation->run() )
		{
			// Validation error
			$page['content'] = $this->load->view('forms/session', '', TRUE);
			$page['page_title'] = 'Session Manager';

			$this->load->view('layouts/main', $page);
		}
		else
		{
			// Display some kind of success message here
			$this->game_session->set_session();

			$this->view();
		}
	}

	public function view($slug = FALSE)
	{

		if ( ! $slug )
		{	
			$data['session'] = $this->game_session->get_session();

			$page = array(
				'page_title' => 'Cohort Sessions',
				'content' => $this->load->view('sessions/all', $data, TRUE)
			);

			$this->load->view('layouts/main', $page);
		}
		else
		{
			$session_model = $this->game_session->load($slug);

			$page = array(
				'title' 	=> $session_model->title,
				'campaign' 	=> $session_model->campaign,
				'details'  	=> $session_model->details
				'posts'		=> $this->get_session->get_posts()
			)

			// Requires $page['posts'];
			$page = array(
				'page_title' => 'Cohort Sessions'
			);

			$this->load->view('layouts/main', $page);
		}
	}
}

/* End of file session.php */
/* Location: ./application/controllers/session.php */