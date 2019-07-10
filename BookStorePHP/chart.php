<?php
session_start();
echo $_SESSION["userName"];
$cart = array();
$_SESSION["cart"] = $cart;
$id = $_GET['id'];
require_once 'dataBase.php';
$conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if ($conn) {
    $db_name = DB_NAME;
    $db_Select = mysqli_select_db($conn, $db_name);
    $querry = "INSERT INTO 
    INNER JOIN author ON book.authorID = author.author_id
    WHERE book_id = '$id' ";
    $results = mysqli_query($conn, $querry);
    while ($db_record = mysqli_fetch_assoc($results)) {
        echo $db_record['title'] . '<br>';
        echo $db_record['author'] . '<br>';
        echo $db_record['biography'] . '<br>';
        echo $db_record['price'] . '€' . '<br>';
        ?>
        <a href="chart.php?id=<?php echo $db_record['book_id'] ?>" method='GET'>Add to cart</a>
    <?php
    }
}
mysqli_close($conn);