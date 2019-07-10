<?php
session_start();
$userName = array();
$_SESSION["userName"] = $userName;
echo $_SESSION["userName"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
</head>

<body>
    <div>
        <nav>
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="products.php">products</a></li>
                <li><a href="login.php">login</a></li>
                <li><a href="register.php">register</a></li>
                <li><a href="contact">contact</a></li>
                <ul>
        </nav>
    </div>
    <h1>BIGGEST ONLINE BOOK STORE of EUROPE</h1>
    <form action="" method='GET'>
        <h2>Please Login</h2>
        <br>
        <input type="email" name="email" placeholder="your email">
        <br>
        <input type="password" name="password" placeholder="your password">
        <br>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>

<?php
require_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if ($conn) {
    $db_name = DB_NAME;
    $db_Select = mysqli_select_db($conn, $db_name);
    if (isset($_GET['login'])) {
        $email = $_GET['email'];
        $password = $_GET['password'];
        $querry = "SELECT * FROM users";
        $results = mysqli_query($conn, $querry);
        while ($db_record = mysqli_fetch_assoc($results)) {
            if ($email == $db_record['email'] && $password == $db_record['password']) {
                echo 'Login Successfull';
                $userName = $db_record['first_name'] . ' ' . $db_record['last_name']  . '<br>';
            }
        }
    }
}

?>