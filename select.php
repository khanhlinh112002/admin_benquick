
<?php
include "./db_connect.php";
if (isset($_POST["idPost"])) {
     $idPost = $_POST["idPost"];
     
     $sql = "SELECT * FROM post WHERE idPost= " . $idPost;
     $results = $conn->query($sql);
     ?>  
          <div class="table-responsive">  
               <table class="table table-bordered">
                    <?php
     while ($row = $results->fetch_assoc()) {
          $subquery = "SELECT * from photos
          inner join post
          on photos.idPost = post.idPost
          WHERE photos.idPost = $idPost";
          $select = $conn->query($subquery);
          
          

         ?>
                    <tr>  
                         <td width="30%"><label>ID</label></td>  
                         <td width="70%"><?php echo $row["idPost"]?></td>  
                    </tr>
                    <tr>  
                         <td width="30%"><label>Title</label></td>  
                         <td width="70%"><?php echo $row["title"]?></td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Content</label></td>  
                         <td width="70%"><?php echo $row["descriptions"]?></td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Location</label></td>  
                         <td width="70%"><?php echo $row["location"]?></td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Date</label></td>  
                         <td width="70%"><?php echo $row["datePost"]?></td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Image</label></td> 
                         
                         <td class='imagePost' width="100%">
                         <?php
                         while($rowImg = $select->fetch_assoc()){?>
                              <img   style="width:100px;height:100px;" src="./assets/uploads/<?php echo $idPost?>/<?php echo $rowImg["image"]?>"><?php } ?></td>  
                    
                    </tr>
                    
              
               <?php } ?>
   </table></div>
  <?php  
}
?>

<?php  
     if(isset($_POST["contact_id"])){  
          $idContact = $_POST["contact_id"];
          $output = '';  
          $sql = "select * from contact where idContact= " . $idContact;
          $results = $conn->query($sql);
     
          $output .= '  
          <div class="table-responsive">  
               <table class="table table-bordered">';  
          while($row = $results->fetch_assoc()) 
          {  
               $output .= '  
                    <tr>  
                         <td width="30%"><label>Name</label></td>  
                         <td width="70%">'.$row["fullname"].'</td>  
                    </tr>
                    <tr>  
                         <td width="30%"><label>Subjects</label></td>  
                         <td width="70%">'.$row["subjects"].'</td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Content</label></td>  
                         <td width="70%">'.$row["content"].'</td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Date</label></td>  
                         <td width="70%">'.$row["dateContact"].'</td>  
                    </tr> 
                   
                    ';  
          }  
          $output .= "</table></div>";  
          echo $output;  
     }  
     if(isset($_POST["account_id"])){  
          $idaccount = $_POST["account_id"];
          $output = '';  
          $sql = "select * from users where idUser= " . $idaccount;
          $results = $conn->query($sql);
     
          $output .= '  
          <div class="table-responsive">  
               <table class="table table-bordered">';  
          while($row = $results->fetch_assoc()) 
          {  
               $output .= '  
                    <tr>  
                         <td width="30%"><label>Name</label></td>  
                         <td width="70%">'.$row["username"].'</td>  
                    </tr>
                    <tr>  
                         <td width="30%"><label>Address</label></td>  
                         <td width="70%">'.$row["address"].'</td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Email</label></td>  
                         <td width="70%">'.$row["email"].'</td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Date</label></td>  
                         <td width="70%">'.$row["createDate"].'</td>  
                    </tr> 
                   
                    ';  
          }  
          $output .= "</table></div>";  
          echo $output;  
     }  
          if(isset($_POST["account_id"])){  
          $idaccount = $_POST["account_id"];
          $output = '';  
          $sql = "select * from users where idUser= " . $idaccount;
          $results = $conn->query($sql);
     
          $output .= '  
          <div class="table-responsive">  
               <table class="table table-bordered">';  
          while($row = $results->fetch_assoc()) 
          {  
               $output .= '  
                    <tr>  
                         <td width="30%"><label>Name</label></td>  
                         <td width="70%">'.$row["username"].'</td>  
                    </tr>
                    <tr>  
                         <td width="30%"><label>Address</label></td>  
                         <td width="70%">'.$row["address"].'</td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Email</label></td>  
                         <td width="70%">'.$row["email"].'</td>  
                    </tr> 
                    <tr>  
                         <td width="30%"><label>Date</label></td>  
                         <td width="70%">'.$row["createDate"].'</td>  
                    </tr> 
                   
                    ';  
          }  
          $output .= "</table></div>";  
          echo $output;  
     }  

 ?>
 
