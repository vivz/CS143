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

    <!--        <div class="left-div">
                <div class="user-settings-wrapper">
                    <ul class="nav">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
                                <span class="glyphicon glyphicon-user" style="font-size: 25px;"></span>
                            </a>
                            <div class="dropdown-menu dropdown-settings">
                                <div class="media">
                                    <a class="media-left" href="#">
                                        <img src="assets/img/64-64.jpg" alt="" class="img-rounded" />
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">Jhon Deo Alex </h4>
                                        <h5>Developer & Designer</h5>

                                    </div>
                                </div>
                                <hr />
                                <h5><strong>Personal Bio : </strong></h5>
                                Anim pariatur cliche reprehen derit.
                                <hr />
                                <a href="#" class="btn btn-info btn-sm">Full Profile</a>&nbsp; <a href="login.html" class="btn btn-danger btn-sm">Logout</a>

                            </div>
                        </li>


                    </ul>
                </div>
            </div> -->
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
            <?php 
                $db_connection = new mysqli("localhost", "cs143", "", "CS143");
                    if($db_connection->connect_errno > 0){
                        die('Unable to connect to database [' . $db_connection->connect_error . ']');
                }
                $id=$_GET["identifier"];
                $keyword=$_GET["search-term"];
                if($id!=""){
                    $actorInfoQuery = "SELECT * FROM Actor WHERE id=$id";
                    $movieInfoQuery = "SELECT mid, role FROM MovieActor WHERE aid=$id";
                    $rai = $db_connection->query($actorInfoQuery);
                    $rmr = $db_connection->query($movieInfoQuery);
                    if($rai === FALSE){
                        die('Unable to execute SELECT from Actor [' . $db_connection->error .']');
                    }
                    else{ 
                        $actorInfoRow = $rai->fetch_array();
                        ?>
                         <div class="row">
                            <div class="col-md-12">
                                <h1 class="page-head-line">Actor Information</h1>
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="notice-board">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        About
                                    </div>
                                    <div class="panel-body">
                                        <ul >
                                             <li>
                                             <span class="glyphicon glyphicon-user text-danger"></span> <b>Name</b>
                                                   <div class="pull-right">  <?php echo $actorInfoRow["first"].' '.$actorInfoRow["last"] ?></div>
                                             </li>
                                             <li>
                                             <span class="glyphicon glyphicon-heart text-danger" ></span> <b>Sex</b>
                                                  <div class="pull-right"> <?php echo $actorInfoRow["sex"]?> </div>
                                             </li>
                                             <li>
                                             <span class="glyphicon glyphicon-baby-formula text-danger" ></span> <b> Date of Birth </b>
                                                  <div class="pull-right"> <?php echo $actorInfoRow["dob"]?> </div>
                                            </li>
                                            <li>
                                             <span class="glyphicon glyphicon-option-horizontal text-danger" ></span>  <b>Date of Death</b>
                                                  <div class="pull-right"> <?php echo ($actorInfoRow["dod"]=="")?'Still Alive':$actorInfoRow["dod"] ?></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div> <!--end of notice board-->

                        </div>  
                        <?php
                            if($rmr === FALSE){
                                die('Unable to execute SELECT from MovieActor [' . $db_connection->error .']');
                            }
                            else{ 
                                $i = 1;
                                ?>
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Movies and Roles
                                        </div>
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Role</th>
                                                            <th>Movie Title</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php while ($row=$rmr->fetch_array()){?>
                                                        <tr>
                                                            <td><?php echo $i; $i=$i+1;?></td>
                                                            <td><?php echo '"'.$row[role].'"' ?></td>
                                                            <td><a href="show-movie.php?identifier=<?php echo $row[mid]?>">
                                                                <!-- display the movie name here-->
                                                                <?php 
                                                                    $movieNameQuery= "SELECT title FROM Movie WHERE id=$row[mid]";
                                                                    $rmt = $db_connection->query($movieNameQuery);
                                                                    if($rmt == FALSE){
                                                                         die('Unable to execute SELECT from MovieActor [' . $db_connection->error .']');
                                                                    }
                                                                    else{
                                                                        $movieName=$rmt->fetch_array();
                                                                        echo $movieName["title"];
                                                                    }
                                                                ?>
                                                            </a></td>
                                                        </tr>
                                                    <?php 
                                                        } //end of while
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }//end of if(rmr!=null)
                        ?>
                        </div> <!-- end of first row-->
              <?php }//end of if $rai!=false

                }//end of if($id!="");
            ?>
    <!--search-->
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Search</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3 " >
                    <div class="panel panel-default">
                        <div class="panel-body">
                        <form method = "GET" action="show-actor.php">
                            <input type="text" class="form-control" placeholder="Search for movies, actors, directors..."/ name="search-term" value="<?php echo $_GET['search-term'];?>"/>
                            <input type="submit" value="Search" class="btn btn-primary search-box">
                        </form>
                        </div>
                    </div>
                </div>
            </div> <!--end of search input row -->
    <!--search result-->
                <?php
                    if($keyword!=""){
                        $actorQuery = "SELECT id, first, last, dob FROM Actor WHERE last like '%$keyword%' or first like '%$keyword%' or CONCAT(first, ' ', last) like '%$keyword%'";
                        $movieQuery = "SELECT id, title, year FROM Movie WHERE title like '%$keyword%'";
                        $ra = $db_connection->query($actorQuery);
                        $rv = $db_connection->query($movieQuery);
                        if($ra === FALSE){
                            die('Unable to execute SELECT from Actor [' . $db_connection->error .']');
                        }
                        else{?>
                            <div class="col-md-6">
                             <!--    Hover Rows  -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Related Actors
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead >
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Date of Birth</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                        <?php
                            $i=1;
                            while($row = $ra->fetch_array()){
                                //foreach ($row as $val) {
                                ?>
                                    <tr>
                                        <td>
                                            <?php echo $i; $i=$i+1; ?>
                                        </td>
                                        <td>
                                            <a href="show-actor.php?identifier=<?php echo $row["id"]?>">
                                                <?php echo $row["first"]."  ".$row["last"]; ?>
                                            </a>
                                        </td>
                                        <td> 
                                            <a href="show-actor.php?identifier=<?php echo $row["id"]?>">
                                                <?php echo $row["dob"]; ?>
                                            </a>
                                        </td>
                                    </tr>
                            <?php } ?> <!--end of while-->
                                        </tbody>
                                        </table>
                                </div>
                            </div>
                        </div><!-- End  Hover Rows  -->
                    </div>
                        <?php
                        }//end of if(ra==true)
                        if($rv === FALSE){
                            die('Unable to execute SELECT from Movie [' . $db_connection->error .']');
                        }
                        else{ ?>
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Related Movies
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th>Year</th>
                                                    </tr>
                                                </thead>
                                                <tbody> 
                                                <?php 
                                                    $i=1;
                                                    while($row = $rv->fetch_array()){
                                                        //foreach ($row as $val) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <?php echo $i; $i=$i+1; ?>
                                                                </td>
                                                                <td> <a href="show-movie.php?identifier=<?php echo $row["id"]?>">
                                                                        <?php echo $row["title"]; ?>
                                                                    </a>
                                                                </td>
                                                                <td> 
                                                                    <a href="show-movie.php?identifier=<?php echo $row["id"]?>">
                                                                        <?php echo $row["year"]; ?>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                <?php } ?> <!--end of while-->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                   <?php 
                        }//end of rv!=false
                    }
                    mysql_close($db_connection);
                ?>
                                    
            </div>
           


        </div> <!-- end of container-->
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
