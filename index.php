
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['signin']))
{
$uname=$_POST['username'];
$password=md5($_POST['password']);
$sql ="SELECT EmailId,Password,Status,id FROM tblemployees WHERE EmailId=:uname and Password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':uname', $uname, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
 foreach ($results as $result) {
    $status=$result->Status;
    $_SESSION['eid']=$result->id;
  } 
if($status==0)
{
$msg="Your account is Inactive. Please contact admin";
} else{
$_SESSION['emplogin']=$_POST['username'];
echo "<script type='text/javascript'> document.location = 'myprofile.php'; </script>";
} }

else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?><!DOCTYPE html>
<html lang="en">
    <head>
        
        <!-- Title -->
        <title>ELMS | Home Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <meta charset="UTF-8">
        <meta name="description" content="Responsive Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link type="text/css" rel="stylesheet" href="assets/plugins/materialize/css/materialize.css"/>
             <link href="assets/css/materialdesign.css" rel="stylesheet">
        <link href="assets/plugins/material-preloader/css/materialPreloader.min.css" rel="stylesheet">        

          
        <!-- Theme Styles -->
        <link href="assets/css/alpha.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
        <style>
            .text-danger {
                color: #ee6e73 !important;
            }
            input:not([type]).valid, input:not([type]):focus.valid,
            input[type=text].valid,
            input[type=text]:focus.valid,
            input[type=password].valid,
            input[type=password]:focus.valid,
            input[type=email].valid,
            input[type=email]:focus.valid,
            input[type=url].valid,
            input[type=url]:focus.valid,
            input[type=time].valid,
            input[type=time]:focus.valid,
            input[type=date].valid,
            input[type=date]:focus.valid,
            input[type=datetime].valid,
            input[type=datetime]:focus.valid,
            input[type=datetime-local].valid,
            input[type=datetime-local]:focus.valid,
            input[type=tel].valid,
            input[type=tel]:focus.valid,
            input[type=number].valid,
            input[type=number]:focus.valid,
            input[type=search].valid,
            input[type=search]:focus.valid,
            textarea.materialize-textarea.valid,
            textarea.materialize-textarea:focus.valid {
            border-bottom: 1px solid #ee6e73;;
            box-shadow: 0 1px 0 0 #ee6e73;;
            }
        </style>
        
      
        
    </head>
    <body>

                <nav class="navbar navbar-expand-lg navbar-light py-3">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-center align-items-center" id="navbarNavAltMarkup">
          <div class="navbar-nav d-flex justify-content-center align-items-center">
          <!--   <a class="nav-item text-white font-weight-bold nav-link active ml-3" href="#">Home <span class="sr-only">(current)</span></a> -->
          <a class="nav-item text-white font-weight-bold nav-link ml-3" href="index.php" style="text-align:center">Employee Login</a> 
          <a class="nav-item text-white font-weight-bold nav-link ml-3" href="admin/">Admin Login</a>
            
  
          </div>
          </div>
        </nav>

            <main class="mn-inner mt-5">
                <div class="row d-flex justify-content-center align-items-center">
        <h4 class="font-weight-bold text-center text-danger">Welcome To KVN Naik College</h4>
        
                    <div class="col-md-12">
                        <div class="row">
             <div class="col-md-3"></div>
               
                          <div class="col-md-6 d-flex justify-content-center align-items-center">
                              <div class="card white darken-1">

                                  <div class="card-content ">
                                      <span class="card-title text-danger" style="font-size:20px;text-align: center;">Employee Login</span>
                                         <?php if($msg){?><div class="errorWrap"><strong>Error</strong> : <?php echo htmlentities($msg); ?> </div><?php }?>
                                       <div class="row">
                                           <form class="col col-md-12 " name="signin" method="post">
                                               <div class="input-field col s12">
                                                   <input id="username" type="text" name="username" class="validate" placeholder="Enter Registered Email Id" required >
                                                   <label for="email"></label>
                                                   <label for="email">Enter Username</label>
                                               </div>
                                               <div class="input-field col col-md-12">
                                                   <input id="password" type="password" class="validate" name="password" autocomplete="off" placeholder="Enter Password" required>
                                                   <label for="password"></label>
                                                   <label for="email">Enter Password</label>
                                               </div>
                                               <div class="col col-md-12 center m-t-sm">
                                                
                                                   <input type="submit" name="signin" value="Login" class=" waves-effect waves-light btn ">
                                                  <a class="waves-effect waves-grey" href="forgot-password.php" style="margin-bottom: 10px; margin-left: 10px;">Emp Password Recovery?</a>
                                               </div>
                                           </form>
                                      </div>
                                  </div>
                              </div>
                          </div>
              <div class="col-md-3"></div>
              </div>
                    </div>
                </div>
            </main>
        
        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.2.0.min.js"></script>
        <script src="assets/plugins/materialize/js/materialize.min.js"></script>
        <script src="assets/plugins/material-preloader/js/materialPreloader.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/js/alpha.min.js"></script>
        
    </body>
</html>