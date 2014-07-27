<?php
session_start();
?>
<style type="text/css">
label{
	float: left;
	width: 100px;
}

input{
	margin-bottom: 5px;
}
</style>
<?php
	$dataEmail = array();
	if(isset($_SESSION['user']) && $_SESSION['user']){
		foreach($_SESSION['user'] as $value){
			$dataEmail[] = $value['email'];
		}
	}
	$name = $email = $address = $level = "";
	if(isset($_POST['btnok'])){
		if($_POST['name'] == ""){
			$errorName = "Vui long nhap ten";
		} else {
			$name = $_POST['name'];
		}

		if($_POST['email'] == ""){
			$errorEmail = "Vui long nhap email";
		} elseif(in_array(trim($_POST['email']), $dataEmail)){
			$errorEmail = "Email da ton tai";
		} else {
			$email = $_POST['email'];
		}

		if($_POST['address'] == ""){
			$errorAddress = "vui long nhap address";
		} else {
			$address = $_POST['address'];
		}

		if($_POST['level'] == ""){
			$errorLevel = "Vui long chon level";
		} else {
			$level = $_POST['level'];
		}

		if($name && $email && $address && $level){
			$userInfo = array();
			$userInfo['name'] = $name;
			$userInfo['email'] = $email;
			$userInfo['address'] = $address;
			$userInfo['level'] = $level;

			if(!isset($_SESSION['user']) || $_SESSION['user'] == NULL){
				$userId = 1;
				$userInfo['id'] = $userId;
				$_SESSION['user'][] = $userInfo;
			} else {
				$key = end($_SESSION['user']);
				$dataUser = $key;
				$newId = $dataUser['id'] + 1;
				$userInfo['id'] = $newId;
				$_SESSION['user'][] = $userInfo;
			}
			header("Location: listuser.php");
		}
	}
?>
<h3>Insert User</h3>
<form action="" method="post">
	<label>Level</label>
	<select name="level">
		<option value="">Select</option>
		<option value="2">Administrator</option>
		<option value="1">Member</option>
	</select>
	<?php echo isset($errorLevel) ?$errorLevel : ""; ?>
	<br />
	<label>Username</label>
	<input type="text" name="name" value="" />
	<?php echo isset($errorName) ? $errorName : ""; ?>
	<br />
	<label>Email</label>
	<input type="text" name="email" value="" />
	<?php echo isset($errorEmail) ? $errorEmail : ""; ?>
	<br />
	<label>Address</label>
	<input type="text" name="address" value="" />
	<?php echo isset($errorAddress) ? $errorAddress : ""; ?>
	<br />
	<label>&nbsp;</label>
	<input type="submit" value="insertUser" name="btnok" />
</form>