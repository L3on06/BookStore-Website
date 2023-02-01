<?php 
    include('../../Components/Header.php');
     $_SESSION['page'] = 'create Book';

    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $sliderTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];

    $error= '';
    $errors = [];

    $book_categories = $crud->read('book_categories');

    if(isset($_POST['create_book_btn'])) {
        //validation
        if(empty($_POST['book_category_id'])){
            $errors[] = 'Book category is empty!';
        }
        
        if(strlen($_POST['title']) < 3)
            $errors[] = 'name is empty or too short!';

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
   
        // proccess form data
        if(count($errors) === 0) {
            $filename = $_FILES['image']['name'];

            if($crud->create('books', [
                'book_category_id' => $_POST['book_category_id'],
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'qty' => $_POST['qty'],
                'price' => $_POST['price'],
                'image' => $filename
            ])) {
                // upload
                move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/books/'.$filename);
                header('Location: index.php');
            } else {
                $error = 'Something want wrong!';
            }
        }
    }
?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Create book</h3>
        <div class="card">
            <div class="card-body">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php 
                    if(count($errors)) {
                        echo '<ul>';
                        foreach($errors as $error) {
                            echo '<li>'.$error.'</li>';
                        }
                        echo '</ul>';
                    }
                ?>
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="book_category_id">Select Category</label>
                        <select name="book_category_id" id="book_category_id" class="form-control" required>
                             <option style="display: none"></option>
                            <?php 
                            if(is_array($book_categories)){
                                foreach($book_categories as $category){
                            ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                            <?php 
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="title">title</label>
                        <input type="text" name="title" id="title" class="form-control" required />
                    </div>
                     <div class="form-group mb-4">
                        <label for="content">Content</label>
                        <input type="text" name="content" id="content" class="form-control" required />
                    </div>
                    <div class="form-group mb-4">
                        <label for="qty">Qty</label>
                        <input type="number" name="qty" id="qty" class="form-control" required />
                    </div>
                    <div class="form-group mb-4">
                        <label for="price">Price</label>
                        <input type="text" name="price" id="price" class="form-control" required pattern="\d+\.\d{2}" />
                    </div>
                    <div class="form-group mb-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required accept="image/png, image/jpg, image/jpeg, image/webp" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_book_btn">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>

