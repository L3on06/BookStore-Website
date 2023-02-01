<?php 
    include('Components/Header.php');
        $_SESSION['page'] = 'Shop';
    

    include('classes/CRUD.php');
    $crud = new CRUD;
  
    $error = '';
    $errors = [];
  
    $books = $crud->read('books');

    if(isset($_GET['search'])) {
        $books = $crud->search('books', 'title', $_GET['search']);
    }

    if(isset($_GET['sort'])) {
        $order_parts = explode("_", $_GET['sort']);
        $order = ['column' => $order_parts[0], 'order' => $order_parts[1]];
        $books = $crud->read('books', [], null, $order);
    }
?>

<div class="search-sort my-4">
    <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-6 col-lg-8 p-2">
                <form  action="<?= $_SERVER['PHP_SELF'] ?>">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search book by title ..." value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
                </form>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-4 p-2">
                <form action="<?= $_SERVER['PHP_SELF'] ?>">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Sort Name</option>
                        <option value="title_asc">Name ASC</option>
                        <option value="title_desc">Name DESC</option>
                        <option value="price_asc">Price ASC</option>
                        <option value="price_desc">Price DESC</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="latest-books py-5">
    <div class="container">
        <div class="row ">
            <?php 
            if(count($books) > 0) {
              foreach($books as $book) {
            ?>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="card" style="height: 100%;">
                     <img src="./assets/img/books/<?= $book['image'] ?>" class="book-shadow img-thumbnail"  alt="<?= $book['title'] ?>" loading="lazy" style="height: 420px; width:90%; margin: 0 auto; box-shadow: -7px 6px 12px rgba(0, 0, 0, 0.3); transition: all 1s ease-in;">
                    <div class="card-body row align-items-start">
                        <div>
                          <h5 class="title"><b><?= $book['title'] ?></b></h5>
                        </div>
                        <div class="d-flex justify-content-between align-self-end">
                            <div>
                                <p class="card-text "><?= $book['price'] ?> EUR</p>
                            </div>
                            <a href="ViewBook.php?id=<?= $book['id'] ?>" class="btn btn-outline-secondary d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                            </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
              }
            } else {
            ?>
            <div class="col-sm-12 col-md-12 col-lg-12">
              <p>0 books</p>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

            

<script>
    document.querySelector('select#sort').addEventListener('change', (e) => {
        if(e.target.value.length > 0) {
            window.location.href = `http://localhost/ebook/shop.php?sort=${e.target.value}`
        }
    })
</script>


<?php include('Components/Footer.php')?>