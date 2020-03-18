<?php

/**
 * WooCommerce MiniCart Count
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'blogshop_refresh_mini_cart_count');
function blogshop_refresh_mini_cart_count($fragments){
    ob_start();
    ?>
    <div id="minicarcount">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
    <?php
        $fragments['#minicarcount'] = ob_get_clean();
    return $fragments;
}
