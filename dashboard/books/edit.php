<?php 
    $_SESSION['page'] = 'update book';
?>

<?php include('../../Components/Header.php'); ?>

<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Update book</h3>
        <div class="card">
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group mb-4">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="">Select category</option>
                            <!-- load categories from DB -->
                        </select>
                    </div>
                    <div class="form-group mb-4">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" required />
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
                        <input type="file" name="image" id="image" class="form-control" required accept="image/png,image/jpg,image/webp" />
                    </div>
                    <button type="submit" class="btn btn-primary" name="update_book_btn">update</button>
                </form>
            </div>
        </div>
    </div>
</div>


