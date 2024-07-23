<?php 
   
    
   
        include("teachersdashvv.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="move.css">
    <meta charset="UTF-8">
    <title>My cart</title>
             <style type="text/css">
            table{
                border-collapse: collapse;
                width: 100%;
                color: black;
                font-size: 12px;
                text-align: justify;
                background-color: beige;
                border-style: none;
                margin-left: 0px;
                line-height: 30px;
                border-radius: 10px;
                border-collapse: separate;
                border-spacing: 0 15px;
                
            }
            th{
                background-color:white;
;
                color:black;
                border-color: beige;
                 width: 10px;
            
                
            }
                 td{
                     width: 0px;
                    
                     border: 1px  black;
                 }
            tr:nth-child(even){background-color:}
                
       

        </style>
    </head>
     <body>
     <div class="scheme">
                <marquee  style="color: black;  padding: 10px;  font-family:cursive; font-size:20px;" >
                &nbsp;&nbsp;AVAILABLE PROJECTS
               </marquee>
           </div>
   
    
     <div class="hed">
     
  <div class="left">
  
       <table>
           <tr>
               <th><h4>&nbsp;No.</h4></th>
               <th><h4>Project title</h4></th>
               <th><h4>Project Depositor</h4></th>
               <th><h4>Project Category</h4></th>
                <th><h4>To</h4></th>
               <th><h4>Action</h4></th>
           </tr>
           
           <?php 
           $conn =mysqli_connect ("localhost", "root", "", "cywsitec_demo");
           if($conn-> connect_error) {
               die("connection failed:". $conn-> connect_error);
               
           }
           $sql="SELECT  id, uploadd, mat,too,uploaddd, '' From imagesss";
           $result=$conn-> query($sql);
           
           if ($result-> num_rows > 0){
               while($row = $result->fetch_assoc()){
                   $id= $row['id'];
                    echo '<tr>
                                <td> &nbsp;' .$row['id'].'</td>
                                <td>' .$row['uploadd'].'</td>
                                <td>' .$row['mat'].'</td>
                                <td>' .$row['uploaddd'].'</td>
                                <td>' .$row['too'].'</td>
                                <td>' .$row[''].' <a href="./upload/"</a>View Materials</td>
                                
                             
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