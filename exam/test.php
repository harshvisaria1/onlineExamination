<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();

$secNo = 1;
//$qNo = 1;
$nitem = 1;
$i = 0;

if (isset($_GET['s']) & isset($_GET['q'])) {
	if ($secNo != $_GET['s']) {
		$nitem = 1;
		$qNo = 1;
	}
	else {
		$qNo = (int) $_GET['q'];
	}
	$secNo = (int) $_GET['s'];
}
else {
	header("Location:exam.php");
}

$secData = $exm->getSecByOrder();

$sectime = $exm->getTime($secNo);
$totalsecques = $exm->getTotalSecQues($secNo);
$question = $exm->getQuesBySectionNumber($secNo,$qNo);

$total = $exm->getTotalRows();


// if ($i < $totalsecques) {
// 	$question = $exm->getQuesBySectionNumber($section,$number);
// 	$i++;
// }
// else {
// 	$section++;
// 	if($section != 4) {
// 		$totalsecques = $exm->getTotalQues($section);
// 	}
// }
?>

<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$process = $pro->processData($_POST);
	}

 ?>

<div class="timer">
	<h1><?php echo $sectime['time'] ?></h1>
</div>
<div class="main">
	<div class="seclist">
		<table class="tblone">
			<tr>
				<?php 
				
				while ($result = $secData->fetch_assoc()) { ?>
					<th>
							<form method="get" action="">
								<input type="submit" value="<?php echo $result['sec']; ?>"></input>
								<input type="hidden" name="s" value="<?php echo $result['id']; ?>" />
								<input type="hidden" name="q" value="1" />								
							</form>
					</th>
				<?php
				}
				?>
			</tr>
		</table>
	</div>

<h1>Question <?php echo $question['quesNo']; ?> of <?php echo $totalsecques; ?></h1>
	<div class="test">
		<form method="post" action="">
		<table> 
			<tr>
				<td colspan="2">
				 <h3>Que <?php echo $question['quesNo']; ?>: <?php echo $question['ques']; ?></h3>
				</td>
			</tr>

			<?php 

				$answer = $exm->getAnswer($secNo,$qNo);
				if ($answer) {
					while ($result = $answer->fetch_assoc()) {
				
			 ?>

			<tr>
				<td>
				 <input type="radio" name="ans" value="<?php echo $result['id']; ?>" /><?php echo $result['ans']; ?>
				</td>
			</tr>
		<?php }} ?>

			<tr>
				<td>
					<input type="submit" name="submit" value="Next Question"/>
					<input type="hidden" name="secNo" value="<?php echo $secNo; ?>" />
					<input type="hidden" name="qNo" value="<?php echo $qNo; ?>" />					
				</td>
			</tr>
			<tr>
				<td>
				<?php 
				
				while ($nitem <= $totalsecques) { ?>

					<a href="./test.php?s=<?php echo $secNo; ?>&q=<?php echo $nitem; ?>"><?php echo $nitem; ?></a>
					&nbsp;

				<?php 

				$nitem++;

				} ?>
				</td>
			</tr>
		</table>
	</form>
</div>
 </div>
<?php include 'inc/footer.php'; ?>