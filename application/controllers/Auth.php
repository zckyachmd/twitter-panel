<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Abraham\TwitterOAuth\TwitterOAuth;

class Auth extends CI_Controller
{
	public function index()
	{
		if ($this->session->userdata('user_data')) {
			redirect(base_url('auth'));
		} else {
			$data = [
				'title' => 'Login',
			];

			$this->load->view('login', $data);
		}
	}

	public function connect()
	{
		try {
			$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);

			$request_token = $connection->oauth('oauth/request_token', ['oauth_callback' => base_url('auth/callback')]);
			$userToken = [
				'oauth_token'        => $request_token['oauth_token'],
				'oauth_token_secret' => $request_token['oauth_token_secret']
			];
			$this->session->set_flashdata($userToken);

			redirect($connection->url('oauth/authorize', ['oauth_token' => $request_token['oauth_token']]));
		} catch (Exception $e) {
			$this->session->set_flashdata('error', 'Could not connect to Twitter. Refresh the page or try again later!');

			redirect(base_url('/auth'));
		}
	}

	public function callback()
	{
		$oauth_token          = $this->session->userdata('oauth_token');
		$oauth_token_secret   = $this->session->userdata('oauth_token_secret');
		$oauth_token_verifier = $this->input->get_post('oauth_verifier');

		$connection   = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $oauth_token, $oauth_token_secret);
		$access_token = (object)$connection->oauth('oauth/access_token', ['oauth_verifier' => $oauth_token_verifier]);

		if ($connection->getLastHttpCode() == 200) {
			$user_data = [
				'id'                 => $access_token->user_id,
				'username'           => $access_token->screen_name,
				'oauth_token'        => $access_token->oauth_token,
				'oauth_token_secret' => $access_token->oauth_token_secret
			];

			$user_check = $this->db->get_where('users', ['id' => $access_token->user_id], 1)->row();

			if (!$user_check) {
				$this->db->insert('users', $user_data);
			} else {
				$this->db->where('id', $access_token->user_id)->update('users', $user_data);
			}

			$this->session->set_userdata('user_data', $user_data);

			redirect(base_url('/'));
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect(base_url('auth'));
	}
}
