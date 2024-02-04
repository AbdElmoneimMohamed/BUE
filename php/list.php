<?php
require_once('Users.php');

$user = new Users();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper {
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<table style='border: solid 1px black;'>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    <?php
        foreach($user->listUser() as $user) {
    ?>
    <tr>
        <td style="width:150px;border:1px solid black;"><?= $user['id'] ?></td>
        <td style="width:150px;border:1px solid black;"><?= $user['name'] ?></td>
        <td style="width:150px;border:1px solid black;"><?= $user['mobile'] ?>'</td>
        <td><form action="delete.php" method="post">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <input type="submit" class="btn btn-primary" name="delete" value="Delete">
            </form>
        </td>
        </tr>
    <?php
    }
    ?>

</body>
</html>


