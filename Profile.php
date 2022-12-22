<?php 
    $_SESSION['page'] = 'profile';
?>

<?php include('Components/Header.php'); ?>

<div class="profile my-5">
    <div class="container">
        <h3 class="mb-4">Profile l3on06</h3>
        <div class="card mb-4">
            <div class="card-header">
                <h5>Update</h5>
            </div>
            <div class="card-body">
                 <form>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username"  require/>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"  require/>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
              <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address"  require/>
            </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="phone" name="phone" class="form-control" id="phone"  require/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
        </div>
         <div class="card mb-4">
            <div class="card-header">
                <h5>Change Password</h5>
            </div>
            <div class="card-body">
            <form>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" name="password1" class="form-control" id="password1"  require/>
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Repeat Password</label>
                <input type="password" name="password2" class="form-control" id="password2"  require/>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
            </div>
        </div>
    </div>
</div>

<?php include('Components/Footer.php'); ?>