<?php 

	    $link = mysqli_connect("localhost", "jingweni_users", "wj584521", "jingweni_users");

    

    	if (mysqli_connect_error()) {
        
        die ("There was an error connecting to the database");
        
    }

	if(array_key_exists('email',$_POST) OR array_key_exists('password',$_POST)){

			if($_POST['email']== "" ){

				echo "Email field is required.<br>";
			}

			else if($_POST['password']== "" ){

				echo "Password field is required.<br>";
			}else{

				$query = "SELECT `id` from `users` WHERE `email` = '".mysqli_real_escape_string($link, $_POST['email'])."'";

				$result = mysqli_query($link, $query);

				if(mysqli_num_rows($result)>0){

					echo "That address has already been taken. ";

				}else{

					$query = "INSERT INTO `users`(`email`, `password`) VALUES('".mysqli_real_escape_string($link, $_POST['email'])."', '".mysqli_real_escape_string($link, $_POST['password'])."')";

					

					      if (mysqli_query($link, $query)) {
                    
                    echo "<p>You have been signed up!";
                    
                } else {
                    
                    echo "<p>There was a problem signing you up - please try again later.</p>";
                    
                }

				}
			}
	}




 
    


 ?>

 <!DOCTYPE html>
 <html lang="en">
 	<head>
 		<!-- Required meta tags -->
 		<meta charset="utf-8">
 		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
 		<!-- Bootstrap CSS -->
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
 	</head>
 
 	<body>
 		<div class="container">
			<h1 class="display-4">Sign up Today!</h1>
 			<form method="post">
 				<lable for="email">Email</lable>
 				<input type="email" name="email" di="email" class="form-control">
 				<lable for="password">Password</lable>
 				<input type="password" name="password" di="password" class="form-control">

				<button style="margin-top: 20px" type="submit" class="btn btn-primary">Submit</button>
 			
 			</form>
 			
 		</div>
 	
 	</body>
 </html>

