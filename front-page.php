<?php

get_header();


if ( have_rows( 'hero' ) ) :
    while ( have_rows( 'hero' ) ) : the_row();
        if ( get_row_layout() === 'hero' ) {

            // Get Hero Fields with basic validation and sanitization
            $hero        = get_sub_field( 'hero_image' );
            $heading     = sanitize_text_field( get_sub_field( 'heading' ) ?: '' );
            $description = sanitize_textarea_field( get_sub_field( 'description' ) ?: '' );
            $cta_buttons = get_sub_field( 'cta_buttons' );
            if ( ! is_array( $cta_buttons ) ) {
                $cta_buttons = array();
            }

            // only render if there's something useful to show
            if ( $heading || ( is_array( $hero ) && ! empty( $hero['url'] ) ) ) {
                get_template_part( 'template-parts/hero', null, [
                    'image'       => $hero,
                    'heading'     => $heading,
                    'description' => $description,
                    'cta_buttons' => $cta_buttons,
                ] );
            }

            // Get Category Fields
            // get_template_part('template-parts/categories',null,[
            //     'image' => $hero,
            //     'heading' => $heading,
            //     'description' => $description,
            //     'cta_buttons' => $cta_buttons,


            // ]);


        }
    endwhile;

endif;


// Get Category Layout

if ( have_rows( 'categories' ) ) : 

    // Get the current row's field object
    $field_object = get_field_object( 'categories' );

    $field_name = '';
    if ( $field_object && isset( $field_object['name'] ) ) {
        $field_name = sanitize_text_field( $field_object['name'] );
    }
    ?>
    <div id="categories">
        
        <div class="cat-heading">
            <h2><?php echo esc_html( ucfirst( $field_name ) ); ?></h2>
        </div>
    
        <div class="cat-content">

        
            <?php
            while ( have_rows( 'categories' ) ) : the_row();
            
                $categories = get_sub_field( 'category' );
                if ( empty( $categories ) ) {
                    continue; // skip empty rows
                }
            
                get_template_part( 'template-parts/categories', null, [
                    'term' => $categories,
                ] );

            endwhile; 
        ?>
        </div>
    </div>

    <?php
endif;

get_footer();