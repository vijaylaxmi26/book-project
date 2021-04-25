function manage_cart(pid,types){
    if(types == "update"){
        var qty = jQuery("#"+pid+"qty-input").val();
    }else {
        var qty = jQuery("#qty-input").val();
    }
    jQuery.ajax({
        url : 'includes/set_cart.php',
        type : 'post',
        data : 'pid='+pid+'&qty='+qty+'&type='+types,
        success:function(result){
            if(types == "remove" || types=="update"){
                window.location.href = 'cart.php';
            }
            jQuery('#shop-cart-num').html(result);
        }
    });
}