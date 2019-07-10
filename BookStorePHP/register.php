<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <div>
        <nav>
            <ul>
                <li><a href="home.php">home</a></li>
                <li><a href="products.php">products</a></li>
                <li><a href="login.php"></a>login</li>
                <li><a href="register.php">register</a></li>
                <li><a href="contact">contact</a></li>
                <ul>
        </nav>
    </div>
    <h1>BIGGEST ONLINE BOOK STORE of EUROPE</h1>
    <br>
    <h2>REGISTER</h2>
    <form action="" method='POST'>
        <input type="text" name="firstName" placeholder="your first name">
        <br>
        <input type="text" name="lastName" placeholder="your last name">
        <br>
        <input type="email" name="email" placeholder="your email">
        <br>
        <input type="password" name="password" placeholder="your password">
        <br>
        <input type="tel" name="phoneNumb" placeholder="your phone number">
        <br>
        <textarea name="address" cols="30" rows="10" placeholder="your address"></textarea>
        <br>
        <input type="submit" name="register" value="Register">
        <br>
    </form>

</body>

</html>


<?php
$cart = array();
$userName = '';
$_SESSION["cart"] = $cart;
$_SESSION["userName"] = $userName;
require_once 'database.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if ($conn) {
    $db_name = DB_NAME;
    $db_Select = mysqli_select_db($conn, $db_name);
    $firstName = '';
    $lastName = '';
    $email = '';
    $phoneNumb = '';
    $password = '';
    $address = '';

    if (isset($_POST['register'])) {
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNumb = $_POST['phoneNumb'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $querry = "INSERT INTO users 
        (first_name, last_name, email, phone_number, adress, password) 
        VALUES ('$firstName', '$lastName', '$email', '$phoneNumb', '$address', '$password')";
        $results = mysqli_query($conn, $querry);
        if ($results) {
            echo 'Registration is a success! <br>';
            $userIdQuerry = "SELECT * FROM users
            WHERE first_name = '$firstName' ";
            $userIdResult = mysqli_query($conn, $userIdQuerry);
            while ($db_record = mysqli_fetch_assoc($userIdResult)) {
                $userName = $db_record['first_name'] . ' ' . $db_record['last_name']  . '<br>';
                echo $userName . '<br>';
                echo $_SESSION["userName"];
            }
        } else {
            echo 'Something went wrong. Try again';
        }
    }
}
mysqli_close($conn);
