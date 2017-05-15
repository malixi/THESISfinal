<?php
session_start();
require_once 'class.user.php';
require_once 'connector.php';
$user_home = new USER();

if(!$user_home->is_logged_in()){
	$user_home->redirect('index.php');
}

$stmt = $user_home->runQuery("SELECT * FROM admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

if(isset($_GET['dosearch'])){
    $query=$_GET['doseach'];
    echo $query;
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GREY ENTERPRISE</title>



    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/product.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="navbar-header">
            <a class="navbar-brand" href="home.php">GREY ENTERPRISE</a>
        </div>

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Top Navigation: Left Menu -->
        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li><a href="../index.php"><i class="fa fa-home fa-fw"></i> Website</a></li>
        </ul>

        <!-- Top Navigation: Right Menu -->
        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $row['userEmail']; ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <li><a href="usersettings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Sidebar -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">

                <ul class="nav" id="side-menu">

                    <li>
                        <a href="home.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="viewproductpage.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Products</a>
                    </li>
                    <li>
                        <a href="viewadminpage.php"><i class="fa fa-dashboard fa-fw"></i> Admins</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Page Title</h1>
                </div>
            </div>

            <!-- ... Your content goes here ... -->



													<?php
													$prodID=$_POST['PNAME'];
													$results = mysqli_query ($dbconn ,"SELECT * FROM products WHERE productID = '". $prodID . "' LIMIT 1");


												if($results->num_rows > 0) {

												while($row = mysqli_fetch_array($results)){


						echo '<div class="container-fluid">
						    <div class="content-wrapper">
								<div class="item-container">
									<div class="container">
										<div class="col-md-12">
											<div class="product col-md-3 service-image-left">';

											if($row['image'] == NULL)
											echo '
											<center>
												<img id="item-display" src="productimage/default.png" alt=""></img>
											</center>
											';
											else{
echo '
												<center>
													<img id="item-display" src="productimage/' .$row['image']. '" alt=""></img>
												</center>
											</div>';
}

echo '
										<div class="col-md-7">
											<div class="product-title">'  .$row['name']. '</div>
											<div class="product-desc">'  .$row['description']. '</div>
											<hr>
											<div class="product-price"> 	&#8369;'  .$row['price']. '</div>


											<hr>


										</div>
									</div>
								</div>

								<div class="container-fluid">
									<div class="col-md-12 product-info">
											<ul id="myTab" class="nav nav-tabs nav_tabs">

												<li class="active"><a href="#service-one" data-toggle="tab">DESCRIPTION</a></li>


											</ul>
										<div id="myTabContent" class="tab-content">
												<div class="tab-pane fade in active" id="service-one">

													<section class="container product-info">

														<h2> '.$row['description'].'</h2>

													</section>

												</div>

										</div>';

									}
								}
								?>
										<hr>
									</div>
								</div>
							</div>
						</div>


        </div>
    </div>

</div>

<!-- jQuery -->
<script src="js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="js/startmin.js"></script>

</body>
</html>
