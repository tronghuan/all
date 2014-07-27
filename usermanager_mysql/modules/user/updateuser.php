<meta charset="utf-8" />
<style>
    label{
        float: left;
        width: 100px;
    }
    input{
        margin-bottom: 5px;
    }
    .error{
        color:red;
    }
</style>
<?php
    $id = $_GET['id'];
    $objUser = new user_class;
    $dataUser = $objUser->getOnce($id);
    $name = $email = $address = $phone = $gender = "";
    if(isset($_POST['btnok'])){
        if($_POST['txtname'] == "") {
            $errorName = "Vui lòng nh?p tên";
        }else{
            $name = $_POST['txtname'];
        }
        
        if($_POST['txtemail'] == "") {
            $errorEmail = "Vui lòng nh?p email";
        }else{
            $email = $_POST['txtemail'];
        }
        
        if($_POST['txtaddress'] == "") {
            $errorAddress = "Vui lòng nh?p address";
        }else{
            $address = $_POST['txtaddress'];
        }
        
        if($_POST['txtphone'] == "") {
            $errorPhone = "Vui lòng nh?p phone";
        }else if(!is_numeric($_POST['txtphone'])){
            $errorPhone = "S? di?n tho?i ph?i dúng d?nh d?ng";
        }else{
            $phone = $_POST['txtphone'];
        }
        
        if(!isset($_POST['gender']) || $_POST['gender'] == ""){
            $errorGender = "Vui lòng ch?n gi?i tính";
        }else{
            $gender = $_POST['gender'];
        }
    }

?>
<form action="" method="post">
    <label>Full name</label>
    <input type="text" name="txtname" value="<?php echo $dataUser['username'] ?>" />
    <span class="error">
        <?php echo isset($errorName) ? $errorName : ""; ?>
    </span>
    <br />
    <label>Email</label>
    <input type="text" name="txtemail" value="<?php echo $dataUser['email'] ?>" />
    <span class="error">
        <?php echo isset($errorEmail) ? $errorEmail : ""; ?>
    </span>
    <br />
    <label>Address</label>
    <input type="text" name="txtaddress" value="<?php echo $dataUser['address'] ?>" />
    <span class="error">
        <?php echo isset($errorAddress) ? $errorAddress : ""; ?>
    </span>
    <br />
    <label>Phone</label>
    <input type="text" name="txtphone" value="<?php echo $dataUser['phone'] ?>" />
    <span class="error">
        <?php echo isset($errorPhone) ? $errorPhone : ""; ?>
    </span>
    <br />
    <label>Gender</label>
    Male&nbsp;<input type="radio" name="gender" value="1" <?php   echo $dataUser['gender'] == 1 ? "checked='checked'" : ""; ?> />
    Famale&nbsp;<input type="radio" name="gender" value="2" <?php echo $dataUser['gender'] == 2 ? "checked='checked'" : ""; ?> />
    <span class="error">
        <?php echo isset($errorGender) ? $errorGender : ""; ?>
    </span>
    <br />
    <label>&nbsp;</label>
    <input type="submit" name="btnok" value="Update" />
</form>
<?php
    if($name && $email && $address && $phone && $gender) {
        $objUser = new user_class;
        $objUser->setName($name);
        $objUser->setEmail($email);
        $objUser->setAddress($address);
        $objUser->setPhone($phone);
        $objUser->setGender($gender);
        $objUser->updateUser($id);
        header("location:index.php");
    }
