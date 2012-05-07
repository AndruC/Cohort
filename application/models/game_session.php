<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game_session extends CI_Model {

	public function __construct()
	{
	   parent::__construct();
	   //Do your magic here
	   $this->load->database();
	}

	public function get_session($slug = FALSE)
	{
		if ( $slug === FALSE )
		{
			$query = $this->db->get('game_sessions');

			return $query->result_array();
		}

		$query = $this->db->get_where('game_sessions', array('slug' => $slug));

		return $query->row_array();
	}

	public function set_session()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title'	=> $this->input->post('title'),
			'slug' => $slug,
			'campaign'	=> $this->input->post('campaign'),
			'recap'		=> $this->input->post('recap'),
			'players'	=> $this->input->post('players')
			);

		return $this->db->insert('game_sessions', $data);
	}
}