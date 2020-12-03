<?php
include '../core/init.php';

if(isset($_POST['signup'])){
    $screenName = $_POST['screenName'];
    $password   = $_POST['password'];
	$email      = $_POST['email'];
	$error      = '';

	if(empty($screenName) or empty($password) or empty($email)){
		$error = 'All fields are required';
	}else {
        $screenName = $getFromU->checkInput($screenName);
		$email      = $getFromU->checkInput($email);
        $password   = $getFromU->checkInput($password);
        

		if(!filter_var($email)) {
			$error = 'Invalid email format';
		}else if(strlen($screenName) > 20){
			$error = 'Name must be between in 6-20 characters';
		}else if(strlen($password) < 5){
			$error_password = 'Password is too short';
		}else {
            //user will not submit dublicate email
			if($getFromU->checkEmail($email) === true){
				$error = 'Email is already in use';
			}else {
               $getFromU->register($email, $screenName, $password);
            //    $user_id = $_SESSION['id'];
               header('Location: ../home.php');
			}
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="../assets/img/signup.jpg">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Sign up</h2>
                <form method="post">
                    <div class="inputBx">
                        <span>fullname</span>
                        <input type="text" name="screenName" placeholder="Full Name" />
                    </div>
                    <div class="inputBx">
                        <span>email</span>
                        <input type="email" name="email" placeholder="Email" />
                    </div>
                    <div class="inputBx">
                        <span>password</span>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="signup" Value="Signup">
                    </div>
                    <div class="inputBx">
                        <label><a href="../index.php"><span style="text-decoration:none; color:#222;">
                                    already have an account?</span> Login</a></label>
                    </div>
                    <?php
                    if(isset($error)){
                        echo '<li class="error_message">'.$error.'</li>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>

</body>

</html>