<style>
    .level{
        color:red;
    }
</style>
<div class="grid_12">
    <div class="bottom-spacing">
                
    <!-- Button -->
        <div class="float-right">
            <a href="index.php?module=admin&controller=user&action=insertUser" class="button">
           	    <span>New User <img src="<?php echo ADMIN_IMAGES;?>plus-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/plus-small.gif" width="12" height="9" alt="New article" /></span>
            </a>
        </div>
    </div>
                
    <!-- Example table -->
    <div class="module">
   	    <h2><span>List User</span></h2>
                    
        <div class="module-table-body">
       	    <form action="">
                <table id="myTable" class="tablesorter">
               	    <thead>
                        <tr>
                            <th style="width:5%" class="header">#</th>
                            <th style="width:20%" class="header">Username</th>
                            <th style="width:24%" class="header">Email</th>
                            <th style="width:13%" class="header">Address</th>
                            <th style="width:13%" class="header">Phone</th>
                            <th style="width:13%" class="header">Level</th>
                            <th style="width:12%" class="header"></th>
                        </tr>
                    </thead>
                    <?php
                        if(!empty($listUser)){
                            $stt = 0;
                            foreach($listUser as $value){
                                $stt++;
                    ?>
                    <tbody>
                        <tr>
                            <td class="align-center"><?php echo $stt;?></td>
                            <td><?php echo $value['name'];?></a></td>
                            <td><?php echo $value['email'];?></td>
                            <td><?php echo $value['address'];?></td>
                            <td><?php echo $value['phone'];?></td>
                            <td><?php if($value['level'] == 1){echo "Member";}else{ echo "<span class='level'>Administrator</span>";}?></td>
                            <td>
                               	<input type="checkbox" />
                                    <a href="index.php?module=admin&controller=user&action=editUser&id=<?php echo $value['user_id'];?>"><img src="<?php echo ADMIN_IMAGES;?>pencil.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/pencil.gif" width="16" height="16" alt="edit" /></a>
                                    <a href="index.php?module=admin&controller=user&action=deleteUser&id=<?php echo $value['user_id'];?>"><img src="<?php echo ADMIN_IMAGES;?>icon-delete.png" tppabs="http://www.xooom.pl/work/magicadmin/images/bin.gif" width="16" height="16" alt="delete" /></a>
                            </td>
                        </tr>     
                    </tbody>
                    <?php }} ?>
                </table>
            </form>
            <div class="pager" id="pager">
                <form action="">
                    <div>
                        <img class="first" src="<?php echo ADMIN_IMAGES;?>arrow-stop-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180.gif" alt="first"/>
                        <img class="prev" src="<?php echo ADMIN_IMAGES;?>arrow-180.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180.gif" alt="prev"/> 
                        <input type="text" class="pagedisplay input-short align-center"/>
                        <img class="next" src="<?php echo ADMIN_IMAGES;?>arrow.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow.gif" alt="next"/>
                        <img class="last" src="<?php echo ADMIN_IMAGES;?>arrow-stop.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop.gif" alt="last"/> 
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
                            <form action="">
                            <div>
                            <span>Apply action to selected:</span> 
                            <select class="input-medium">
                                <option value="1" selected="selected">Select action</option>
                                <option value="2">Publish</option>
                                <option value="3">Unpublish</option>
                                <option value="4">Delete</option>
                            </select>
                            </div>
                            </form>
                        </div>
                        <div style="clear: both"></div>
                     </div> <!-- End .module-table-body -->
                </div> <!-- End .module -->
                
                
                     <div class="pagination">           
                		<a href="" class="button"><span><img src="<?php echo ADMIN_IMAGES;?>arrow-stop-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-180-small.gif" height="9" width="12" alt="First" /> First</span></a> 
                        <a href="" class="button"><span><img src="<?php echo ADMIN_IMAGES;?>arrow-180-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-180-small.gif" height="9" width="12" alt="Previous" /> Prev</span></a>
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
                        <a href="" class="button"><span>Next <img src="<?php echo ADMIN_IMAGES;?>arrow-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-000-small.gif" height="9" width="12" alt="Next" /></span></a> 
                        <a href="" class="button last"><span>Last <img src="<?php echo ADMIN_IMAGES;?>arrow-stop-000-small.gif" tppabs="http://www.xooom.pl/work/magicadmin/images/arrow-stop-000-small.gif" height="9" width="12" alt="Last" /></span></a>
                        <div style="clear: both;"></div> 
                     </div>
</div> <!-- End .grid_12 -->