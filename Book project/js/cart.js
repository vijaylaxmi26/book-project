function manage_cart(pid,types){
    var qty = jQuery("#qty-input").val();
    jQuery.ajax({
        url : 'includes/set_cart.php',
        type : 'post',
        data : 'pid='+pid+'&qty='+qty+'&type='+types,
        success:function(result){
            jQuery('#shop-cart-num').html(result);
        }
    });
}