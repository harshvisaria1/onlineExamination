<?php 
 $filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Exam{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

  public function addQuestions($data){
    $secNo = mysqli_real_escape_string($this->db->link,$data['secNo']);
    $quesNo = mysqli_real_escape_string($this->db->link,$data['quesNo']);
    $ques = mysqli_real_escape_string($this->db->link,$data['ques']);
    $ans = array();
    $ans[1] = $data['ans1'];
    $ans[2] = $data['ans2'];
    $ans[3] = $data['ans3'];
    $ans[4] = $data['ans4'];
    $rightAns = $data['rightAns'];
    $query = "INSERT INTO tbl_ques(quesNo,secNo,ques) VALUES('$quesNo','$secNo','$ques')";
    $inserted_row = $this->db->insert($query);
    if ($inserted_row) {
      foreach ($ans as $key => $ansName) {
        if ($ansName != '') {
         if ($rightAns == $key) {
           $rquery = "INSERT INTO tbl_ans(quesNo,secNo,rightAns,ans) VALUES('$quesNo','$secNo','1','$ansName')";

         }else{
          $rquery = "INSERT INTO tbl_ans(quesNo,secNo,rightAns,ans) VALUES('$quesNo','$secNo','0','$ansName')";
         }
         $insertrow = $this->db->insert($rquery);
         if ($insertrow) {
           continue;
         }else{
          die('Error....');
         }

        }
      }
     $msg = "<span class='success'>Question Added Successfully...</span>";
     return $msg;

    }
  }

  public function getQueByOrder(){
    $query = "SELECT * FROM  tbl_ques ORDER BY quesNo ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function getSecByOrder(){
    $query = "SELECT * FROM  tbl_sec ORDER BY id ASC";
    $result = $this->db->select($query);
    return $result;
  }

  public function delQuestion($quesNo){

$tables = array("tbl_ques","tbl_ans");
foreach ($tables as $table) {
  $delquery = "DELETE FROM $table WHERE quesNo ='$quesNo'";
  $deldata = $this->db->delete($delquery);
}
if ($deldata) {
  $msg = "<span class='success'>Data Deleted Successfully...</span>";
                  return $msg;
}else{
  $msg = "<span class='error'>Data Not Deleted !</span>";
                  return $msg;
}

  }

  public function getTotalRows(){
    $query = "SELECT * FROM tbl_ques";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

public function getTotalSecQues($section){
    $query = "SELECT * FROM tbl_ques WHERE secNo = '$section'";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  }

  public function getQuestion(){

    $query = "SELECT * FROM tbl_ques";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function getSection(){

    $query = "SELECT * FROM tbl_sec";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function getTime($secid){

    $query = "SELECT * FROM tbl_sec WHERE id = '$secid'";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function getQuesBySectionNumber($section,$number){
    $query = "SELECT * FROM tbl_ques WHERE secNo = '$section' AND quesNo ='$number'";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function getQuesByNumber($number){
    $query = "SELECT * FROM tbl_ques WHERE quesNo ='$number'";
    $getData = $this->db->select($query);
    $result = $getData->fetch_assoc();
    return $result;

  }

  public function getAnswer($section,$number){
    $query = "SELECT * FROM tbl_ans WHERE secNo = '$section' AND quesNo ='$number'";
    $getData = $this->db->select($query);
    return $getData;
  }

  public function updateSecTime($data){

    $secid = mysqli_real_escape_string($this->db->link,$data['secid']);
    $sec = mysqli_real_escape_string($this->db->link,$data['sec']);
    $time = mysqli_real_escape_string($this->db->link,$data['time']);

    

         $query = "UPDATE tbl_sec 
                    SET
                    sec = '$sec',
                    time = '$time'
                    WHERE id = '$secid'";
                $updated_row = $this->db->update($query);
              if ($updated_row) {
                  $msg = "<span class='success'>Section Updated !  </span>";
                  return $msg;
                }else{
                     $msg = "<span class='error'>Section Not Updated !  </span>";
                  return $msg;
                } 

    }

}
 ?>