<?php $_SESSION['page'] = 'Update Book Category';?>

<?php include('../../Components/Header.php'); ?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Update Book Category</h3>
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST">
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_category_btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

