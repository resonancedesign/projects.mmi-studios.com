<?php
    // Connect to database
    include_once "scripts/connect_me.php";   
    mysql_query("set names 'utf8'");

    //Checks if there is a login cookie
    if(isset($_COOKIE['ID_my_site'])) { //if there is, it logs you in and directes you to the members page
        $username = $_COOKIE['ID_my_site'];
        $pass = $_COOKIE['Key_my_site'];
        $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
        while($info = mysql_fetch_array( $check )) {
            if ($pass != $info['password']) {}
            else {
                header("Location: projects.php");
            }
        }
    }

    //if the login form is submitted
    if (isset($_POST['submit'])) { // if form has been submitted makes sure they filled it in
        if(!$_POST['username'] | !$_POST['pass']) {
            die('You did not fill in a required field.');
        }
        // checks it against the database
        $check = mysql_query("SELECT * FROM users WHERE username = '".$_POST['username']."'")or die(mysql_error());

        //Gives error if user dosen't exist
        $check2 = mysql_num_rows($check);
        if ($check2 == 0) {
            die('That user does not exist in our database.');
        }
        while($info = mysql_fetch_array( $check )) {
            $_POST['pass'] = stripslashes($_POST['pass']);
            $info['password'] = stripslashes($info['password']);
            $_POST['pass'] = md5($_POST['pass']);

            //gives error if the password is wrong
            if ($_POST['pass'] != $info['password']) {
                die('Incorrect password, please try again.');
            }
            else {
                // if login is ok then we add a cookie
                $_POST['username'] = stripslashes($_POST['username']);
                $hour = time() + 2880;
                setcookie("ID_my_site", $_POST['username'], $hour);
                setcookie("Key_my_site", $_POST['pass'], $hour);

                //then redirect them to the members area
                header("Location: projects.php");
            }
        }
    }
    else {
    // if they are not logged in
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MMI Studios - HQ Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/4-col-portfolio.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <?php include_once "includes/main_nav.php"; ?>
    <!-- /.nav -->

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <!-- <div class="row">
            <div class="col-lg-12">
                <h1 id="page-header" class="page-header">Projects
                    <small>Listing of all current and on-going projects.</small>
                </h1>
            </div>
        </div> -->
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 id="dsp-dev" class="project-headers">Sign In
                    <small>Please sign in to continue... .. .</small>
                    <h3 id="errorsMsg"></h3>
                </h2>
                <form id="loginForm" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        <label for="inputUsername">Username</label>
                        <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="pass" class="form-control" id="inputPassword" placeholder="Password">
                    </div>
                    <button id="submitForm" type="submit" name="submit" class="btn btn-default pull-right">Sign In</button>
                    <p class="no-margins"><a href="forgot-password.php">Forgot password</a></p>
                    <a href="forgot-username.php">Forgot username</a>
                    
                </form>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Site Links -->
        <div class="row text-center">
            <div class="col-lg-12">
                <a href="http://www.mmi-studios.com" target="_blank">MMI Studios</a> - 
                <a href="http://www.resonance-designs.com" target="_blank">Resonance Design</a> - 
                <a href="http://www.dspcentral.info" target="_blank">DSP Central</a> - 
                <a href="http://www.grossnationalprodukt.com" target="_blank">Gross National Produkt</a>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; MMI Studios 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="scripts/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="scripts/bootstrap.min.js"></script>

</body>

</html>
<?php
    }
?>