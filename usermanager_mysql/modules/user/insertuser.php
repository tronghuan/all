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
    $name = $email = $address = $phone = $gender = "";
    if(isset($_POST['btnok'])){
        if($_POST['txtname'] == "") {
            $errorName = "Vui lòng nhập tên";
        }else{
            $name = $_POST['txtname'];
        }
        
        if($_POST['txtemail'] == "") {
            $errorEmail = "Vui lòng nhập email";
        }else{
            $email = $_POST['txtemail'];
        }
        
        if($_POST['txtaddress'] == "") {
            $errorAddress = "Vui lòng nhập address";
        }else{
            $address = $_POST['txtaddress'];
        }
        
        if($_POST['txtphone'] == "") {
            $errorPhone = "Vui lòng nhập phone";
        }else if(!is_numeric($_POST['txtphone'])){
            $errorPhone = "Số điện thoại phải đúng định dạng";
        }else{
            $phone = $_POST['txtphone'];
        }
        
        if(!isset($_POST['gender']) || $_POST['gender'] == ""){
            $errorGender = "Vui lòng chọn giới tính";
        }else{
            $gender = $_POST['gender'];
        }
    }

?>
<form action="" method="post">
    <label>Full name</label>
    <input type="text" name="txtname" value="<?php echo $name ? $name : ""; ?>" />
    <span class="error">
        <?php echo isset($errorName) ? $errorName : ""; ?>
    </span>
    <br />
    <label>Email</label>
    <input type="text" name="txtemail" value="" />
    <span class="error">
        <?php echo isset($errorEmail) ? $errorEmail : ""; ?>
    </span>
    <br />
    <label>Address</label>
    <input type="text" name="txtaddress" value="" />
    <span class="error">
        <?php echo isset($errorAddress) ? $errorAddress : ""; ?>
    </span>
    <br />
    <label>Phone</label>
    <input type="text" name="txtphone" value="" />
    <span class="error">
        <?php echo isset($errorPhone) ? $errorPhone : ""; ?>
    </span>
    <br />
    <label>Gender</label>
    Male&nbsp;<input type="radio" name="gender" value="1" <?php echo $gender && $gender == 1 ? "checked='checked'" : ""; ?> />
    Famale&nbsp;<input type="radio" name="gender" value="2" <?php echo $gender && $gender == 2 ? "checked='checked'" : ""; ?> />
    <span class="error">
        <?php echo isset($errorGender) ? $errorGender : ""; ?>
    </span>
    <br />
    <label>&nbsp;</label>
    <input type="submit" name="btnok" value="getInfo" />
</form>
<?php
    if($name && $email && $address && $phone && $gender) {
        $objUser = new user_class;
        $objUser->setName($name);
        $objUser->setEmail($email);
        $objUser->setAddress($address);
        $objUser->setPhone($phone);
        $objUser->setGender($gender);
        $objUser->insertUser();
        header("location:index.php");
    }
