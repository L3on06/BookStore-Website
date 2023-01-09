<?php 
    include('../../Components/header.php'); 
    $_SESSION['page'] = 'slides'; 
    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $slider_categories = $crud->read('slider_categories');

    $slides = $crud->read('books');
    
    if(isset($_GET['search'])) {
        $slides = $crud->search('books', 'title', $_GET['search']);
    }
    
    $error = '';
    $errors = [];

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'delete') {
            if($crud->delete('books', ['column' => 'id', 'value' => $_GET['id']])) {
                header('Location: index.php');
            } else {
                $error = 'Cannot delete slide with #'+$_GET['id'];
            }
        }
    }
?>


<div class="search-sort my-4">
    <div class="container">
        <div class="row ">
            <div class="col-12">
                <form  action="<?= $_SERVER['PHP_SELF'] ?>">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search book by title ..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
                </form>
            </div>
        </div>
    </div>
</div>

<div class="dashboard my-5">
    <div class="container">
            <h3 class="mb-4">Slides</h3>
        <div class="card">
            <div class="card-body">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php if(count($slides)) { ?>
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Slides category</th>
                            <th></th>
                        </tr>
                        <?php 
                       if(count($slides)) {
                            foreach($slides as $slide) { 
                                if($slide['slider_category_id'] !== null){
                            ?>
                            <tr>
                                <td><?= $slide['id'] ?></td>
                                <td>
                                    <img src="../../assets/img/books/<?= $slide['image'] ?>" height="80" />
                                </td>
                                <td><?= $slide['title'] ?></td>
                                <td><?= $slide['content'] ?></td>
                                <?php 
                                if(is_array($slider_categories)){
                                    foreach($slider_categories as $category){
                                        if($slide['slider_category_id'] === $category['id']){
                                ?>
                                <td value="<?= $category['id'] ?>">
                                <?= $category['name'] ?>
                                </td>
                                <?php 
                                    }
                                }
                                }
                                ?>
                                <td>
                                    <a href="?action=delete&id=<?= $slide['id'] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                        }
                        ?>
                    </table>
                <?php } else { echo '<p>0 slides</p>'; } ?>
            </div>
        </div>
    </div>
</div>