<h3>List User</h3>
<?php
    $objUser = new user_class;
    $dataUser = $objUser->listUser();
    
    echo "<table width='600' border='1' cellpadding='0' cellspacing='0'>";
    echo "<tr>";
    echo "<td>ID</td>";
    echo "<td>Username</td>";
    echo "<td>Email</td>";
    echo "<td>Address</td>";
    echo "<td>Phone</td>";
    echo "<td>Gender</td>";
    echo "<td>Update</td>";
    echo "<td>Delete</td>";
    echo "</tr>";
    if(isset($dataUser) && $dataUser != null){
    foreach($dataUser as $listUser) {
        echo "<tr>";
        echo "<td>".$listUser['id']."</td>";
        echo "<td>".$listUser['username']."</td>";
        echo "<td>".$listUser['email']."</td>";
        echo "<td>".$listUser['address']."</td>";
        echo "<td>".$listUser['phone']."</td>";
        echo "<td>".$listUser['gioitinh']."</td>";
        echo "<td><a href='index.php?action=updateuser&id=".$listUser['id']."'>Update</a></td>";
        echo "<td><a href='deleteuser.php?id=".$listUser['id']."'>Delete</a></td>";
        echo "</tr>";    
    }}
    echo "</table>";
    echo "<a href='index.php?action=insertuser'>Insert</a>";
     