<style>
    select{
        min-height:200px;
    }
</style>
<div style="clear:both;"></div>
            
<!-- Form elements -->    
<div class="grid_12">
    <div class="module">
        <h2><span>Insert Category</span></h2>
        <div class="module-body">
            <form action="" method="POST">

                <p>
                    <label>Cate_Parent</label>
                    <select class="input-short" name="cate_parent" multiple="true">
                        <option value="">Chọn </option>
                        <option value="0">Menu Cha</option>
                        <?php foreach($showCategory as $key=>$value){ ?>
                        <option value="<?php echo $value['cate_id']; ?>"><?php echo $value['cate_name']; ?></option>
                        <?php } ?>
                    </select>
                    <?php 
                        if(isset($errorCateParent) && $errorCateParent != ""){
                            echo $errorCateParent;
                        }
                    ?>
                </p>
                
                <p>
                    <label>Cate_Name</label>
                    <input type="text" class="input-short" name="cate_name" size="250"/>
                    <?php 
                        if(isset($errorCateName) && $errorCateName != ""){
                            echo $errorCateName;
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