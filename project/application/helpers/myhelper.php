<?php
function show_menu($menus = array(), $parrent = 0) {
        echo '<ul>';
        foreach($menus as $key => $val) 
        {
            echo '<ul>';
            if ($val['cate_parent'] == $parrent) {
                unset($menus[$key]);
                echo '<li><a href="#">', $val['cate_name'], '</a>';
                show_menu($menus, $val['cate_id'], false);
                echo '</li>';
        }
        echo '</ul>';
    }
    echo '</ul>';  
}                  