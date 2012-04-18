<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * A Controller for viewing static pages on the site
 *
 * Pages is the first controller to be created in the cohort project.
 * @author 	Andrew Ryan <andruc@gmail.com>
 * @since	Version 0.1 - April 2012
 */
class Pages extends CI_Controller {

	public function view($page = 'home')
	{

		if ( ! file_exists('application/views/pages/'.$page.'.php') )
		{
			// No static view for the page
			show_404();
		}
		
		$data['title'] = ucfirst($page);
		$data['content'] = $page;

		$this->load->view('layouts/main', $data);
	}
}

/* End of file pages.php */
/* Location: ./application/controllers/pages.php */