<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
     <title>CS 143 Project 1C</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    CS143 Fall 2017
                    &nbsp;&nbsp;
                    Yiran Wang & Vivian (Ni) Zhang 
                </div>

            </div>
        </div>
    </header>
    <!-- HEADER END-->
    <div class="navbar navbar-inverse set-radius-zero">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
               <div class="navbar-title">
                <h1>Movie DB Query System</h1>
                   <!-- <img src="assets/img/logo.png" />-->
                </div>
            </div>
        </div>
    </div>
    <!-- LOGO HEADER END-->
    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                            <li><a href="index.php">Welcome</a></li>
                            <li><a href="add-content.php">Add Content</a></li>
                            <li><a class="menu-top-active" href="show-movie.php">Browse</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Add Movie Review</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add comments here:  
                        </div>
                        <div class="panel-body">
                            <form method = "GET" action="give-review.php">
                                <!-- GET movie title -->
                                <?php
                                    $db_connection = new mysqli("localhost", "cs143", "", "CS143");
                                    if($db_connection->connect_errno > 0){
                                        die('Unable to connect to database [' . $db_connection->connect_error . ']');
                                    }

                                    $mid=$_GET["id"];
                                    $rs=$db_connection->query("SELECT title FROM Movie WHERE id=$mid");
                                    if($rs==FALSE){
                                        die('Unable to fetch data [' . $db_connection->error .']');
                                    }
                                    $dbArray=$rs->fetch_array();
                                ?>
                                <!-- END OF PHP -->
                                <label>Movie Title: <?php echo $dbArray[0]; ?></label>
                                <hr />
                                <label>Your Name :  </label>
                                    <input type="text" class="form-control" name="userName" placeholder="Please enter your name." value="<?php echo $_GET['userName'];?>"/>
                                <label>Rating :  </label>
                                <select class="form-control" name="rate">
                                    <option value="1" <?php echo (htmlspecialchars($_GET['rate'])=='1')?'selected':''?>>1</option>
                                    <option value="2" <?php echo (htmlspecialchars($_GET['rate'])=='2')?'selected':''?>>2</option>
                                    <option value="3" <?php echo (htmlspecialchars($_GET['rate'])=='3')?'selected':''?>>3</option>
                                    <option value="4" <?php echo (htmlspecialchars($_GET['rate'])=='4')?'selected':''?>>4</option>
                                    <option value="5" <?php echo (htmlspecialchars($_GET['rate'])=='5')?'selected':''?>>5</option>
                                </select>
                                <label>Comments: </label>
                                    <input type="text" class="form-control" name="comments" placeholder="Please enter your comments." value="<?php echo $_GET['comments'];?>"/>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; 2015 YourCompany | By : <a href="http://www.designbootstrap.com/" target="_blank">DesignBootstrap</a>
                </div>

            </div>
        </div>
    </footer>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.11.1.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
</body>
</html>