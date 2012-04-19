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
			$this->load->view('forms/session');
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
		$this->load->helper('url');

		$data['session'] = $this->game_session->get_session($slug);

		if ( ! $slug )
		{
			$this->load->view('sessions/all', $data);
		}
		else
		{
			$this->load->view('sessions/thread', $data);
		}
	}
}

/* End of file session.php */
/* Location: ./application/controllers/session.php */