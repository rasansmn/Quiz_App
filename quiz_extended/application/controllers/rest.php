<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rest extends CI_Controller{

function __construct(){
parent::__construct();
$this->load->model('questionmodel');
$this->load->model('usermodel');
}

public function _remap(){
$request_method=$this->input->server('REQUEST_METHOD');

switch(strtolower($request_method)){
case 'get': 
$this->getRouting(); 
break;

case 'post' : 
$this->postRouting();
break;

case 'delete' : 
$this->doDelete();
break;

case 'put' : 
$this->doUpdate();
break;

default:
show_error('unsupported method', 404);
break;
}
}

public function postRouting(){
if($this->input->post('operation') == 'update'){
$this->doUpdate();
}else if($this->input->post('operation') == 'delete'){
$this->doDelete();
}else if($this->input->post('operation') == 'user'){
$retval = $this->usermodel->get_user();
echo json_encode($retval);
}else if($this->input->post('operation') == 'score'){
$retval = $this->usermodel->post_score();
echo json_encode($retval);
}else if($this->input->post('operation') == 'postquestion'){
$this->doCreate();
}else{
$this->doCreate();
}
}

//create
public function doCreate(){
$datarespond = $this->questionmodel->post_question();
if($datarespond < 1){
echo json_encode(array('error' => 'Unable to post question'));
}else{
echo json_encode($datarespond);
}
}

//Read
public function getRouting(){
$args = $this->uri->uri_to_assoc(2);
switch($args['resource']){
case 'questions':
$res = $this->questionmodel->get_question($args);
if($res == false){
show_error('unsupported request', 404);
}else{
echo json_encode($res);
}
break;
case 'users':
$res = $this->usermodel->get_user($args);
if($res == false){
show_error('unsupported request', 404);
}else{
echo json_encode($res);
}
break;
case 'questioncount':
$res = $this->questionmodel->get_noof_questions();
if($res == false){
show_error('unsupported request', 404);
}else{
echo json_encode($res);
}
break;
default: 
show_error('unsupported resource', 404);
break;
}
}

//Update question
public function doUpdate(){
$this->questionmodel->update_question();
echo json_encode(array('qid' => $this->input->post('txtqid')));
}

//Delete question
public function doDelete(){
$this->questionmodel->delete_question();
echo json_encode(array('qid' => $this->input->post('txtqid')));
}

}



?>