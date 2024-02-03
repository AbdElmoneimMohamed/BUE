<?php
$host = 'db';
$dbn = 'php-app';
$user = 'USER';
$pass = 'PASS';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbn", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from users";
    // Prepare statement
    $stmt = $conn->prepare($sql);

    $stmt->execute();

    echo "<table style='border: solid 1px black;'>";
    echo "<tr><th>Id</th><th>Name</th><th>Email</th><th>Action</th></tr>";

    foreach($stmt->fetchAll() as $k=>$v) {
        echo '<tr>';
        echo '<td style="width:150px;border:1px solid black;">' . $v['id'] .'</td>';
        echo '<td style="width:150px;border:1px solid black;">' . $v['name'] .'</td>';
        echo '<td style="width:150px;border:1px solid black;">' . $v['email'] .'</td>';
        echo '<td><form action="delete.php" method="post"> 
                    <input type="hidden" name="id" value=" '. $v['id'].'">
                    <input type="submit" class="btn btn-primary" name="delete" value="Delete">
                    </form>
            </td>';
        echo '</tr>';
    }

} catch (PDOException $e) {
    echo $e->getMessage();
}
$conn = null;
