<div id="center">
        	<ul>
                <?php
                    if(isset($listProduct) && $listProduct != null ) {
                        foreach($listProduct as $list){
                ?>
            	<li style="margin-left:10px;">
                	<h3><a href=""><?php echo $list['pro_name']; ?></a></h3>
                    <img src="uploads/product/<?php echo $list['pro_images']; ?>" class="product" height="100" />
                    <p>Đơn giá: <?php echo $list['pro_price']; ?></p>
                    <a href="#" class="cart"><img src="public/default/images/giohang.jpg" />Đặt hàng</a>
                </li>
                <?php }} ?>
            </ul>
        </div>