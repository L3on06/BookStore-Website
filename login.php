<?php $_SESSION['page'] = 'Login';?>
<?php include('Components/Header.php')?>

<?php 
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

<div class="auth my-5">
    <div class="container">
        <h2 class="text-center mb-4">Login</h2>   
        <?php if(isset($_SESSION['error'])) echo '<p>'.$_SESSION['error'].'</p>'; ?>
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
                <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" />
                <div id="usernameHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" />
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remberme" value="yes">
                <label class="form-check-label" for="remmberme">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary" name="login_btn">Login</button>
            <a href="register.php" class="btn btn-link">Let me register first</a>
        </form>
    </div>
</div>

<?php include('Components/footer.php')?>
