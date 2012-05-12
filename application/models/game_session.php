<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Game_session extends CI_Model {

	public function __construct($identifier = FALSE)
	{
		parent::__construct();
		//Do your magic here
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

		$session = $this->db->get_where('game_sessions', array('slug' => $slug))
						->row_array();

		$session['timestamp'] = mysql_to_unix($session['timestamp']);

		return $session;
	}

	public function get_slug()
	{ 
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

	// Expects an ID of a game_session.
	//
	public function get_posts($id = FALSE)
	{
		if ( ! $id )
		{
			$post_q = $this->db->get('posts');

			return $post_q->row_array();
		}
		else
		{
			$this->db->select('posts.id, posts.owner, posts.text, posts.timestamp, 
										characters.id, characters.name')
						->join('characters', 'posts.owner = characters.id')
						->where('session', $id)
						->order_by('timestamp');

			$post_q = $this->db->get('posts');

			if ($post_q->num_rows() > 0)
			{
				 $posts = $post_q->result_array();

				 $posts['timestamp'] = mysql_to_unix($posts['timestamp']);

				 return $posts;
			}
			else
			{
				// fail to get any messages
				// set a flash message indicating so
				// return 0
			}

			return 0;
		}
	}

	public function add_event()
	{
		// start encounter, new post
	}
}