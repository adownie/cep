<?php
if ( ! function_exists( 'koenda_widgets_init' ) ) :
function koenda_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widget Area', "koenda"),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', "koenda"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));		
	register_sidebar(array(
		'name' => __( 'Top Widget Area', "Koenda"),
		'id' => 'top-widget-area',
		'description' => __( 'The top widget area', "Koenda"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
	register_sidebar(array(
		'name' => __( 'Contact Sidebar', "Koenda"),
		'id' => 'contact-sidebar',
		'description' => __( 'The sidebar on the Contact page', "Koenda"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 1', "koenda"),
		'id' => 'footer-widget-area-1',
		'description' => __( 'The footer widget area 1', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 2', "koenda"),
		'id' => 'footer-widget-area-2',
		'description' => __( 'The footer widget area 2', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 3', "koenda"),
		'id' => 'footer-widget-area-3',
		'description' => __( 'The footer widget area 3', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 4', "koenda"),
		'id' => 'footer-widget-area-4',
		'description' => __( 'The footer widget area 4', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	$args=array('post_type' => 'page', 'posts_per_page' => -1);
	query_posts($args);
	while (have_posts()) : the_post();
	$new_sidebar = get_post_meta( get_the_ID(), 'new_sidebar', true);
	if($new_sidebar==1) {
	register_sidebar(array(
		'name' => __( 'Sidebar for Page '.get_the_title(), "koenda"),
		'id' => 'widget-area-'.get_the_ID(),
		'description' => __( 'The pages widget area', "koenda"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));		
    }
	endwhile; wp_reset_query(); 	
}
endif;
add_action( 'widgets_init', 'koenda_widgets_init' );


/**
 * Simplified variant of the native text widget class.
 *
 * @author Thomas Scholz aka toscho http://toscho.de
 * @version 1.0
 */
class Unfiltered_Text_Widget extends WP_Widget
{
    /**
     * @uses apply_filters( 'magic_widgets_name' )
     */
    public function __construct()
    {
        // You may change the name per filter.
        // Use add_filter( 'magic_widgets_name', 'your custom_filter', 10, 1 );
        $widgetname = apply_filters( 'magic_widgets_name', 'Unfiltered Text' );
        parent::__construct(
            'unfiltered_text'
        ,   $widgetname
        ,   array( 'description' => 'Pure Markup' )
        ,   array( 'width' => 300, 'height' => 150 )
        );
    }

    /**
     * Output.
     *
     * @param  array $args
     * @param  array $instance
     * @return void
     */
    public function widget( $args, $instance )
    {
        echo $instance['text'];
    }

    /**
     * Prepares the content. Not.
     *
     * @param  array $new_instance New content
     * @param  array $old_instance Old content
     * @return array New content
     */
    public function update( $new_instance, $old_instance )
    {
        return $new_instance;
    }

    /**
     * Backend form.
     *
     * @param array $instance
     * @return void
     */
    public function form( $instance )
    {
        $instance = wp_parse_args( (array) $instance, array( 'text' => '' ) );
        $text     = format_to_edit($instance['text']);
?>
        <textarea class="widefat" rows="7" cols="20" id="<?php
            echo $this->get_field_id( 'text' );
        ?>" name="<?php
            echo $this->get_field_name( 'text' );
        ?>"><?php
            echo $text;
        ?></textarea>
        <?php
        /* To enable the preview uncomment the following lines.
         * Be aware: Invalid HTML may break the rest of the site and it
         * may disable the option to repair the input text.

        ! empty ( $text )
            and print '<h3>Preview</h3><div style="border:3px solid #369;padding:10px">'
                . $instance['text'] . '</div>';
        /**/
        ?>
<?php
    }
}

add_action( 'widgets_init', 'register_unfiltered_text_widget', 20 );

function register_unfiltered_text_widget()
{
    register_widget( 'Unfiltered_Text_Widget' );
}
?>