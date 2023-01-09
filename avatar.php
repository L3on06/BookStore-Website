    <?php


if(isset($_SESSION['is_loggedin'])) {
    if($_SESSION['is_loggedin'] == 1) {
                          include('classes/CRUD.php');
                          $crud = new CRUD;
                            $user = $crud->read('users', ['column' => 'id', 'value' => $_SESSION['user_id']]);

                            if(!is_null($user)) {
                                $user = $user[0];      
                    ?>
                        <img src="assets/img/avatars/<?= $user['avatar'] ?>" alt="sasas" height="24" class="rounded-circle" />
                    <?php
                            }
                        }
                    }
                    ?>