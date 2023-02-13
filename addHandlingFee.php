/** This function adds additional handling fee on packages to the available shipping methods listed on the cart page. 
    Going to be using FedEx shipping methods.
*/


function addHandlingFee( $ratings, $package ) {
    // The markup fee is 10%
    $markup_fee = 0.1;

    /** Search for shipping method name on the shipment page */
    
    // FedEx Ground 
    if ( isset( $ratings['shipping_fedex:0:FEDEX_GROUND'] ) ) {

        // Calculate the cost of the shipping method with the markup fee to change the specified shipping method cost to the new cost
        $ratings['shipping_fedex:0:FEDEX_GROUND']->cost = $ratings['shipping_fedex:0:FEDEX_GROUND']->cost + ($markup_fee * $ratings['shipping_fedex:0:FEDEX_GROUND']->cost);
    }

    /** Do the same for the other shipping methods */

    // FedEx 2Day
    if ( isset( $ratings['shipping_fedex:0:FEDEX_2_DAY'] ) ) {
        $ratings['shipping_fedex:0:FEDEX_2_DAY']->cost = $ratings['shipping_fedex:0:FEDEX_2_DAY']->cost + ($markup_fee * $ratings['shipping_fedex:0:FEDEX_2_DAY']->cost);
    }


    return $ratings;
}

// Add filter to change the shipping method package rates with the markup fee
add_filter( 'woocommerce_package_rates', 'addHandlingFee', 10, 2 );