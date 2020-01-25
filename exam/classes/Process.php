<?php 
 $filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Session.php');
	//Session::init();
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class Process{
	private $db;
	private $fm;
	function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function processData($data){
		$selectedAns    = $this->fm->validation($data['ans']);
		$secNo        = $this->fm->validation($data['secNo']);
		$qNo         = $this->fm->validation($data['qNo']);
		$selectedAns    = mysqli_real_escape_string($this->db->link,$selectedAns);
		$secNo        = mysqli_real_escape_string($this->db->link,$secNo);
		$qNo         = mysqli_real_escape_string($this->db->link,$qNo);

		if (!isset($_SESSION['score'])) {
			$_SESSION['score'] = '0';
		}

		$total = $this->getTotalQues();
		$totalsecques = $this->getTotalSecQues($secNo);

		if($qNo == $totalsecques) {
			$qNo = 1;
			$secNo++;
		}
		else if($qNo < $totalsecques) {
			
			$right = $this->rightAns($secNo,$qNo);
			
			if ($right == $selectedAns) {
				$_SESSION['score']++;
			}

			$qNo++;
		}

		if ($secNo > 3 & $qNo >= $totalsecques) {		
				header("Location:final.php");
				exit();
		}else {
			header("Location:test.php?s=".$secNo."&q=".$qNo);
		}

	}

	private function getTotalSecQues($section){
    $query = "SELECT * FROM tbl_ques WHERE secNo = '$section'";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;
  	}

	private function getTotalQues(){
	$query = "SELECT * FROM tbl_ques";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;

	}

	private function getTotalInSec(){
	$query = "SELECT * FROM tbl_ques";
    $getResult = $this->db->select($query);
    $total = $getResult->num_rows;
    return $total;

	}

	private function rightAns($section,$number){
	$query = "SELECT * FROM tbl_ans WHERE secNo = '$section' AND quesNo = '$number' AND rightAns = '1'";
    $getdata = $this->db->select($query)->fetch_assoc();
    $result = $getdata['id'];
    return $result;
	}

}


 ?>