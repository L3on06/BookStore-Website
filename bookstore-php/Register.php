<?php
    include('Components/Header.php');
    $_SESSION['page'] = 'register';
    include('classes/CRUD.php');
    
    $crud = new CRUD;

    $error = '';
    $errors = [];

if(isset($_POST['register_btn'])){       
        //validation
        if(strlen($_POST['username']) < 3)
            $errors[] = 'username is empty or too short!';

        if(strlen($_POST['email']) < 4)
            $errors[] = 'email is not valid!';

        if(strlen($_POST['address']) < 4)
            $errors[] = 'address is not valid!';
            
        if(strlen($_POST['phone']) < 6)
            $errors[] = 'phone is not valid!';

        if(strlen($_POST['password1']) < 8)
            $errors[] = 'Password is not valid!';

        if(strlen($_POST['password2']) < 8)
            $errors[] = 'Repeat password is not valid!';

        if($_POST['password1'] !== $_POST['password2'] )
            $errors[] = 'Password has to be same as Reapeat password!';
    
        
        if(count($errors) === 0){
            $password = password_hash($_POST['password1'], PASSWORD_BCRYPT);

             if($crud->create('users', [
                'username' => $_POST['username'],
                'email' => $_POST['email'],
                'address' => $_POST['address'],
                'phone' => $_POST['phone'],
                'password' => $password,
            ])) {
                header('Location: /Login.php');
            } else {
                $error = 'Something want wrong!';
            }
        }
    } 
?>


<section class="auto pt-5 pb-5" style="background-color: #eee;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-12 col-xl-11">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                 <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" required/>
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                    <div class="form-outline flex-fill mb-0">
                       <label for="email" class="form-label">Email</label>
                         <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required/>
                         <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                  </div>

                  
                  <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                          <label for="address" class="form-label">Address</label>
                          <input type="text" name="address" class="form-control" id="address" required/>
                        </div>
                    </div>
        
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                       <label for="phone" class="form-label">Phone</label>
                          <input type="phone" name="phone" class="form-control" id="phone" required/>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label for="password1" class="form-label">Password</label>
                        <input type="password" name="password1" class="form-control" id="password1" required/>
                      </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <label for="password2" class="form-label">Repeat Password</label>
                        <input type="password" name="password2" class="form-control" id="password2" required/>
                      </div>
                    </div>
                    
                  <div class="form-check d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
                    <a href="/login.php" class="btn btn-link">I already have an account</a>
                  </div>

                </form>
              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
                <img src="./assets/img/SignUp.jpg" class="img-fluid" alt="Sample image">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include('Components/footer.php')?>


