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
    <title>HOME</title>
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
</body>

</html>

<?php
require_once 'dataBase.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if ($conn) {
    $db_name = DB_NAME;
    $db_Select = mysqli_select_db($conn, $db_name);
    $querry = "SELECT * FROM book";
    $results = mysqli_query($conn, $querry);
    $search = '';
    echo '<form action="" method="POST">
    <input type="search" name="search">
    <input type="submit" name="searchBtn" value="search">
    </form>';

    if (!isset($_POST['searchBtn'])) {
        $id = '';
        while ($db_record = mysqli_fetch_assoc($results)) {
            echo $db_record['title'] . '<br>';
            echo $db_record['author'] . '<br>';
            echo $db_record['price'] . '€' . '<br>';
            ?>
            <a href="product.php?id=<?php echo $db_record['book_id'] ?>">Details</a>
            <br>
        <?php
        }
    } elseif (isset($_POST['searchBtn'])) {
        $search = $_POST['search'];
        $querySearch = "SELECT * FROM book
        INNER JOIN author ON book.authorID = author.author_id
        WHERE
        author.name LIKE '%$search%'
        OR author.year_of_birth LIKE '%$search%'
        OR book.title LIKE '%$search%'
        OR book.release_date LIKE '%$search%'
        OR book.author LIKE '%$search%'
        OR book.category LIKE '%$search%'
        OR book.format LIKE '%$search%'        
        ";
        $searchResults = mysqli_query($conn, $querySearch);
        if (mysqli_num_rows($searchResults) == 0) {
            echo 'nothing found return the ' . '<a href="products.php">products</a> ' . 'page';
        } else {
            while ($db_record = mysqli_fetch_assoc($searchResults)) {

                echo $db_record['title'] . '<br>';
                echo $db_record['author'] . '<br>';
                echo $db_record['price'] . '€' . '<br>';
                ?>
                <a href="product.php?id=<?php echo $db_record['book_id'] ?>">Details</a>
                <br>
            <?php
            }
        }
    }
}
mysqli_close($conn);
