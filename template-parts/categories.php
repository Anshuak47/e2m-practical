<?php

// incoming term object should be passed via args
$terms = isset( $args['term'] ) ? $args['term'] : null;
if ( empty( $terms ) || ! is_object( $terms ) ) {
    // nothing to render
    return;
}

// optionally sanitize individual properties we will output
$term_id   = intval( $terms->term_id );
$term_name = isset( $terms->name ) ? sanitize_text_field( $terms->name ) : '';
$term_desc = isset( $terms->description ) ? sanitize_textarea_field( $terms->description ) : '';

?>
 <?php
    $thumbnail_id = get_term_meta( $term_id, 'thumbnail_id', true ); 
    $image_url = wp_get_attachment_url( $thumbnail_id );
    if ( ! $image_url ) {
        $image_url = ''; // ensure variable exists
    }


    // if ( $image_url ) {
    //     // escape output in examples
    //     echo '<img src="' . esc_url( $image_url ) . '" alt="' . esc_attr( $terms->name ) . '"/>';
    // }

?>
       
<div class="category">
    <div class="term-info">
        <div class="term-name">
            <h3 class="stroke"><?php echo esc_html( $term_name, 'practical' ); ?></h3>
        </div>

        <div class="cat-description">
            <p><?php echo esc_html( $term_desc, 'practical' ); ?></p>
        </div>

        <div class="cat-link">
            <?php

                // Get archive link
                $cat_link = get_term_link( $term_id, 'product_cat' );
                if ( is_wp_error( $cat_link ) ) {
                    $cat_link = home_url();
                }
            
                get_template_part( '/template-parts/components/button', null, [
                    'text'  => 'Shop Now',
                    // escape url before passing along
                    'url'   => esc_url( $cat_link ),
                ] ); 
            
            ?>
        </div>
    </div>


        <div class="term-image" style="background:url('<?php echo esc_url( $image_url ); ?>');background-position:center;background-repeat:no-repeat;background-size:cover;">
            
        </div>
        

    
   
       
    
</div>