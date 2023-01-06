<?php 
    session_start();


    $path = $_SERVER['SCRIPT_NAME'];
    $pages = [
        '/orders/index.php',
        '/profile.php'
    ];

    // roles ----------------------
    if(isset($_SESSION['role'])) {
        if($_SESSION['role'] === 'client') {
            if(!in_array($path, $pages)) {
                die('<center>You doesnt have permission to view this page - <a href="/eBook/index.php">back</a>.</center>');
            }
        }
    }


    // roles ----------------------



    $page = (isset($_SESSION['page'])) ? ucfirst($_SESSION['page']) : 'Home';

    if(count($_COOKIE) > 0) {
        $auth_sessions = ['user_id', 'username', 'role', 'is_loggedin'];

        foreach($_COOKIE as $ckey => $cvalue) {
            if(in_array($ckey, $auth_sessions)) {
                $_SESSION[$ckey] = $cvalue;
            }
        }
    }

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'sign_out') {
            unset($_SESSION['user_id']);
            unset($_SESSION['username']);
            unset($_SESSION['role']);
            unset($_SESSION['is_loggedin']);

            $expire = -1;

            unset($_COOKIE['user_id']);
            unset($_COOKIE['username']);
            unset($_COOKIE['role']);
            unset($_COOKIE['user_id']);

            setcookie('user_id', null, $expire);
            setcookie('username', null, $expire);
            setcookie('role', null, $expire);
            setcookie('is_loggedin', null, $expire);

            header('Location: /eBook/index.php');
        }
    }
?>



<!DOCTYPE html>
<html lang="en">  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Custum CSS -->
    <link rel="stylesheet" type="text/css" href="./assets/css/custom.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Swiper js "slider" -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <title><?= $page ?> | Book Store</title>

</head>
<body class="d-flex flex-column min-vh-100">
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="/eBook/index.php">Book Store</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <?php if(isset($_SESSION['is_loggedin'])): ?>
      <li class="nav-item ">
            <li> <a class="nav-link active" aria-current="page" href="/eBook/index.php">Home</a></li>
        </li>
            <li class="nav-item ">
            <li>  <a class="nav-link" href="/ebook/shop.php">Shop</a></li>
        </li>
           <li class="nav-item">
                            <a class="nav-link" href="/ebook/cart.php">Cart 
                                <?php if(isset($_SESSION['cart'])) { ?>
                                    (<?= count($_SESSION['cart']) ?>)
                                <?php } else { ?>
                                    (0)
                                <?php } ?>
                            </a>
                            </li>
              <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Dashboard</a>
          <ul class="dropdown-menu">
            <li> <a class="nav-link active" aria-current="page" href="/eBook/dashboard/index.php">Home</a></li>
            <li> <a class="nav-link" href="/eBook/dashboard/slides/index.php">Slides</a></li>
            <li> <a class="nav-link" href="/eBook/dashboard/BookCategories/index.php">Book Categories</a></li>
            <li>   <a class="nav-link" href="/eBook/dashboard/SliderCategories/index.php">Slider Categories</a></li>
            <li>  <a class="nav-link" href="/eBook/dashboard/books/index.php">Books</a></li>
            <li>   <a class="nav-link" href="/eBook/dashboard/orders/index.php">Orders</a></li>

        </ul>
        </li>
              <?php else:?>
                <li class="nav-item">
                      <a class="nav-link" href="/ebook/shop.php">Shop</a>
                    </li>
                     <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/ebook/index.php">Komedi</a></li>
                        <li><a class="dropdown-item" href="/ebook/index.php">Romance</a></li>
                        <li><a class="dropdown-item" href="/ebook/index.php">Kid</a></li>
                        <li><a class="dropdown-item" href="/ebook/index.php">Action</a></li>
                    </ul>
                    </li>
                     <li class="nav-item">
                            <a class="nav-link" href="cart.php">Cart 
                                <?php if(isset($_SESSION['cart'])) { ?>
                                    (<?= count($_SESSION['cart']) ?>)
                                <?php } else { ?>
                                    (0)
                                <?php } ?>
                            </a>
                            </li>


      <?php endif;?>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?= isset($_SESSION['is_loggedin']) ? $_SESSION['username'] : 'Guest' ?>
                </a>
          <ul class="dropdown-menu">
            <?php if(!isset($_SESSION['is_loggedin'])): ?>
            <li><a class="dropdown-item" href="/ebook/Login.php">login</a></li>
            <li><a class="dropdown-item" href="/ebook/register.php">Register</a></li>
            <?php else: ?>
            <li><a class="dropdown-item" href="/ebook/Profile.php">Profile</a></li>
            <li><a class="dropdown-item" href="?action=sign_out">Sign out</a></li>
            <?php endif; ?>
        </ul>
        </li>
      <?php if($page === 'Home'): ?>
          <input class="form-control w-25 me-2" type="search" placeholder="Search" id="search" aria-label="Search">
      <?php endif;?>

    </ul>
  </div>
</div>
</nav>
