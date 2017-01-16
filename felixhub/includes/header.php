<?php

include dirname(__FILE__)."/functions.php";
include dirname(__FILE__)."/../classes/Prep.php";
include dirname(__FILE__)."/../classes/Render.php";
include dirname(__FILE__)."/../classes/PrepDiary.php";
include dirname(__FILE__)."/../classes/DatabaseHandler.php";
// Include database connection and functions here.  See 3.1. 
include dirname(__FILE__)."/db_connect.php";
session_start(); 
// define variables and set to empty values
$search = "";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $search = test_input($_GET["search"]); 
    if (filter_var($search, FILTER_VALIDATE_URL)) {
        echo "<meta http-equiv=\"refresh\" content=\"0;URL='" . $search . "'\"/> ";
    } 
    
    if(strtolower($search == "porn")){
        echo "<meta http-equiv=\"refresh\" content=\"0;URL='http://www.gaymaletube.com/'\" />";    
    }
}
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title><? echo $pageTitle ?> | Felix Hub</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="/felixhub/font-awesome/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/felixhub/css/main.css">
        <link rel="stylesheet" href="/felixhub/css/animate.css">
    </head>

    <body>


        <div class="header">
            <!--<img src="/img/logo.png" / id ="logo">-->
            <div class="row search_row">
                <div class="col-md-2">
                    <a href="/"><img src="/felixhub/img/logo.png" / id="logo"></a>
                </div>
                <div class="col-md-10 search_container">
                    <form method="get" action="<?php echo htmlspecialchars($_SERVER[" PHP_SELF "]);?>">
                        <div class="input-group" id="search_group">
                            <input id="search" type="text" class="form-control" name="search" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <nav class="navbar">
                <div class="container-fluid">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/">Home</a></li>
                            <li><a href="#">Felix</a></li>
                            <li><a href="#">Shaun</a></li>
                        </ul>

                        <ul class="nav navbar-nav navbar-right">
                            
							<?if (!isset($_SESSION["username"])){?>
								<li><a href="/register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
								<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login
                                <span class="caret"></span></a>
                                <div class="dropdown-menu login_menu">
                                    <!--<form>
                                        <div class="form-group">
                                            <label for="email">Email address:</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="pwd">Password:</label>
                                            <input type="password" class="form-control" id="pwd">
                                        </div>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> Remember me</label>
                                        </div>
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </form>-->
									<?include __DIR__ . "/../login.php";?>

                                </div>
                            </li>
							<?}else{?>
								<li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?echo $_SESSION["username"]; ?>
                                <span class="caret"></span></a>
                                <div class="dropdown-menu login_menu">
                                    <p>Do you want to change user? <a href="/includes/logout.php">Log out</a>.</p>
                                </div>
                            </li>
							<?}?>
                            
                        </ul>
                    </div>
                </div>
            </nav>

        </div>