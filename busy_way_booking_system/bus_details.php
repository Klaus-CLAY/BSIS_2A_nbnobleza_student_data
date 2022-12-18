  <?php
session_start();

        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_bus WHERE id = '".$id."'");
        $row = mysqli_fetch_array($result);
        ?>

<!DOCTYPE html>
<html>
<head>

	    <!-- Css Styles -->
          <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $row['buses_name'];?> BUS DETAILS</title>



    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="  text/css">
    <link rel="stylesheet" href="css/fonts-googleapis.css" type="  text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">   
    
</head>
<body>
<?php
include("header.php");
?>

<section id="aboutUs">
  <div class="container">
<?php
        include_once 'Database.php';
        $id = $_GET['pass'];
        $result = mysqli_query($conn,"SELECT * FROM add_bus WHERE id = '".$id."'");
        
        
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_array($result)) {
            $id = $row['id'];
        ?>
    <div class="row feature design">
        <div class="col-lg-5"> <img src="admin/image/<?php echo $row['image']; ?>" class="resize-detail" alt="" width="100%"> </div>
      <div class="col-lg-7">
        
        <table class="content-table">
          <thead><tr>
            <th colspan="2">BUS DETAILS</th>
          </tr>
        </thead>
       
          <tbody>
          <tr>
            <td>Bus Name:</td><td><?php echo $row['buses_name'];?></td>
          </tr>
          <tr>
            <td>Date Schedule:</td><td><?php echo $row['schedule'];?></td>
          </tr>
          <tr>
            <td>Drivers Name:</td><td><?php echo $row['drivers_name'];?></td>
          </tr>
          <tr>
            <td>Destination:</td><td><?php echo $row['categroy'];?></td>
          </tr>
          <tr>
            <td>Type:</td><td><?php echo $row['language'];?></td>
          </tr>  
         </tbody>
            
          
        </table>
        <?php  if($row['action']== "AVAILABLE"){?>
        <div class="tiem-link">
          <h4>BUS TIMING</h4><br>
          <?php 
            $time = $row['show'];

            $movie = $row['buses_name'];
            $set_time = explode(",", $time);
            $res = mysqli_query($conn,"SELECT * FROM time_schedule");

        if (mysqli_num_rows($res) > 0) {
          while($row = mysqli_fetch_array($res)) {

            if(in_array($row['show'],$set_time)){

              ?><a href="seatbooking.php?movie=<?php echo $movie; ?>&time=<?php echo $row['show'];?>"><?php echo $row['show'];?></a><?php
             
             }
           }
         }
          ?>
        
       
      </div>
      <?php
}
      ?>
      </div>
      
    </div>
    <div class="description">
      <h4>DESCRIPTION</h4>
      <p>
      A bus is a road vehicle that carries significantly more passengers than an average car or van. It is most commonly used in public transport, but is also in use for charter purposes, or through private ownership. Although the average bus carries between 30 and 100 passengers, some buses have a capacity of up to 300 passengers. The most common type is the single-deck rigid bus, with double-decker and articulated buses carrying larger loads, and midibuses and minibuses carrying smaller loads. Coaches are used for longer-distance services. Many types of buses, such as city transit buses and inter-city coaches, charge a fare. Other types, such as elementary or secondary school buses or shuttle buses within a post-secondary education campus, are free. In many jurisdictions, bus drivers require a special large vehicle licence above and beyond a regular driving licence.</p>
    </div>
    <?php
        }
      }
         ?>
    </div>
  
</section>

<?php
include("footer.php");
?>


    <!-- Js Plugins -->
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
</body>
</html>     