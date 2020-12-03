<?php

include 'core/init.php';

if(isset($_POST['login']) && !empty($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // user submit empty form show error
    if(!empty($email) or !empty($password)) {
        $email = $getFromU->checkInput($email);
        $password = $getFromU->checkInput($password);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errorMsg = "invalid format";
        }else {
            if($getFromU->login($email, $password) === false){
                $errorMsg = "The email or password is incorrect!";
            }
        }
    } else{
        $errorMsg = "Please enter username and password!";
    }
}
?>


<body>
    <section>
        <div class="imgBx">
            <img src="assets/img/login.jpg">
        </div>

        <div class="contentBx">
            <div class="formBx">
                <h2>Login</h2>
                <form method="post">
                    <div class="inputBx">
                        <span>username</span>
                        <input type="text" name="email" placeholder="Please enter your Email here" />
                    </div>
                    <div class="inputBx">
                        <span>password</span>
                        <input type="password" name="password" placeholder="password" />
                    </div>
                    <div class="remember">
                        <label><input type="checkbox" name=""> Remember me</label>
                    </div>
                    <div class="inputBx">
                        <input type="submit" name="login" value="Log in" />
                    </div>
                    <div class="inputBx">
                        <label><a href="includes/signup-form.php"><span style="text-decoration:none; color:#222;">
                                    New user?</span> Create an account</a></label>
                    </div>

                    <?php
                    if (isset($errorMsg)){
                    echo '<li class="error_message">'.$errorMsg.'</li>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </section>

</body>

</html>