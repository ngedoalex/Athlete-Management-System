<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>System | Configuration</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">


    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
        <link rel="stylesheet" href="assets/css/lib/chosen/chosen.min.css">


  <!--   <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS database3";
if ($conn->query($sql) === TRUE) {
    include_once('import.php');
    
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();

?>

<?php error_reporting(0); ?>
<body style="background:black;" >

       

    <div class="container mt-5" style="background: #fff; width: 40%;">
<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"  style="background: #343a40; ">
 <h1 style="color:white; padding:10px; text-align: center;">Configuration Settings</h1>
    </div>

</div>

<div class="row mt-2">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12 col-xs-12">
                                    <form method="POST" action="check_login.php">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $_GET['username']?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>

                        
                            <button type="submit" name="submit" class="btn btn-success btn-flat btn-block mb-3 btn-lg">Save Configuration</button>
                 
                    </form>
    </div>

</div>
<div class="row">
<!--     <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"  style="background: #343a40; padding:10px;">
    <center style="color:#868e96;">
        Copyright &copy; 2018 Footer<br>
    </center>
    </div> -->

</div>
</div>









</body>
</html>
