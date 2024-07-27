<?php
session_start();
require 'connection.php';


////////////////////////// USER //////////////////////////

/***** CREATE *****/
if (isset($_POST['createUser'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 0) {
        $sql = "SELECT * FROM user WHERE uname='$uname'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 0) {
            if ($pwd === $cpwd) {
                if ($age >= 18 && $age <= 99) {
                    $query = "INSERT INTO user(fname, lname, address, birthdate, age, contact, email, gender, uname, pwd) VALUES ('$fname', '$lname', '$address', '$birthdate', '$age', '$contact', '$email', '$gender', '$uname', '$pwd')";
                    $query_run = mysqli_query($conn, $query);
                    if ($query_run) {
                        echo '<script>alert("User Successfully Added!"); window.location.href = "admin-users.php";</script>';
                    } else {
                        echo '<script>alert("Invalid User Input!"); window.location.href = "admin-users.php";</script>';
                    }
                } else {
                    echo '<script>alert("Age must be between 18-99 years old!"); window.location.href = "admin-users.php";</script>';
                }
            } else {
                echo '<script>alert("Password does not match!"); window.location.href = "admin-users.php";</script>';
            }
        } else {
            echo '<script>alert("Username already exists!"); window.location.href = "admin-users.php";</script>';
        }
    } else {
        echo '<script>alert("Email already exists. Please choose another!"); window.location.href = "admin-users.php";</script>';
    }
}

/***** READ DATA *****/
if (isset($_POST['checking_edit_btn'])) {
    $UID = $_POST['update_id'];
    $result_array = [];

    $query = "SELECT * FROM user WHERE UID='$UID'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    } else {
        echo $return = "<h5>No Record Found</h5>";
    }
}

/***** UPDATE *****/
if (isset($_POST['editUser'])) {
    $UID = $_POST['edit_id'];

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];



    if ($pwd === $cpwd) {
        if ($age >= 18 && $age <= 99) {
            $query = "UPDATE user SET fname='$fname',lname='$lname',address='$address',birthdate='$birthdate',age='$age',
            contact='$contact',gender='$gender',uname='$uname',pwd='$pwd' WHERE UID='$UID'";
            $query_run = mysqli_query($conn, $query);
            if ($query_run) {
                echo '<script>alert("User Successfully Updated!"); window.location.href = "admin-users.php";</script>';
            } else {
                echo '<script>alert("Invalid User Input!"); window.location.href = "admin-users.php";</script>';
            }
        } else {
            echo '<script>alert("Age must be between 18-99 years old!"); window.location.href = "admin-users.php";</script>';
        }
    } else {
        echo '<script>alert("Password does not match!"); window.location.href = "admin-users.php";</script>';
    }
}


/***** DELETE *****/
if (isset($_POST['deleteUser'])) {
    $UID = $_POST['delete_id'];

    $query = "DELETE FROM user WHERE UID='$UID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("User Successfully Deleted"); window.location.href = "admin-users.php"</script>';
    } else {
        echo "ERROR! " . mysqli_error($conn);
    }
}



////////////////////////// CATEGORY //////////////////////////

/***** CREATE *****/
if (isset($_POST['createCateg'])) {
    $cname = $_POST['cname'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = $_POST['status'];

    $query = "SELECT name FROM categ WHERE slug ='$slug'";
    $sql = mysqli_query($conn, $query);


    if (mysqli_num_rows($sql) == 0) {
        $query = "SELECT * FROM categ WHERE slug='$slug'";
        $lqs = mysqli_query($conn, $query);

        if (mysqli_num_rows($lqs) == 0) {
            $query = "INSERT INTO categ(name, slug, description, status) VALUES ('$cname', '$slug', '$description', '$status')";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo '<script>alert("Category Successfully Updated!"); window.location.href = "admin-categ.php";</script>';
            } else {
                echo "ERROR! " . mysqli_error($conn);
            }
        } else {
            echo '<script>alert("Category Slug is Already in Use!"); window.location.href = "admin-categ.php";</script>';
        }

    } else {
        echo '<script>alert("Category Name is Already in Use!"); window.location.href = "admin-categ.php";</script>';
    }
}

/***** READ DATA *****/
if (isset($_POST['categ_edit_btn'])) {
    $CID = $_POST['update_id'];
    $result_array = [];

    $query = "SELECT * FROM categ WHERE CID='$CID'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    } else {
        echo $return = "<h5>No Record Found</h5>";
    }
}

