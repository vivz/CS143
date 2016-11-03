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

                    $movieInfoQuery = "SELECT * FROM Movie WHERE id=$id";
                    $movieActorQuery= "SELECT aid, role FROM MovieActor WHERE mid=$id";

                    $rvi = $db_connection->query($movieInfoQuery);
                    if($rvi === FALSE){
                        die('Unable to execute SELECT from Actor [' . $db_connection->error .']');
                    }
                    else{ 
                        $MovieInfoRow = $rvi->fetch_array();
                        ?>
                         <div class="row">
                            <div class="col-md-12">
                                <h1 class="page-head-line">Moive Information</h1>
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
                                             <span class="glyphicon glyphicon-film text-danger"></span> <b>Title</b>
                                                   <div class="pull-right">  <?php echo $MovieInfoRow["title"].' ('.$MovieInfoRow["year"].')' ?> </div>
                                             </li>
                                             <li>
                                             <span class="glyphicon glyphicon-facetime-video text-danger" ></span> <b>Producer</b>
                                                  <div class="pull-right"> <?php echo $MovieInfoRow["company"] ?>  </div>
                                             </li>
                                             <li>
                                             <span class="glyphicon glyphicon-comment text-danger" ></span> <b> MPAA Rating </b>
                                                  <div class="pull-right">  <?php echo $MovieInfoRow["rating"] ?> </div>
                                            </li>
                                            <li>
                                             <span class="glyphicon glyphicon-user text-danger" ></span>  <b>Director</b>
                                                <div class="pull-right">  

                                                <?php 
                                                    $didQuery = "SELECT did FROM MovieDirector WHERE mid=$id";
                                                    $rdid = $db_connection->query($didQuery);
                                                    if($rdid == FALSE){
                                                         echo $didQuery;
                                                    }
                                                    else{
                                                        $didRow = $rdid->fetch_array();
                                                        if($didRow){
                                                            $directorNameQuery= "SELECT first, last, dob FROM Director WHERE id=$didRow[did]";
                                                            $rdn = $db_connection->query($directorNameQuery);
                                                            $directorName=$rdn->fetch_array();
                                                            if($directorName){
                                                                echo $directorName['first'].' '.$directorName['last'].' ('.$directorName['dob'].')';
                                                            }else {echo "N/A";}
                                                        }
                                                        else{
                                                            echo "N/A";
                                                        }
                                                    }
                                                    
                                                    
                                                ?>
                                                  </div>
                                            </li>
                                            <li>
                                             <span class="glyphicon glyphicon-th text-danger" ></span>  <b>Genre</b>
                                                  <div class="pull-right"> Lorem ipsum dolor sit amet ipsum dolor sit amet</div>
                                            </li>
                                            <li>
                                             <span class="glyphicon glyphicon-pencil text-danger" ></span>  <b>Score</b>
                                                  <div class="pull-right">5.00/5 based on 1 people's reviews</div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="panel-footer" align="center"> <a href="give-review.php?id=<?php echo $id?>">Leave your review as well</a> </div>
                                </div>
                            </div> <!--end of notice board-->

                        </div>
                        <?php 
                            $rma = $db_connection->query($movieActorQuery);
                            if($rma == FALSE){
                                die('Unable to execute SELECT from MovieActor [' . $db_connection->error .']');
                            }
                            else{ 
                                $i=1;
                        ?>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Casting
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while($row = $rma->fetch_array()){ ?>
                                                <tr>
                                                    <td><?php echo $i; $i=$i+1?></td>
                                                    <td><a href="show-actor.php?identifier=<?php echo $row[aid]?>"> 
                                                        <?php 
                                                            $actorNameQuery= "SELECT first, last FROM Actor WHERE id=$row[aid]";
                                                            $ram = $db_connection->query($actorNameQuery);
                                                            if($ram == FALSE){
                                                                 die('Unable to execute SELECT from MovieActor [' . $db_connection->error .']');
                                                            }
                                                            else{
                                                                $actorName=$ram->fetch_array();
                                                                echo $actorName['first'].' '.$actorName['last'];
                                                            }
                                                        ?>
                                                    </a></td>
                                                    <td><?php echo '"'.$row['role'].'"' ?></td>
                                                </tr>
                                            <?php } //end of while?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php


                            }   //end of if(rma!=false)
                        ?>
                        </div>
              <?php }//end of if $rv!=false
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
                        <form method = "GET" action="show-movie.php">
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
                        $actorQuery = "SELECT id, first, last, dob FROM Actor WHERE last like '%$keyword%' or first like '%$keyword%'";
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
