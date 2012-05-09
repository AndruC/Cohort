<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game_session extends CI_Model {

	var $id;
	var $players = array();
	public $title;
	public $details = 'No details';
	public $campaign;
	public $messages = array();
	public $encounters = array();

	public function __construct($identifier = FALSE)
	{
	   parent::__construct();
	   //Do your magic here
	   if ( $identifier ) $this->load($identifier);
	}

	public function get_session($slug = FALSE)
	{
		if ( $slug === FALSE )
		{
			// If no parameter is passed, return all sessions

			$query = $this->db->get('game_sessions');

			// Temporary basic use.  Need error checking and all that whatnots.
			return $query->result_array();
		}

		$query = $this->db->get_where('game_sessions', array('slug' => $slug));

		return $query->row_array();
	}

	public function get_slug() { 
	
		$this->load->helper('url');

		return url_title($this->$title, 'dash', TRUE);
	}

	public function set_session()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title'		=> $this->input->post('title'),
			'slug' 		=> $slug,
			'campaign'	=> $this->input->post('campaign'),
			'details'	=> $this->input->post('recap'),
			'players'	=> $this->input->post('players')
			);

		return $this->db->insert('game_sessions', $data);
	}

	public function load($identifier)
	{
		$session_data;

		if ( is_string($identifier) )
		{
			$query = $this->db->get_where('game_sessions', array('slug' => $identifier));
		}
		else ( is_numeric($identifier) )
		{
			$query = $this->db->get_where('game_sessions', array('id' => $identifier))
		}

		if ($query->num_rows() > 0)
		{
			$session_data = $query->row();

			$this->db->select('posts.id, posts.owner, posts.text, posts.timestamp, users.first_name')
					 ->join('users' 'posts.owner = users.id')
					 ->where('session', $session_data->id)
					 ->order_by('timestamp');

			$post_q = $this->db->get('posts');

			// Clean up a bit to get all post user data too (minimum id)
			// SELECT p.id, p.owner, p.text, p.timestamp, u.first_name 
			// FROM posts AS p
			// INNER JOIN users AS u ON p.owner = u.id

			$this->messages = $post_q->row_array();

			if ( is_string($session_data->players) )
				$this->players = unserialize($session_data->players);

			if ( is_string($session_data->details) )
				$this->details = $session_data->details;

			$this->title 	= $session_data->title;
			$this->campaign = $session_data->campaign;

			return $this;
		}

		return FALSE;
	}

	// Saves the loaded model to the database.
	//
	// This function can be called to save the loaded data to the database. 
	// It ensures that defaults are saved in empty fields and will return some
	// indication of failure should the necessary fields not be filled in.
	public function save()
	{
		// Check if the data exists
		$data = array(
			'title'		=> $this->input->post('title'),
			'slug'		=> $slug,
			'campaign'	=> $this->input->post('campaign'),
			'details'	=> $this->input->post('recap'),
			'players'	=> $this->input->post('players')
			);

		return $this->db->insert('game_sessions', $data);
	}

	public function get_posts($id = FALSE)
	{
		if ( $id === FALSE ) return $this->messages;

	}

	public function add_event()
	{
		// start encounter, new post
	}
}