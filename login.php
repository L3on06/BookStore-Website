<?php 
    include('Components/Header.php');
    $_SESSION['page'] = 'Login';

    include('classes/CRUD.php');
    $crud = new CRUD;

    $error = '';
    $errors = [];

if(isset($_POST['login_btn'])){       
        //validation
         if(strlen($_POST['username']) < 3)
            $errors[] = 'username is empty or too short!';

        if(strlen($_POST['password']) < 8)
            $errors[] = 'Password is not valid!';
        
        $user = $crud->read('users', ['column' => 'username', 'value' => $_POST['username']], 1);

        if((count($errors) === 0) && is_array($user) && (count($user) > 0)){
          $user = $user[0];
        }

        if(password_verify($_POST['password'], $user['password'])){
            //set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['is_loggedin'] = true;

            //redirect
            header('Location: /eBook/dashboard/index.php');
        } else {
        $_SESSION['error'] = 'Credentials are not correct!';
        }
    } else {
        $_SESSION['error'] = 'User does not exist!';
    }
?>

<section class="vh-100 " style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row flex-row-reverse justify-content-center">
         <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                    <?php 
                        if(count($errors)) {
                          echo '<ul>';
                        foreach($errors as $error) {
                            echo '<li>'.$error.'</li>';
                        }
                            echo '</ul>';
                    }
                ?>
                <img src="./assets/img/logIn.png" class="img-fluid" alt="Sample image">

              </div>
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                 <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                         <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" required/>
                    </div>
                  </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"  required/>
                      </div>
                    </div>
                    
                  <div class="form-check d-flex justify-content-center mb-5">
                    <input type="checkbox" name="rememberMe" value="1" class="form-check-input" id="rememberMe" value="yes">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>

                  <div class="form-check d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
                     <a href="register.php" class="btn btn-link">Let me register first</a>
                  </div>


                </form>
            </div>
            
        </div>
          </div>
        </div>
      </div>
    </div>
</div>
</section>

<?php include('Components/footer.php')?>



