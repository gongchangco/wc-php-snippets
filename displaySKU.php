/** The function add and customize product SKU numbers into the product pages */
function displaySKU($sku) {
    
    /** Get all products */
    global $product;

    /** If product is from a different brand 'EFG' or a specific SKU number, don't add 'ABC' to SKU number */
    if (strpos($product->get_sku(), 'EFG') !== false || strpos($product->get_sku(), '123-00-A') !== false) {

        /** Leave SKU number as is */
        echo '<span class="product-meta" style="color:steelblue;">' . $product->get_sku() . '</span>';
    }
    else {
        /** Add 'ABC' to SKU number */
        echo '<span class="product-meta" style="color:steelblue;">ABC-' . $product->get_sku() . '</span>';
    }
    
}

// Add to page - depends on theme used
add_action('woocommerce_shop_loop_item_title', 'displaySKU', 9);