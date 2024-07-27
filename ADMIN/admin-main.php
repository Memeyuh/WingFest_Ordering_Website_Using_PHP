<?php
require 'connection.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin | WingFest</title>

    <link rel="icon" href="images/LOGO-ICON.png">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="body-overlay"></div>

        <div id="sidebar">
            <div class="sidebar-header">
                <h3><img src="images/logo-icon.png" class="img-fluid"
                        style="padding-bottom: .5rem;" /><span>WINGFEST</span></h3>
            </div>

            <ul class="list-unstyled component m-0">
                <div class="subtitle">BASIC</div>
                <li class="active">
                    <a href="admin-main.php"><i class="material-icons">dashboard</i>Dashboard</a>
                </li>

                <li>
                    <a href="admin-users.php"><i class="material-icons">group</i>Registered Users </a>
                </li>

                <div class="subtitle" style="padding-top: 2rem;">MANAGE</div>

                <li class="dropdown">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">category</i>Categories
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu1">
                        <li><a href="admin-categ.php" style="padding-left: 2rem;"><i class="material-icons">menu</i>All
                                Category</a></li>
                        <li><a href="#" style="padding-left: 2rem;"><i class="material-icons">add</i>Add
                                Category</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">inventory</i>Products
                    </a>
                    <ul class="collapse list-unstyled menu" id="homeSubmenu2">
                        <li><a href="admin-prod.php" style="padding-left: 2rem;"><i class="material-icons">list</i>All
                                Products</a>
                        </li>
                        <li><a href="#" style="padding-left: 2rem;"><i class="material-icons">add</i>Add Products</a>
                        </li>
                    </ul>
                </li>

                <li class="">
                    <a href="admin-orders.php" class="users"><i class="material-icons">receipt</i>Orders</a>
                </li>

                <li class="">
                    <a href="admin-trans.php" class="users"><i class="material-icons">paid</i>Transaction</a>
                </li>
            </ul>
        </div>

        <!-- MAIN FORM -->
        <div id="content">
            <div class="top-navbar">
                <div class="xd-topbar">
                    <div class="row">
                        <div class="col-2 col-md-2 col-lg-4 order-2 order-md-1 align-self-center">
                            <div class="xp-menubar">
                                <span class="material-icons"
                                    style="font-size: 1.8rem; color: #3d4652;">signal_cellular_alt</span>
                            </div>
                        </div>

                        <div class="col-10 col-md-10 col-lg-8 order-1 order-md-3">
                            <div class="xp-profilebar text-right">
                                <nav class="navbar" style="background-color: transparent; align-items: center;">
                                    <ul class="nav navbar-nav flex-row ml-auto">
                                        <li class="dropdown nav-item">
                                            <a class="nav-link" href="#" data-toggle="dropdown">
                                                <i class="material-icons"
                                                    style="font-size: 2.4rem; padding: .2rem; border-radius: 50%;">person</i>
                                                <span class="xp-user-live"></span>
                                            </a>
                                            <ul class="dropdown-menu small-menu">
                                                <li><a href="admin-login.php" id="logout">
                                                        <span class="material-icons">logout</span>
                                                        Logout
                                                    </a></li>
                                                </input>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- MAIN CONTENT -->
            <div class="main-content">
                <div class="main-title">
                    <p class="font-weight-bold">DASHBOARD</p>
                </div>

                <div class="main-cards">
                    <div class="card">
                        <div class="card-inner">
                            <p>TOTAL CATEGORIES</p>
                            <span class="material-icons-outlined text-blue">category</span>
                        </div>
                        <span class="card-count">
                            <?php
                            $dash_categ_query = "SELECT * FROM categ";
                            $dash_categ_query_run = mysqli_query($conn, $dash_categ_query);

                            if ($category_total = mysqli_num_rows($dash_categ_query_run)) {
                                echo $category_total;
                            }
                            ?>
                        </span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p>TOTAL PRODUCTS</p>
                            <span class="material-icons-outlined text-orange">inventory_2</span>
                        </div>
                        <span class="card-count">
                            <?php
                            $dash_prod_query = "SELECT * FROM products";
                            $dash_prod_query_run = mysqli_query($conn, $dash_prod_query);

                            if ($prod_total = mysqli_num_rows($dash_prod_query_run)) {
                                echo $prod_total;
                            }
                            ?>
                        </span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p>PENDING ORDERS</p>
                            <span class="material-icons-outlined text-green">motorcycle</span>
                        </div>
                        <span class="card-count">
                            <?php
                            $dash_rev_query = "SELECT * FROM orders WHERE status='Delivered'";
                            $dashboard_order = mysqli_query($conn, $dash_rev_query);

                            if ($order_total = mysqli_num_rows($dashboard_order)) {
                                echo $order_total;
                            }
                            ?>
                        </span>
                    </div>

                    <div class="card">
                        <div class="card-inner">
                            <p>TOTAL TRANSACTIONS</p>
                            <span class="material-icons-outlined text-green">receipt</span>
                        </div>
                        <span class="card-count">
                            <?php
                            $dash_rev_query = "SELECT * FROM orders WHERE status = 'Delivered'";
                            $dashboard_order = mysqli_query($conn, $dash_rev_query);

                            if ($order_total = mysqli_num_rows($dashboard_order)) {
                                echo $order_total;
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="footer-in">
                        <p class="mb-0">&copy 2023 WINGFEST. All Rights Reserved.</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $(".xp-menubar").on('click', function () {
                $("#sidebar").toggleClass('active');
                $("#content").toggleClass('active');
            });

            $('.xp-menubar,.body-overlay').on('click', function () {
                $("#sidebar,.body-overlay").toggleClass('show-nav');
            });
        });
    </script>
