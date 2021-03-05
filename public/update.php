<?php
require "../config.php";
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
<h2>Update customer details</h2>
<table>
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Edit</th>

    </tr>
  </thead>
  <tbody>
  <?php foreach ($result as $row) : ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["firstname"]; ?></td>
      <td><?php echo $row["lastname"]; ?></td>
      <td><?php echo $row["email"]; ?></td>
      <td><a href="update_customer.php?id=<?php echo $row['id']; ?>">Edit</a></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
</table>
<a href="../index.php">Home</a>
<?php include "./templates/footer.php"; ?>