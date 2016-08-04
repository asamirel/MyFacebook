<?php
session_start();
include("includes/connection.php");
include("functions/functions.php");

if(!isset($_SESSION['user_email'])){
	header("location: index.php");
}
else {
	

?>

<!DOCTYPE html>

<html>
	<head>
		<title>Welcome !</title>
		<link rel="stylesheet" href="styles/home_style.css" media="all" />
	</head>
	
	<body>
		<!--Containers starts-->
		<div class="container">
		
			<!--header wrapper starts-->	
			<div id="head_wrap">
			
			<!--header starts-->		
				<div id="header">
					<ul id="menu">
						<li> <a href="home.php">Home </a></li>
						<li> <a href="members.php">Members </a></li>
						<strong>Topics</strong>
						<?php
							$get_topics = "select * from topics";
							$run_topics = mysqli_query($con, $get_topics);
							
							while($row = mysqli_fetch_array($run_topics)){
								$topic_id = $row['topic_id'];
								$topic_title = $row['topic_title'];
								
								echo "<li> <a href='home.php?topic=$topic_id'>$topic_title</a></li>";
							}
							
						?>
					</ul>
					
					<input type="text" name="user_query" placeholder="search a topic"/>
					<input type="submit" name="search" value="Search"/>
				</div>
			<!--header ends-->	
			
			</div>
			<!--header wrapper ends-->	
			
			<!--content area starts-->
			<div class="content">
			<!--user timeline starts-->
				<div id="user_timeline">
					<div id="user_details">
						<?php
							$user = $_SESSION['user_email'];
							$get_user = "select * from users where user_email='$user'";
							$run_user = mysqli_query($con, $get_user);
							$row = mysqli_fetch_array($run_user);
							$user_id = $row['user_id'];
							$user_name = $row['user_name'];
							$user_country = $row['user_country'];
							$register_date = $row['register_date'];
							$last_login = $row['last_login'];
							$user_image = $row['user_images'];
							
							echo "<div id='mention'>
								<img src='user/user_images/$user_image' 
									width='150' height='150'/>
								<p><strong> Name: </strong> $user_name</p>
								<p><strong> Country: </strong> $user_country</p>
								<p><strong> Last login: </strong> $last_login</p>
								<p><strong> Member since : </strong> $register_date</p>	
								
								<p><a href='my_messages.php'>Messages</a></p>
								<p><a href='my_posts.php'>Posts</a></p>
								<p><a href='edit_profile.php'>Edit My Account</a></p>
								<p><a href='logout.php'>Logout</a></p>  
								</div>
							";
						?>
					</div>
				</div>
				<!--user timeline ends-->
				<!--content timeline starts-->
				<div id="content_timeline">
					<form action="home.php?id=<?php $user_id;?>" method="post" 
									id="f">
						<h2> What's your Question today ? lets discuss</h2>
						<input type="text" name="title" placeholder="write a title"
										   size="70" required="required"/>
						<br>
						<textarea cols="71" rows="4" name="content" placeholder="Write Description"></textarea>	
						<br/>
						<select name="topic">
							<option>select Topic</option>
							<?php
								getTopics();
							?>
						</select>
						<input type="submit" name ="sub" value="Post">
						</form>
						<?php insertPost();?>
					
						<h3>Most recent discussion!</h3>
						<?php get_posts();?>
					
				</div>
				<!--content timeline ends-->
				
			</div>
			<!--content area ends-->
			
		</div>
		<!--container ends-->
		
	</body>
	
</html>

<?php } ?>