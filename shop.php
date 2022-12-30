<?php $_SESSION['page'] = 'shop';?>
    <?php include('Components/Header.php')?>

<?php 
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
        <div class="row">
            <?php 
            if(count($books) > 0) {
              foreach($books as $book) {
            ?>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="card py-4">
                     <img src="./assets/img/sliders/<?= $book['image'] ?>" class="book"  alt="Best books of the year">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                          <h5 class="card-title"><?= $book['title'] ?></h5>
                          <p class="card-text"><?= $book['price'] ?> EUR</p>
                        </div>
                        <a href="view-book.php?id=<?= $book['id'] ?>" class="btn btn-outline-secondary d-flex align-items-center">
                          <img src="./assets/img/eye.svg" alt="" />
                        </a>
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