/***** EDIT *****/
if (isset($_POST['editCateg'])) {
    $CID = $_POST['edit_id'];

    $cname = $_POST['cname'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $status = $_POST['status'];


    $query = "UPDATE categ SET name='$cname',slug='$slug',description='$description',status='$status' WHERE CID='$CID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>alert("Category Updated Successfully"); window.location.href = "admin-categ.php";</script>';
    } else {
        echo '<script>alert("Something went wrong! Category failed to update!"); window.location.href = "admin-categ.php";</script>';
    }
}

/***** DELETE *****/
if (isset($_POST['deleteCateg'])) {
    $CID = $_POST['delete_id'];

    $query = "DELETE FROM categ WHERE CID='$CID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script> alert("Category Successfully Deleted"); window.location.href = "admin-categ.php"</script>';
    } else {
        echo "ERROR! " . mysqli_error($conn);
    }
}



////////////////////////// PRODUCT //////////////////////////

/***** CREATE *****/
if (isset($_POST['createProd'])) {
    $pname = $_POST['pname'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $image = $_FILES['image']['name'];
    // $tempname = $_FILES['image']['tmp_name'];
    // move_uploaded_file($tempname, 'Images/' . $image);

    if (file_exists("Images/" . $_FILES["image"]["name"])) {
        $store = $_FILES['image']['name'];
        $_SESSION['status'] = "Image already exists. '.$store.'";
        header('Location: admin-prod.php');
    } else {
        $query = "INSERT INTO products(Product_name, category, quantity, price, description, image) VALUES ('$pname', '$category', '$quantity','$price', '$description', '$image')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            move_uploaded_file($_FILES["image"]["tmp_name"], "Images/" . $_FILES["image"]["name"]);
            echo '<script>alert("Product Successfully Created!"); window.location.href = "admin-prod.php";</script>';
        } else {
            echo '<script>alert("Invalid Input! Try again!"); window.location.href = "admin-prod.php";</script>';
        }
    }
}

/***** READ DATA *****/
if (isset($_POST['prod_edit_btn'])) {
    $PID = $_POST['update_id'];
    $result_array = [];

    $query = "SELECT * FROM products WHERE Prod_ID='$PID'";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    } else {
        echo $return = "<h5>No Record Found</h5>";
    }
}

/***** UPDATE *****/
if (isset($_POST['editProd'])) {
    $PID = $_POST['edit_id'];

    $pname = $_POST['pname'];
    $category = $_POST['category'];
    $Availability = $_POST['Availability'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];

    $query = "UPDATE products SET Product_name='$pname',Category='$category',Availability='$Availability',Price='$price',Description='$description',image='$image' WHERE Prod_ID='$PID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        move_uploaded_file($_FILES["image"]["tmp_name"], "Images/" . $_FILES["image"]["name"]);
        echo '<script>alert("Product Successfully Updated!"); window.location.href = "admin-prod.php";</script>';
    } else {
        echo '<script>alert("Product Failed to Update. Check your inputs and try again!"); window.location.href = "admin-prod.php";</script>';
    }
}

/***** DELETE *****/
if (isset($_POST['deleteProd'])) {
    $PID = $_POST['delete_id'];

    $query = "DELETE FROM products WHERE Prod_ID='$PID'";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>alert("Product Successfully Deleted!"); window.location.href = "admin-prod.php";</script>';
    } else {
        echo "ERROR! " . mysqli_error($conn);
    }
}



////// VIEW ORDER //////
if (isset($_POST['order_view_btn'])) {
    $OID = $_POST['OID'];
    $result_array = [];

    $query = "SELECT o.*, u.email, u.UID, u.contact, u.address FROM orders o, user u WHERE OID=$OID AND o.UID=u.UID ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_num_rows($query_run) > 0) {
        foreach ($query_run as $row) {
            array_push($result_array, $row);
            header('Content-type: application/json');
            echo json_encode($result_array);
        }
    } else {
        echo $return = "<h5>No Record Found</h5>";
    }
}

///// EDIT ORDER /////
if (isset($_POST['editOrder'])) {
    $OID = $_POST['edit_id'];
    $status = $_POST['status'];

    $query = "UPDATE orders SET status='$status' WHERE OID='$OID'";
    $query_run = mysqli_query($conn, $query);
    if ($query_run) {
        echo '<script>alert("Order Successfully Updated!"); window.location.href = "admin-prod.php";</script>';
    } else {
        echo "ERROR! " . mysqli_error($conn);
    }
}



?>