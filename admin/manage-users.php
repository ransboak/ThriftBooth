<?php
include 'partials/header2.php';

$order_query = "SELECT * FROM orders";
$order_results = mysqli_query($connection, $order_query);
$order_number = mysqli_num_rows($order_results);
$sum_query = "SELECT sum(product_price) AS value_sum FROM orders";
$sum_results = mysqli_query($connection, $sum_query);
$total = mysqli_fetch_assoc($sum_results);
$sum = $total['value_sum'];
$profit = 0.45 * $sum;
$return = 0.3 * $profit;


// fetch users from the database but not current user
$current_admin_id = $_SESSION['user-id'];
$query = "SELECT * FROM users WHERE NOT id= $current_admin_id";
$users = mysqli_query($connection, $query);
$users_number = mysqli_num_rows($users);
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM users WHERE id=$id ";
    $result = mysqli_query($connection, $query);
    $user = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="../assets/css/adminpanel2.css" />>
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <span class="logo_name">Thrift Booth</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="<?= ROOT_URL ?>">
                    <i class='bx bx-home'></i>
                    <span class="links_name">Home</span>
                </a>
            </li>

            <li>
                <a href="dashboard.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Order list</span>
                </a>
            </li>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-user.php">
                        <i class='bx bx-pie-chart-alt-2'></i>
                        <span class="links_name">Add User</span>
                    </a>
                </li>
                <li>
                    <a href="manage-users.php" class="active">
                        <i class='bx bx-coin-stack'></i>
                        <span class="links_name"> Manage Users</span>
                    </a>
                </li>
            <?php endif ?>
            <li>
                <a href="add-product.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Add product</span>
                </a>
            </li>
            <li>
                <a href="manage-products.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name"> Manage Products</span>
                </a>
            </li>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <li>
                    <a href="add-category.php">
                        <i class='bx bx-message'></i>
                        <span class="links_name"> Add Category</span>
                    </a>
                </li>
                <li>
                    <a href="manage-categories.php">
                        <i class='bx bx-heart'></i>
                        <span class="links_name">Manage Categories</span>
                    </a>
                </li>
                <li>
                    <a href="add-blog-post.php">
                        <i class='bx bx-message-add'></i>
                        <span class="links_name"> Add Blog Post</span>
                    </a>
                </li>
                <li>
                    <a href="manage-blog-posts.php">
                        <i class='bx bx-heart'></i>
                        <span class="links_name">Manage Blog Posts</span>
                    </a>
                </li>
            <?php endif ?>



            <li>
                <a href="<?= ROOT_URL ?>logout.php">
                    <i class="fa fa-power-off"></i>
                    <span class="links_name">Log Out</span>
                </a>
            </li>



        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <img src="<?= ROOT_URL . 'images/' . $user['avatar'] ?>" alt="" class="tab-img" />
                <span class="admin_name"><?= $user['firstname'] ?></span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>










        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Orders</div>
                        <div class="number"><?= $order_number ?></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <div class="number">₵<?= $sum ?></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Profit</div>
                        <div class="number">₵<?= $profit ?></div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Return</div>
                        <div class="number">₵ <?= $return ?></div>
                        <div class="indicator">
                            <i class='bx bx-down-arrow-alt down'></i>
                            <span class="text">Down From Today</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-download cart four'></i>
                </div>
            </div>




            <?php
            if (isset($_SESSION['add-user'])) :
            ?>
                <div class="alert__message error">
                    <p><?= $_SESSION['add-user'];
                        unset($_SESSION['add-user']);
                        ?></p>
                </div>
            <?php elseif (isset($_SESSION['add-user-success'])) : ?>
                <div class="alert__message success">
                    <p><?= $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                        ?></p>
                </div>

            <?php elseif (isset($_SESSION['delete-user-success'])) : ?>
                <div class="alert__message success container">
                    <p><?= $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']); ?>
                    </p>
                </div><br><br>
            <?php elseif (isset($_SESSION['delete-user'])) : ?>
                <div class="alert__message error container">
                    <p><?= $_SESSION['delete-user'];
                        unset($_SESSION['delete-user']);
                        ?></p>
                </div>
            <?php elseif (isset($_SESSION['edit-user-success'])) : ?>
                <div class="alert__message success">
                    <p><?= $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                        ?></p>
                </div>
            <?php elseif (isset($_SESSION['edit-user'])) :
            ?>
                <div class="alert__message error">
                    <p><?= $_SESSION['edit-user'];
                        unset($_SESSION['edit-user']);
                        ?></p>
                </div>
            <?php endif ?>





            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Manage Users</div>
                    <?php if ($users_number > 1) : ?>
                        <p><?= $users_number ?> users found</p>
                    <?php elseif ($users_number == 1) : ?>
                        <p><?= $users_number ?> user found</p>
                    <?php else : ?>
                        <p>No users found</p>
                    <?php endif ?>
                    <?php if (mysqli_num_rows($users) > 0) : ?>
                        <table width="100%">
                            <thead>
                                <tr>
                                    <td>ID</td>
                                    <td>Name</td>
                                    <td>Address</td>
                                    <td>Contact</td>
                                    <td>Role</td>
                                    <td>Status</td>
                                    <td>Edit</td>
                                    <td>Delete</td>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($user = mysqli_fetch_assoc($users)) : ?>
                                    <tr>
                                        <td data-label="Account"><?= $user['id'] ?></td>
                                        <td data-label="Due Date">
                                            <img class="tab-img_" src="<?= ROOT_URL . 'images/' . $user['avatar'] ?>" alt="" /><?= $user['username'] ?>
                                        </td>
                                        <td data-label="Amount"><?= $user['address'] ?></td>
                                        <td data-label="Period"><?= $user['contact_info'] ?></td>
                                        <td data-label="Due Date"><?= $user['is_admin'] ? 'Seller' : 'Buyer' ?></td>
                                        <td data-label="Amount" style="position: relative;"><span class="pe"></span>Offline</td>
                                        <td data-label="Period">
                                            <a href="<?= ROOT_URL ?>admin/edit-user.php?id=<?= $user['id'] ?>" style="color: black;">
                                                <i class="fa fa-edit"></i>
                                            </a>

                                        </td>
                                        <td data-label="Period">
                                            <a style="color:red;" href="<?= ROOT_URL ?>admin/delete-user.php?id=<?= $user['id'] ?>">
                                                <i class="fa fa-trash"></i>
                                            </a>

                                        </td>
                                    </tr>
                                <?php endwhile ?>


                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert__message error">No Users found</div>
                    <?php endif ?>
                </div>

            </div>

        </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>



</body>

</html>