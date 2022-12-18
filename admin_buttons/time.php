<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>TIME</title>

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
          <h2>TIMES</h2>
        </div>
        <div class="col-2">
          <button data-toggle="modal" data-target="#add_show" class="btn btn-primary btn-sm">ADD SCHEDULE</button>
        </div>


      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>TIME SCHEDULE</th>
              <th>TIMING</th>
            </tr>
          </thead>
          <tbody id="product_list">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT * FROM time_schedule");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['show']; ?></td>
                  <td><?php echo $row['theater']; ?></td>
                  <td>
                    <button data-toggle="modal" data-target="#update_show<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">EDIT SCHEDULE</button>
                    <button data-toggle="modal" data-target="#delete_show<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">DELETE SCHEDULE</button>
                  </td>
                </tr>
                <div class="modal fade" id="update_show<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">EDIT TIME</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data">
                          <div class="row">
                            <div class="col-12">
                              <div class="form-group">
                                <label>OPTION</label>
                                <input type="hidden" name="e_id" value="<?php echo $row['id']; ?>">

                                <select class="form-control" name="edit_screen" id="edit_screen">
                                  <option value="<?php echo $row['theater']; ?>"><?php echo $row['theater']; ?></option>
                                  <option value="1">1</option>
                                  <option value="2">2</option>
                                </select>
                                <small></small>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <label>TIME AVAILABLE</label>
                                <input type="time" class="form-control" name="edit_time" id="edit_time" value="<?php echo $row['show']; ?>">
                              </div>
                            </div>

                            <div class="col-12">

                              <input type="submit" name="updatetime" id="updatetime" value="UPDATE" class="btn btn-primary">
                            </div>
                          </div>

                        </form>
                        <div id="preview"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal fade" id="delete_show<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">DELETE SCHEDULE</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form id="insert_movie" action="insert_data.php" method="post">
                          <h4> BUS ID "<?php echo $row['id']; ?>" CLICK YES TO DELETE.</h4>
                          <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                          <input type="submit" name="deletetime" id="deletetime" value="YES" class="btn btn-primary">
                        </form>

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




  <!-- Add show Modal start -->
  <div class="modal fade" id="add_show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">ADD SCHEDULE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="myform" id="insert_movie" action="insert_data.php" method="post" enctype="multipart/form-data" onsubmit="return validateform()">

            <div class="col-12">
              <div class="form-group">
                <label>TIME OPTION</label>
                <select class="form-control" name="theater_name" id="theater_name">
                  <option value="">TIME OPTION</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Enter TIME</label>
                <input type="time" name="show" id="show">
              </div>
            </div>


            <input type="hidden" name="add_product" value="1">
            <div class="col-12">

              <input type="submit" name="addshow" id="addshow" value="SUBMIT" class="btn btn-primary">
            </div>


          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- Add show Modal end -->

  <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

  <?php include_once("./templates/footer.php"); ?>



  <script>
    function validateform() {
      var theater_name = document.myform.theater_name.value;
      var show = document.myform.show.value;


      if (theater_name == "") {
        alert("Reqiure theater name");
        return false;
      } else if (show == "") {
        alert("Reqiure Enter show");
        return false;
      }

    }
  </script>

  </script>