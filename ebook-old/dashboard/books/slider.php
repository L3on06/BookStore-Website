
<?php
    include('../../Components/Header.php'); 
    $_SESSION['page'] = 'Update book';

    include('../../classes/CRUD.php');
    $crud = new CRUD;

    $slider_categories = $crud->read('slider_categories');

    $error= '';
    $errors = [];

    if(isset($_GET['id'])) {
        $books = $crud->read('books', ['column' => 'id', 'value' => $_GET['id']]);
            if(is_array($books)) $books = $books[0];
    }

    

    if(isset($_POST['update_book_btn'])) {
        //validation

        // proccess form data
        if(count($errors) === 0) {
                if($crud->update('books', [
                    'slider_category_id' => $_POST['slider_category_id']
                ], ['column' => 'id', 'value' => $_POST['id']])) {
                    header('Location: index.php');
                } else {
                    $error = 'Something want wrong!';
                }
            }
        }

?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Sliders book</h3>
        <div class="card">
            <div class="card-body">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                     <div class="form-group mb-4">
                        <label for="slider_category_id">Category</label>
                            <select name="slider_category_id" id="slider_category_id" class="form-control">
                                <option style="display: none"></option>
                                <?php 
                                if(is_array($slider_categories)){
                                    foreach($slider_categories as $category){
                                ?>
                                <option 
                                value="<?= $category['id'] ?>" 
                                <?php if($books['slider_category_id'] === $category['id']): ?> selected <?php endif; ?>
                                ><?= $category['name'] ?></option>
                                <?php 
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <input type="hidden" name="id" value='<?= $_GET['id'] ?>' />
                    <button type="submit" class="btn btn-primary" name="update_book_btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
