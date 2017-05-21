<?php echo '<div class="head-top">
  <div class="logo">
    <a href="index">
<img src="images/logo.png" class="navbar-brand">
</a>
  </div>

<div class=" h_menu4">
&nbsp;&nbsp;&nbsp;
  <ul class="memenu skyblue">
      <li><a class="color8" href="about"><strong>ABOUT US</strong></a></li>'; ?>

<?php echo
'<li>
        <a class="color1" href="products"><strong>PRODUCTS</strong></a>
          <div class="mepanel">
      <div class="row">
        <div class="col1">
          <div class="h_nav">
            <ul>';
            ?>
              <?php

              $con=mysqli_connect('localhost','root','','grayenterprise');





              $results = mysqli_query ($con,'SELECT * FROM products  ORDER BY productID DESC LIMIT 6 ');

              while($row = mysqli_fetch_array($results)){


        echo     '<li><a href="viewproducts.php?pname='  .$row['productID']. '">'  .$row['name']. '</a></li>';
          }
              ?>

              <?php echo
              '</ul>
          </div>
        </div>';
        ?>

    </li>

<?php echo
  '<li><a class="color4" href="services"><strong>SERVICES</strong></a></li>
  <li><a class="color6" href="contact"><strong>CONTACT</strong></a></li>
  </ul>
</div>

  <div class="clearfix"> </div>
  

</div>
</div>
</div>
</nav>';
 ?>