</body>

</html>


<!-- STYLE -->
<style>
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
    }

    *,
    ::after,
    ::before {
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
        -webkit-transition: all 0.5s ease-in-out 0s;
        -o-transition: all 0.5s ease-in-out 0s;
        transition: all 0.5s ease-in-out 0s;
    }

    a:hover {
        text-decoration: none;
    }

    body,
    html {
        line-height: 1.8;
        font-family: 'Poppins', sans-serif;
        color: #555e58;
        text-transform: capitalize;
        font-weight: 400;
        margin: 0px;
        padding: 0px;
    }

    .subtitle {
        padding-bottom: .2rem;
        padding-top: 1rem;
        padding-left: 1rem;
        font-size: 1rem;
        font-weight: 600;
        font-family: 'Oswald';
        color: #a5a9ae;
    }

    @font-face {
        font-family: 'Material Icons';
        font-style: normal;
        font-weight: 400;
        src: local('Material Icons'),
            local('MaterialIcons-Regular');
    }

    .material-icons {
        font-family: 'Material Icons';
        font-weight: normal;
        font-style: normal;
        font-size: 24px;
        display: inline-block;
        line-height: 1;
        text-transform: none;
        letter-spacing: normal;
        word-wrap: normal;
        white-space: nowrap;
        direction: ltr;
    }


    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    .h1,
    .h2,
    .h3,
    .h4 {
        font-weight: 400;
        line-height: 1.5em;
    }

    p {
        font-size: 15px;
        margin: 12px 0 0;
        line-height: 24px;
    }

    a {
        color: #333;
        font-weight: 400;
    }

    button:focus {
        box-shadow: none;
        outline: none;
        border: none;
    }

    button {
        cursor: pointer;
    }

    ul,
    ol {
        padding: 0px;
        margin: 0px;
        list-style: none;
    }

    a,
    a:hover,
    a:focus {
        color: #333;
        text-decoration: none;
        transition: all 0.3s;
    }

    .wrapper {
        position: relative;
        width: 100%;
        overflow: auto;
    }

    #sidebar {
        position: fixed;
        height: 100% !important;
        top: 0;
        left: 0;
        bottom: 0;
        z-index: 11;
        width: 260px;
        overflow: auto;
        transition: all 0.3s;
        background-color: #02101d;
        box-shadow: 0 0 30px 0 rgba(200 200 200 / 20%);
    }

    @media only screen and (min-width:992px) {
        #sidebar.active {
            left: -260px;
            height: 100% !important;
            position: absolute !important;
            overflow: visible !important;
            top: 0;
            z-index: 666;
            float: left !important;
            bottom: 0 !important;
        }

        #content {
            width: calc(100% - 260px);
            position: relative;
            float: right;
            transition: all 0.3s;
        }

        #content.active {
            width: 100%;
        }
    }

    #sidebar::-webkit-scrollbar {
        width: 2px;
        border-radius: 10px;
        background-color: #ff9e2d;
        display: none;
    }

    #sidebar::-webkit-scrollbar-thumbs {
        width: 5px;
        border-radius: 10px;
        background-color: #333;
        display: none;
    }

    #sidebar:hover::-webkit-scrollbar-thumbs {
        display: block;
    }

    #sidebar:hover::-webkit-scrollbar {
        display: block;
    }

    #sidebar .sidebar-header {
        padding: .8rem;
        border-bottom: 1px solid #353b48;
    }

    .sidebar-header h3 {
        color: #ff9e2d;
        font-size: 2rem;
        margin: 0px;
        text-transform: uppercase;
        transition: all 0.5s ease;
        font-weight: 700;
        font-family: 'Oswald';
    }

    .sidebar-header h3 img {
        width: 45px;
        margin-right: 10px;
    }

    #sidebar ul li {
        padding: 2px 0px;
    }

    #sidebar ul li.active>a {
        color: #ff9e2d;
        background-color: #f7edd4;
    }

    #sidebar ul li.active>a i {
        color: #ff9e2d;
    }

    #sidebar ul li a:hover {
        color: #ff9e2d;
        background-color: #f7edd4;
        cursor: pointer;
    }

    .dropdown-toggle::after {
        position: absolute;
        right: 22px;
        top: 18px;
        color: #777777;
    }

    #sidebar ul li.dropdown {
        position: sticky;
    }

    #sidebar ul.component {
        padding: 20px 0px;
    }

    #sidebar ul li a {
        padding: 5px 10px 5px 20px;
        line-height: 30px;
        font-size: 15px;
        position: relative;
        font-weight: 400;
        display: block;
        color: #777777;
        text-transform: capitalize;
    }

    #sidebar ul li a i {
        position: relative;
        margin-right: 10px;
        top: 6px;
    }
</style>