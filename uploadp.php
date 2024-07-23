
 <?php
error_reporting(0);

$msg = "";
$alert= '<script>alert("project Uploaded successfully")</script>';

// If upload button is clicked ...
if (isset($_POST['upload'])) {

	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./upload/" . $filename;
    $upload=$_POST['uploadd'];
    $uploadd=$_POST['uploaddd'];
    $time=$_POST['mat'];

	$db = mysqli_connect("localhost", "root", "", "cywsitec_demo");

	// Get all the submitted data from the form
	$sql = "INSERT INTO imagesss (filename,uploadd,uploaddd,mat) VALUES ('$filename','$upload','$uploadd','$time')";

	// Execute query
	mysqli_query($db, $sql);

	// Now let's move the uploaded image into the folder: image
	if (move_uploaded_file($tempname, $folder)) {
		echo $alert;
	} else {
		echo "<h3> Failed to upload Project!</h3>";
	}
}
?>
 <?php 
   
        include("mechiheadp.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="up.css">
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="images/kpoly.jpeg">
    <title>KANO STATE POLYTECHNIC</title>
</head>
<body>
 
       <div class="hen">       
        </div>
  <div class="contentt">
   <div class="scheme">
                <marquee  style="color: black;  padding: 10px;   font-size:20px;" >
            UPLOAD YOUR CHAPTERS/PROJECTS HERE
               </marquee>
           </div>
 
		<form method="POST"  enctype="multipart/form-data" class="jo">
			<div class="form-group">
			<br>
			<br>
				<input  type="text" name="uploadd" placeholder="Project Topic">
			<select name="uploaddd" id="">
			    <option selected hidden value="">Select Project Category</option>
			    <option value="Application Development">Application Development</option>
			    <option value="Computer Engineering">Computer Engineering</option>
			    <option value="Software Engineering">Software Engineering</option>
			    <option value="Web Development">Web Development</option>
			    <option value="Artificial Intelligence">Artificial Intelligence</option>
			    <option value="Others">Others</option>
			 </select>
				<br>
				<input type="text" name="mat" placeholder="Name">
				<br>
				
				&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;	&nbsp;<input  type="file" name="uploadfile" value="" />
				
			</div>
			<div class="form-group">
			<br>
				<button type="submit" name="upload">UPLOAD</button>
			</div>
		</form>
		
	</div>     
     
    </body>
</html>
    

