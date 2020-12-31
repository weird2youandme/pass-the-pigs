<?php

session_start();

if(!isset($_SESSION['usercount'])or isset($_POST['reset'])){
$_SESSION['usercount'] = 0;    
$_SESSION['users']=array();
$_SESSION['score']=array();
$_SESSION['round']=1;
$_SESSION['points']=0;
$_SESSION['turn']=0;
$_SESSION['spin']=0;
} else {
if(isset($_POST['add'])){
   array_push($_SESSION['users'],$_POST['name']);
   array_push($_SESSION['score'],0);
   $_SESSION['usercount']= $_SESSION['usercount']+1;
 }
if(isset($_POST['ready'])){
  header('Location: ptp.php');
  exit;
  }
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php  if($_SESSION['spin']==1) echo ' <meta http-equiv="refresh" content="2">';?>
  <title>Pass the Pigs Online</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 900px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      padding-top: 20px;
      background-color: #182089;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height:auto;} 
    }
  
  .red{
    background-color: #FA0909;
      color: white;
  }  
 .go{
    background-color: #FA0909;
      color: white;
  }  
.well {
    min-height: 20px;
    padding: 5px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border: 1px solid #e3e3e3;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
}
  </style>
</head>
<body>

 
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <?php 
       for ($x = 0; $x <= $_SESSION['usercount']-1; $x++) {
                 echo '<div class="well"><h1>'.$_SESSION['users'][$x].'</h1></div>';
       }        
      ?>
  
    </div>
     <div class="col-sm-8 ">
        <form action='' method='post'>
            <input type="text" name="name" />
            <button type="submit" name='add' class="btn btn-danger btn-lg">Add Player</button><p></p>
            <button type="submit" name='ready' class="btn btn-primary btn-lg">Begin Game</button><p></p>        
         <button type="submit" name= 'reset' class="btn btn-warning btn-lg">Reset Game</button><p></p>
        </form>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Playing pass the pigs is fun, I have nothing more to say about that....</p>
</footer>

</body>
</html>
