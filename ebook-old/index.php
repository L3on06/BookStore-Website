<?php 
    include('Components/Header.php');
    $_SESSION['page'] = 'Home';
    
  if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
  } 
    include('Components/Hero.php');
    include('Components/Slider.php');
    include('Components/Footer.php');
 ?>