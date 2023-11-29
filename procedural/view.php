<?php  
session_start();

include('database.php');

if(!isset($_SESSION["user_id"])){
    header("Location: login.php");
}


$sql =  "SELECT * FROM books";
$result = $conn->query($sql);
while($rows = $result->fetch_assoc()){
    $books[] = $rows;
}

if(isset($_SESSION["user_id"])){
    echo "Welcome, ". $_SESSION["username"];
    echo "<a href='logout.php'>Logout</a>";
}else{
    header("Location: login.php");
}


?>
<table>
<thead>
    <tr>
       
        <th>ID </th>
        <th>Title </th>
        <th>Author </th>
        <th>Published </th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    <?php foreach ($books as $book){ ?>
        <tr>
        <td><?php echo $book['id'];   ?></td>
        <td><?php echo $book['title'];   ?></td>
        <td><?php echo $book['author'];   ?></td>
        <td><?php echo $book['published'];   ?></td>
        <td>
            <a class="btn btn-primary" href="edit.php?id=<?php echo $book['id']; ?>">Edit</a>
            <a onClick="return confirm('Are you sure')" class="btn btn-primary" href="delete.php?id=<?php echo $book['id']; ?>">Delete</a>
        </td>
        </tr>
    <?php }  ?>

</tbody>
</table>