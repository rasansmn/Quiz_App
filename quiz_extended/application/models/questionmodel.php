<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QuestionModel extends CI_Model{

function __construct(){
parent::__construct();
$this->load->database();
}

public function get_question($args){
$valid_column_names = array('qid', 'question', 'opt1', 'opt2', 'opt3', 'opt4', 'answer');
$where = array();
foreach($valid_column_names as $key){
if(isset($args[$key])){
$where[$key] = $args[$key]; 
}
}
if(count($where) == 0){
$result = $this->db->get('tblquiz');
} 
$this->db->where($where);
$result = $this->db->get('tblquiz');
return $result->result_array();
}

public function post_question(){
$question = $this->input->post('txtquestion');
$opt1 = $this->input->post('txtopt1');
$opt2 = $this->input->post('txtopt2');
$opt3 = $this->input->post('txtopt3');
$opt4 = $this->input->post('txtopt4');
$answer = $this->input->post('txtanswer');
$data = array('question' => $question,
            'opt1' => $opt1,
            'opt2' => $opt2,
            'opt3' => $opt3,
            'opt4' => $opt4,
            'answer' =>$answer
           );
$this->db->trans_start(); 
$this->db->insert('tblquiz', $data);
$insert_id = $this->db->insert_id(); 
$this->db->trans_complete();
if ($this->db->trans_status() === FALSE) {
return -1; 
} else {
return array('insert_id' => $insert_id);
}
}

public function update_question(){
$qid = $this->input->post('txtqid');
$question = $this->input->post('txtquestion');
$opt1 = $this->input->post('txtopt1');
$opt2 = $this->input->post('txtopt2');
$opt3 = $this->input->post('txtopt3');
$opt4 = $this->input->post('txtopt4');
$answer = $this->input->post('txtanswer');
$data = array('qid' => $qid,
			'question' => $question,
            'opt1' => $opt1,
            'opt2' => $opt2,
            'opt3' => $opt3,
            'opt4' => $opt4,
            'answer' =>$answer
           );
$qid=$data['qid'];
unset($data['qid']); // unset unnecessary values 
$this->db->where('qid', $qid)->update('tblquiz' ,$data);
return true; 
}

public function delete_question(){
$this->db->where('qid', $this->input->post('txtqid'));
$this->db->delete('tblquiz'); 
return true; 
}

public function get_noof_questions(){
$this->db->from('tblquiz');
$query = $this->db->get();
$rowcount = $query->num_rows();
return array('noofquestions' => $rowcount);
}


}

?>