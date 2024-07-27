<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <link rel="icon" href="images/LOGO-ICON.png">

</head>


<title>Admin | WingFest</title>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="admin-login.php">WINGFEST</a>
      <form class="d-flex">
        <div class="line"></div>
        <h3 class="navbar-label">ADMIN<h3>
      </form>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg" id="navbar2">
    <div class="container-fluid flex-row-reverse">
      <form class="d-flex">
        <button class="btn btn-outline-success" type="submit"><a href="../cs/index.php"
            style="text-decoration: none; font-family: 'Poppins'; font-weight: 500; color: #FFF"> to Main
            Website</a></button>
      </form>
    </div>
  </nav>

  <div class="center">
    <h1>ADMIN LOGIN</h1>

    <form method="post" action="">
      <div class="txt_field">
        <input type="text" name="uname" maxlength="12" required>
        <span></span>
        <label>Username</label>
      </div>
      <div class="txt_field">
        <input type="password" name="pass" maxlength="16" required>
        <span></span>
        <label>Password</label>
      </div>
      <input type="submit" id="login" name="login" value="Continue">
  </div>
  </form>
  </div>

</html>

<?php
session_start();
require 'connection.php';

if (isset($_POST['login'])) {
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];

  $query = "SELECT * FROM admin WHERE username='$uname'";
  $exist = mysqli_query($conn, $query);
  $count = mysqli_num_rows($exist);

  if ($count > 0) {
    $sql = "SELECT * FROM admin WHERE username='$uname' AND pwd='$pass'";
    $check = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($check);

    if ($result > 0) {
      foreach ($check as $row) {
        $AID = $row['admin_id'];
        $uname = $row['username'];
        $pass = $row['pwd'];
      }
      $_SESSION['auth'] = true;
      $_SESSION['auth_user'] = [
        'AID' => $AID,
        'uname' => $uname,
        'pass' => $pass
      ];
      ?>
      <script>
        Swal.fire({
          position: 'center',
          icon: 'success',
          title: 'Successfully Logged In!',
          showConfirmButton: true
        }).then(function () {
          window.location.href = "admin-main.php";
        });
      </script>
      <?php
    } else {
      ?>
      <script>
        Swal.fire({
          icon: 'error',
          title: 'Oops...',
          text: 'Invalid Login Credentials!',
        });
      </script>
      <?php
    }
  } else {
    ?>
    <script>
      Swal.fire({
        icon: 'Error!',
        title: 'Oops...',
        text: 'Account does not Exist!',
      });
    </script>
<?php
  }
}
?>

<!-- CSS -->
<style>
  @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }

  body {
    margin: 0;
    padding: 0;
    background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('Images/admin-login-bg.jpg');
    background-size: cover;
    height: 100vh;
    width: 100%;
    overflow: hidden;
  }

  #navbar2 {
    background: #ff9e2d;
    padding-right: 0;
    padding-bottom: 0.4rem;
    padding-top: 0.4rem;
  }

  .navbar {
    padding: .5rem 1.2rem;
    z-index: 999;
  }

  .navbar-light .navbar-brand {
    color: #ff9e2d;
  }

  .btn {
    margin: 0.2rem 0 0.2rem;
    border-color: #201a1f;
  }

  .btn:hover {
    background-color: #e6002c;
    border: 1px solid #000;
  }

  .btn[type=submit] {
    font-size: 1.2rem;
    color: #000;
  }

  .btn[type=submit]:hover {
    color: #FFF;
  }

  .navbar-brand {
    font-weight: 700;
    font-size: 2.5rem;
  }

  .navbar-label {
    text-decoration: none;
    color: #201a1f;
    align-self: center;
    font-size: 1.6rem;
    font-weight: 400;
  }

  .line {
    border-left: 4px solid #e6002c;
    height: 3rem;
    padding-right: 1rem;
  }

  .center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 400px;
    background: white;
    border-radius: 10px;
    box-shadow: 10px 10px 15px rgba(0, 0, 0, 0.05);
    height: 23rem;
    width: 25rem;
  }

  .center h1 {
    font-weight: 700;
    font-size: 2.5rem;
    text-align: center;
    padding: 1.5rem;
    border-bottom: 1px solid #adadad;
    color: #010f1c;
  }

  .center form {
    padding: 0 2rem;
    box-sizing: border-box;
  }

  form .txt_field {
    position: relative;
    border-bottom: 2px solid #adadad;
    margin: 30px 0;
  }

  .txt_field input {
    width: 100%;
    padding: 0 5px;
    height: 40px;
    font-size: 1rem;
    border: none;
    background: none;
    outline: none;
    font-family: 'Poppins', sans-serif;
    text-decoration: none;
  }

  .txt_field label {
    position: absolute;
    top: 50%;
    left: 5px;
    color: #adadad;
    transform: translateY(-50%);
    font-size: 1.3rem;
    pointer-events: none;
    transition: .5s;
  }

  .txt_field span::before {
    content: '';
    position: absolute;
    top: 40px;
    left: 0;
    width: 0%;
    height: 2px;
    background: #ff9e2d;
    transition: .5s;
  }

  .txt_field input:focus~label,
  .txt_field input:valid~label {
    top: -5px;
    color: #ff9e2d;
  }

  .txt_field input:focus~span::before,
  .txt_field input:valid~span::before {
    width: 100%;
  }

  .pass {
    margin: -5px 0 20px 5px;
    color: #a6a6a6;
    cursor: pointer;
  }

  .pass:hover {
    text-decoration: underline;
  }

  input[type="submit"] {
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #e6002c;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
    margin-top: 0.5rem;
    font-size: 1.3rem;
  }

  input[type="submit"]:hover {
    border-color: #070a11;
    transition: .5s;
  }


  @media screen and (max-width: 300px) {
    .center {
      max-width: 70%;
      max-height: 60%;
    }
  }
</style>