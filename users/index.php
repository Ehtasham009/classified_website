<?php 
    include '../config/config.php'; 
    $limit = 2;
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    // $_GET['page'] = 2, so:
    $start = ($page - 1) * $limit;  // (2 - 1) * 10 = 10
    // $pages_per_set = 5;

    $pages_per_set = 5; // show 5 pages in middle
    // echo floor($pages_per_set / 2); die();
    $start_page = max(2, $page - floor($pages_per_set / 2)); 
    // e.g 5 - 2 = 3 
    
    // echo $start_page;
    
    $end_page   = min($total_pages - 1, $start_page + $pages_per_set - 1);
    
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
    // echo $page;
    
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

        </style>
</head>
<body>



<div class="pagination">

    <!-- <a href="<?php // echo '?page=' . --$page; ?>">&laquo;</a> -->

    <?php
        // echo $page - 1;
        // echo '<br>';
        // echo $page;
        // echo '<br>';
        // $page = $page - 1;
        // echo '<br>';
        // echo $page;
        // die();
    ?>
    
    <a class="" href="<?php echo '?page=1'; ?>">1</a>
    <a href="<?php echo '?page=' . ($page - 1); ?>">Previous</a>

    <?php 
        $start_page = max(2, $page - floor($pages_per_set / 2));  
        $end_page   = min($pages - 1, $start_page + $pages_per_set - 1);
        
        if ($start_page > 2) {
            echo "<span>...</span>";
        }
        // echo $end_page; 
        for ($i = $start_page; $i <= $end_page; $i++) {
            ?>
            <a class="<?php echo ($page == $i) ? 'active' : ' '  ;?>" href="<?php echo '?page=' . $i; ?>"><?php echo $i ?></a>
            <?php
        }
        if ($end_page < $pages - 1) {
            echo "<span>...</span>";
        }
        ?>
        
        <a href="<?php echo '?page=' . ($page + 1); ?>">Next</a>
        <a class="" href="<?php echo '?page=' . $pages; ?>"><?php echo $pages ?></a>
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
