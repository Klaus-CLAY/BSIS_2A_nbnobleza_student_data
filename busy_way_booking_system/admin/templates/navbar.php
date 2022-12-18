 <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><img src="logo.png s" width="30" alt="" align=""></a>

  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
    	<?php
    		if (isset($_SESSION['admin'])) {
    			?>
    				<a class="nav-link" href="../admin/admin-logout.php">SIGN OUT</a>
    			<?php
    		}
    	?>
      
    </li>
  </ul>
</nav>