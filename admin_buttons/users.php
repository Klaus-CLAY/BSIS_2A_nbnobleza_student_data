<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>USERS</title>


<?php session_start();
if (!isset($_SESSION['admin'])) {
  header("location:login.php");
}
 ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>USERS</h2>
      	</div>
      	<div class="col-2">
      		<a href="#" data-toggle="modal" data-target="#add_users_modal" class="btn btn-primary btn-sm">USER DETAILS</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>PHONE NO.</th>
              <th>CITY</th>
              <th>PASSWORD</th>
              <th>IMAGE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody id="product_list">
           <?php
include_once 'Database.php';
$result = mysqli_query($conn,"SELECT * FROM user");

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_array($result)) {
    $id=$row['id'];?>
    <tr>
              <td><?php echo $row['id'];?></td>
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['email'];?></td>
              <td><?php echo $row['mobile'];?></td>
              <td><?php echo $row['city'];?></td>
              <td><?php echo $row['password'];?></td>
              <td><img src="image/<?php echo $row['image']; ?>" alt="" class="resize"></td>
              <td><button data-toggle="modal" type="button" data-target="#edit_users_modal<?php echo $id;?>" class="btn btn-primary btn-sm">EDIT USER</button>
              <button data-toggle="modal" type="button" data-target="#delete_users_modal<?php echo $id;?>" class="btn btn-danger btn-sm">DELETE USER</button></td></td>
            </tr>

 <div class="modal fade" id="delete_users_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DELETE USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_movie" action="insert_data.php" method="post">
          <h4> BUS ID "<?php echo $row['id'];?>" CLICK YES TO DELETE.</h4>
          <input type="hidden" name="id" value="<?php echo $row['id'];?>">
          <input type="submit" name="deleteuser" id="deleteuser" value="YES" class="btn btn-primary">
          </form>

      </div>
    </div>
  </div>
</div> 

<div class="modal fade" id="edit_users_modal<?php echo $row['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">USER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>NAME</label>
                <input type="hidden" name="e_id" value="<?php echo $row['id'];?>">
                <input class="form-control" name="edit_username" id="edit_username" value="<?php echo $row['username'];?>">
                <small></small>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>EMAIL</label>
                <input class="form-control" name="edit_email" id="edit_email" value="<?php echo $row['email'];?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>MOBILE NO.</label>
                <input type="number" class="form-control" name="edit_mobile" id ="edit_mobile" value="<?php echo $row['mobile']; ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>CITY</label>
                <input class="form-control" name="edit_city" id ="edit_city" value="<?php echo $row['city']; ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>PASSWORD</label>
                <input class="form-control" name="edit_password" id ="edit_password" value="<?php echo $row['password']; ?>">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>IMAGE</label>
                <img src="image/<?php echo $row['image'];?>" width="10%">
                <input type="file" name="edit_img" id="edit_img" class="form-control">
                <input type="hidden" name="old_image" value="<?php echo $row['image'];?>" id="old_image" class="form-control">              
              </div>
            </div>
            <div class="col-12">
            
              <input type="submit" name="updateusers" id="updateusers" value="UPDATE" class="btn btn-primary">
            </div>
          </div>
          
        </form>
        <div id="preview"></div>
      </div>
    </div>
  </div>
</div> 
  <?php

  }
}
?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Add User Modal start -->
<div class="modal fade" id="add_users_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETAILS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form name="myform" id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateform()" >
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>USERNAME</label>
                <input class="form-control" name="username" id="username" placeholder="USERNAME" >
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>EMAIL</label>
                <input class="form-control" name="email" id="email" placeholder="EMAIL">
              </div>
            </div>
      
            <div class="col-12">
              <div class="form-group">
                <label>MOBILE NO.</label>
                <input type="number" class="form-control" name="mobile" id ="mobile" placeholder="MOBILE NO.">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>CITY</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="CITY">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>PASSWORD</label>
                <input type="text" name="password" id="Password" class="form-control" placeholder="PASSWORD">
              </div>
            </div>
            
            <div class="col-12">
              <div class="form-group">
                <label>IMAGE</label>
                <input type="file" name="img" value="img" id="img" class="form-control">
              </div>
            </div>
            <input type="hidden" name="add_product" value="1">
              <div class="col-12">
              <input type="submit" name="add_user" class="btn btn-primary add-product" value="ADD DEATAILS">
            </div>
          </div>
          
        </form>
        <div id="preview"></div>
      </div>
    </div>
  </div>
</div>
<!-- Add User Modal end -->

<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

<?php include_once("./templates/footer.php"); ?>


<script>  
function validateform(){  
var User_name=document.myform.username.value;  
var Email=document.myform.email.value;  
var Mobileno=document.myform.mobile.value;  
var City=document.myform.city.value;  
var Password=document.myform.password.value;  
 




if (User_name==""){  
  alert("Requre  User name");  
  return false;  
}
else if(Email==""){  
  alert("Requre Enter Email");  
  return false;  
  }  
else if(Mobileno==""){  
  alert("Requre Enter Mobile no");  
  return false;  
  }  
else if(City==""){  
  alert("Requre Enter City");  
  return false;  
  }  
else if(Password==""){  
  alert("Requre Enter Password");  
  return false;  
  }  


}


</script>  