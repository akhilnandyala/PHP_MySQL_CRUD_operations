<?php
require "../config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $customer_id = $_GET['id'];
        $sql = "SELECT * FROM customer WHERE `id` = '$customer_id'";
        $statement = $connection->query($sql);
        $result = $statement->fetchAll();
        foreach ($result as $row){
        $id = $row['id'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        }
        }
    catch (PDOException $error) {
        echo $error->getMessage();
        }

if (isset($_POST['submit'])) {
    require "../config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_POST["id"];
        $firstname = $_POST["firstname"];
        $lastname  = $_POST["lastname"];
        $email     = $_POST["email"];

        $sql = "UPDATE customer
                SET `id` = '$customer_id',
                  `firstname` = '$firstname',
                  `lastname` = '$lastname',
                  `email` = '$email'
                WHERE `id` = '$id'";

        $connection->exec($sql);
        }
    catch (PDOException $error) {
        echo $error->getMessage();
        }
    }
?>

<?php include "./templates/header.php";?>
<h2> Edit customer data</h2>
<form method=post>
    <input name="id" id="id" readonly value=<?php echo $id ?>>
    <label for="firstname"> First name </label>
    <input type="text" name="firstname" id="firstname" value=<?php echo $firstname ?>>
    <label for="lastname"> Last name </label>
    <input type="text" name="lastname" id="lastname" value=<?php echo $lastname ?>>
    <label for="email"> Email </label>
    <input type="text" name="email" id="email" value=<?php echo $email ?>>
    <input type="submit" name="submit" value="Update">
</form>
<a href="../index.php">Home</a>
<?php include "./templates/footer.php";?>

