
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
        $email = $_POST['email'];
       
        
        $class = $_POST['class'];
//        $Department = $_POST['Department'];
        $password = $_POST['password'];
        
        if(!empty($username)){
                    if(!empty($class)){
                            if(!empty($password)){
                             if( filter_var($email, FILTER_VALIDATE_EMAIL)){
               $password = sha1($password);
                             $sql = "INSERT INTO teacher (username, email, class,password) VALUES ('$username', '$email', '$class','$password')";
            $query = $conn->query($sql);
                if ($query) {
                echo $alert;
            }
            else {
                $error = 'Failed to register user';
            }
        
   
                                
                            }else{
                                echo "Invalid Email Address";
                            }
                       
                    }else{
                        echo "Insert Default Password";
                        die();
                    }
              
                }else{
                    echo "Select Level";
                    die();
                    
                }
            }
        }
            
    
 
$conn->close();
?>
 
    <div class="container">
     <br>
     <h3>&nbsp;&nbsp;&nbsp;ADD SUPERVISORS</h3>
      <form method="post" class="boys">
       <input type="text" name="username" placeholder="Full name">
       <input type="email" name="email" placeholder="E-mail">
    
      
<select name="class" id="">
    <option selected hidden value="">Select Program</option>
    <option value="ND2">ND2</option>
    <option value="HND2">HND2</option>
    
</select>
<!--       <input type="text" name="Department" placeholder="Department">-->
       <input type="Password" name="password" placeholder="Password">
       <br>
       <br>
        <input type="submit" name="register" value="Register">   
         </form>
          <div class="scheme">
                <marquee  style="color: black;  padding: 10px;   font-size:20px; font-family:cursive;" >
           <h4> REGISTERED SUPERVISORS</h4>
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
            tr:nth-child(even){background-color:}
                
                 

        </style>
    </head>
     <body>
      <link rel="stylesheet" href="css/up.css">
     <div class="hed">
     
  <div class="left">

  
       <table>
           <tr>
               <th>No</th>
               <th>Full Name</th>
               <th>E-mail</th>
             
               <th>Program</th>    
               
           </tr>
           <?php 
           $conn =mysqli_connect ("localhost", "root", "", "cywsitec_demo");
           if($conn-> connect_error) {
               die("connection failed:". $conn-> connect_error);
               
           }
           $sql="SELECT id, username, email, class, '' from teacher";
           $result=$conn-> query($sql);
           
           if ($result-> num_rows > 0){
               while($row = $result->fetch_assoc()){
                    echo '<tr>
                                <td>' .$row['id'].'</td>
                                <td>' .$row['username'].'</td>
                                <td>' .$row['email'].'</td>
                                
                                <td>' .$row['class'].'</td>
                                
                                <td>' .$row[''].' <form action="viewteacher.php" method="POST">
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
