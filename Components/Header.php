<?php 
// session_start();
$page = (isset($_SESSION['page'])) ? ucfirst($_SESSION['page']) : 'Home';

 $_SESSION['is_loggedin'] = true;
 $_SESSION['username'] = 'l3on06';
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
    <title><?= $page ?> | Book Store</title>
    <!-- JavaScript  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</head>
<body>
  <?php if(isset($_SESSION['is_loggedin'])): ?>
 <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="/eBook/dashboard/index.php">Book Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/eBook/dashboard/index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/eBook/dashboard/slides/index.php">Slides</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/eBook/dashboard/categories/index.php">Categories</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/eBook/dashboard/books/index.php">Books</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="/eBook/dashboard/orders/index.php">Orders</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= isset($_SESSION['is_loggedin']) ? $_SESSION['username'] : 'Guest' ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/eBook/Profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="?action=sign_out">Sign out</a></li>
                    </ul>
                </li>
            </ul>
            </div>
        </div>
    </nav>
<?php else:?>
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Book Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
             <li class="nav-item">
          <a class="nav-link" href="cart.php">Cart(0)</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= isset($_SESSION['is_loggedin']) ? $_SESSION['username'] : 'Guest' ?>
          </a>
          <ul class="dropdown-menu">
            <?php if(!isset($_SESSION['is_loggedin'])): ?>
            <li><a class="dropdown-item" href="login.php">login</a></li>
            <li><a class="dropdown-item" href="register.php">Register</a></li>
            <?php else: ?>
            <li><a class="dropdown-item" href="dashboard/index.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="?action=sign_out">Sign out</a></li>
            <?php endif; ?>
        </ul>
        </li>
      </ul>
      <?php if($page === 'Home'): ?>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <?php endif;?>
    </div>
  </div>
</nav>
<?php endif;?>
