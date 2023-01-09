<?php 
include('../Components/Header.php');
$_SESSION['page'] = 'home';

    include('../classes/CRUD.php');
    $crud = new CRUD;

    $sliders = $crud->read('slider_categories');
    $books = $crud->read('books');
    $orders = $crud->read('orders');
    $users = $crud->read('users');

?>


<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Dashboard</h3>
        <div class="row">
            <div class="col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4><?= count($sliders) ?></h4>
                        <p>Sliders</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4><?= count($books) ?></h4>
                        <p>Books</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4><?= count($orders) ?></h4>
                        <p>Orders</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-3 col-lg-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h4><?= count($users) ?></h4>
                        <p>Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
