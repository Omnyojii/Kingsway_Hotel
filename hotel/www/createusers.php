<?php 
include "auth.php";
include "function.php";
$connect = connectdb();


    $newID = $_GET['id'];
    // $user = $_GET['user'];
    // $pass = $_GET['pass'];

if (isset($_POST['register'])){
    $id = $_POST['id'];
    $username = $_POST['username'];
	$password = $_POST['password'];

    $sql = "UPDATE admin SET username = '$username', password = '$password' WHERE adminID = '$id'";


    try {
        insert('admin', $data);
        echo "<script type='text/javascript'>alert('username successfully registered');</script>";
    } catch (mysqli_sql_exception $e) {
        echo '<script type="text/javascript">alert("Error!");</script>';
    }
}

if (isset($_POST['update'])){
    $username = $_POST['username'];
	$password = $_POST['password'];

    $data = array(
        'username' => $username,
        'password' => $password,
    );

    try {
        insert('admin', $data);
        echo "<script type='text/javascript'>alert('username successfully registered');</script>";
    } catch (mysqli_sql_exception $e) {
        echo '<script type="text/javascript">alert("Error!");</script>';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>KingsWay Inn</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!-- <link rel="alternate" href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" type="application/atom+xml" title="Atom"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;500;600&family=Montserrat:ital,wght@0,100;1,100&family=Raleway:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
    <script src="script.js"></script>

    <style>

    </style>
</head>

<body>
	<section class="cnav menu col-12 col">
        <nav class="col-12 col">
            <ul class="col menuflat col-12 clinks6">
                <a href="index.php#Home" class="clogo" style="margin-left:6%;"><img class="logo" src="images/logo-inline.png" alt=""></a>
                <a href="reservations.php" class="c-button cbooking">Reservations</a>
                <a href="customers.php" class="c-button cbooking">Customers</a>
                <a href="inquiries.php" class="c-button cbooking">Inquiries</a>
                <a href="managerooms.php" class="c-button cbooking">Manage Rooms</a>
                <a href="createusers.php" class="c-button cbooking">Manage User</a>
                <a href="viewusers.php" class="c-button cbooking">View Users</a>
                <a href="logout.php" class="c-button cbooking">Logout</a>
            </ul>
        </nav>
    </section>
    <header class="col-12 col">
        <!-- <img src="images/room4.png" alt="profile" class="col-12 banner"> -->
        <div class="cite">
            <h1>Manage User</h1>
        </div>
    </header>
	<section id="" class="col-12 col">
		<div id="wrapper">
            <div id="login" class="container card2 col-4">
                <h1>Registration</h1>
                <form name="registration" action="" method="post" class="formcon"> 
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="username" type="text" name="username"  placeholder="Your ID Number" required/>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" id="password" type="password" name="password"  placeholder="Password" required/> 
                    </div>
                    <div class="col-6">
                        <input id="toggle" type="checkbox" onclick="togglePass()" class="">
                        <label for="toggle">Show Password </label>
                    </div>
                    <br>
                    <div class="btn-container">
                        <button type="submit" name="register" value="register" class="btn success">Sign Up</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
	</section>
    <section id="" class="col-12 col">
		<div id="wrapper">
            <div id="login" class="container card2 col-4">
                <h1>Update</h1>
                <form name="registration" action="" method="post" class="formcon"> 
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="userid" type="text" name="userid" value="<?php echo $newID; ?>"  placeholder="Your ID Number" required/>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" id="username" type="text" name="username" value=""  placeholder="Your ID Number" required/>
                    </div>
                    <div class="input-container">
                        <i class="fa fa-lock icon"></i>
                        <input class="input-field" id="password" type="password" name="password" value=""  placeholder="Password" required/> 
                    </div>
                    <div class="col-6">
                        <input id="toggle2" type="checkbox" onclick="togglePass()" class="">
                        <label for="toggle2">Show Password </label>
                    </div>
                    <br>
                    <div class="btn-container">
                        <button type="submit" name="update" value="update" class="btn success">Sign Up</button>
                    </div>
                </form>
                <br>
            </div>
        </div>
	</section>
    <footer id="" class="col col-12">
        <p id="copyright ">&copy;<time datetime="2021-04-13 "><em>2021</time>, Kingsway Inn, Iligan. All rights reserved.</em></p>
    </footer>
</body>

</html>