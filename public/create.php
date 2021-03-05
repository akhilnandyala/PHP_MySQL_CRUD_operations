<?php include "./public/templates/header.php";?>
<h2> Add a new customer </h2>
<form method=post>
    <label for="firstname"> First name </label>
    <input type="text" name="firstname" id="firstname">
    <label for="lastname"> Last name </label>
    <input type="text" name="lastname" id="lastname">
    <label for="email"> Email </label>
    <input type="text" name="email" id="email">
    <input type="submit" name="submit" value="Submit">
</form>
<a href="../index.php">Home</a>
<?php include "./public/templates/footer.php";?>

<?php
if (isset($_POST['submit'])) {
    require "../config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $sql = "INSERT INTO customer (`firstname`, `lastname`, `email`) VALUES ('$firstname', '$lastname', '$email')";
        $connection->exec($sql);
        }
    catch (PDOException $error) {
        echo $error->getMessage();
        }
    }
?>