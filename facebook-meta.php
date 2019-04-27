//add meta author name
function add_author_meta() {

    if (is_single()){
        global $post;
        $author = get_the_author_meta('user_nicename', $post->post_author);
        echo "<meta name=\"author\" content=\"$author\">";
    }
}
add_action( 'wp_enqueue_scripts', 'add_author_meta' );

//add og:author
function facebook_author_tag() {
  if ( is_single() ) {
    global $post;
    $author = (int) $post->post_author;
    $facebook_url = get_the_author_meta( 'facebook_url', $author );
    if ( ! empty( $facebook_url ) ) {
      echo '<meta property="article:author" content="'. $facebook_url .'" />';
    }
  }
}
add_action( 'wp_head', 'facebook_author_tag', 8 );
