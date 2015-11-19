<?php

class Rewards_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function give_reward($email, $amount){
		$key = uniqid("",true);
		$data = array(
			'email'=>$email,
			'amount'=>$amount,
			'stamp'=>$key
			);
		$this->db->insert('rewards', $data);
	}

	public function get_total($email){

	}

	public function nullify_reward($stamp){

	}
















}
























?>