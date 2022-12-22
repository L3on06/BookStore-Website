<?php
    $_SESSION['page'] = 'login';
?>

<?php include('Components/Header.php')?>


<div class="auth my-5">
    <div class="container">
        <h2 class="text-center mb-4">Login</h2>
        <form>
            <div class="mb-3">
                <label for="username" class="form-label">Email address</label>
                <input type="email" name="username" class="form-control" id="username" aria-describedby="usernameHelp" />
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
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="register.php" class="btn btn-link">Let me register first</a>
        </form>
    </div>
</div>

<?php include('Components/footer.php')?>
