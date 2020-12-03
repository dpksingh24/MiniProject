<?php
    include 'core/init.php';   
    $user_id = $_SESSION['id'];
    $user = $getFromU->userData($user_id);
 // $getFromU->update('users', $user_id, array('username' => 'deepu'));

    // $getFromU->create('users', array('username' => 'dpkrwt', 'email' => 'demo@gmail.com', 'password' => md5('123456')));
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>

    <link rel="stylesheet" href="assets/css/header.css">
    <link href="assets/css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/css/jquery.desoslide.css">
    <link href="assets/css/style.css" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body>
    <!-- header -->
    <?php include 'header.php';
?>



    <div class="container mt-5">
        <!-- data-panel -->
        <div class="row" id="data-panel">
            <!-- print movie list here -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="show-movie-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show-movie-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="show-movie-body">
                    <div class="row">
                        <div class="col-sm-8" id="show-movie-image"></div>
                        <div class="col-sm-4">
                            <p><em id="show-movie-date"></em></p>
                            <p id="show-movie-description"></p>
                            <a href="seatselection.php" class="cart-action">
                                <input type="submit" value="Book Your Seat" class="btnAddAction" />
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>



    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>


    <script src="api/main.js"></script>

    <!-- js -->
    <script src="assets/js/jquery-2.2.3.min.js"></script>
    <!-- //Custom-JavaScript-File-Links -->
    <script src="assets/js/bootstrap.js"></script>
    <script src="api/main.js"></script>
</body>

</html>