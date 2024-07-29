<?php   
    include('../../Components/Header.php');
    $_SESSION['page'] = 'Book Categories';

    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $book_categories = $crud->read('book_categories');

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'delete') {
            if($crud->delete('book_categories', ['column' => 'id', 'value' => $_GET['id']])) {
                header('Location: index.php');
            } else {
                $error = 'Cannot delete Book Categories with #'+$_GET['id'];
            }
        }
    }
?>


<div class="dashboard my-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h3 class="mb-4">Book Categories</h3>
            <a href="create.php" class="btn btn-primary mb-4">Create Category</a>
        </div>
        <div class="card">
            <div class="card-body">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php if(count($book_categories)) { ?>
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th></th>
                            
                        </tr>
                        <?php 
                        if(count($book_categories)) {
                            foreach($book_categories as $category) {
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

