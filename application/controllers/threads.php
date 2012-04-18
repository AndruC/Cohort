<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * undocumented class
 *
 * @package default
 * @author 	Andrew Ryan
 **/
class Threads extends CI_Controller {

	public function index()
	{
	}

	public function new()
	{
		// if no post data, provide form for thread creation
		$new_thread = $this->get->post();
	}
}

/* End of file threads.php */
/* Location: ./application/controllers/threads.php */