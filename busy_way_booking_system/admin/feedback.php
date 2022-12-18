<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>FEEDBACKS</title>


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
          <h2>FEEDBACKS</h2>
        </div>
        <div class="col-2">
          <a href="#" data-toggle="modal" data-target="#add_feedback_modal" class="btn btn-primary btn-sm">FEEDBACK DETAILS</a>
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAME</th>
              <th>EMAIL</th>
              <th>MESSAGE</th>
              <th>ACTION</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM feedback");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                $id = $row['id']; ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><?php echo $row['massage']; ?></td>


                  <td><button data-toggle="modal" type="button" data-target="#edit_feedback_modal<?php echo $id; ?>" class="btn btn-primary btn-sm">EDIT FEEDBACK</button></td>
                  <td><button data-toggle="modal" type="button" data-target="#delete_feedback_modal<?php echo $id; ?>" class="btn btn-danger btn-sm">DELETE FEEDBACK</button></td>
                </tr>

                <div class="modal fade" id="delete_feedback_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE FEEDBACK</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post">
                          <h4> BUS ID "<?php echo $row['id']; ?>" CLICK YES TO DELETE.</h4>
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="submit" name="deletefeedback" id="deletefeedback" value="OK" class="btn btn-primary">
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="edit_feedback_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT FEEDBACK</h5>
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
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">
                                <input class="form-control" name="edit_feedback_name" id="edit_name" value="<?php echo $row['name']; ?>">
                                <small></small>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>EMAIL</label>
                                <input class="form-control" name="edit_feedback_email" id="edit_email" value="<?php echo $row['email']; ?>">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>MESSAGE</label>
                                <input class="form-control" name="edit_feedback_massage" id="edit_massage" value="<?php echo $row['massage']; ?>">
                              </div>
                            </div>
                            <div class="col-12">

                              <input type="submit" name="updatefeedback" id="updatefeedback" value="UPDATE" class="btn btn-primary">
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




  <!-- Add Product Modal start -->
  <div class="modal fade" id="add_feedback_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">FEEDBACK DETAILS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="myform" id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
            <div class="row">
              <div class="col-12">
                <div class="col-12">
                  <div class="form-group">
                    <label>ENTER NAME</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="ENTER NAME">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>ENTER EMAIL</label>
                    <input type="text" name="email" class="form-control" id="email" placeholder="ENTER EMAIL">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>MESSAGE</label>
                    <textarea class="form-control" name="massage" id="massage" placeholder="ENTER MESSAGE"></textarea>
                  </div>
                </div>

                <div class="col-12">
                  <input type="submit" name="add_feedback" class="btn btn-primary add-product" value="ADD FEEDBACK">
                </div>
              </div>

          </form>
          <div id="preview"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add movie Modal end -->

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

  <?php include_once("./templates/footer.php"); ?>


  <script>
    function validateform() {
      var name = document.myform.name.value;
      var email = document.myform.email.value;
      var massage = document.myform.massage.value;

      if (name == "") {
        alert("Requre Name");
        return false;
      } else if (email == "") {
        alert("Requre email Name");
        return false;
      } else if (massage == "") {
        alert("Requre Massage Name");
        return false;
      }
    }
  </script>