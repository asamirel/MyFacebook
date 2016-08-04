<?php
	$get_id = $_GET['post_id'];	
	$get_comm = "select * from comments where post_id='$get_id' ORDER by 1 DESC";
	$run_comm = mysqli_query($con, $get_comm);
	
	while($row = mysqli_fetch_array($run_comm)){
		$com = $row['comment'];
		$com_name = $row['comment_author'];
		$date = $row['date'];
		
		echo "
			<div id='comments'>
				<h3>$com_name</h3><i>Said</i> on $date
				<p>$com</p>
			</div>
		";
		
	}
	
?>