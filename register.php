<?php$_SESSION['page'] = 'register';?>
<?php include('Components/Header.php')?>

<?php 
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
                header('Location: login.php');
            } else {
                $error = 'Something want wrong!';
            }
        }
    } 
?>

<div class="auth my-5">
    <div class="container">
        <h2 class="text-center mb-4">Register</h2>
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
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" require/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" require/>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address" require/>
            </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-control" id="phone" require/>
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" name="password1" class="form-control" id="password1" require/>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Repeat Password</label>
                <input type="password" name="password2" class="form-control" id="password2" require/>
            </div>
            <button type="submit" class="btn btn-primary" name="register_btn">Register</button>
            <a href="login.php" class="btn btn-link">I already have an account</a>
        </form>
    </div>
</div>

<?php include('Components/footer.php')?>
