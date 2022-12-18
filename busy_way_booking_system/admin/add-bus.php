<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>BUS</title>

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
          <h2>BUS</h2>
        </div>
        <div class="col-2">
          <button data-toggle="modal" data-target="#add_movie_modal" class="btn btn-primary btn-sm">ADD BUS</button>
        </div>

      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>BUS NAME</th>
              <th>DRIVERS</th>
              <th>CITY</th>
              <th>TYPE</th>
              <th>TIME</th>
              <th>IMAGE</th>
              <th>ACTION</th>

            </tr>
          </thead>
          <tbody id="product_list">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM add_bus");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                $id = $row['id']; ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['buses_name']; ?></td>
                  <td><?php echo $row['drivers_name']; ?></td>
                  <td><?php echo $row['categroy']; ?></td>
                  <td><?php echo $row['language']; ?></td>

                  <td><?php echo $row['show']; ?></td>
                  <td><img src="image/<?php echo $row['image']; ?>" alt="" class="resize"></td>
                  <td><button data-toggle="modal" type="button" data-target="#edit_movie_modal<?php echo $id; ?>" class="btn btn-primary btn-sm">EDIT BUS</button></td>
                  <td><button data-toggle="modal" type="button" data-target="#delete_movie_modal<?php echo $id; ?>" class="btn btn-danger btn-sm">DELETE BUS</button></td>
                  </td>
                </tr>

                <div class="modal fade" id="delete_movie_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE BUS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post">
                          <h4> BUS ID "<?php echo $row['id']; ?>" CLICK YES TO DELETE.</h4>
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="submit" name="deletemovie" id="deletemovie" value="YES" class="btn btn-primary">
                        </form>

                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="edit_movie_modal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT BUS</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>BUS NAME</label>
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">
                                <input class="form-control" name="edit_buses_name" id="edit_buses_name" value="<?php echo $row['buses_name']; ?>">
                                <small></small>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>DRIVER NAME</label>
                                <input class="form-control" name="edit_directer_name" id="edit_directer_name" value="<?php echo $row['drivers_name']; ?>">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>CITY</label>
                                <input class="form-control" name="edit_categroy" id="edit_categroy" value="<?php echo $row['categroy']; ?>">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>TYPE</label>
                                <input type="text" name="edit_language" id="edit_language" class="form-control" value="<?php echo $row['language']; ?>">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>Time</label>
                                <?php
                                $seats = explode(",", $row['show']);
                                $sql = mysqli_query($conn, "SELECT * FROM time_schedule");
                                if (mysqli_num_rows($sql) > 0) {
                                  while ($fatch = mysqli_fetch_array($sql)) {
                                    $checked = $fatch['show'];
                                ?>
                                    <font size="2"> <?php echo $fatch['show']; ?></font><input type="checkbox" name="show[]" id="edit_show" value="<?php echo $fatch['show']; ?>" <?php
                                                                                                                                                                                  if (in_array($checked, $seats)) {
                                                                                                                                                                                    echo "checked";
                                                                                                                                                                                  }
                                                                                                                                                                                  ?>>

                                <?php
                                  }
                                }
                                ?>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>LINK</label>
                                <input type="text" name="edit_tailer" id="edit_tailer" class="form-control" value="<?php echo $row['you_tube_link']; ?>">
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>ACTION</label>
                                <select class="form-control" name="edit_action">
                                  <option value="<?php echo $row['action']; ?>"><?php echo $row['action']; ?></option>
                                  <option value="NOT AVAILABLE">NOT AVAILABLE</option>
                                  <option value="AVAILABLE">AVAILABLE</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>DESCRIPTION</label>
                                <textarea type="text" name="decription" id="decription" class="form-control" value="<?php echo $row['decription']; ?>">
                      <?php echo $row['decription']; ?></textarea>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>IMAGE</label>
                                <img src="image/<?php echo $row['image']; ?>" width="10%">
                                <input type="file" name="edit_img" id="edit_img" class="form-control">
                                <input type="hidden" name="old_image" value="<?php echo $row['image']; ?>" id="old_image" class="form-control">
                              </div>
                            </div>
                            <input type="hidden" name="add_product" value="1">
                            <div class="col-12">

                              <input type="submit" name="updatemovie" id="updatemovie" value="UPDATE" class="btn btn-primary">
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
  <div class="modal fade" id="add_movie_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ADD BUS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="myform" id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateform()">
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label>BUS NAME</label>
                  <input class="form-control" name="buses_name" id="buses_name" placeholder="BUS NAME">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>DRIVERS NAME</label>
                  <input class="form-control" name="directer_name" id="directer_name" placeholder="DRIVERS NAME">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>SCHEDULE</label>
                  <input class="form-control" name="release_date" id="release_date" placeholder="SCHEDULE">
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label>CITY</label>
                  <input class="form-control" name="categroy" id="categroy" placeholder="CITY">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>TYPE</label>
                  <input type="text" name="language" id="language" class="form-control" placeholder="TYPE">
                </div>
              </div>

              <div class="col-12">
                <div class="form-group">
                  <label>TIME 1</label>
                  <?php
                  $result = mysqli_query($conn, "SELECT * FROM time_schedule");
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row['theater'] == 1) {

                  ?>
                        <font size="2"> <?php echo $row['show']; ?></font><input type="checkbox" name="show[]" id="edit_show" value="<?php echo $row['show']; ?>">

                  <?php
                      }
                    }
                  }
                  ?>

                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>Time 2</label>
                  <?php
                  $result = mysqli_query($conn, "SELECT * FROM time_schedule");
                  if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_array($result)) {
                      if ($row['theater'] == 2) {

                  ?>
                        <font size="2"> <?php echo $row['show']; ?></font><input type="checkbox" name="show[]" id="edit_show" value="<?php echo $row['show']; ?>">

                  <?php
                      }
                    }
                  }
                  ?>

                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>LINK</label>
                  <input type="text" name="tailer" id="tailer" class="form-control" placeholder="LINK">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>ACTION</label>
                  <select class="form-control" name="action" id="action">
                    <option value="">CHOOSE STATUS</option>
                    <option value="NOT AVAILABLE">NOT AVAILABLE</option>
                    <option value="AVAILABLE">AVAILABLE</option>
                  </select>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>DESCRIPTION</label>
                  <textarea type="text" name="decription" id="decription" class="form-control">
                </textarea>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label>PHOTO</label>
                  <input type="file" name="img" value="img" id="img" class="form-control">
                </div>
              </div>
              <input type="hidden" name="add_product" value="1">
              <div class="col-12">

                <input type="submit" name="submit" id="submit" value="SUBMIT" class="btn btn-primary">
              </div>
            </div>

          </form>
          <div id="preview"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Add movie Modal end -->

  <!-- Edit movie Modal start -->

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>

  <?php include_once("./templates/footer.php"); ?>
  <script>
    function validateform() {
      var name = document.myform.buses_name.value;
      var drivers_name = document.myform.drivers_name.value;


      if (name == "") {
        alert("Requre Movie Name");
        return false;
      } else if (drivers_name == "") {
        alert("Requre Directer Name");
        return false;
      }
    }
  </script>