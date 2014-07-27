<?php
session_start();
?>

<style type="text/css">
	*{
		margin: 0px;
		padding: 0px;
	}
</style>

<table width='600' border='1'>
	<tr>
		<td>ID</td>
		<td>Username</td>
		<td>Email</td>
		<td>Address</td>
		<td>Level</td>
		<td>Update</td>
		<td>Delete</td>
	</tr>

	<?php
		if(isset($_SESSION['user']) && $_SESSION['user'] != NULL){
			foreach($_SESSION['user'] as $key=>$value){
				echo "<tr>";
				echo "<td>".$value['id']."</td>";
				echo "<td>".$value['name']."</td>";
				echo "<td>".$value['email']."</td>";
				echo "<td>".$value['address']."</td>";
				echo "<td>".$value['level']."</td>";
				echo "<td><a href='edituser.php?id=".$key."'>Update</a></td>";
				echo "<td><a href='delete.php?id=".$key."'>Delete</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='5'>chua co user nao!!!</td></tr>";
		}
	?>
</table>
<a href='insertuser.php'>Insert User</a>