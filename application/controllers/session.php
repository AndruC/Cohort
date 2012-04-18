<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * undocumented class
 *
 * @package default
 * @author 	Andrew Ryan
 **/
class Session extends CI_Controller {

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

		$this->load->library('form_validation');

		if ($this->form_validation->run())
		{
			// Display some kind of success message here
			echo "Woo.";
		}
		else
		{
			$data['content'] = 'forms/session';
			// Validation error
			$this->load->view('layouts/main', $data);
		}
	}
}

/* End of file session.php */
/* Location: ./application/controllers/session.php */