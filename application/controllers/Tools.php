<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Tools extends CI_Controller
{
	protected $i = 0;

	public function __construct()
	{
		parent::__construct();

		if (!$this->session->userdata('user_data')) {
			redirect(base_url('auth'));
		}
	}

	public function index()
	{
		redirect($_SERVER['HTTP_REFERER']);
	}

	public function follow()
	{
		$username = $this->input->post('username', true);
		$total    = $this->input->post('total', true);
		$follow   = $this->input->post('follow', true);

		if ($username && $total && $follow) {
			$getBot		= $this->db->order_by('no', 'RANDOM')->limit($total)->get('users')->result();
			$toolsName	= $follow == 'add' ? 'Follow' : 'Unfollow';
			$action		= $follow == 'add' ? 'create' : 'destroy';

			foreach ($getBot as $bot) {
				$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
				$connect_bot->post('friendships/' . $action, ['screen_name' => $username]);

				$result[$this->i] = [
					'username' => $bot->username,
					'status'   => $connect_bot->getLastHttpCode() == 200 ? 1 : 0,
				];

				$this->i++;
			}

			if ($this->i > 0) {
				$this->session->set_flashdata('alert',  "Success $toolsName @$username");
				$this->session->set_flashdata('result',  $result);
			} else {
				$this->session->set_flashdata('alert', "No user $toolsName @$username");
			}

			redirect(current_url());
		}

		$options = [
			''        => 'Choose an action',
			'add'     => 'Added Follower',
			'reduce'  => 'Reduce Follower'
		];

		$data = [
			'title'		=> 'Follow',
			'options'	=> $options
		];

		$this->load->view('tools/follow', $data);
	}

	public function report()
	{
		$username = $this->input->post('username', true);
		$total    = $this->input->post('total', true);

		if ($username && $total) {
			$getBot = $this->db->order_by('no', 'RANDOM')->limit($total)->get('users')->result();

			foreach ($getBot as $bot) {
				$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
				$connect_bot->post('users/report_spam', ['screen_name' => $username, 'perform_block' => false]);

				$result[$this->i] = [
					'username' => $bot->username,
					'status'   => $connect_bot->getLastHttpCode() == 200 ? 1 : 0,
				];

				$this->i++;
			}

			$this->session->set_flashdata('alert', $this->i . " users success report @$username");
			$this->session->set_flashdata('result',  $result);

			redirect(current_url());
		}

		$data = [
			'title'		=> 'Report'
		];

		$this->load->view('tools/report', $data);
	}

	public function retweet()
	{
		$id       = $this->input->post('id', true);
		$total    = $this->input->post('total', true);
		$retweet  = $this->input->post('retweet', true);

		if ($id && $total && $retweet) {
			$getBot 	= $this->db->order_by('no', 'RANDOM')->limit($total)->get('users')->result();
			$toolsName	= $retweet == 'add' ? 'Retweet' : 'Unretweet';
			$action		= $retweet == 'add' ? 'retweet' : 'unretweet';

			foreach ($getBot as $bot) {
				$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
				$connect_bot->post('statuses/' . $action, ['id' => $id]);

				$result[$this->i] = [
					'username' => $bot->username,
					'status'   => $connect_bot->getLastHttpCode() == 200 ? 1 : 0,
				];

				$this->i++;
			}

			if ($this->i > 0) {
				$this->session->set_flashdata('alert',  "Success $toolsName $id");
				$this->session->set_flashdata('result',  $result);
			} else {
				$this->session->set_flashdata('alert', "No user $toolsName $id");
			}

			redirect(current_url());
		}

		$options = [
			''        => 'Choose an action',
			'add'     => 'Added Retweet',
			'reduce'  => 'Reduce Retweet'
		];
		$data = [
			'title'		=> 'Retweet',
			'options'	=> $options
		];

		$this->load->view('tools/retweet', $data);
	}

	public function favorite()
	{
		$id       = $this->input->post('id', true);
		$total    = $this->input->post('total', true);
		$favorite = $this->input->post('favorite', true);

		if ($id && $total && $favorite) {
			$getBot 	= $this->db->order_by('no', 'RANDOM')->limit($total)->get('users')->result();
			$toolsName	= $favorite == 'add' ? 'Favorite' : 'Delete favorite';
			$action		= $favorite == 'add' ? 'create' : 'destroy';

			foreach ($getBot as $bot) {
				$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
				$connect_bot->post('favorites/' . $action, ['id' => $id]);

				$result[$this->i] = [
					'username' => $bot->username,
					'status'   => $connect_bot->getLastHttpCode() == 200 ? 1 : 0,
				];

				$this->i++;
			}

			if ($this->i > 0) {
				$this->session->set_flashdata('alert',  "Success $toolsName $id!");
				$this->session->set_flashdata('result',  $result);
			} else {
				$this->session->set_flashdata('alert', "No user $toolsName $id!");
			}

			redirect(current_url());
		}

		$options = [
			''        => 'Choose an action',
			'add'     => 'Added Favorite',
			'reduce'  => 'Reduce Favorite'
		];

		$data = [
			'title'		=> 'Favorite',
			'options'	=> $options
		];

		$this->load->view('tools/favorite', $data);
	}

	public function reply()
	{
		$id       = $this->input->post('id', true);
		$total    = $this->input->post('total', true);
		$reply	  = preg_split("/\r\n|\n|\r/", $this->input->post('reply', true));
		$quotes	  = $this->input->post('quotes', true);

		if ($id && $total && $reply) {
			$getBot 	= $this->db->order_by('no', 'RANDOM')->limit($total)->get('users')->result();
			$toolsName	= empty($quotes) ? 'Reply' : 'Quotes Reply';

			foreach ($getBot as $bot) {
				$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);

				if (empty($idTweet)) {
					$getTweet = $connect_bot->get('statuses/show', ['id' => $id]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$username = $getTweet->user->screen_name;
						$idTweet  = $getTweet->id;
						$url	  = 'twitter.com/' . $username . '/status/' . $idTweet;
					} else {
						break;
					}
				}

				if (empty($quotes)) {
					$action = [
						'status' => "@$username " . $reply[array_rand($reply, 1)],
						'in_reply_to_status_id' => $idTweet
					];
				} else {
					$action = [
						'status' => $reply[array_rand($reply, 1)] . " " . $url
					];
				}

				$connect_bot->post('statuses/update', $action);

				$result[$this->i] = [
					'username' => $bot->username,
					'status'   => $connect_bot->getLastHttpCode() == 200 ? 1 : 0,
				];

				$this->i++;
			}

			if ($this->i > 0) {
				$this->session->set_flashdata('alert',  "Success $toolsName $id!");
				$this->session->set_flashdata('result',  $result);
			} else {
				$this->session->set_flashdata('alert', "No user $toolsName $id!");
			}

			redirect(current_url());
		}

		$data = [
			'title'		=> 'Reply'
		];

		$this->load->view('tools/reply', $data);
	}
}
