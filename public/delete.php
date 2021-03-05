<?php
require "../config.php";

if (isset($_GET["id"])) {
  try {
    $connection = new PDO($dsn, $username, $password, $options);
    $id = $_GET["id"];
    $sql = "DELETE FROM customer WHERE id = :id";
    $statement = $connection->prepare($sql);
    $statement->bindValue(':id', $id);
    $statement->execute();
    $success = "User successfully deleted";
  } catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
  }
}

try {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM customer";
    $statement = $connection->query($sql);
    $result = $statement->fetchAll();
    }
catch (PDOException $error) {
    echo $error->getMessage();
    }
?>

<?php include "./templates/header.php"; ?>
<h2>Delete customers</h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Delete</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["firstname"]; ?></td>
      <td><?php echo $row["lastname"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<a href="../index.php">Home</a>
<?php include "./templates/footer.php"; ?>