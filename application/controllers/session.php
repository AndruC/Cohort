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

	}

	/**
	 * Display all threads available to the user
	 **/
	public function index()
	{
		echo "Well now you've done it.";
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
			$this->load->view('pages/home');
		}
	}
}

/* End of file session.php */
/* Location: ./application/controllers/session.php */