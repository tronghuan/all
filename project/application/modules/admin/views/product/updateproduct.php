<script>
    $(document).ready(function(){
        $("#insertThum").click(function(){
            alert("OKIE");
        })
    })
</script>
<style>
    .category_list {
        background: #fbfbfb;
        border: 1px solid #ccc;
        width: 350px;
    }
    textarea{
        width: 350px;
        height: 100px;
    }
</style>
<?php
    if(isset($infoProduct) && $infoProduct) {
?>
<div style="clear:both;"></div>
<div class="grid_12">
    <div class="module">
        <h2><span><?php echo isset($titleHead) ? $titleHead : ""; ?></span></h2>
        <div class="module-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <p>
                    <label>Product name</label>
                    <input type="text" class="input-short" name="productname" size="250" value="<?php echo $infoProduct['pro_name']; ?>" />
                    <?php echo isset($error['errorName']) ? $error['errorName'] :""; ?>
                </p>        
                <p>
                    <label>Product price</label>
                    <input type="text" class="input-short" name="product_price" value="<?php echo $infoProduct['pro_price']; ?>" />
                    <?php echo isset($error['errorPrice']) ? $error['errorPrice'] :""; ?>
                </p>     
                <p>
                    <label>Price sale</label>
                    <input type="text" class="input-short" name="price_sale" value="<?php echo $infoProduct['pro_price_sale']; ?>"/>
                    
                </p>
                <p>
                    <label>Category</label>
                    <div class="category_list">
                     <?php 
                            $stt = 1;
                            foreach($listCategory as $key=>$val){
                                if(in_array($val['cate_id'],$listCateid)) {
                                    $checked = "checked='checked'";
                                }else{
                                    $checked = "";
                                }
                                if($val['level'] == 1) {
                                    $name = '+<input '.$checked.' type="checkbox" name="category[]" value="'.$val['cate_id'].'" /><input type="text" value="'.$val['cate_name'].'" size="45%" style="border:none;background:none; font-size:13px;" class="txtname" />';
                                } else {
                                    $name = '<input '.$checked.' type="checkbox" name="category[]" value="'.$val['cate_id'].'" /> - <input type="text" value="'.$val['cate_name'].'" size="25%" style="border:none;background:none; font-size:11px;" />';
                                    $padding = ($val['level'] - 1)*25;
                                    $padding =  'padding-left: '.$padding . 'px';
                                    $name = '<div style="'.$padding.'">'.$name.'</div>';
                                }
                                echo $name;
                            }
                    ?>     
                    </div> 
                    <?php echo isset($error['errorCategory']) ? $error['errorCategory'] : ""; ?>  
                    <p>
                        <label>Product description</label>
                        <textarea name="pro_description"><?php echo $infoProduct['pro_desc']; ?></textarea>
                    </p>
                    <p>
                        <label>Product info</label>
                        <textarea name="pro_info"><?php echo $infoProduct['pro_info']; ?></textarea>
                    </p>       
                    <p>
                        <label>Product status</label>
                        Active&nbsp;<input type="radio" name="status" value="0" <?php if($infoProduct['pro_status'] == 0 ) { echo "checked='checked'"; } ?> />
                        Disable&nbsp;<input type="radio" name="status" value="1" <?php if($infoProduct['pro_status'] == 1 ) { echo "checked='checked'"; } ?> />
                    </p>    
                    <p>
                        <label>Bran</label>
                        <select style="width: 150px;" name="bran">
                                <option value="">Select bran</option>
                                <?php if(isset($bran) && $bran != null) {
                                    foreach($bran as $listBran) {
                                        if($infoProduct['pro_bran'] == $listBran['bran_id']) {
                                            $selected = "selected='selected'";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option $selected value='".$listBran['bran_id']."'>".$listBran['bran_name']."</option>";    
                                    }} 
                                ?>
                        </select>
                    </p>   
                    <p>
                        <label>Country</label>
                        <select style="width: 150px;" name="country">
                                <option value="">Select country</option>
                                <?php if(isset($country) && $country != null) {
                                    foreach($country as $listCountry) {
                                        if($infoProduct['pro_country'] == $listBran['coun_id']) {
                                            $selected = "selected='selected'";
                                        }else{
                                            $selected = "";
                                        }
                                        echo "<option  $selected value='".$listCountry['coun_id']."'>".$listCountry['coun_name']."</option>";    
                                    }} 
                                ?>
                        </select> 
                    </p>      
                    <p>
                        <label>Product images</label>
                        <input type="file" name="images" value="" />
                        <p>&nbsp;</p>
                        <?php
                            if($infoProduct['pro_images'] != null ) {
                                echo "<img src='uploads/product/".$infoProduct['pro_images']."' width='100' />";
                            }
                        ?>
                    </p>
                    <p>
                        <label>Images small</label>
                        <?php
                            if($listThumb != null ) {
                                foreach($listThumb as $val) {
                                    echo "<a href='#'>";
                                    echo "<img src='uploads/product/thumb/".$val['img_name']."' width='100' />";
                                    echo "<input type='file' />";
                                    echo "</a>";
                                }
                            }
                        ?>
                        <p>&nbsp;</p>
                        <a href="#" id="insertThum">Insert Thumb</a>
                    </p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Insert product" name="btninsert" />
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->
<?php } ?>