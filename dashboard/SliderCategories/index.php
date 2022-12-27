<?php $_SESSION['page'] = 'Slider Categories';?>
<?php include('../../Components/Header.php'); ?>

<?php    
    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $slider_categories = $crud->read('slider_categories');

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'delete') {
            if($crud->delete('slider_categories', ['column' => 'id', 'value' => $_GET['id']])) {
                header('Location: index.php');
            } else {
                $error = 'Cannot delete Book Categories with #'+$_GET['id'];
            }
        }
    }
?>


<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Book Categories</h3>
        <a href="create.php" class="btn btn-primary mb-4">Slider Category</a>
        <div class="card">
            <div class="card-body">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php if(count($slider_categories)) { ?>
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        <?php 
                        if(count($slider_categories)) {
                            foreach($slider_categories as $category) {
                            ?>
                            <tr>
                                <td><?= $category['id'] ?></td>
                                <td><?= $category['name'] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $category['id'] ?>">Edit</a>
                                    <a href="?action=delete&id=<?= $category['id'] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                <?php } else { echo '<p>0 Book Categories</p>'; } ?>
            </div>
        </div>
    </div>
</div>

