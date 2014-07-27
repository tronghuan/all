$(document).ready(function(){
    $(".orderinput").change(function(){
        var id = $(this).attr('id');
        var cate_order = $(this).val();
        $.ajax({
            url:"index.php?module=admin&controller=product&action=listproduct",
            type:"POST",
            data:"cate_id="+id+"&cate_order="+cate_order,
            async:true,
            success:function(kq){
                $(window).load();
            }
        })
    })
})