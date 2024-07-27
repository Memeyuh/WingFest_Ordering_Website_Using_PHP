<?php
session_start();
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Admin | WingFest</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


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
                <li>
                    <a href="admin-main.php"><i class="material-icons">dashboard</i>Dashboard</a>
                </li>

                <li class="active">
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
                        <li><a href="#" data-toggle="modal" style="padding-left: 2rem;"><i
                                    class="material-icons">add</i>Add Category</a>
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
                                                <a href="admin-login.php" id="logout">
                                                    <span class="material-icons">logout</span>
                                                    Logout
                                                </a>
                                        </li>
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
                <div class="form-group" style="width: 98%; margin-bottom: 0; margin-top: 1rem;">
                    <input type="text" id="search" placeholder="Search here..." class="form-control">
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">
                            <div class="table-title">
                                <div class="row">
                                    <div class="col-sm-6 p-0 flex justify-content-lg-start justify-content-center">
                                        <h2 class="ml-lg-2">Manage
                                            Registered Users</h2>
                                    </div>
                                    <div class="col-sm-6 p-0 flex justify-content-lg-end justify-content-center">
                                        <a href="#addUserModal" class="btn btn-success" data-toggle="modal">
                                            <i class="material-icons">&#xE147;</i>
                                            <span style="font-size: .9rem">Add New User</span></a>
                                    </div>
                                </div>
                            </div>

                            <table class="table table-striped table-hover" id="dataTable" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th scope="col" style="font-weight: bolder">ID</th>
                                        <th scope="col" style="font-weight: bolder">First Name</th>
                                        <th scope="col" style="font-weight: bolder">Last Name</th>
                                        <th scope="col" style="font-weight: bolder">Address</th>
                                        <th scope="col" style="font-weight: bolder">Birthdate</th>
                                        <th scope="col" style="font-weight: bolder">Age</th>
                                        <th scope="col" style="font-weight: bolder">Gender</th>
                                        <th scope="col" style="font-weight: bolder">Contact No.</th>
                                        <th scope="col" style="font-weight: bolder">Email</th>
                                        <th scope="col" style="font-weight: bolder">Username</th>
                                        <th scope="col" style="font-weight: bolder">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="dataTbl">
                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "wingfest");
                                    $query = "SELECT * FROM user";
                                    $query_run = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($query_run)) {
                                        ?>
                                        <tr>
                                            <td class="user_id">
                                                <?php echo $row['UID']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['fname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['lname']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['birthdate']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['age']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['gender']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['contact']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['uname']; ?>
                                            </td>
                                            <td>

                                                <a href="#editUserModal" class="editBtn" style="color: #ffc107;"
                                                    data-toggle="modal">
                                                    <i class="material-icons" data-toggle="tooltip" title="Edit"
                                                        style="font-size: 1.5rem;">&#xE254;</i>
                                                </a>

                                                <a href="#deleteUserModal" class="deleteBtn" style="color: #f44336;"
                                                    data-toggle="modal">
                                                    <i class="material-icons" data-toggle="tooltip" title="Delete"
                                                        style="font-size: 1.5rem;">&#xE872;</i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!----- ADD MODAL ------>
                    <div class="modal fade" tabindex="-1" id="addUserModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create a User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="scrud.php" method="POST">
                                    <div class="modal-body">
                                        <div class="form-group" style="text-transform: uppercase;">
                                            <label>First Name</label>
                                            <input type="text" name="fname" class="form-control" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                                minlength="2" maxlength="25" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label style="text-transform: uppercase;">
                                            <input type="text" name="lname" class="form-control" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)"
                                                minlength="2" maxlength="25" required>
                                        </div>
                                        <div class=" form-group" style="width: calc(100% / 1 - 0px)">
                                            <label>Address</label>
                                            <textarea type="text" class="form-control" name="address" spellcheck="false"
                                                minlength="10" required onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33) || (event.charCode > 43 && event.charCode < 47)"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="birthdate" id="dob" required
                                                onmousemove=getAge()  min = "1933-01-01" max="2005-06-30">
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="number" name="age" readonly="true" id="age" readonly="true"
                                                class="form-control" required>
                                        </div>
                                        <div class="gender-details">
                                            <input type="radio" name="gender" id="dot-1" value="male" required>
                                            <input type="radio" name="gender" id="dot-2" value="female" required>
                                            <input type="radio" name="gender" id="dot-3" value="prefer not to say"
                                                required>
                                            <span class="gender-title">Gender</span>
                                            <div class="category">
                                                <label for="dot-1">
                                                    <span class="dot one"></span>
                                                    <span class="gender">Male</span>
                                                </label>
                                                <label for="dot-2">
                                                    <span class="dot two"></span>
                                                    <span class="gender">Female</span>
                                                </label>
                                                <label for="dot-3">
                                                    <span class="dot three"></span>
                                                    <span class="gender">Prefer not to say</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" name="contact" class="form-control" required id="contact" placeholder="####-###-####" minlength="11"  maxlength="11" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" class="form-control" minlength="20"
                                                maxlength="35" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="uname" class="form-control" minlength="6"
                                                maxlength="15" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="pwd" minlength="6" maxlength="12"
                                                class="form-control" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="cpwd" minlength="6" maxlength="12"
                                                class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="createUser" class="btn btn-success">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!----- EDIT MODAL ----->
                    <div class="modal fade" tabindex="-1" id="editUserModal" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="scrud.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="edit_id" id="edit_id">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" name="fname" id="fname" class="form-control" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" name="lname" id="lname" class="form-control" onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"
                                                required>
                                        </div>
                                        <div class="form-group" style="width: calc(100% / 1 - 0px)">
                                            <label>Address</label>
                                            <textarea type="text" class="form-control" name="address" id="address"
                                                spellcheck="false" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" class="form-control" name="birthdate" id="dob2"
                                                onchange=editAge() required>
                                        </div>
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input type="number" class="form-control" readonly="true" name="age"
                                                id="age2" required>
                                        </div>
                                        <div class="gender-details">
                                            <input type="radio" name="gender" id="dot-4" class="form-check-input"
                                                value="male" required>
                                            <input type="radio" name="gender" id="dot-5" class="form-check-input"
                                                value="female" required>
                                            <input type="radio" name="gender" id="dot-6" class="form-check-input"
                                                value="prefer not to say" required>
                                            <span class="gender-title">Gender</span>
                                            <div class="category">
                                                <label for="dot-4">
                                                    <span class="dot four"></span>
                                                    <span class="gender">Male</span>
                                                </label>
                                                <label for="dot-5">
                                                    <span class="dot five"></span>
                                                    <span class="gender">Female</span>
                                                </label>
                                                <label for="dot-6">
                                                    <span class="dot six"></span>
                                                    <span class="gender">Prefer not to say</span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Contact Number</label>
                                            <input type="text" name="contact" id="contact" class="form-control"
                                                minlength="11" maxlength="11" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                disabled="true" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="uname" id="uname" class="form-control"
                                                minlength="6" maxlength="12" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="pwd" id="pwd" class="form-control"
                                                minlength="6" maxlength="15" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <input type="password" name="cpwd" id="cpwd" minlength="6" maxlength="15"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="editUser"
                                            class="btn btn-warning text-light">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!----- DELETE MODAL ----->
                    <div class="modal fade" tabindex="-1" id="deleteUserModal" role="dialog" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="height: 300px; width: 500px">
                            <div class="modal-content" stlye="padding: 0; margin: 0;">
                                <div class=" modal-header">
                                    <h5 class="modal-title">Delete User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="scrud.php" method="POST">
                                    <div class="modal-body" style="margin-top: 0; margin-bottom: 2.5rem;">
                                        <input type="hidden" name="delete_id" id="delete_id">
                                        <p style="font-size: 1.3rem">Are you sure you want to delete this
                                            record?</p>
                                        <p class="text-danger"><small>Warning: This action cannot be
                                                undone.</small></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" name="deleteUser" class="btn btn-danger">Delete</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
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

            $(function () {
                $('input').blur(function () {
                    $(this).val(
                        $.trim($(this).val())
                    );
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('.deleteBtn').on('click', function () {
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                $('#delete_id').val(data[0]);
            })
            $
        })
    </script>

    <script>
        $(document).ready(function () {

            $('.editBtn').on('click', function (e) {
                e.preventDefault();
                var user_id = $(this).closest('tr').find('.user_id').text();

                $.ajax({
                    type: "POST",
                    url: "scrud.php",
                    data: {
                        'checking_edit_btn': true,
                        'update_id': user_id,
                    },
                    success: function (response) {
                        console.log(response);
                        $.each(response, function (key, value) {
                            $('#edit_id').val(value['UID']);
                            $('#fname').val(value['fname']);
                            $('#lname').val(value['lname']);
                            $('#address').val(value['address']);
                            $('#dob2').val(value['birthdate']);
                            $('#age2').val(value['age']);
                            $('gender').val(value['gender']);
                            $('#contact').val(value['contact']);
                            $('#email').val(value['email']);
                            $('#uname').val(value['uname']);
                            $('#pwd').val(value['pwd']);
                        })
                    }
                });
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            $('#search').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#dataTbl tr').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
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
        src: url(https://example.com/MaterialIcons-Regular.eot);
        src: local('Material Icons'),
            local('MaterialIcons-Regular'),
            url(https://example.com/MaterialIcons-Regular.woff2) format('woff2'),
            url(https://example.com/MaterialIcons-Regular.woff) format('woff'),
            url(https://example.com/MaterialIcons-Regular.ttf) format('truetype');
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

    #search-input {
        --mdb-gutter-x: 1.5rem;
        --mdb-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(var(--mdb-gutter-y)*-1);
        margin-right: calc(var(--mdb-gutter-x)*-0.5);
        margin-left: calc(var(--mdb-gutter-x)*-0.5);
    }
</style>