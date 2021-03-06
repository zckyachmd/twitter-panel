<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Home extends CI_Controller
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
		$this->load->view('home');
	}

	public function follow()
	{
		$username = $this->input->post('username', true);
		$total    = $this->input->post('total', true);
		$follow   = $this->input->post('follow', true);

		if ($username && $total && $follow) {
			$getBot = $this->db->get('users', $total)->result();

			if ($follow == 'add') {
				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('friendships/create', ['screen_name' => $username]);
					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$this->i users success follow @$username!");
			} else {

				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('friendships/destroy', ['screen_name' => $username]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$this->i users success unfollow @$username!");
			}
		}

		redirect(base_url('/'));
	}

	public function report()
	{
		$username = $this->input->post('username', true);
		$total    = $this->input->post('total', true);
		$report   = $this->input->post('report', true);

		if ($username && $total && $report) {
			$getBot = $this->db->get('users', $total)->result();

			if ($report == 'add') {
				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('users/report_spam', ['screen_name' => $username, 'perform_block' => false]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$this->i users success report @$username!");
			}
		}

		redirect(base_url('/'));
	}

	public function retweet()
	{
		$id       = $this->input->post('id', true);
		$total    = $this->input->post('total', true);
		$retweet  = $this->input->post('retweet', true);

		if ($id && $total && $retweet) {
			$getBot = $this->db->get('users', $total)->result();

			if ($retweet == 'add') {
				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('statuses/retweet', ['id' => $id]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$total users success retweet @$id!");
			} else {
				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('statuses/unretweet', ['id' => $id]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$this->i users success unretweet @$id!");
			}
		}

		redirect(base_url('/'));
	}

	public function favorite()
	{
		$id       = $this->input->post('id', true);
		$total    = $this->input->post('total', true);
		$favorite = $this->input->post('favorite', true);

		if ($id && $total && $favorite) {
			$getBot = $this->db->get('users', $total)->result();

			if ($favorite == 'add') {
				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('favorites/create', ['id' => $id]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$total users success favorite @$id!");
			} else {
				foreach ($getBot as $bot) {
					$connect_bot = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $bot->oauth_token, $bot->oauth_token_secret);
					$connect_bot->post('favorites/destroy', ['id' => $id]);

					if ($connect_bot->getLastHttpCode() == 200) {
						$this->i++;
					}
				}

				$this->session->set_flashdata('result', "$this->i users success unfavorite @$id!");
			}
		}

		redirect(base_url('/'));
	}
}
