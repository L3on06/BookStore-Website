<?php  
    include('../../Components/Header.php');
    $_SESSION['page'] = 'Orders';

    include('../../classes/CRUD.php');
    $crud = new CRUD;
    $orders = $crud->read('orders');

    if(isset($_GET['action'])) {
        if($_GET['action'] === 'delete') {
            if($crud->delete('orders', ['column' => 'id', 'value' => $_GET['id']])) {
                header('Location: index.php');
            } else {
                $error = 'Cannot delete Orders with #'+$_GET['id'];
            }
        }
    }
?>


<div class="dashboard my-5">
    <div class="container">
        <h3 class="mb-4">Orders</h3>
        <div class="card">
            <div class="card-body">
                <?php if(isset($error)) echo '<p>'.$error.'</p>'; ?>
                <?php if(count($orders)) { ?>
                <div class="table-responsive">
                    <table class="table table-borderd">
                        <tr>
                            <th>#</th>
                            <th>Customer details</th>
                            <th>Notes</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                        <?php 
                        if(count($orders)) {
                            foreach($orders as $order) {
                            ?>
                            <tr>
                                <td><?= $order['id'] ?></td>
                                <td><?php
                                    echo $order['username'] .'<br />';
                                    echo $order['email'] .'<br />';
                                    echo $order['address'] .'<br />';
                                    echo $order['phone'];
                                ?></td>
                                <td><?= $order['notes'] ?></td>
                                <td><?= $order['total'] ?> EUR</td>
                                <td>
                                    <a href="?action=delete&id=<?= $order['id'] ?>">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                        }
                        ?>
                    </table>
                </div>
                <?php } else { echo '<p>0 Orders</p>'; } ?>
                </div>
            </div>
        </div>
    </div>
</div>

