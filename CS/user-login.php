<?php
//Data Validation
if (isset($_POST['submit'])) {

  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $age = $_POST['age'];
  $contactno = $_POST['contactno'];

  $length = strlen($contactno);
  $email = filter_var($email, FILTER_SANITIZE_EMAIL);

}
?>

<?php 
session_start();
include 'connection.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $address = $_POST['address'];
    $birthdate = $_POST['birthdate'];//not yet
    $age = $_POST['age'];
    $gender = $_POST['gender'];//not yet
    $contact = $_POST['contactno'];//notyet
    $email = $_POST['email'];
    $uname = $_POST['username'];//not yet
    $pwd = $_POST['password'];//not yet
    $cpwd = $_POST['cpassword'];//notyet


    $uppercase = preg_match('@[A-Z]@', $pwd);
    $lowercase = preg_match('@[a-z]@', $pwd);
    $number    = preg_match('@[0-9]@', $pwd);
    $specialChars = preg_match('@[^\w]@', $pwd);

    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($pwd) < 8) {
  
        //echo '<script>alert("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");</script>';
		//echo ("Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.");

    }else{

           if ($pwd === $cpwd) {
            $query = "INSERT INTO user(fname, lname, address, birthdate, age, contact, email, gender, uname, pwd) VALUES ('$fname', '$lname', '$address', '$birthdate', '$age', '$contact', '$email',
             '$gender', '$uname', '$pwd')";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {

                $to = $email;
                $subject = "Wing Fest Account Created";
                $body = "Welcome! This is a confirmation that you have successfully created an account! We're glad to have you join us.";
               
                mail($to,$subject,$body);

                echo '<script>alert("Account Successfully Created! Proceed to Login"); window.location.href = "INDEX.php";</script>';
            } else {
                echo '<script>alert("User cannot be added");</script>';
            }
        } else {
            echo '<script>alert("Password does not match");</script>';
        }

    }  
}


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title> Register an Account | WingFest </title>
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



</head>

<body>
  <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <div class="container">
      <div class="content">
        <div class="subtitle">Personal Details</div>
        <form>
          <div class="user-details">
            <div class="input-box">
              <span class="details">First Name</span>
              <input type="text" name="fname" id="fname" minlength="2" placeholder="Enter your first name" required onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)">
            </div>

            <div class="input-box">
              <span class="details">Last Name</span>
              <input type="text" name="lname" id="lname" minlength="2" placeholder="Enter your last name" required onkeypress="return (event.charCode > 64 && 
                                            $event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode > 31 && event.charCode < 33)">
            </div>

            <div class="input-box" style="width: calc(100% / 1 - 0px)">
              <span class="details">Address</span>
              <input type="text" name="address" placeholder="Enter your address" required">
            </div>

            <div class="input-box" style="width: calc(100% / 2 - 20px)">
              <span class="details">Date of Birth</span>
              <span id="birthday">
                <input type="date" name="birthdate" id="dob" onmousemove="getAge()"required min = "1933-01-01" max="2005-06-30">
              </span>
            </div>

            <div class=" input-box" style="width: calc(100% / 2 - 0px)">
              <span class="details">Age</span>
              <input type="number" name="age" readonly="true" id="age">
            </div>

            <div class=" input-box" style="width: calc(100% / 1 - 0px)">
              <span class="details">Contact Number</span>
              <input type="text" name="contactno" id="contactno"  minlength="11"  maxlength="11" placeholder="####-###-####" required onkeypress="return (event.charCode > 47 && event.charCode < 58)">
            </div>

            <div class="input-box" style="width: calc(100% / 1 - 0px)">
              <span class="details">Email Address</span>
              <input type="email" name="email" id="email" placeholder="email@yahoo.com" minlength="20"
                maxlength="100" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
            </div>
          </div>

          <div class="gender-details">
            <input type="radio" name="gender" id="dot-1" value = "Male">
            <input type="radio" name="gender" id="dot-2" value = "Female">
            <input type="radio" name="gender" id="dot-3" value = "Prefer not to say">
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
      </div>

      <div class="content">
        <div class="subtitle">Account Details</div>
        <form>
          <div class="user-details">
            <div class="input-box" style="width: calc(100% / 1 - 0px)">
              <span class="details">Username</span>
              <input type="text" name="username" id="username" maxlength="12" minlength="6"
                placeholder="Enter your username" required>
            </div>
            <div class="input-box" style="width: calc(100% / 1 - 0px)">
              <span class="details">Password</span>
              <input type="password" name="password" id="password" maxlength="16" minlength="8"
                pattern="(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}" placeholder="Enter your password" required>
				<p style="color: #8b9194;">Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>
            </div>
            <div class="input-box" style="width: calc(100% / 1 - 0px)">
              <span class="details">Confirm Password</span>
              <input type="password" name="cpassword" id="cpassword" maxlength="16" minlength="8"
                placeholder="Confirm your password" required>
            </div>
          </div>
        </form>
        <div class="button">
          <input type="submit" name="submit" id="regBtn" value="Register">
          <a style =  "font-size: 15px;" href = "INDEX.php">Return to Home</a>
        </div>
               
      </div>
    </div>
  </form>
  <script src="js/user-login.js"></script>
