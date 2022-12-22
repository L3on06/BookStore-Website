<?php 
    $_SESSION['page'] = 'create category';
?>

<?php include('../../Components/Header.php'); ?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Create category</h3>
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_category_btn">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

