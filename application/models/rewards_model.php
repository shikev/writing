<?php

class Rewards_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function give_reward($email, $amount){
		$charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	    for($i = 0; $i < 20; $i++){
	        $key .= $charset[(mt_rand(0,(strlen($charset)-1)))]; 
	    }
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