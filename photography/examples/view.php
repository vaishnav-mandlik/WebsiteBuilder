<?php

$ser = "localhost";
$user = "root";
$pass = "";
$db = "avcoe";


$conn = mysqli_connect($ser, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Web Builder</title>
        <link rel="stylesheet" type="text/css" href="./plugins/bootstrap-3.4.1/css/bootstrap.min.css" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="./plugins/font-awesome-4.7.0/css/font-awesome.min.css" data-type="keditor-style" />
		
        <link rel="stylesheet" type="text/css" href="./plugins/code-prettify/src/prettify.css" />
        <link rel="stylesheet" type="text/css" href="./css/examples.css" />
    </head>
    
    <body>

        <div data-keditor="html">
		
			
			<div id="content-area">
				<?php
				$id = $_GET['id'];
				$sql2 = "SELECT `content` FROM `pho3` WHERE `id` ='".$id."'";	
				$quary2 = mysqli_query($conn,$sql2);
				$row = mysqli_fetch_assoc($quary2);
				echo $row['content'];
				
					
				?>
			</div>	
		
        
        <script type="text/javascript" src="./plugins/jquery-1.11.3/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="./plugins/bootstrap-3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
       
        <script type="text/javascript" src="./plugins/formBuilder-2.5.3/form-builder.min.js"></script>
        <script type="text/javascript" src="./plugins/formBuilder-2.5.3/form-render.min.js"></script>
     
       
        <script type="text/javascript" data-keditor="script">
            
        </script>
    </body>
</html>
