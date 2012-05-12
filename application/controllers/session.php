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

		$data['session'] = $this->game_session->get_session();

		if ( ! $this->form_validation->run() )
		{
			// Validation error

			$dm_data = ''; // [campaigns, players]

			$page['content'] = array(
				$this->load->view('sessions/all', $data, TRUE),
				$this->load->view('forms/session', $dm_data, TRUE), 
			);
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
			$this->load->helper('form');

			$data['session'] = $this->game_session->get_session();

			$dm_data = ''; // [campaigns, players]

			$page = array(
				'content'	=> array (
					$this->load->view('sessions/all', $data, TRUE),
					$this->load->view('forms/session', $dm_data, TRUE), ),
				'page_title'=> 'Session Manager',
			);


			$this->load->view('layouts/main', $page);
		}
		else
		{
			$session = $this->game_session->get_session($slug);
			
			$session['posts'] = $this->game_session->get_posts($slug);
			
			$page = array(
				'page_title' 	=> 'Cohort Sessions',
				'content'		=> $this->load->view('sessions/thread', $session, TRUE),
				'user'			=> '',
			);

			$this->load->view('layouts/main', $page);
		}
	}

	public function woah()
	{
		$this->load->model('game_session');
		$this->load->library('table');

		echo $this->table->generate($this->game_session->get_session('a-wild-adventure'));
	}
}

/* End of file session.php */
/* Location: ./application/controllers/session.php */