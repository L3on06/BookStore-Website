<?php
    include('../../Components/Header.php');
    $_SESSION['page'] = 'Books'; 

    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $books = $crud->read('books');

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'delete') {
            if($crud->delete('books', ['column' => 'id', 'value' => $_GET['id']])) {
                header('Location: index.php');
            } else {
                $error = 'Cannot delete Books with #'+$_GET['id'];
            }
        }
    }
?>


<div class="dashboard my-5">
    <div class="container">
        <div class="d-flex justify-content-between">
            <h3 class="mb-4">Books</h3>
            <a href="create.php" class="btn btn-primary mb-4">Create Book</a>
        </div>
        <div class="card">
            <div class="card-body">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php if(count($books)) { ?>
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Image</th>
                        </tr>
                        <?php 
                        if(count($books)) {
                            foreach($books as $book) {
                            ?>
                            <tr>
                                <td><?= $book['id'] ?></td>
                                <td><?= $book['title'] ?></td>
                                <td><?= $book['content'] ?></td>
                                <td><?= $book['qty'] ?></td>
                                <td><?= $book['price'] ?> EUR</td>
                                <td>
                                    <img src="../../assets/img/sliders/<?= $book['image'] ?>" height="80" />
                                </td>
                                <td>
                                    <a href="edit.php?id=<?= $book['id'] ?>">Edit</a>
                                    <a href="?action=delete&id=<?= $book['id'] ?>">Delete</a>
                                    <a href="slides.php?id=<?= $book['id'] ?>">slides</a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                <?php } else { echo '<p>0 Books</p>'; } ?>
                </div>
            </div>
        </div>
    </div>
</div>

