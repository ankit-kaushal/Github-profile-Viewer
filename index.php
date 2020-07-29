<?php
	$desc = "";
	$image = "";
	$name = "";
	$uname = "";
	$location = "";
	$followers = "";
	$following = "";
	$repo = "";
	$error = "";
	$web = "";
	if (array_key_exists('username', $_GET)){

		$username = str_replace(' ', '', $_GET['username']);

		$file_headers = @get_headers("https://github.com/".$username."/");

		if($file_headers[0] == 'HTTP/1.1 404 Not Found'){
			$error = "Username could not be found.";
		} else {

		$forecastPage=file_get_contents("https://github.com/".$username."/");
		$pageArray = explode('<div class="p-note user-profile-bio mb-2 js-user-profile-bio"><div>', $forecastPage);

		if(sizeof($pageArray) > 1){

			$secondPageArray=explode('</div></div>

  <ul class="vcard-details mb-3">', $pageArray[1]);

			if(sizeof($secondPageArray) > 1){

			$desc = $secondPageArray[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}

		

		

		$profileImg=file_get_contents("https://github.com/".$username."/");
		$pageArrayImg = explode('<meta property="og:image" content="', $profileImg);

		if(sizeof($pageArrayImg) > 1){

			$secondPageArrayImg=explode('" /><meta property="og:site_name" ', $pageArrayImg[1]);

			if(sizeof($secondPageArrayImg) > 1){

			$image = $secondPageArrayImg[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}

		$profileName=file_get_contents("https://github.com/".$username."/");
		$pageArrayName = explode('<span class="p-name vcard-fullname d-block overflow-hidden" itemprop="name">', $profileName);

		if(sizeof($pageArrayName) > 1){

			$secondPageArrayName=explode('</span>', $pageArrayName[1]);

			if(sizeof($secondPageArrayName) > 1){

			$name = $secondPageArrayName[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}

		$profileUserName=file_get_contents("https://github.com/".$username."/");
		$pageArrayUserName = explode('content="https://github.com/', $profileUserName);

		if(sizeof($pageArrayUserName) > 1){

			$secondPageArrayUserName=explode('" />', $pageArrayUserName[1]);

			if(sizeof($secondPageArrayUserName) > 1){

			$uname = $secondPageArrayUserName[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}

		$profileLocation=file_get_contents("https://github.com/".$username."/");
		$pageArrayLocation = explode('<span class="p-label">', $profileLocation);

		if(sizeof($pageArrayLocation) > 1){

			$secondPageArrayLocation=explode('</span>', $pageArrayLocation[1]);

			if(sizeof($secondPageArrayLocation) > 1){

			$location = $secondPageArrayLocation[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}

		$profileFollowers=file_get_contents("https://github.com/".$username."/");
		$pageArrayFollowers = explode('<span class="text-bold text-gray-dark">', $profileFollowers);

		if(sizeof($pageArrayFollowers) > 1){

			$secondPageArrayFollowers=explode('</span>
            followers
</a>          &middot;', $pageArrayFollowers[1]);

			if(sizeof($secondPageArrayFollowers) > 1){

			$followers = $secondPageArrayFollowers[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}

		$profileFollowing=file_get_contents("https://github.com/".$username."/");
		$pageArrayFollowing = explode('<a class="link-gray no-underline no-wrap" href="/'.$username.'?tab=following">
            <span class="text-bold text-gray-dark">', $profileFollowing);

		if(sizeof($pageArrayFollowing) > 1){

			$secondPageArrayFollowing=explode('</span>
            following
</a>          &middot;', $pageArrayFollowing[1]);

			if(sizeof($secondPageArrayFollowing) > 1){

			$following = $secondPageArrayFollowing[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}
/*
		$profileRepo=file_get_contents("https://github.com/".$username."/");
		$pageArrayRepo = explode('<a rel="nofollow me" class="link-gray-dark " href="', $profileRepo);

		if(sizeof($pageArrayRepo) > 1){

			$secondPageArrayRepo=explode('">', $pageArrayRepo[1]);

			if(sizeof($secondPageArrayRepo) > 1){

			$repo = $secondPageArrayRepo[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}
*/
		$profileWeb=file_get_contents("https://github.com/".$username."/");
		$pageArrayWeb = explode('<a rel="nofollow me" class="link-gray-dark " href="', $profileWeb);

		if(sizeof($pageArrayWeb) > 1){

			$secondPageArrayWeb=explode('">', $pageArrayWeb[1]);

			if(sizeof($secondPageArrayWeb) > 1){

			$web = $secondPageArrayWeb[0];

			}else{
				$error = "Username could not be found.";
			}

		} else{
			$error = "Username could not be found.";
		}



}


	}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Github profile Viewer</title>
    <link rel="shortcut icon" href="favicon.png">

    <style type="text/css">
    	html { 
			  background: url(background.jpg) no-repeat center center fixed; 
			  -webkit-background-size: cover;
			  -moz-background-size: cover;
			  -o-background-size: cover;
			  background-size: cover;
			}

		body{
			background: none;
		}

		.container{
			/*text-align: center;*/
		}

		#heading{
			margin-top: 20px;
			color: white;
			font-size: 28px;
			font-weight: bold;
			/*margin-left: 60px;*/
		}

		#search{
			color: white;
			margin-top: 35px;
		}

		#alarm{
			margin-top: 15px;
		}

		.bold{
			font-weight: bold;
		}

		#text{
			color: white;
			font-size: 18px;
		}

		#desc{
			color: white;
			font-size: 20px;
			text-align: center;
			margin-bottom: 20px;
		}

		.inline{
			display: inline-block;
		}

		.profileImage{
			border-radius: 50%;
			width: 150px;
			height: 150px;
		}

		#profileImge{
			text-align: center;
		}



    </style>
  </head>
  <body>
  	
  	
	<div class="container">
	  	<div id="heading">
	  			<p>GitProfile - Github profile Viewer</p>
	  	</div>
	  	
	  	<form id="search">
			  <div class="form-inline">
			    
			    
			    	<input type="text" class="form-control mb-2 mr-sm-2" name="username" id="username" placeholder="Enter Username" value="<?php 

				    if (array_key_exists('username', $_GET)){

				    	echo $_GET['username']; 
					
					}

				    ?>">
				
			  
			  	<button type="submit" class="btn btn-primary mb-2">Search</button>
			  </div>
		</form>



			<div id="alarm"><?php

			if($uname){


			}
			else if ($error){
				echo '<div class="alert alert-danger" role="alert">
				  '.$error.'
				</div>';
			}
			?></div>

			<div id="profileImge"><?php
				
				if($uname){
						$url = $image;
						$imageData = base64_encode(file_get_contents($url));
						echo '<img src="data:image/jpeg;base64,'.$imageData.'" class="profileImage">';
				}
				else{

				}
			?></div>
				
	  		<div id="desc">	
	  			<p><?php
	  			echo '<div>
				  '.$desc.'
				</div>';

	  			?></p>
	  		</div>
  		
	  		<div class="row">
		  		<div class="col" id="text">	
		  			<p><div class="bold inline">Name : &nbsp&nbsp</div><?php

		  			
		  			echo '<div class="inline">
					  '.$name.'
					</div>';

		  			?></p>
		  		</div>

		  		<div class="col" id="text">	
		  			<p><div class="bold inline">Followers : &nbsp&nbsp</div><?php

		  			
		  			echo '<div class="inline">
					  '.$followers.'
					</div>';

		  			?></p>
		  		</div>

		  	</div>
	  	

	  		<div class="row">
		  		<div class="col" id="text">	
		  			<p><div class="bold inline">Username : &nbsp&nbsp</div><?php

		  			
		  			echo '<div class="inline">
					  '.$uname.'
					</div>';

		  			?></p>
		  		</div>

		  		<div class="col" id="text">	
		  			<p><div class="bold inline">Following : &nbsp&nbsp</div><?php

		  			
		  			echo '<div class="inline">
					  '.$following.'
					</div>';

		  			?></p>
		  		</div>
		  	</div>

		  	<div class="row">
		  		<div class="col" id="text">	
		  			<p><div class="bold inline">Location : &nbsp&nbsp</div><?php

	  			
		  			echo '<div class="inline">
					  '.$location.'
					</div>';

	  				?></p>
	  			</div>

	  			<div class="col" id="text">	
		  			<p><div class="bold inline">Portfolio Link : &nbsp&nbsp</div><?php

	  			
		  			echo '<div class="inline">
					  <a href='.$web.'>'.$web.'</a>
					</div>';

	  				?></p>
	  			</div>
	  		</div>

  	</div>

  	<a href=""></a>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
