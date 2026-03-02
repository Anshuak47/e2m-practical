<?php

// sanitize and validate incoming arguments
$name = isset( $args['text'] ) ? sanitize_text_field( $args['text'] ) : '';
$url  = isset( $args['url'] )  ? esc_url_raw( $args['url'] ) : '';

// fallbacks if values are missing
if ( empty( $name ) ) {
    // nothing to show
    return;
}
if ( empty( $url ) ) {
    // fallback to home if no url provided
    $url = home_url();
}

?>

<button class="button">
    <a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $name ); ?></a>
</button>