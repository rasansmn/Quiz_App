<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model{

function __construct(){
parent::__construct();
$this->load->database();
}


function login(){
$username = $this->input->post('txtUsername');
$password = $this->input->post('txtPassword');
$this->db->where("username = '$username' AND password = '$password'");
$result = $this->db->get('tbladmin');
if($result->num_rows() > 0){
return true;
}
return false;
}

}

?>