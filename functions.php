<?php //Start building your awesome child theme functions

add_action( 'wp_enqueue_scripts', 'bazien_enqueue_styles', 100 );
function bazien_enqueue_styles() {
    wp_enqueue_style( 'bazien-child-styles',  get_stylesheet_directory_uri() . '/style.css', array( 'nova-bazien-styles' ), wp_get_theme()->get('Version') );

    wp_enqueue_script( 'bazien-main', get_stylesheet_directory_uri() . '/main.js',
		array( 
			'jquery',
		),
		wp_get_theme()->get('Version'),
		true
	);
    wp_enqueue_script( 'font-awesome', 'https://kit.fontawesome.com/2e71d1c020.js', 
        array( 'jquery' ),
        wp_get_theme()->get('Version'), 
        false 
    );
}

function display_stock_info() {
    global $product; ?>

    <p class="limited-stock-label">Limited stock available</p><?php
    if ( $product->is_type( 'variable' ) ) {
        $stock_html = '<div class="stock-info">';

        // Get available stock for each variation
        $available_variations = $product->get_available_variations();
        foreach ( $available_variations as $variation ) {
            $variation_obj = wc_get_product( $variation['variation_id'] );
            $stock_quantity = $variation_obj->get_stock_quantity();
            if ( $stock_quantity !== null ) {
                $stock_html .= '<p class="stock-quantity">' . implode(', ', $variation_obj->get_variation_attributes()) . ': ' . $stock_quantity . '</p>';
            }
        }

        $stock_html .= '</div>';

        echo $stock_html;
    }
}

add_action( 'woocommerce_before_variations_form', 'display_stock_info', 10 );

// Add to your theme's functions.php or a custom plugin
function display_order_timeline() {
    $current_date = date('M j');
    $order_ready_start_date = date('M j', strtotime('+2 days'));
    $order_ready_end_date = date('M j', strtotime('+3 days'));
    $delivered_start_date = date('M j', strtotime('+5 days'));
    $delivered_end_date = date('M j', strtotime('+7 days'));

    echo '<div class="order-timeline">';
    echo '<div class="timeline-checkpoint">';
    echo '<span class="timeline-icon">📅</span>';
    echo '<span class="timeline-label">Ordered</span>';
    echo '<span class="timeline-date">' . esc_html($current_date) . '</span>';
    echo '</div>';
    echo '<div class="timeline-checkpoint">';
    echo '<span class="timeline-icon">🛒</span>';
    echo '<span class="timeline-label">Order Ready</span>';
    echo '<span class="timeline-date">' . esc_html($order_ready_start_date) . ' - ' . esc_html($order_ready_end_date) . '</span>';
    echo '</div>';
    echo '<div class="timeline-checkpoint">';
    echo '<span class="timeline-icon">🚚</span>';
    echo '<span class="timeline-label">Delivered</span>';
    echo '<span class="timeline-date">' . esc_html($delivered_start_date) . ' - ' . esc_html($delivered_end_date) . '</span>';
    echo '</div>';
    echo '</div>'; ?>
    <div class="process-img">
        <img src="<?php echo get_stylesheet_directory_uri() . '/img/process.jpg'; ?>" alt="process">
    </div><?php

}
// Add to your theme's functions.php or a custom plugin
add_action('woocommerce_after_add_to_cart_button', 'display_order_timeline', 10);


