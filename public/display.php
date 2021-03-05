<?php include "./templates/header.php"; ?>
<h2>Find customer details based on lastname</h2>
<form method='post'>
    <label for="lastname">Lastname</label>
    <input input="text" name="lastname" id="lastname">
    <input type="submit" name="submit" value="Find details">
</form>
<a href="../index.php">Home</a>
<?php include "./templates/footer.php"; ?>

<?php
if (isset($_POST['submit'])) {
    require "../config.php";
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $lastname = $_POST['lastname'];
        $sql = "SELECT * FROM customer WHERE `lastname` = '$lastname'";
        $statement = $connection->query($sql);
        $result = $statement->fetchAll();
        }
    catch (PDOException $error) {
        echo $error->getMessage();
        }

    if ($result && $statement->rowCount() > 0) {
?>
    <h2>Customers details</h2>
    <table>
      <thead>
        <tr>
          <th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach ($result as $row) { ?>
       <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["firstname"]; ?></td>
        <td><?php echo $row["lastname"]; ?></td>
        <td><?php echo $row["email"]; ?></td>
       </tr>
      <?php } ?>
      </tbody>
    </table>
  <?php
  }
  else {
  ?>
  No results found for <?php echo $_POST['lastname']; ?>
  <?php
  }
}
?>