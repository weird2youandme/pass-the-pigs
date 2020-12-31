<?php

$rnd1 = 0;
$rnd2=0;
$roll = 0;
$pigout=False;
$img1 = '7.jpg';
$img2 = '8.jpg';

session_start();

if(isset($_POST['return'])){
  header('Location: creategame.php');
  exit;
    
}
$max = random_int(1,99);
    for ($x = 0; $x < $max; $x++) {
    $rnd1 = random_int(1, 999);
    $rnd2 = random_int(1, 999);
    }

if(!isset($_SESSION['round']) or isset($_POST['reset'])){
$_SESSION['round']=1;
$_SESSION['points']=0;
$_SESSION['turn']=0;
$_SESSION['spin']=0;
} else {


if(isset($_POST['hard'])){
    $_SESSION['spin']=1;
    $img1 = 'pigs1.gif';
    $img2 = 'pigs1.gif';
    
    } else {
        
   if($_SESSION['spin']==1){
    
// Calculate the result
     
    switch (true){
        case $rnd1 <= 349:
            $pig = 10;
            $img1 = '1.jpg';
            break;
        case $rnd1 <= 698:
            $pig = 20;
            $img1 = '2.jpg';
            break;
        case $rnd1 <= 875:
            $pig = 30;
            $img1 = '3.jpg';
            break;
        case $rnd1 <= 963:
            $pig = 40;
            $img1 = '4.jpg';
            break;
        case $rnd1 <= 993:
            $pig = 50;
            $img1 = '5.jpg';
            break;
            
        default:
            $pig = 60;
            $img1 = '6.jpg';
            break;
    }
  
    switch (true){
        case $rnd2 <= 349:
            $pig = $pig + 1;
            $img2 = '1.jpg';
            break;
        case $rnd2 <= 698:
            $pig = $pig + 2;
            $img2 = '2.jpg';
            break;
        case $rnd2 <= 875:
            $pig = $pig + 3;
            $img2 = '3.jpg';
            break;
        case $rnd2 <= 963:
            $pig = $pig + 4;
            $img2 = '4.jpg';
            break;
        case $rnd2 <= 993:
            $pig = $pig + 5;
            $img2 = '5.jpg';
            break;
        default:
            $pig = $pig + 6;
            $img2 = '6.jpg';
            break;
    }

    Switch ($pig){
        case 11:
            $roll = 1;
            break;        
        case 21:
            $roll = 0;
            break;         
        case 31:
            $roll = 5;
            break;         
        case 41:
            $roll = 5;
            break;         
        case 51:
            $roll = 10;
            break;         
        case 61:
            $roll = 15;
            break;         
        case 12:
            $roll = 0;
            break;        
        case 22:
            $roll = 1;
            break;         
        case 32:
            $roll = 5;
            break;         
        case 42:
            $roll = 5;
            break;         
        case 52:
            $roll = 10;
            break;         
        case 62:
            $roll = 15;
            break;         
        case 13:
            $roll = 5;
            break;        
        case 23:
            $roll = 5;
            break;         
        case 33:
            $roll = 20;
            break;         
        case 43:
            $roll = 10;
            break;         
        case 53:
            $roll = 15;
            break;         
        case 63:
            $roll = 20;
            break;         
        case 14:
            $roll = 5;
            break;        
        case 24:
            $roll = 5;
            break;         
        case 34:
            $roll = 10;
            break;         
        case 44:
            $roll = 20;
            break;         
        case 54:
            $roll = 15;
            break;         
        case 64:
            $roll = 20;
            break;         
        case 15:
            $roll = 10;
            break;        
        case 25:
            $roll = 10;
            break;         
        case 35:
            $roll = 15;
            break;         
        case 45:
            $roll = 15;
            break;         
        case 55:
            $roll = 40;
            break;         
        case 65:
            $roll = 25;
            break;         
        case 16:
            $roll = 15;
            break;        
        case 26:
            $roll = 15;
            break;         
        case 36:
            $roll = 20;
            break;         
        case 46:
            $roll = 20;
            break;         
        case 56:
            $roll = 25;
            break;         
        case 66:
            $roll = 60;
            break;         
        
    }
    $_SESSION['spin']=0;
 if($roll == 0){
        $pigout=True;
        $_SESSION['points']= 0;
    } else {
      $_SESSION['points'] = $_SESSION['points']+$roll;
    }
} 
}
if(isset($_POST['stop']) or $pigout){
    $_SESSION['score'][$_SESSION['turn']] = $_SESSION['score'][$_SESSION['turn']] + $_SESSION['points'];
             
 if($_SESSION['turn']>=$_SESSION['usercount']-1){
          $_SESSION['turn'] = 0;
          $_SESSION['round']=$_SESSION['round']+1;
        } else {
            $_SESSION['turn'] = $_SESSION['turn'] +1;
       }
          
     $_SESSION['points']=0;  
             
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
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
          if ($_SESSION['turn'] == $x){
                 echo '<div class="well"><h1 class="go">'.$_SESSION['users'][$x].': '.$_SESSION['score'][$x].'</h1></div>';
             }else {
                 echo '<div class="well"><h1>'.$_SESSION['users'][$x].': '.$_SESSION['score'][$x].'</h1></div>';
             }
       }        
      ?>
  
    </div>
    <div class="col-sm-8 text-left"> 
      <h1 class="container-fluid text-center">Pass the Pigs by Hasbergo</h1>
      <div  class="container-fluid text-center">
      <img src=<?php echo '"'.$img1.'"';?> class="img-rounded" width="500" height="700">
      <img src=<?php echo '"'.$img2.'"';?> class="img-rounded" width="500" height="700">
      </div> 
    </div>
    <div class="col-sm-2 sidenav">
        <div class="well"><h1>Round: <?php echo $_SESSION['round'];?></h1></div>
        <form action='' method='post'>
            <button type="submit" name='stop' class="btn btn-danger btn-lg">Stop!  Take the points</button><p></p>
            <button type="submit" name='hard' class="btn btn-primary btn-lg">Shake and toss Pigs</button><p></p>    
            <button type="submit" name='fake' class="btn btn-success btn-lg">Shake and Hold pigs</button><p></p>       
        <div class="well"><h3>Current player</h3><h1>
        <?php echo $_SESSION['users'][$_SESSION['turn']];?>
        </h1></div>
        <button type="submit" name= 'reset' class="btn btn-warning btn-lg">Reset Game</button><p></p>
        <button type="submit" name= 'return' class="btn btn-dark btn-lg">Return to create game</button><p></p>
        </form>
        <div class="well"><h1>Turn Points:  <?php echo $_SESSION['points'];?></h1></div>
        <div class="well"><?php
                      if($pigout){
                        echo '<h1 class="red"> PIGOUT</h1>';
                      } else if ($_SESSION['spin']==1){
                         echo '<h1 class="blue"> Spinning </h1>';
                      } else{
                         echo '<h1>Current roll :  '.$roll. '</h1';
                     }?>
         </div>    
    </div>
  </div>
</div>

<footer class="container-fluid text-center">
  <p>Playing pass the pigs is fun, I have nothing more to say about that....</p>
  
  <?php echo $rnd1.'-'.$rnd2;
   if($pigout) echo '<audio controls="controls" autoplay="autoplay"><source src="pig4.wav" type="audio/mpeg"></audio>';?>
</footer>

</body>
</html>
