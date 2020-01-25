<?php 
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/inc/header.php');
	include_once ($filepath.'/../classes/Exam.php');
	$exm = new Exam();
?>
<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$seclist = $exm->updateSecTime($_POST);

}
?>
<div class="main">
	<h1>Admin Panel - Section List</h1>

	<?php 
		if (isset($seclist)) {
			echo $seclist;
		}
	 ?>

<div class="seclist">
	<table class="tblone">
		
		<tr>
			<th width="10%">No</th>
			<th width="50%">Name</th>
			<th width="20%">Time (min)</th>
			<th width="20%">Action</th>
		</tr>
	
	<?php 

	$getData = $exm->getSecByOrder();
	if ($getData) {
		$i = 0;
		while ($result = $getData->fetch_assoc()) {
			$i++;
			?>
			
			<tr>
				<form action="" method="post">
					<input type="hidden" name="secid" value="<?php echo $result['id']; ?>">
					<td><?php echo $i; ?></td>
					<td><input name="sec" type="text" value="<?php echo $result['sec'] ?>" /></td>
					<td><input name="time" type="number" value="<?php echo $result['time']; ?>"></td>
					<td><input type="submit" value="Update"></td>
				</form>
			</tr>

			<?php  
		}
	} 
	?>

	</table>

</div>

	
</div>
<?php include 'inc/footer.php'; ?>