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
<div style="clear:both;"></div>
<div class="grid_12">
    <div class="module">
        <h2><span><?php echo isset($titleHead) ? $titleHead : ""; ?></span></h2>
        <div class="module-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <p>
                    <label>Product name</label>
                    <input type="text" class="input-short" name="productname" size="250" />
                    <?php echo isset($error['errorName']) ? $error['errorName'] :""; ?>
                </p>        
                <p>
                    <label>Product price</label>
                    <input type="text" class="input-short" name="product_price" />
                    <?php echo isset($error['errorPrice']) ? $error['errorPrice'] :""; ?>
                </p>     
                <p>
                    <label>Price sale</label>
                    <input type="text" class="input-short" name="price_sale"/>
                    
                </p>
                <p>
                    <label>Category</label>
                    <div class="category_list">
                     <?php 
                            $stt = 1;
                            foreach($listCategory as $key=>$val){
                                if($val['level'] == 1) {
                                    $name = '+<input type="checkbox" name="category[]" value="'.$val['cate_id'].'" /><input type="text" value="'.$val['cate_name'].'" size="45%" style="border:none;background:none; font-size:13px;" class="txtname" />';
                                } else {
                                    $name = '<input type="checkbox" name="category[]" value="'.$val['cate_id'].'" /> - <input type="text" value="'.$val['cate_name'].'" size="25%" style="border:none;background:none; font-size:11px;" />';
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
                        <textarea name="pro_description"></textarea>
                    </p>
                    <p>
                        <label>Product info</label>
                        <textarea name="pro_info"></textarea>
                    </p>       
                    <p>
                        <label>Product status</label>
                        Active&nbsp;<input type="radio" name="status" value="0" />
                        Disable&nbsp;<input type="radio" name="status" value="1" />
                    </p>    
                    <p>
                        <label>Bran</label>
                        <select style="width: 150px;" name="bran">
                                <option value="">Select bran</option>
                                <?php if(isset($bran) && $bran != null) {
                                    foreach($bran as $listBran) {
                                        echo "<option value='".$listBran['bran_id']."'>".$listBran['bran_name']."</option>";    
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
                                        echo "<option value='".$listCountry['coun_id']."'>".$listCountry['coun_name']."</option>";    
                                    }} 
                                ?>
                        </select> 
                    </p>      
                    <p>
                        <label>Product images</label>
                        <input type="file" name="images" value="" />
                    </p>
                    <p>
                        <label>Images small</label>
                        <input type="file" name="imgs[]" multiple="true" />
                    </p>
                    <label>&nbsp;</label>
                    <input type="submit" value="Insert product" name="btninsert" />
            </form>
        </div> <!-- End .module-body -->

    </div>  <!-- End .module -->
    <div style="clear:both;"></div>
</div> <!-- End .grid_12 -->