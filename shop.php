<?php 
$_SESSION['page'] = 'shop';
?>
<?php include('Components/Header.php')?>

<div class="search-sort my-4">
    <div class="container">
        <div class="row ">
            <div class="col-sm-12 col-md-6 col-lg-8 p-2">
                <form action="#">
                    <input type="search" name="search" id="search" class="form-control" placeholder="Search books by name ...">
                </form>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-2 p-2">
                <form action="#">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Sort Name</option>
                        <option value="name_asc">Name ASC</option>
                        <option value="name_desc">Name DESC</option>
                    </select>
                </form>
            </div>
             <div class="col-sm-6 col-md-3 col-lg-2 p-2">
                <form action="#">
                    <select name="sort" id="sort" class="form-control">
                        <option value="">Sort Price</option>
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
            <div class="col-sm-12 col-md-4 col-lg-4 p-2">
                <div class="card">
                    <img src="#" class="img img-fluid card-img-top mx-auto d-block" alt="latest books">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

            



<?php include('Components/Footer.php')?>