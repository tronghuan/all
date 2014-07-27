<div style="clear:both;"></div>
            
<!-- Form elements -->    
<div class="grid_12">
    <div class="module">
        <h2><span>Insert User</span></h2>
        <div class="module-body">
            <form action="" method="POST">

                <p>
                    <label>Level</label>
                    <select class="input-short" name="level">
                        <option value="">Chọn </option>
                        <option value="1">Member</option>
                        <option value="2">Administrator</option>
                    </select>
                    <?php 
                        if(isset($errorLevel) && $errorLevel != ""){
                            echo $errorLevel;
                        }
                    ?>
                </p>
                
                <p>
                    <label>User name</label>
                    <input type="text" class="input-short" name="username" size="250"/>
                    <?php 
                        if(isset($errorName) && $errorName != ""){
                            echo $errorName;
                        }
                    ?>
                </p>
                            
                <p>
                    <label>Password</label>
                    <input type="password" class="input-short" name="password"/>
                    <?php 
                        if(isset($errorPassword) && $errorPassword != ""){
                            echo $errorPassword;
                        }
                    ?>
                </p>
                            
                <p>
                    <label>Re-password</label>
                    <input type="password" class="input-short" name="re-password"/>
                </p>
                   
                <p>
                    <label>Email</label>
                    <input type="text" class="input-short" name="email" size="250"/>
                    <?php 
                        if(isset($errorEmail) && $errorEmail != ""){
                            echo $errorEmail;
                        }
                    ?>
                </p>
                
                <p>
                    <label>Address</label>
                    <input type="text" class="input-short" name="address" size="250"/>
                    <?php 
                        if(isset($errorAddress) && $errorAddress != ""){
                            echo $errorAddress;
                        }
                    ?>
                </p>
                
                <p>
                    <label>Phone</label>
                    <input type="text" class="input-short" name="phone" size="250"/>
                    <?php 
                        if(isset($errorPhone) && $errorPhone != ""){
                            echo $errorPhone;
                        }
                    ?>
                </p>      
                   
                <fieldset>
                    <input class="submit-green" type="submit" value="Submit" name="btnok"/> 
                    <input class="submit-gray" type="reset" value="Reset" />
                </fieldset>
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->