<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>

    <?php session_start();
    if(empty($_SESSION['admin_user_id'])){

    }else{
        
        header('location:admin.php');
    } ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>System | Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/djemfcst-logo.png">

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

<?php error_reporting(0); ?>
<body style="background:black;" >

       
<!-- <script>
  try {
  var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
  var recognition = new SpeechRecognition();
}
catch(e) {
  console.error(e);
  $('.no-browser-support').show();
  $('.app').hide();
}

function readOutLoud(message) {
  var speech = new SpeechSynthesisUtterance();

  // Set the text and voice attributes.
  speech.text = message;
  speech.volume = 1;
  speech.rate = 1;
  speech.pitch = 4;
  
  window.speechSynthesis.speak(speech);
}
function clickme() {
    var content = document.getElementById('message').value;
    readOutLoud(content);
  }

</script> -->
    <div class="container mt-3" style="background: #fff; ">
<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"  style="background: #343a40; ">
 <h1 style="color:white; padding:10px; text-align: center;">ATHLETIC MEET GAME RESULT MATRIX</h1>
    </div>

</div>

<div class="row mt-1" style="">
    <div class="col-lg-9 col-xl-9 col-md-8 col-sm-12 col-xs-12" style="padding:0">
  
                    
<img src="images/banner.jpg" class="col-sm-12" style="padding: 2px;">
                               
                                    
                                                 
                   

    </div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-xs-12">
                                        <?php if($_GET['error']=="mismatch"){?>
                                                                <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                            <span class="badge badge-pill badge-danger">Error</span>
                                                Username or password mismatch.
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } ?>
                                        <?php if($_GET['error']=="forgot"){?>
                                                                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">Success</span>
                                                Request successfully send!
                                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php } ?>
        <div class="card card-secondary">
                            <div class="card-header">
                                <strong class="card-title">User Login</strong>

                            </div>
                            <div class="card-body">

                    <form method="POST" action="check_login.php">
                        <div class="form-group">
                            <label>User</label>
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $_GET['username']?>">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                   
                            <label class="">
                                <a href="#forgot" data-toggle="modal">Forgotten Password?</a>
                            </label>

                        </div>
                        
                            <button type="submit" name="submit" class="btn btn-success btn-flat btn-block">Sign in</button>
                 
                    </form>
                        </div>

    </div>
</div>
</div>
<div class="row">
    <div class="col-lg-12 col-xl-12 col-md-12 col-sm-12"  style="background: #343a40; padding:10px;">
    <center style="color:#868e96;">
        Copyright &copy; 2018 Athletic Meet Game Result Matrix<br>Visit my facebook: <a href="https://facebook.com/imarkpatric" target="_blank">@imarkpatric</a>
    </center>
    </div>

</div>
</div>
               <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
                    <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">

                          <form method="POST" action="save-notification.php?type=forget-pass" onsubmit="return confirm('Submit your request. \nClick OK to Continue, Cancel to review your input..')">
                              <div class="modal-header">
                                <h5 class="modal-title" id="staticModalLabel">Request to Change Password</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <label id="">Username</label> <label id="error" style="color:red;"></label>
                                <input type="text" name="username" id="abbr" class="form-control" placeholder="Enter your username" required="">
                                <label>Purpose</label>
                                <input type="text" name="purpose" class="form-control" placeholder="Enter your purpose on changing your password">
                 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="reset" class="btn btn-info">Reset</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                          </form>

                        </div>
                    </div>
                </div>






<?php include'js.php';?>
             <script type="text/javascript">
                        $('#abbr').blur(function() {
                          var abbr=document.getElementById('abbr').value;
                                     //ajax request
                            $.ajax({
                                url: "check-user.php",
                                data: {
                                    'abbr' : $('#abbr').val()
                                },
                                dataType: 'json',
                                success: function(data) {
                                    if(data.result){
                                  document.getElementById('error').innerHTML='';
                                    }       
                                    else{
                                      document.getElementById('error').innerHTML=abbr+' not found!';
                                      document.getElementById('abbr').value="";
                                      document.getElementById('abbr').focus();
                                    }
                                },
                                error: function(data){
                                    alert('Error')
                                }
                            });
                        });
                    </script>

</body>
</html>
