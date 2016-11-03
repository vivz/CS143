﻿<!DOCTYPE html>
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

          <!--  <div class="left-div">
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
                            <li><a  href="index.php">Welcome</a></li>
                            <li><a class="menu-top-active" href="add-content.php">Add Content</a></li>
                            <li><a href="browse.php">Browse</a></li>
                       <!--     <li><a href="forms.html">Search</a></li>
                            <li><a href="blank.html">Blank Page</a></li>-->

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
                        <h1 class="page-head-line">Add Entries</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Person 
                        </div>
                        <div class="panel-body">
                        <form method = "GET" action="add-content.php">
                            <div class = "radio">
                                <label>
                                    <input type="radio" name="identity" id="optionActor" value="Actor" <?php echo (htmlspecialchars($_GET['identity'])=='Actor')?'checked':''?> />
                                    This is an Actor
                                </label>
                                <label>
                                    <input type="radio" name="identity" id="optionDirector" value="Director" <?php echo (htmlspecialchars($_GET['identity'])=='Director')?'checked':''?> />
                                    This is a Director
                                </label>
                            </div>
                            
                            <label>First Name : </label>
                                <input type="text" class="form-control" placeholder="Enter first name"  name="fname" value="<?php echo $_GET['fname'];?>"/>
                            <label>Last Name : </label>
                                <input type="text" class="form-control" placeholder="Enter last name"  name="lname" value="<?php echo $_GET['lname'];?>"/>
                            <label>Gender : </label>
                            <div class = "radio">
                                <label>
                                    <input type="radio" name="sex" id="optionFemale" value="Female" <?php echo (htmlspecialchars($_GET['sex'])=='Female')?'checked':''?> />
                                    FEMALE
                                </label>
                                <label>
                                    <input type="radio" name="sex" id="optionMale" value="Male" <?php echo (htmlspecialchars($_GET['sex'])=='Male')?'checked':''?> />
                                    MALE
                                </label>
                            </div>

                            <label>Date Of Birth : </label>
                                <input type="text" class="form-control" placeholder="YYYY-MM-DD"  name="dob" value="<?php echo htmlspecialchars($_GET['dob']);?>"/>
                            <label>Date Of Death : </label>
                                <input type="text" class="form-control" placeholder="Leave this blank if he/she still alives"  name="dod" value="<?php echo htmlspecialchars($_GET['dod']);?>"/>
                                <hr />
                            <button type="submit" class="btn btn-warning" value="addPerson"><span class="glyphicon glyphicon-envelope"></span> Add to DB
                        </form>
                        </div> <!-- end of panel-body -->
                        <!-- PHP for Add Person -->
                        <?php
                            //establish connection
                            $db_connection = new mysqli("localhost", "cs143", "", "CS143");
                            if($db_connection->connect_errno > 0){
                                die('Unable to connect to database [' . $db->connect_error . ']');
                            }
                            //get the user's input
                            $dbPersonType=trim($_GET["identity"]);
                            $dbFName=trim($_GET["fname"]);
                            $dbLName=trim($_GET["lname"]);
                            $dbSex=trim($_GET["sex"]);
                            $getDOB=trim($_GET["dob"]);
                            $getDOD=trim($_GET["dod"]);
                            $dbDOB=date_parse($getDOB);
                            $dbDOD=date_parse($getDOD);

                            //Query maxID to determine the new ID
                            $maxIDQuery="SELECT id FROM MaxPersonID";
                            $currentMaxID=$db_connection->query($maxIDQuery);
                            if($currentMaxID === FALSE){
                                printf("Database error, cannot fetch Max PersonID. \n");
                            }
                            $maxID = $currentMaxID->fetch_array(MYSQLI_NUM);
                            $newID = $maxID[0]+ 1;
                        
                            if($dbPersonType=="" && $dbFName=="" && $dbLName=="" && $dbSex=="" && $getDOB=="" && $getDOD==""){} //Everything is empty, do nothing
                            else if($dbPersonType==""){
                                echo "Please select Actor or Director.";
                            }
                            else if($dbFName=="" || $dbLName==""){
                                echo "Please enter the first name and last name.";
                            }
                            else if(preg_match('/[^A-Za-z\s\'-]/', $dbFName) || preg_match('/[^A-Za-z\s\'-]/', $dbLName)){
                                echo "Invalid name input! Only letters, - ' allowed";
                            }
                            else if(($getDOB=="")||(!checkdate($dbDOB["month"], $dbDOB["day"], $dbDOB["year"]))){
                                echo "You must specify a valid date of birth.";
                            }
                            else if(($getDOD!="")&&(!checkdate($dbDOD["month"], $dbDOD["day"], $dbDOD["year"]))){
                                echo "You must specify a valid date of death.";
                            }
                        
                            else{
                                //escape special string to avoid failure
                                $dbLName = mysqli_real_escape_string($dbLName);
                                $dbFName = mysqli_real_escape_string($dbFName);
        
                                if($dbPersonType=="Actor"){
                                    if($getDOD==""){
                                        $dbQuery = "INSERT INTO Actor VALUES('$newID', '$dbLName', '$dbFName', '$dbSex', '$getDOB', NULL)";
                                    }
                                    else{
                                        $dbQuery = "INSERT INTO Actor VALUES('$newID', '$dbLName', '$dbFName', '$dbSex', '$getDOB', '$getDOD')";
                                    }
                                }
                                //Director
                                else{
                                    if($getDOD==""){
                                        $dbQuery = "INSERT INTO Director VALUES('$newID', '$dbLName', '$dbFName', '$getDOB', NULL)";
                                    }
                                    else{
                                        $dbQuery = "INSERT INTO Director VALUES('$newID', '$dbLName', '$dbFName', '$getDOB', '$getDOD')";
                                    }
                                }
                                //Execute the query
                                if(!$db_connection->query($dbQuery)){
                                    die('Unable to execute INSERT [' . mysqli_error() .']');
                                }
                                //Update new Max ID after successfully executing query
                                if (!$db_connection->query("UPDATE MaxPersonID SET id=$newID WHERE id=$maxID")){
                                    die('Unable to execute UPDATE [' . mysqli_error() .']');
                                }
                            //present a success message`
                                echo "New $dbPersonType has been added! $dbPersonType id=$newID.";
                            }
                            //Free result set
                            mysqli_free_result($currentMaxID);
                            //Close database connection
                            mysql_close($db_connection);
                        ?>
                        <!-- END PHP Add Person -->
                        </div>
                    </div>
                    
                    <!-- ADD NEW MOVIE -->
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Movie
                        </div>
                       
                        <div class="panel-body">
                        <form method = "GET" action="add-content.php">
                            <label>Title : </label>
                                <input type="text" class="form-control" name="title" placeholder="The name of this movie" value="<?php echo $_GET['title'];?>"/>
                            <label>Company :  </label>
                                <input type="text" class="form-control" name="company" placeholder="The company produced this movie" value="<?php echo $_GET['company'];?>"/>
                            <label>Year :  </label>
                                <input type="text" class="form-control" name="year" placeholder="The year of this movie" value="<?php echo $_GET['year'];?>"/>
                            <label>MPAA Rating :  </label>
                                <select class="form-control" name="rate">
                                <option value="G">G</option>
                                <option value="NC-17">NC-17</option>
                                <option value="PG">PG</option>
                                <option value="PG-13">PG-13</option>
                                <option value="R">R</option>
                                <option value=NULL>N/A</option>
                                </select>
                            <label>Genre : </label>
                            <div class = "radio">
                                <label>
                                    <input type="radio" name="genre" value="Action" <?php echo (htmlspecialchars($_GET['genre'])=='Action')?'checked':''?> />
                                    Action
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Adult" <?php echo (htmlspecialchars($_GET['genre'])=='Adult')?'checked':''?> />
                                    Adult
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Adventure" <?php echo (htmlspecialchars($_GET['genre'])=='Adventure')?'checked':''?> />
                                    Adventure
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Animation" <?php echo (htmlspecialchars($_GET['genre'])=='Animation')?'checked':''?> />
                                    Animation
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Comedy" <?php echo (htmlspecialchars($_GET['genre'])=='Comedy')?'checked':''?> />
                                    Comedy
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Crime" <?php echo (htmlspecialchars($_GET['genre'])=='Crime')?'checked':''?> />
                                    Crime
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Documentary" <?php echo (htmlspecialchars($_GET['genre'])=='Documentary')?'checked':''?> />
                                    Documentary
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Drama" <?php echo (htmlspecialchars($_GET['genre'])=='Drama')?'checked':''?> />
                                    Drama
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Family" <?php echo (htmlspecialchars($_GET['genre'])=='Family')?'checked':''?> />
                                    Family
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Fantasy" <?php echo (htmlspecialchars($_GET['genre'])=='Fantasy')?'checked':''?> />
                                    Fantasy
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Horror" <?php echo (htmlspecialchars($_GET['genre'])=='Horror')?'checked':''?> />
                                    Horror
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Musical" <?php echo (htmlspecialchars($_GET['genre'])=='Musical')?'checked':''?> />
                                    Musical
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Mystery" <?php echo (htmlspecialchars($_GET['genre'])=='Mystery')?'checked':''?> />
                                    Mystery
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Romantic" <?php echo (htmlspecialchars($_GET['genre'])=='Romantic')?'checked':''?> />
                                    Romantic
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Sci-Fi" <?php echo (htmlspecialchars($_GET['genre'])=='Sci-Fi')?'checked':''?> />
                                    Sci-Fi
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Short" <?php echo (htmlspecialchars($_GET['genre'])=='Short')?'checked':''?> />
                                    Short
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Thriller" <?php echo (htmlspecialchars($_GET['genre'])=='Thriller')?'checked':''?> />
                                    Thriller
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="War" <?php echo (htmlspecialchars($_GET['genre'])=='War')?'checked':''?> />
                                    War
                                </label>
                                <label>
                                    <input type="radio" name="genre" value="Western" <?php echo (htmlspecialchars($_GET['genre'])=='Western')?'checked':''?> />
                                    Western
                                </label>
                            </div>
                            <!--
                            <label>Enter Message : </label>
                            <textarea rows="9" class="form-control"></textarea> -->
                            <hr />
                            <button type="submit" class="btn btn-warning"><span class="glyphicon glyphicon-envelope"></span> Add to DB
                    </form>
                    </div> 
                    <!-- end of panel-body -->
                    <!-- PHP for Add Person -->
                        <?php
                            //establish connection
                            $db_connection = new mysqli("localhost", "cs143", "", "CS143");
                            if($db_connection->connect_errno > 0){
                                die('Unable to connect to database [' . $db->connect_error . ']');
                            }
                            //get the user's input
                            $dbMovieTitle=trim($_GET["title"]);
                            $dbCompany=trim($_GET["company"]);
                            $dbYear=trim($_GET["year"]);
                            $dbRating=trim($_GET["rate"]);
                            $dbGenre=trim($_GET["genre"]);

                            //Query maxID to determine the new ID
                            $maxIDQuery="SELECT id FROM MaxMovieID";
                            $currentMaxID=$db_connection->query($maxIDQuery);
                            if($currentMaxID === FALSE){
                                printf("Database error, cannot fetch Max MovieID. \n");
                            }
                            $maxID = $currentMaxID->fetch_array(MYSQLI_NUM);
                            $newID = $maxID[0]+ 1;
                        
                            if($dbMovieTitle=="" && $dbCompany=="" && $dbYear=="" && $dbRating=="" && $dbGenre==""){} //Everything is empty, do nothing
                            else if($dbMovieTitle==""){
                                echo "Please Enter the title of this movie!";
                            }
                            else if($dbCompany==""){
                                echo "Please enter the company for this movie!";
                            }
                            else if(preg_match('/[^A-Za-z\s\'-]/', $dbMovieTitle) || preg_match('/[^A-Za-z\s\'-]/', $dbCompany)){
                                echo "Invalid name input! Only letters, - ' allowed";
                            }
                            else if($dbGenre==""){
                                echo "You must select a genre for this movie.";
                            }
                        
                            else{
                                //escape special string to avoid failure
                                $dbMovieTitle = mysqli_real_escape_string($dbMovieTitle);
                                $dbCompany = mysqli_real_escape_string($dbCompany);
        
                                if($dbRating==""){
                                    $dbQuery = "INSERT INTO Movie VALUES('$newID', '$dbMovieTitle', '$dbYear', NULL, '$dbCompany')";
                                }
                                //Director
                                else{
                                    $dbRating=mysqli_real_escape_string($dbRating);
                                    $dbQuery = "INSERT INTO Movie VALUES('$newID', '$dbMovieTitle', '$dbYear', '$dbRating', '$dbCompany')";
                                }
                                //Execute the query
                                if(!$db_connection->query($dbQuery)){
                                    die('Unable to execute INSERT [' . mysqli_error() .']');
                                }
                                //Update new Max ID after successfully executing query
                                if (!$db_connection->query("UPDATE MaxMovieID SET id=$newID WHERE id=$maxID")){
                                    die('Unable to execute UPDATE [' . mysqli_error() .']');
                                }
                            //present a success message`
                                echo "New $dbPersonType has been added! $dbPersonType id=$newID.";
                            }
                            //Free result set
                            mysqli_free_result($currentMaxID);
                            //Close database connection
                            mysql_close($db_connection);
                        ?>
                        <!-- END PHP Add Person -->
                </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Add Relations</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Movie - Actor Relation 
                        </div>
                        <div class="panel-body">
                        <form method = "GET" action="#">
                            <label>Role :  </label>
                                <input type="text" class="form-control" />
                            <hr />
                            <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-tag"></span> Check DB </a>&nbsp;
                        </form>
                        </div> <!-- end of panel-body -->
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Movie - Director Relation 
                        </div>
                        <div class="panel-body">
                        <form method = "GET" action="#">
                            <hr />
                            <a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-tag"></span> Check DB </a>&nbsp;
                        </form>
                        </div> <!-- end of panel-body -->
                        </div>
                    </div>


                </div>
    </div>
    <!-- CONTENT-WRAPPER SECTION END-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    &copy; Fall 2016 CS143 | By : Yiran Wang & Vivian(Ni) Zhang
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