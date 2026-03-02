<?php

// sanitize incoming data and validate presence
$hero_image  = isset( $args['image'] ) ? $args['image'] : array();
$heading     = isset( $args['heading'] ) ? sanitize_text_field( $args['heading'] ) : '';
$description = isset( $args['description'] ) ? sanitize_textarea_field( $args['description'] ) : '';
$cta_buttons = isset( $args['cta_buttons'] ) && is_array( $args['cta_buttons'] ) ? $args['cta_buttons'] : array();

// ensure url structure for image if available
$image_url = '';
if ( ! empty( $hero_image['url'] ) ) {
    $image_url = esc_url_raw( $hero_image['url'] );
}

// if we don't have a heading or image, nothing to output
if ( empty( $heading ) && empty( $image_url ) ) {
    return;
}

?>

<div class="hero" style="background:url('<?php echo esc_url( $hero_image['url'] ); ?>');background-size: cover;
    background-repeat: no-repeat;
    background-position: center;">

    <div class="hero-heading">
        <h1><?php echo esc_html( $heading ); ?></h1>


    </div>
    <div class="hero-bg" style="background:url('https://assignment.anshukushwaha.com/wp-content/uploads/2026/03/person.webp');background-size: cover;
    background-repeat: no-repeat;
    background-position: center;" >

    </div>

    <div class="hero-content">
        <div class="description">
            <p><?php echo esc_html( $description ); ?></p>
        </div>
        <div class="cta-button">
            <?php 
            
            foreach($cta_buttons as $name => $button ){

                get_template_part('/template-parts/components/button',null,[
                    'text'  => esc_html( $button['button_text'] ),
                    'url'   => esc_url( $button['button_url'] )
                ]);
            }

            ?>
        </div>
        
        
    </div>

</div>