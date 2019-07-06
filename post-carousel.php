<?php
/**
 * Plugin Name: Post Carousel with Owl Carousel
 * Plugin URI:  
 * Description: 
 * Version:     0.9
 * Author:      Simone Buono
 * Text Domain: post-carousel
 * Domain Path: /languages
 */

 if ( !class_exists( 'PostCarousel' ) ) :

define ( "POST_CAROUSEL_URL" , plugin_dir_url(__FILE__) );
define ( "POST_CAROUSEL_PATH" , plugin_dir_path(__FILE__) );

class PostCarousel
{
    private $post_options;
    private $owl_options;

    public function __construct( $post_options, $owl_options )
    {
        $this->post_options = $post_options;
        $this->owl_options = $owl_options;

        $this->print_carousel();
    }

    static function enqueue()
    {
     wp_enqueue_style( 'post-carousel-owl-carousel', POST_CAROUSEL_URL .'owl-carousel/owl.carousel.min.css', array(), '2.3.4' );        
     wp_enqueue_style( 'post-carousel-owl-carousel-theme-style', POST_CAROUSEL_URL . 'owl-carousel/owl.theme.default.min.css', array(), '2.3.4' );
     wp_enqueue_script( 'post-carousel-owl-carousel-js', POST_CAROUSEL_URL .'owl-carousel/owl.carousel.min.js' , array('jquery'),'2.3.4',true);
    }


    function print_carousel()
    {
        $the_query = new WP_Query( $this->post_options['query_args']);

        if ( $the_query->have_posts()):
        
            $carousel_ID = 'post_carousel_'. uniqid();
            $classes = $this->get_classes();

            require_once ( 'carousel-template.php' );

            $this->print_owl_script( $carousel_ID , $this->owl_options );
        
        endif;
        
    }

    function get_classes()
    {
        $classes = isset( $this->post_options['query_args']['post_type']) ? 'post-type-'.$this->post_options['query_args']['post_type'] : '';
        return $this->post_options['classes'] . ' ' . $classes;
    }

    function print_owl_script( $carousel_ID, $options = [] )
    {
        ?>
        <script>jQuery(function($){$('<?php echo '#'. $carousel_ID  ; ?>').owlCarousel(<?php echo json_encode( $options); ?>)});</script>
        <?php
    }

}

add_action( 'wp_enqueue_scripts', array( 'PostCarousel', 'enqueue') );

endif;
