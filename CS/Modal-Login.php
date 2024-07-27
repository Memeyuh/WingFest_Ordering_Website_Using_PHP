<!--Modal login code-->
<?php

if (isset($_POST['login'])) {
	session_start();
	include 'connection.php';
    $Username = $_POST['email'];
    $Password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$Username' AND pwd='$Password';";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        $_SESSION['Username'] = $_POST['email'];
            echo '<script>alert("Login Successfully!");window.location.href = "MENU.php";</script>';
    }else {
        //Check if both credentials exists
        $both = "SELECT * FROM user WHERE email='$Username' || pwd = '$Password'";
        $records = $conn->query($both);

        if ($records->num_rows == 0) {
             echo '<script>alert("Incorrect Email or Password");</script>';
        } else {
            $sql = "SELECT * FROM user WHERE email='$Username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                 echo '<script>alert("Incorrect Password");</script>';
            } else {
                 echo '<script>alert("Incorrect Email");</script>';
            }
        }
    }
}

?>
<style>
    .modal-header{
        background: #ff9e2d;
    }
    .modal-header a{
        color: white;
        font-size: 25px;
    }

    .modal .modal-body {
        text-align: center;
        justify-content: center;
        justify-items: center;
        margin-top: 20px;
    }
    .modal .modal-body input{
        border: 2px solid #b6b6b6;
        border-radius: 3px;
        font-size: 15px;
        width: 65%;
        line-height: 30px;

    }

    .modal .modal-body .lemail{
        margin-left: -5px;
        margin-right: 10px;
        font-size: 20px;
    }
    .modal .modal-body .lpass{
        margin-left: -50px;
        margin-right: 10px;
        font-size: 20px;
    }

    .modal .modal-body button{
        border: 20px;
        border-radius: 15px;
        height: 40px;
        background: black;
        color: white;
        font-size: 18px;
        text-transform: uppercase;
        width: 30%;
        margin-bottom: 10px;
    }

    .modal .modal-body .button:hover{
        background: #ea032e;
        color: white;
    }

    .modal .modal-body p, a{
        font-size: 15px;
    }

    .modal .modal-body a{
        color: crimson;
    }
    
</style>
<form method="POST" action="">
 <div class="modal fade" id="staticBackdrop" id = "#modal" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="false" style="text-align: center;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel" >
                        <a onclick = "navToggle();" href = "#">Login</a>                     
                    </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span>x</span>
                        </button>
                </div>
                <div class="modal-body">
                   
                    <label class = "lemail" for = "email">Email:</label>
                    <input type="email" name="email" id="email" required placeholder="Enter your email" ><br><br>
                    
                    <label class = "lpass" for = "email">Password:</label>
                    <input type="password" name="password" id="password" required placeholder="Enter your password" ><br><br>
                    
                    <button class = "button" type="submit" name="login" value="Login">Login</button>
                    
                    <p>Don't have an account yet? <a href="user-login.php">Register now</a></p>
                    
                </div>
                    
            </div>
        </div>
    </div>
</form>          