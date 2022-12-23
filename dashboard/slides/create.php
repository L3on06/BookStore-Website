<?php $_SESSION['page'] = 'create Slide';?>
<?php include('../../Components/header.php'); ?>


<?php 
    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $sliderTypes = ['image/png', 'image/jpg', 'image/jpeg', 'image/webp'];
    $errors = [];

    if(isset($_POST['create_slide_btn'])) {
        //validation
        if(!in_array($_FILES['image']['type'], $sliderTypes)) 
            $errors[] = 'Image file type is not supported!';
        
        if(strlen($_POST['title']) < 3)
            $errors[] = 'Title is empty or too short!';

        if(strlen($_POST['content']) < 3)
            $errors[] = 'content is empty or too short!';

        // if(strlen($_POST['slider_category_id']) < 0)
        //     $errors[] = 'slider_category_id is empty';

            
        // proccess form data
        if(count($errors) === 0) {
            $filename = $_FILES['image']['name'];

            if($crud->create('sliders', [
                'image' => $filename,
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'slider_category_id' => $_POST['slider_category_id']
            ])) {
                // upload
                move_uploaded_file($_FILES['image']['tmp_name'], '../../assets/img/sliders/'.$filename);
                header('Location: index.php');
            } else {
                $error = 'Something want wrong!';
            }
        }
    }
?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Create Slide</h3>
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
                        <label for="title">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required />
                    </div>
                    <div class="form-group mb-4">
                        <label for="content">Content</label>
                        <input type="text" name="content" id="content" class="form-control" required />
                    </div>
                    <div class="form-group mb-4">
                        <label for="category">Category</label>
                            <select name="sort" id="sort" class="form-control">
                                <option style="display: none"></option>
                                <option for="slider_category_id" type="text" name="Best_Books_of_the_year" id="Best_Books_of_the_year" class="form-control" required  value="Best_Books_of_the_year">Best Books of the year</option>
                                <option for="slider_category_id" type="text" name="Trending_Books" id="Trending_Books" class="form-control" required  value="Trending_Books">Trending Books</option>
                                <option for="slider_category_id" type="text" name="Featured_Books" id="conFeatured_Bookstent" class="form-control" required  value="Featured_Books">Featured Books</option>
                            </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="image">Image</label>
                        <input type="file" name="image" id="image" class="form-control" required accept="image/png, image/jpg, image/jpeg, image/webp" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="create_slide_btn">Create</button>
                </form>
            </div>
        </div>
    </div>
</div>
