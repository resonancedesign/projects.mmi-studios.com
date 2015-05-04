<?php
    // Connect to database
    include_once "scripts/connect_me.php";   
    mysql_query("set names 'utf8'");

    ////////////////////
    //  LOG-IN CHECK  //
    ////////////////////
    //Checks if there is a login cookie
    if(isset($_COOKIE['ID_my_site'])) { 
        //if there is, it logs you in and directes you to the members page
        $username = $_COOKIE['ID_my_site'];
        $pass = $_COOKIE['Key_my_site'];
        $check = mysql_query("SELECT * FROM users WHERE username = '$username'")or die(mysql_error());
        while($info = mysql_fetch_array( $check )) {
            if ($pass != $info['password']) { 
                header("Location: index.php");
            }
            else {}
        }
    }
    else {
        header("Location: index.php");
    }

    ////////////////////////////////
    //  WEB DEV PROJECTS DISPLAY  //
    ////////////////////////////////
    $sqlTalks = mysql_query("SELECT * FROM projects WHERE category='webdev' ORDER BY placement ASC");

    $webDevDisplayList = ""; // Initialize the variable here

    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $title = $row["title"];
        $caption = $row["caption"];
        $href = $row["href"];
        $external = $row["external"];
        $thumb = $row["thumb"];
        $webDevDisplayList .='
            <div class="col-md-3 portfolio-item">
                <a href="' . $href . '" target="_blank">
                    <img class="img-responsive" src="imgs/thumbs/' . $thumb . '" alt="' . $title . '">
                </a>
                <p><a class="btn btn-default pull-right" href="#" role="button">Details...</a></p>
                <h3>' . $title . ' <a href="' . $external . '" target="_blank"><span class="muted-text">' . $caption . '</span></a></h3>
            </div>
        ';
    }

    ////////////////////////////////
    //  DSP DEV PROJECTS DISPLAY  //
    ////////////////////////////////
    $sqlTalks = mysql_query("SELECT * FROM projects WHERE category='dspdev' ORDER BY placement ASC");

    $dspDevDisplayList = ""; // Initialize the variable here

    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $title = $row["title"];
        $caption = $row["caption"];
        $href = $row["href"];
        $external = $row["external"];
        $thumb = $row["thumb"];
        $dspDevDisplayList .='
            <div class="col-md-3 portfolio-item">
                <a href="' . $href . '"> target="_blank"
                    <img class="img-responsive" src="imgs/thumbs/' . $thumb . '" alt="' . $title . '">
                </a>
                <p><a class="btn btn-default pull-right" href="#" role="button">Details...</a></p>
                <h3>' . $title . ' <a href="' . $external . '" target="_blank"><span class="muted-text">' . $caption . '</span></a></h3>
            </div>
        ';
    }

    ///////////////////////////////////////
    //  GRAPHIC DESIGN PROJECTS DISPLAY  //
    ///////////////////////////////////////
    $sqlTalks = mysql_query("SELECT * FROM projects WHERE category='graphicdesign' ORDER BY placement ASC");

    $graphicDesignDisplayList = ""; // Initialize the variable here

    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $title = $row["title"];
        $caption = $row["caption"];
        $href = $row["href"];
        $external = $row["external"];
        $thumb = $row["thumb"];
        $graphicDesignDisplayList .='
            <div class="col-md-3 portfolio-item">
                <a href="' . $href . '" target="_blank">
                    <img class="img-responsive" src="imgs/thumbs/' . $thumb . '" alt="' . $title . '">
                </a>
                <p><a class="btn btn-default pull-right" href="#" role="button">Details...</a></p>
                <h3>' . $title . ' <a href="' . $external . '" target="_blank"><span class="muted-text">' . $caption . '</span></a></h3>
            </div>
        ';
    }

    //////////////////////////////////
    //  UI DESIGN PROJECTS DISPLAY  //
    //////////////////////////////////
    $sqlTalks = mysql_query("SELECT * FROM projects WHERE category='uidesign' ORDER BY placement ASC");

    $uiDesignDisplayList = ""; // Initialize the variable here

    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $title = $row["title"];
        $caption = $row["caption"];
        $href = $row["href"];
        $external = $row["external"];
        $thumb = $row["thumb"];
        $uiDesignDisplayList .='
            <div class="col-md-3 portfolio-item">
                <a href="' . $href . '" target="_blank">
                    <img class="img-responsive" src="imgs/thumbs/' . $thumb . '" alt="' . $title . '">
                </a>
                <p><a class="btn btn-default pull-right" href="#" role="button">Details...</a></p>
                <h3>' . $title . ' <a href="' . $external . '" target="_blank"><span class="muted-text">' . $caption . '</span></a></h3>
            </div>
        ';
    }

    /////////////////////////////////////
    //  SOUND DESIGN PROJECTS DISPLAY  //
    /////////////////////////////////////
    $sqlTalks = mysql_query("SELECT * FROM projects WHERE category='sounddesign' ORDER BY placement ASC");

    $soundDesignDisplayList = ""; // Initialize the variable here

    while($row = mysql_fetch_array($sqlTalks)){
        $id = $row["id"];
        $title = $row["title"];
        $caption = $row["caption"];
        $href = $row["href"];
        $external = $row["external"];
        $thumb = $row["thumb"];
        $soundDesignDisplayList .='
            <div class="col-md-3 portfolio-item">
                <a href="' . $href . '" target="_blank">
                    <img class="img-responsive" src="imgs/thumbs/' . $thumb . '" alt="' . $title . '">
                </a>
                <p><a class="btn btn-default pull-right" href="#" role="button">Details...</a></p>
                <h3>' . $title . ' <a href="' . $external . '" target="_blank"><span class="muted-text">' . $caption . '</span></a></h3>
            </div>
        ';
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
                <h2 id="web-dev" class="project-headers">Web Dev
                    <small>Listing of all current and on-going projects.</small>
                </h2>
            </div>
            <?php print "$webDevDisplayList"; ?>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 id="dsp-dev" class="project-headers">DSP Dev
                    <small>Listing of all current and on-going projects.</small>
                </h2>
            </div>
            <?php print "$dspDevDisplayList"; ?>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 id="graphic-design" class="project-headers">Graphic Design
                    <small>Listing of all current and on-going projects.</small>
                </h2>
            </div>
            <?php print "$graphicDesignDisplayList"; ?>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 id="ui-design" class="project-headers">UI Design
                    <small>Listing of all current and on-going projects.</small>
                </h2>
            </div>
            <?php print "$uiDesignDisplayList"; ?>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <h2 id="sound-design" class="project-headers">Sound Design
                    <small>Listing of all current and on-going projects.</small>
                </h2>
            </div>
            <?php print "$soundDesignDisplayList"; ?>
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
                    <p>Copyright &copy; Your Website 2014</p>
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