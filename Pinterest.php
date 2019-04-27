//Add Pinterest Tracking 

//checkout
add_action( 'woocommerce_thankyou', 'pinterest_tracking' );
function pinterest_tracking( $order_id ) {
$order = wc_get_order( $order_id );
$order_total = $order->get_total();
$order_quantity = $order->get_item_count();
?>
<script>
    pintrk('track', 'checkout', {
        {
            value: '<?php echo $order_total ?>',
            order_quantity: '<?php echo $order_quantity ?>',
            currency: 'USD'
        }
    ]);
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?tid=Your_Tag_ID&event=checkout&ed[value]=<?php echo $order_total ?>&ed[order_quantity]=<?php echo $order_quantity ?>&noscript=1"/>
</noscript>
<?php
}

function eveel_pint_product_view()
{
if( is_product() )
{
$product = new WC_Product( get_the_ID() );
$sku = $product->get_sku();
$name = $product->get_title();
$cat = $product->get_categories():
?>
<script>
pintrk('track', 'pagevisit', {
line_items: [
{
product_id: '<?php echo $sku ?>',
product_name: '<?php echo $name ?>',
product_category: '<?php echo $cat ?>'
}
]
});
</script>
<noscript>
 <img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?tid=2612744445363&event=pagevisit&noscript=1" />
</noscript>
<?
}
}
add_action( 'wp_footer', 'eveel_pint_product_view' );
        
//view cart
function eveel_pint_view_cart()
{
if( is_cart() )
{
?>
<script>
 pintrk('track', 'addtocart', {
 });
</script>
<noscript>
 <img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?tid=2612744445363&event=addtocart&noscript=1" />
</noscript>
<?
}
}
add_action( 'wp_footer', 'eveel_pint_view_cart' );

//view category
function eveel_pint_view_category()
{
if( is_product_category() )
{
?>
<script>
 pintrk('track', 'viewcategory', {
 });
</script>
<noscript>
 <img height="1" width="1" style="display:none;" alt="" src="https://ct.pinterest.com/v3/?tid=2612744445363&event=viewcategory&noscript=1" />
</noscript>
<?
}
}
add_action( 'wp_footer', 'eveel_pint_view_category' );
