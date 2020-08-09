<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
<div class="col-md-3"></div>
<div class="col-md-6 well">
<h2><?php echo 'Data on request: '.$_GET["phone"]  ?></h2>
<table class="table table-bordered">
    <thead class="alert-info">
    <tr>
        <th>Source ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>

    <?php
require_once 'conn.php';
try {
    $query = $conn->query("SELECT * FROM `contacts` WHERE `phone` =".$_GET["phone"].";")->fetchAll();
    foreach ($query as $row)
    {
        echo "
            <tr>
            <td>";echo $row['id'];echo "</td>
            <td>";echo $row['source_id'];echo "</td>
            <td>";echo $row['name'];echo "</td>
            <td>";echo $row['phone'];echo "</td>
            <td>";echo $row['email'];echo "</td>
            </tr>";
    }

}catch (Exception $e)
{
    header('location: errors.php?err=' . $e->getMessage());
}
?>
    </tbody>
</table>
</div>
</body>
</html>