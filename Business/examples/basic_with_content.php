<?php
 

$ser = "localhost";
$user = "root";
$pass = "";
$db = "avcoe";


$conn = mysqli_connect($ser, $user, $pass, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


function clean($str){
	global $conn;
	$str = trim($str);
	$str = stripslashes($str);
	$str = htmlentities($str, ENT_QUOTES);
	$str = mysqli_real_escape_string($conn,$str);
	return $str;
}


if(isset($_POST['action'])){
	
	$content = mysqli_real_escape_string($conn,$_POST['content']);
	$sql1 = "INSERT INTO `bus1` (`id`,`content`) VALUES ('','".$content."')";
	$quary1 = mysqli_query($conn,$sql1);
	
	
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<title>Web Builder</title>
        <link rel="stylesheet" type="text/css" href="./plugins/bootstrap-3.4.1/css/bootstrap.min.css" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="./plugins/font-awesome-4.7.0/css/font-awesome.min.css" data-type="keditor-style" />
		<link rel="stylesheet" type="text/css" href="../dist/css/keditor.css" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="../dist/css/keditor-components.css" data-type="keditor-style" />
        <link rel="stylesheet" type="text/css" href="./plugins/code-prettify/src/prettify.css" />
        <link rel="stylesheet" type="text/css" href="./css/examples.css" />
		<link href="1.css" type="text/css" rel="stylesheet">
    </head>
    
    <body>

        <div data-keditor="html">
		
		<div class="h">
			<div class="ih">
				<nav>
					<ul>
						<li><a href="" class="logo">Website Builder</a></li>
							<li><a href="" class="link"  id="save">Save</a></li>
						<li><a href="view.php?id=<?php
								$sql3=mysqli_query($conn,"SELECT * FROM bus1 ORDER BY id DESC LIMIT 1");
								$da=mysqli_fetch_row($sql3);
								echo $da[0];
						
						?>" class="link">View</a></li>
					
					</ul>
				</nav>
			</div>
		</div>
		
	
		
			
			<div id="content-area">
				<section id="existing-id" class="my-class">
                    <div class="container">
                        <div class="row">
						 <div class="col-sm-12" data-type="container-content">
                                <section data-type="component-text">
                                    <div class="page-header">
                                        <h1><b class="text-uppercase">Car Wash & Detailing</b>
                                        </h1>
                                
                                        
                                    </div>
                                </section>
							<div class="col-sm-12" data-type="container-content">
                                <section data-type="component-photo">
                                    <div class="photo-panel">
                                        <img src="car.jpg" style="display: inline-block;" height="" width="100%">
                                    </div>
                                </section>
                            </div>
						
                            <div class="col-sm-12" data-type="container-content">
                                <section data-type="component-text">
                                    <div class="page-header">
                                        <h1><b class="text-uppercase">Car Wash & Detailing</b>
                                        </h1>
                                
                                        <p class="lead">
                                            <em>Car Wash is a brand which is literally going to change the way people think about car cleaning.
											It is a unique mechanized car cleaning concept 
											where cars are getting pampered by the latest equipments including high
											pressure cleaning machines, spray injection and extraction machines,
											high powered vacuum cleaners, steam cleaners and so on.</em>
                                        </p>
                                    </div>
                                </section>

                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
		
        
        <script type="text/javascript" src="./plugins/jquery-1.11.3/jquery-1.11.3.min.js"></script>
        <script type="text/javascript" src="./plugins/bootstrap-3.4.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
        <script type="text/javascript" src="./plugins/ckeditor-4.11.4/ckeditor.js"></script>
        <script type="text/javascript" src="./plugins/formBuilder-2.5.3/form-builder.min.js"></script>
        <script type="text/javascript" src="./plugins/formBuilder-2.5.3/form-render.min.js"></script>
     
        <script type="text/javascript" src="../dist/js/keditor.js"></script>
        <script type="text/javascript" src="../dist/js/keditor-components.js"></script>
       
        <script type="text/javascript" src="./plugins/code-prettify/src/prettify.js"></script>
        <script type="text/javascript" src="./plugins/js-beautify-1.7.5/js/lib/beautify.js"></script>
        <script type="text/javascript" src="./plugins/js-beautify-1.7.5/js/lib/beautify-html.js"></script>
        <script type="text/javascript" src="./js/examples.js"></script>
        <script type="text/javascript" data-keditor="script">
            $(function () {
                $('#content-area').keditor();
				$('#save').click(function(){
					
					$.ajax({
						type: 'post',
						data: { action: "send-content",
								content: $('#content-area').keditor('getContent')
							
						},
						success: function(data){
							alert("Your Web page Saved");
						},
						error: function(data){
							alert("Your Web page Not Saved");
						},
							
					
					});
					
					
					console.log($('#content-area').keditor('getContent'));	
				});
				
            });
        </script>
    </body>
</html>
