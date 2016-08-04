	<!-- content area starts-->
			<div id="content">
				<div>
					<img src="images/image.png" style="float:left; margin-left:-40px;" />
				</div>
				<div id="register">
					<form action="" method="post">
					<h2 style="color:black; font-size:18px; font-style:italic;" >Sign Up Quickly!<h2>
					<br> 
						<table>
							<tr>
								<td align="right">Name: </td>
								<td> <input type="text" name="u_name" 
								placeholder="Enter Your Name" required="required"</td>
							</tr>
							
							<tr>
								<td align="right">Password: </td>
								<td> <input type="password" name="u_pass" 
								placeholder="*****" required="required"</td>
							</tr>
							
							<tr>
								<td align="right">Email: </td>
								<td> <input type="email" name="u_email" 
								placeholder="Enter Your mail" required="required"</td>
							</tr>
							
							<tr>
								<td align="right">Country: </td>
								<td>
									<select name="u_country" required="required">
										<option> Select your Country </option>
										<option> Egypt </option>
										<option> USA </option>
										<option> UK </option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td align="right">Gender: </td>
								<td>
									<select name="u_gender">
										<option>Select your Gender</option>
										<option>male</option>
										<option>female</option>
									</select>
								</td>
							</tr>
							
							<tr>
								<td align="right" >Birthday: </td>
								<td>
								<input type="date" name="u_birthday" required="required"/>
								</td>
							</tr>				
							
							<tr>
								<td colspan="6">
									<button name="sign_up">Sign Up</button>
								</td>
							</tr>
						</table>
					</form>
					<?php 
					include("user_insert.php");
					?>
				</div>
			</div>
			<!--content area ends-->