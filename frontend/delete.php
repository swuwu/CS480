<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog - Business Casual - Start Bootstrap Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/business-casual.css" rel="stylesheet">
    <link href="other.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="brand">Blockchain Poll</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Blockchain Poll</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about/index.html">About</a>
                    </li>
                    <li>
                        <a href="creator/index.html">Create</a>
                    </li>
                    <li>
                        <a href="voter/index.php">Vote</a>
                    </li>
                    <li>
                        <a href="results/index.php">Results</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Vote</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12 text-center">

                    <?php
                    $servername = "localhost";
                    $username = "cs480";
                    $password = "password";
                    $database = "polls";

                    $conn = new mysqli($servername, $username, $password, $database);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error());
                    }

                    // get info
                    $poll_name = $_GET["poll"];
                    $creator = $_GET["creator"];
                    $table = $creator . ":" . $poll_name;
                    $table = strtolower($table);
                    $voter_table = "vote:" . $creator . ":" . $poll_name;
                    $voter_table = strtolower($voter_table);

                    // delete table
                    $sql = "DROP TABLE `" . $table . "`";
                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "<b>Error: </b>" . $conn->error;
                    }

                    // delete voter table
                    $sql = "DROP TABLE `" . $voter_table . "`";
                    if ($conn->query($sql) === TRUE) {
                    } else {
                        echo "<b>Error: </b>" . $conn->error;
                    }

                    // remove from creators table
                    $sql = "DELETE FROM creators WHERE poll='" 
                        . $poll_name . "'";
                    if ($conn->query($sql) === TRUE) {
                        echo "<b>Poll Deleted: </b>" . $poll_name;
                    } else {
                        echo "<b>Error: </b>" . $conn->error;
                    }

                    ?>

                    <hr>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; Spring 2017</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>


</body>
                
</html>
