<?php
    session_start();
    $id = $_GET['id'];
    echo $id;
 
    $dataUser = $_SESSION['user'][$id];
    $dataEmail = array();
    foreach($_SESSION['user'] as $key=>$value) {
	if($key != $id ) {
                   $dataEmail[] = $value['email'];
               }
   }
    echo "<pre>";
    print_r($dataEmail);
    echo "</pre>";
?>
<style>
    label{
        float: left;
        width: 100px;
    }
    input{
        margin-bottom: 5px;
    }
</style>
<?php
    $name = $email = $address = $level = "";
    if(isset($_POST['btnok'])) {
        
        if($_POST['name'] == "") {
            $errorName = "Vui long nhap ten";
        }else{
            $name = $_POST['name'];
        }
        
        if($_POST['email'] == "") {
            $errorEmail = "Vui long nhap email";
        }else if(in_array(trim($_POST['email']),$dataEmail)){
            $errorEmail = "Email da ton tai";
       }else{
            $email = $_POST['email'];
        }
        
        if($_POST['address'] == "") {
            $errorAddress = "Vui long nhap address";
        }else{
            $address = $_POST['address'];
        }
        
        if($_POST['level'] == "") {
            $errorLevel = "Vui long chon level";
        }else{
            $level = $_POST['level'];
        }
        if($name && $email && $address && $level) {
            $userInfo = array();
            $userInfo['name'] = $name;
            $userInfo['email'] = $email;
            $userInfo['address'] = $address;
            $userInfo['level'] = $level;
            $userInfo['id'] = $dataUser['id'];
            $_SESSION['user'][$id] = $userInfo;
            header("location:listuser.php");
        }
    }

?>
<h3>Update User</h3>
<form action="" method="post">
    <label>Level</label>
    <select name="level">
        <option value="">Select</option>
        <option value="2" <?php if($dataUser['level'] == 2) { echo "selected='selected'"; } ?>>Administrator</option>
        <option value="1" <?php if($dataUser['level'] == 1) { echo "selected='selected'"; } ?>>Member</option>
    </select>
    <?php echo isset($errorLevel) ? $errorLevel : ""; ?>
    <br />
    <label>Username</label>
    <input type="text" name="name" value="<?php echo $dataUser['name']; ?>" />
    <?php echo isset($errorName) ? $errorName : ""; ?>
    <br />
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $dataUser['email']; ?>" />
    <?php echo isset($errorEmail) ? $errorEmail : ""; ?>
    <br />
    <label>Address</label>
    <input type="text" name="address" value="<?php echo $dataUser['address']; ?>" />
    <?php echo isset($errorAddress) ? $errorAddress : ""; ?>
    <br />
    <label>&nbsp;</label>
    <input type="submit" value="updateUsert" name="btnok" />
</form>