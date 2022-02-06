<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user_data')) {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		$i = 0;
		$getUser = $this->db->order_by('no', 'ASC')->get('users')->result();

		foreach ($getUser as $user) {
			$connect 	= new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $user->oauth_token, $user->oauth_token_secret);
			$getInfo 	= $connect->get('users/show', ['screen_name' => $user->username]);
			$getAvatar 	= explode('_normal', $getInfo->profile_image_url_https);

			$users[$i] = [
				'username'	=> $getInfo->screen_name,
				'avatar'	=> $getAvatar[0] . $getAvatar[1]
			];

			$i++;
		}

		$data = [
			'title'		=> 'Home',
			'users'		=> $users,
		];

		$this->load->view('home', $data);
	}

	public function about()
	{

		$data = [
			'title'		=> 'About'
		];

		$this->load->view('about', $data);
	}
}
