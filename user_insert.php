<?php
include("includes/connection.php");

		if(isset($_POST['sign_up'])){
		
			$name = mysqli_real_escape_string($con, $_POST['u_name']);
			$password = mysqli_real_escape_string($con, $_POST['u_pass']);
			$email = mysqli_real_escape_string($con, $_POST['u_email']);
			$country = mysqli_real_escape_string($con, $_POST['u_country']);
			$gender = mysqli_real_escape_string($con, $_POST['u_gender']);
			$b_day = mysqli_real_escape_string($con, $_POST['u_birthday']);
			$date = date('m-d-y');
			$status = "unverified";
			$posts = "No";
			
			$get_email = "select * from users where user_email='$email'";
			$run_email = mysqli_query($con,$get_email);
			$check = mysqli_num_rows($run_email);
			
			if($check == 1){
				echo "<script> alert('this email is already registered') </script>" ;
				exit();
			}
			if(strlen($password) < 8){
				echo "<script> alert('password should be greater than 8 characters') </script>" ;
				exit();
			}
			else {
				$insert_query = "insert into users(user_name, user_pass, user_email,
									user_country,user_gender,user_b_day,
									user_images,register_date,last_login,status,posts)
									values('$name', '$password', '$email',
									'$country', '$gender','$b_day','default.jpg',NOW(),NOW(), 
									'$status', '$posts')";
									
				$run_insert_query = mysqli_query($con,$insert_query);
				if($run_insert_query){
					$_SESSION['user_email'] = $email;
					echo "<script> alert('registration successful')</script>";
					echo "<script>window.open('home.php', '_self') </script>";
					
				}
			}
		}
		
?>	
		