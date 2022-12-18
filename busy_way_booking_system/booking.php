<?php
  session_start();
  ?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <title>Booking</title>

  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
  <body>
    
  <?php 
    include("header.php");
    ?>
 
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>NAMES</th>
              <th>BUS</th>
              <th>BUS ID</th>
              <th>DATE</th>
              <th>TIME</th>
              <th>SEAT</th>
              <th>TOTAL SEAT</th>
              <th>PRICE</th>
              <th>PAYMENT DATE</th>
              <th>TICKET ID</th>
            </tr>
          </thead>

        
          <tbody id="customer_list">
          <tbody id="product_list">
            <?php
            include_once 'Database.php';
            $result = mysqli_query($conn, "SELECT c.id,c.movie,c.booking_date,c.show_time,c.seat,c.totalseat,c.price,c.payment_date,c.custemer_id,u.username,t.theater FROM customers c INNER JOIN user u on c.uid = u.id INNER JOIN time_schedule t on c.show_time = t.show");

            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_array($result)) {
                $id = $row['id']; ?>
                <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['movie']; ?></td>
                  <td><?php echo $row['theater']; ?></td>
                  <td><?php echo $row['booking_date']; ?></td>
                  <td><?php echo $row['show_time']; ?></td>
                  <td><?php echo $row['seat']; ?></td>
                  <td><?php echo $row['totalseat']; ?></td>
                  <td><?php echo $row['price']; ?></td>
                  <td><?php echo $row['payment_date']; ?></td>
                  <td><?php echo $row['custemer_id']; ?></td>

                </tr>
            <?php
              }
            }
            ?>
          </body>
        </table>
      </div>
      </main>
    </div>
  </div>
  </body>

  <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</html>


  <!-- Add custemers Modal start -->
  

