<?php 
    include '../config/config.php'; 
    $limit = 2;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    // $_GET['page'] = 2, so:
    $start = ($page - 1) * $limit;  // (2 - 1) * 10 = 10

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $delete = "DELETE FROM `users` WHERE `id` = $id";

        $conn->query($delete);
    }
    $query = "SELECT * FROM users LIMIT $start , $limit" ;

    $result = $conn->query($query);

    $result1 = $conn->query("SELECT COUNT(id) AS total FROM users");
    $row = $result1->fetch_assoc();
    $total = $row['total'];

    $pages = ceil($total/$limit);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <style>
        .pagination {
        display: inline-block;
        }

        .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        }

        .pagination a.active {
        background-color: #4CAF50;
        color: white;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
        </style>
</head>
<body>



<div class="pagination">
    <?php 
        $page_number = $_GET['page'];
        // echo '<h1>' . $page_number .'</h1>';
    ?>
    <a href="<?php echo '?page=' . --$page_number; ?>">&laquo;</a>
    

    <!-- <?php 
        for ($i = 1; $i <= $pages; $i++) {
            // echo "<a href='?page=$i'>$i</a> ";
            ?>
            <a class="active" href="<?php echo '?page=' . $i; ?>"><?php echo $i ?></a>
        <?php
        }
    ?> -->
    <?php
        $current = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pages   = 50; // total pages
        $limit   = 5;  // how many buttons to show at a time

        // figure out which "block" of pages we’re in
        $start = floor(($current - 1) / $limit) * $limit + 1;
        $end   = min($start + $limit - 1, $pages);

        // show pagination
        for ($i = $start; $i <= $end; $i++) {
            $active = ($i == $current) ? "active" : "";
            echo "<a class='$active' href='?page=$i'>$i</a> ";
        }
    ?>
    <?php 
        $page_number = $_GET['page'];
        // echo '<h1>' . $page_number .'</h1>';
    ?>
    <a class='' href=''></a>
  <a href="<?php echo '?page=' . ++$page_number; ?>">&raquo;</a>
</div>

<h2>Create Task</h2>
<form method="POST" action="">
    <label for="title">Title:</label>
    <input type="text" name="title" required>
    <br>
    <label for="description">Description:</label>
    <textarea name="description"></textarea>
    <br>
    <input type="submit" name="create" value="Create Task">
</form>

<h2>Tasks</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['username']}</td>";
        echo "<td>{$row['email']}</td>";
        echo "<td>{$row['password']}</td>";
        ?>
        <td>
            <a onclick="return confirm('Are you sure to delete this?')" href="<?php echo BASEURL ?>users/index.php?id=<?php echo $row['id'];?>">Delete</a>
            <a href="<?php echo BASEURL ?>users/update.php?id=<?php echo $row['id'];?>">update</a>
            <a href="<?php echo BASEURL ?>home.php">Home</a>
        </td>
        <?php
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
