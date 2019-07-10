<?php
session_start();
echo $_SESSION["userName"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
    <style>
        .navbar {}

        main {
            display: flex;
            text-align: center;
        }
    </style>
</head>
<div class="navbar">
    <nav>
        <ul>
            <li><a href="home.php">Home</a>

            </li>
            <li><a href="products.php">Products</a>

            </li>
            <li><a href="">My Account
                </a>
            </li>
            <li><a href="">Registration</a>

            </li>
            <li><a href="">Login</a>

            </li>
            </li>
            <li><a href="contact.php">Contact Us</a>

            </li>
        </ul>
    </nav>
</div>

<header>

    <body>
        <main>
            <div>
                <h2>Independant Library of Washington D.C.</h2>
                <h3>Five Points Washington</h3>
                <h3>Washington, IL 61571</h3>
                <h3>Phone/Fax: 309.745.3023</h3>
                <h3>questions@washingtondl.org</h3>
            </div>

            <ul>
                <li>Monday
                    9am-6pm</li>
                <li>Tuesday
                    9am-8pm</li>
                <li>Wednesday
                    9am-8pm</li>
                <li>Thursday
                    9am-8pm</li>
                <li>Friday
                    9am-5pm</li>
                <li>Saturday (Sep - May)
                    9am-5pm</li>
                <li>Saturday (Jun - Aug)
                    9am-1pm</li>
                <li>Sunday
                    1pm-5pm</li>
            </ul>
        </main>

        <div>
            <form action="" method="POST">
                <textarea placeholder="Message..." name="textarea" id="textarea" cols="30" rows="10"></textarea>
                <br>
                <input type="email">Email
                <input type="submit" name="subBtn">
            </form>
        </div>
    </body>

</html>

<?php

if (isset($_POST["subBtn"])) {
    echo "Your messages has been sended. We take care of our customers so you will receive an answer soon...";
}
