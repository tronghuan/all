    <!-- Button -->
        <div class="float-right">
            <a href="index.php?module=admin&controller=product&action=insertProduct" class="button">
           	    <span>New Product <img src="<?php echo ADMIN_IMAGES;?>plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
            </a>
        </div>
<div class="container_12">
    <div id="center">
             <div class="bottom-spacing">
            <div style="clear:both;"></div>
            <div class="grid_12">
                <!-- Notification boxes -->
                <!-- Example table -->
                <div class="module">
                	<h2><span><?php echo isset($title) ? $title : ""; ?></span></h2>
                    <div class="module-table-body">
                    	<form action="">
                        <table id="myTable" class="tablesorter">
                        	<thead>
                                <tr>
                                    <th style="width:5%">#</th>
                                    <th style="width:20%">Images</th>
                                    <th style="width:20%">Name</th>
                                    <th style="width:21%">Email</th>
                                    <th style="width:13%">Price</th>
                                    <th style="width:13%">Price Sale</th>
                                    <th style="width:15%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if(isset($listProduct) && $listProduct != null) {
                                        foreach($listProduct as $listPro){
                                ?>
                                <tr>
                                    <td class="align-center">1</td>
                                    <td><img src="uploads/product/<?php echo $listPro['pro_images']; ?>" width="90" /></td>
                                    <td><a href="index.php?module=admin&controller=product&action=editproduct&id=<?php echo $listPro['pro_id'] ?>">
                                        <?php echo $listPro['pro_name']; ?></a>
                                    </td>
                                    <td><?php echo $listPro['bran_name']; ?></td>
                                    <td><?php echo $listPro['pro_price']; ?></td>
                                    <td><?php echo $listPro['pro_price_sale']; ?></td>
                                    <td>
                                    	<input type="checkbox" />
                                        <a href=""><img src="application/public/admin/images/tick-circle.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/tick-circle.gif" width="16" height="16" alt="published" /></a>
                                        <a href=""><img src="application/public/admin/images/pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                        <a href=""><img src="application/public/admin/images/balloon.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/balloon.gif" width="16" height="16" alt="comments" /></a>
                                        <a href=""><img src="application/public/admin/images/bin.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                                    </td>
                                </tr>
                                <?php }} ?>
                            </tbody>
                        </table>
                        </form>
                        <div class="pager" id="pager">
                            <form action="">
                                <div>
                                <img class="first" src="application/public/admin/images/arrow-stop-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180.gif" alt="first"/>
                                <img class="prev" src="application/public/admin/images/arrow-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180.gif" alt="prev"/> 
                                <input type="text" class="pagedisplay input-short align-center"/>
                                <img class="next" src="application/public/admin/images/arrow.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow.gif" alt="next"/>
                                <img class="last" src="application/public/admin/images/arrow-stop.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop.gif" alt="last"/> 
                                <select class="pagesize input-short align-center">
                                    <option value="10" selected="selected">10</option>
                                    <option value="20">20</option>
                                    <option value="30">30</option>
                                    <option value="40">40</option>
                                </select>
                                </div>
                            </form>
                        </div>
                        <div class="table-apply">
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                     <div class="pagination">           
                		<a href="" class="button"><span><img src="application/public/admin/images/arrow-stop-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                        <a href="" class="button"><span><img src="application/public/admin/images/arrow-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
                        <div class="numbers">
                            <span>Page:</span> 
                            <a href="">1</a> 
                            <span>|</span> 
                            <a href="">2</a> 
                            <span>|</span> 
                            <span class="current">3</span> 
                            <span>|</span> 
                            <a href="">4</a> 
                            <span>|</span> 
                            <a href="">5</a> 
                            <span>|</span> 
                            <a href="">6</a> 
                            <span>|</span> 
                            <a href="">7</a> 
                            <span>|</span> 
                            <span>...</span> 
                            <span>|</span> 
                            <a href="">99</a>
                        </div> 
                        <a href="" class="button"><span>Next <img src="application/public/admin/images/arrow-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                        <a href="" class="button last"><span>Last <img src="application/public/admin/images/arrow-stop-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                        <div style="clear: both;"></div> 
                     </div>
			 </div> <!-- End .grid_12 -->
            </div> <!-- End #center -->