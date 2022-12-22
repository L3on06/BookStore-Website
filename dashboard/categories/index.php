<?php 
    $_SESSION['page'] = 'categories';
?>

<?php include('../../Components/Header.php'); ?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Categories</h3>
        <a href="create.php" class="btn btn-primary mb-4">Create category</a>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

