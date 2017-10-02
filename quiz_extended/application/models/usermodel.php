<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{

function __construct(){
parent::__construct();
$this->load->database();
}

public function get_user(){
$valid_column_names = array('uid', 'email');
$email = $this->input->post('email');
$where = array('email' => $email);
foreach($valid_column_names as $key){
if(isset($args[$key])){
$where[$key] = $args[$key]; 
}
}
if(count($where) == 0){
return $this->db->get('tbluser')->result_array();
}
if($this->userExist($where['email'])){
$this->db->where($where);
$result = $this->db->get('tbluser');
return $result->result_array();
}else{
$this->post_user($where['email']);
return $this->get_user();
}
}

public function post_user($email){
$data = array('email' => $email);
$this->db->trans_start(); //to support transaction-safe table types
$this->db->insert('tbluser', $data);
$insert_id = $this->db->insert_id(); //to get the acive record insert id 
$this->db->trans_complete();
if ($this->db->trans_status() === FALSE) {
return -1; // indicates failure
} else {

return $insert_id;
}
}

public function userExist($email){
$this->db->from('tbluser');
$this->db->where('email', $email);
$query = $this->db->get();
$rowcount = $query->num_rows();
if($rowcount > 0){
return true;
}
return false;
}

public function post_score(){
$score = $this->input->post('score');
$total = $this->input->post('total');
$uid = $this->input->post('uid');
$data = array('score' => $score,
            'total' => $total,
            'uid' => $uid,
           );
$this->db->trans_start(); //to support transaction-safe table types
$this->db->insert('tblscore', $data);
$this->db->trans_complete();
if ($this->db->trans_status() === FALSE) {
return -1; // indicates failure
} else {
$this->db->where('uid', $uid);
return $this->db->get('tblscore')->result_array();
}
}

}

?>