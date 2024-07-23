   <?php 
    session_start();

    if (!isset($_SESSION['username'])): 
        header('Location:login.php');     
    else :
        include("config/db.php");
        include("admindashp.php");
        include 'delete.php';
?>
   <?php
$alert="<script>alert('Registered succesfully')</script>";
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        
        $password = $_POST['password'];
        $regno = $_POST['Regno'];
        $class = $_POST['class'];

        if ($username != ''  && $password != '' && $class != '') {
            $pwd_hash = sha1($password);

            // Insert data into DB only as user (Admin: user_role = 1, Users: user_role = 0)
            $sql = "INSERT INTO users (username, password, user_role, Regno, class) VALUES ('$username', '$pwd_hash', 0, '$regno', '$class')";
            $query = $conn->query($sql);

            if ($query) {
                echo $alert;
            }
            else {
                $error = 'Failed to register user';
            }
        }
        else {
            $error = 'Please fill all the details!';
        }
    }
?>
 
    <div class="container">
     <br>
     <h3>&nbsp;&nbsp;&nbsp;REGISTER STUDENTS</h3>
      <form method="post" class="boys">
       <input type="text" name="username" placeholder="Student Name">
              <input type="text" name="Regno" placeholder="Registration number">

           

     
       <select name="class" id="">
    <option selected hidden value="">Select Level</option>
    <option value="ND2">ND2</option>
    <option value="HND2">HND2</option>
    
</select>

<!--       <input type="text" name="Regno" placeholder="Reg no">-->
         <input type="Password" name="password" placeholder="Password">
         <br>
        <input type="submit" name="register" value="Register">   
         </form>
         <div class="scheme">
                <marquee  style="color: black;  padding: 10px;   font-size:20px; font-family:cursive;" >
           <h4> REGISTERED STUDENTS</h4>
               </marquee>
           </div>
        <div class="cards" id="data">
            
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My cart</title>
             <style type="text/css">
            table{
                border-collapse: collapse;
                width: 95%;
                color: black;
                font-size: 15px;
                text-align: center;
                background-color: beige;
                border-style: none;
            
                line-height: 30px;
                border-radius: 10px;
                border-collapse: separate;
                border-spacing: 5px;
                
            }
            th{
               
                color:black;
                border-color: white;
                width: 400px;
            
                
            }
                 td{
                     width: 100px;
                     padding: 5px;
                     border: 1px  black;
                 }
            tr:nth-child(even){background-color: }
                
                 

        </style>
    </head>
     <body>
     <link rel="stylesheet" href="css/up.css">
     <div class="hed">
     
  <div class="left">

  
       <table>
           <tr>
               <th>No</th>
               <th>Student's Name</th>
              
               <th>Level</th>
               <th>Reg Number</th>
           </tr>
           
           <?php 
           $conn =mysqli_connect ("localhost", "root", "", "cywsitec_demo");
           if($conn-> connect_error) {
               die("connection failed:". $conn-> connect_error);
               
           }
           $sql="SELECT id, username, Regno, class,'' From users WHERE user_role ='0'";
           $result=$conn-> query($sql);
           
           
           if ($result-> num_rows > 0){
               while($row = $result->fetch_assoc()){
                   $id= $row['id'];
                    echo '<tr>
                                <td>' .$row['id'].'</td>
                                <td>' .$row['username'].'</td>
                                <td>' .$row['class'].'</td>
                                <td>' .$row['Regno'].'</td>
                                <td>' .$row[''].' 
                                <form action="" method="POST">
                            <input type="hidden" name="id" value="<?php echo $id; ?>">
                            <input type="submit" name="delete" value="Delete">
                        </form></td> 
                                
                             
                        </tr>';
              
           }
               echo"</table>";
           }
           else{
               echo "";
           }
           $conn-> close();
           ?>
       </table>
       </div>
       
      
        
      
       
       
         </div>
    </body>
</html>
    

        </div>
    </div>
<?php 
    include("include/footer.php");
    endif
?>
