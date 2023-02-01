<?php 
    include('../../Components/Header.php');
    $_SESSION['page'] = 'update book';

    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $sliderTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];

    $error= '';
    $errors = [];

    $book_categories = $crud->read('book_categories');
    $books = null;

    if(isset($_GET['id'])) {
        $books = $crud->read('books', ['column' => 'id', 'value' => $_GET['id']]);
            if(is_array($books)) $books = $books[0];
    }

    

    if(isset($_POST['update_book_btn'])) {
        //validation
        if(strlen($_POST['title']) < 3)
            $errors[] = 'title is empty or too short!';
            
        if(strlen($_POST['content']) < 3)
            $errors[] = 'content is empty or too short!';

        if($_POST['qty'] <= 0)
            $errors[] = 'Qty is not valid!';

        if($_POST['price'] <= 0.0)
            $errors[] = 'Price is not valid!';

        if(!empty($_FILES['image']['name'])) {
            if(!in_array($_FILES['image']['type'], $sliderTypes)) 
                $errors[] = 'Image file type is not supported!';
        }

        // if(empty($_POST['book_category_id']))
        //     $errors[] = 'book category is empty';
            
        // die($errors);

        // proccess form data
        if(count($errors) === 0) {
                if(!empty($_FILES['image']['name'])) {
                // delete old image
                unlink($_POST['image']);

                $filename = $_FILES['image']['name'];

                if($crud->update('books', [
                    'image' => $filename,
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'qty' => $_POST['qty'],
                    'price' => $_POST['price'],
                    'book_category_id' => $_POST['book_category_id']
                ], ['column' => 'id', 'value' => $_POST['id']])) {
                     // upload
                    move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/books/'.$filename);
                    header('Location: index.php');
                } else {
                    $error = 'Something want wrong!';
                }
            } else {
                if($crud->update('books', [
                    'title' => $_POST['title'],
                    'content' => $_POST['content'],
                    'qty' => $_POST['qty'],
                    'price' => $_POST['price'],
                    'book_category_id' => $_POST['book_category_id']
                ], ['column' => 'id', 'value' => $_POST['id']])) {
                    header('Location: index.php');
                } else {
                    $error = 'Something want wrong!';
                }
            }
        }
    }

?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Update book</h3>
        <div class="card">
            <div class="card-body">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="book_category_id">Select Category</label>
                              <select name="book_category_id" id="book_category_id" class="form-control" required>
                                <option style="display: none"></option>
                                <?php 
                                if(is_array($book_categories)){
                                    foreach($book_categories as $category){
                                ?>
                                <option 
                                value="<?= $category['id'] ?>" 
                                <?php if($books['book_category_id'] === $category['id']): ?> selected <?php endif; ?>
                                ><?= $category['name'] ?></option>
                                <?php 
                                    }
                                }
                                ?>
                            </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="title">Name</label>
                        <input type="text" name="title" id="title" class="form-control" required <?php if(!is_null($books)):?> value='<?= $books['title'] ?>' <?php endif; ?>/>
                    </div>
                        <div class="form-group mb-4">
                        <label for="content">Content</label>
                        <input type="text" name="content" id="content" class="form-control" required <?php if(!is_null($books)):?> value='<?= $books['content'] ?>' <?php endif; ?>/>
                    </div>
                    <div class="form-group mb-4">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control" required <?php if(!is_null($books)):?> value='<?= $books['qty'] ?>' <?php endif; ?>/>
                    </div>
                    <div class="form-group mb-4">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" required pattern="\d+\.\d{2}" <?php if(!is_null($books)):?> value='<?= $books['price'] ?>' <?php endif; ?>/>
                    </div>
                    <div class="form-group mb-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpg, image/jpeg, image/webp" />
                        <?php if(!is_null($books) && ($books['image'] !== 'noimage.png')): ?>
                        <br>
                        <input type="hidden" name="image" value='../../assets/img/books/<?= $books['image'] ?>'/>
                        <input type="image" src="../../assets/img/books/<?= $books['image'] ?>" height="80"/>
                        <?php endif; ?>   
                    </div>
                    <input type="hidden" name="id" value='<?= $_GET['id'] ?>' />
                    <button type="submit" class="btn btn-primary" name="update_book_btn">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>