</body>

</html>


<style>
  @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@400;600;700&display=swap');
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Oswald', sans-serif;
  }

  body {
    display: flex;
    flex-direction: column;
    height: 100vh;
    justify-content: center;
    align-items: center;
    padding: 10px;
    background: #ff9e2d;
  }

  .container {
    display: flex;
    column-gap: 2rem;
    height: 100%;
    width: 100%;
    background-color: #fff;
    padding: 25px 30px;
    border-radius: 5px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
  }

  .container .title {
    font-size: 2.5rem;
    font-weight: 700;
    position: relative;
  }

  .container .subtitle {
    font-size: 1.8rem;
    text-align: center;
    color: #8b9194;
  }

  .content .user-details {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 20px 0 12px 0;
  }

  .user-details .input-box {
    margin-bottom: 15px;
    width: calc(100% / 2 - 20px);
  }

  .input-box span.details {
    display: block;
    font-weight: 500;
    margin-bottom: 5px;
    font-size: 1.3rem;
  }

  .user-details .input-box input {
    height: 45px;
    width: 100%;
    outline: none;
    font-size: 0.9rem;
    border-radius: 10px;
    padding-left: 15px;
    border: 1px solid #ccc;
    border-bottom-width: 2px;
    transition: all 0.3s ease;
    font-weight: 400;
    font-family: 'Poppins', sans-serif;
  }

  .user-details .input-box input:focus,
  .user-details .input-box input:valid {
    border-color: #ff9e2d;
  }

  #birthday {
    margin: 20px 0;
  }

  #birthday label {
    font-size: 1.1rem;
    padding: 0 0.1rem 0 0;
  }

  #birthday select {
    font-family: 'Poppins';
    font-size: 0.9rem;
    height: 42px;
    border-radius: 10px;
    width: 110px;
  }

  .gender-details {
    margin-top: -10px;
  }

  form .gender-details .gender-title {
    font-size: 20px;
    font-weight: 500;
  }

  .gender-details span {
    font-family: 'Poppins';
  }

  .category {
    display: flex;
    width: 80%;
    margin: 14px 0;
    justify-content: space-between;
  }

  .category label {
    display: flex;
    align-items: center;
    cursor: pointer;
  }

  .category label .dot {
    height: 18px;
    width: 18px;
    border-radius: 50%;
    margin-right: 10px;
    background: #d9d9d9;
    border: 5px solid transparent;
    transition: all 0.3s ease;
  }

  #dot-1:checked~.category label .one,
  #dot-2:checked~.category label .two,
  #dot-3:checked~.category label .three {
    background: #ff9e2d;
    border-color: #d9d9d9;
  }

  form input[type="radio"] {
    display: none;
  }

  .button {
    height: 45px;
    width: 100%;
    margin: 35px 0;
    justify-content: center;
    text-align: center;
  }

  .button input {
    height: 100%;
    width: 100%;
    border-radius: 10px;
    margin-bottom: 10px;
    border: none;
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s ease;
    background: #e80028;
  }

  .button input:hover {
    /* transform: scale(0.99); */
    background: #ff9e2d;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    display: none;
  }

  @media(max-width: 584px) {
    .container {
      max-width: 100%;
    }

    form .user-details .input-box {
      margin-bottom: 15px;
      width: 100%;
    }

    form .category {
      width: 100%;
    }

    .content form .user-details {
      max-height: 300px;
      overflow-y: scroll;
    }

    .user-details::-webkit-scrollbar {
      width: 5px;
    }

    @media(max-width: 459px) {
      .container .content .category {
        flex-direction: column;
      }
    }
  }
</style>