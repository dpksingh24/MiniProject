<header>
    <section>
        <a href="#" id="logo">Movie Booking</a>
        <label for="toggle-1" class="toggle-menu">
            <ul>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </label>
        <input type="checkbox" id="toggle-1">
        <nav>
            <ul>
                <li><a href="#logo">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <?php if( isset($_SESSION['id']) && !empty($_SESSION['id']) )
                    {
                    ?>
                <li><a href="<?php echo $user->username; ?>"><?php echo $user->screenname; ?></a></li>
                <li><a href="includes/logout.php">Logout</a></li>
                <?php }else{ ?>
                <li><a href="index.php"><i class="fa fa-lock"></i>Login</a></li>
                <li><a href="includes/signup.php"><i class="fa fa-user"></i>Signup</a></li>
                <?php } ?>
            </ul>
        </nav>
    </section>
</header>