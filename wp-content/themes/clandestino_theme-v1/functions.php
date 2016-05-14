<?php
/**
 * Author: Todd Motto | @toddmotto
 * URL: html5blank.com | @html5blank
 * Custom functions, support, custom post types and more.
 */

require_once "modules/is-debug.php";

/*------------------------------------*\
    External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
    Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*add_theme_support('custom-background', array(
    'default-color' => 'FFF',
    'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));*/

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*add_theme_support('custom-header', array(
    'default-image'          => get_template_directory_uri() . '/img/headers/default.jpg',
    'header-text'            => false,
    'default-text-color'     => '000',
    'width'                  => 1000,
    'height'                 => 198,
    'random-default'         => false,
    'wp-head-callback'       => $wphead_cb,
    'admin-head-callback'    => $adminhead_cb,
    'admin-preview-callback' => $adminpreview_cb
    ));*/

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Localisation Support
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
}

/*------------------------------------*\
    Functions
\*------------------------------------*/

// HTML5 Blank navigation
function html5blank_nav()
{
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => ''
        )
    );
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {
        if (HTML5_DEBUG) {
        } else {
        }

        wp_register_script('Jquery', get_template_directory_uri() . '/js/jquery-1.9.1.js', array(), '1.12.1');
        // Enqueue Scripts
        wp_enqueue_script('Jquery');

        // Scripts minify
        wp_register_script('jqueryui', get_template_directory_uri() . '/js/jquery-ui-1.10.3.custom.js', array(), '1.10.3');
        // Enqueue Scripts
        wp_enqueue_script('jqueryui');

        // Scripts minify
        wp_register_script('fancybox', get_template_directory_uri() . '/js/jquery.fancybox/jquery.fancybox.pack.js', array(), '1.0');
        // Enqueue Scripts
        wp_enqueue_script('fancybox');

        // Scripts minify
        wp_register_script('scroll', get_template_directory_uri() . '/js/scrollIt.js', array(), '1.0');
        // Enqueue Scripts
        wp_enqueue_script('scroll');

        // Scripts minify
        wp_register_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.js', array(), '1.0');
        // Enqueue Scripts
        wp_enqueue_script('bxslider');

        // Scripts minify
        wp_register_script('utilsz', get_template_directory_uri() . '/js/utils.js', array(), '1.0.0');
        // Enqueue Scripts
        wp_enqueue_script('utilsz');
    }

}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        // Conditional script(s)
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0');
        wp_enqueue_script('scriptname');
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
   // Custom CSS
    wp_register_style('html5blankcssmin', get_template_directory_uri() . '/style.css', array(), '1.0');
    // Register CSS
    wp_enqueue_style('html5blankcssmin');

    // Custom CSS
    wp_register_style('jqueryui', get_template_directory_uri() . '/style/jquery-ui-1.10.3.custom.min.css', array(), '1.10.3');
    // Register CSS
    wp_enqueue_style('jqueryui');

    // Custom CSS
    wp_register_style('reset', get_template_directory_uri() . '/style/reset.css', array(), '1.0');
    // Register CSS
    wp_enqueue_style('reset');

    // Custom CSS
    wp_register_style('fancybox', get_template_directory_uri() . '/js/jquery.fancybox/jquery.fancybox.css', array(), '1.0');
    // Register CSS
    wp_enqueue_style('fancybox');

    // Custom CSS
    wp_register_style('bxslider', get_template_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.css', array(), '1.0');
    // Register CSS
    wp_enqueue_style('bxslider');

    // Custom CSS
    wp_register_style('screen', get_template_directory_uri() . '/style/screen.css', array(), '1.0');
    // Register CSS
    wp_enqueue_style('screen');

    // Custom CSS
    wp_register_style('responsive', get_template_directory_uri() . '/style/responsive.css', array(), '1.0');
    // Register CSS
    wp_enqueue_style('responsive');
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    ));
}

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}

// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}

// Remove the width and height attributes from inserted images
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}

// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    //return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . 'Leia mais' . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
    <?php endif; ?>
    <div class="comment-author vcard">
    <?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['avatar_size'] ); ?>
    <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
    </div>
<?php if ($comment->comment_approved == '0') : ?>
    <em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
    <br />
<?php endif; ?>

    <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
        <?php
            printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
        ?>
    </div>

    <?php comment_text() ?>

    <div class="reply">
    <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; ?>
<?php }

/*------------------------------------*\
    Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('post_thumbnail_html', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images
add_filter('image_send_to_editor', 'remove_width_attribute', 10 ); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]

/*------------------------------------*\
    Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
}

/*------------------------------------*\
    ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


// Category IDs
    // $cat_mulh = 30;

// Pages IDs
    // Home
    // Projeto - on index-oquefazemos.php
    // $pg_oqfazemos_01 = 28;
    // $pg_oqfazemos_02 = 30;
    // $pg_oqfazemos_03 = 22;


// Get Post Content and Title

function postTitle($postId){
    $post = get_post( $postId ); 
    echo $post->post_title;
}
function postContent($postId){
    $post = get_post( $postId ); 
    echo $post->post_content;
}

function getMenu(){
  if ( is_home() ) {
    //$cat_link = get_category_link( $cat_mapa );
    $cat_obj = get_category_by_slug( 'blog' );
    $catid = $cat_obj->term_id;

    $menu ='<a data-scroll-nav="1" class="menu-home">Home</a>'.
      '<a data-scroll-nav="2" class="menu-destaque">Destaque</a>'.
      '<a data-scroll-nav="3" class="menu-projetos">Projetos</a>'.
      '<a data-scroll-nav="4" class="menu-oquefazemos">O Que Fazemos</a>'.
      '<a data-scroll-nav="5" class="menu-sobre">Sobre</a>'.
      '<a data-scroll-nav="6" class="menu-contato">Contato</a>'.
      '<a href="'. get_category_link($catid) .'" class="menu-blog">Blog</a>';
      //'<li class="menu-item mobile"><a href="'. $cat_link .'">As Histórias</a>'.
  } else{
    $menu ='<a href="'. home_url() .'/#target_01" class="menu-home">Home</a>'.
      '<a href="'. home_url() .'/#target_02" class="menu-destaque">Destaque</a>'.
      '<a href="'. home_url() .'/#target_03" class="menu-projetos">Projetos</a>'.
      '<a href="'. home_url() .'/#target_04" class="menu-oquefazemos">O Que Fazemos</a>'.
      '<a href="'. home_url() .'/#target_05" class="menu-sobre">Sobre</a>'.
      '<a href="'. home_url() .'/#target_06" class="menu-contato">Contato</a>'.
      '<a href="'. get_category_link($catid) .'" class="menu-blog">Blog</a>';
  }            
  echo $menu;
}
function getLogoLink(){
  if ( is_home() ) {
    $link ='<a data-scroll-nav="1"><img src="'. get_template_directory_uri() .'/img/menu_logo.png" title="Clandestino" /></a>';
  } else{
    $link ='<a href="'. home_url() .'"><img src="'. get_template_directory_uri() .'/img/menu_logo.png" title="Clandestino" /></a>';
  }            
  echo $link;
}

function createGallery2($post_id){
  $post = get_post( $post_id ); 
  $gallery = get_post_gallery_images( $post ); 

    if (get_post_gallery_images()):

        $image_list = '<ul class="bxslider">';

        // Loop through each image in each gallery
        foreach( $gallery as $image_url ) {
            $image_list .= '<li class="gallery-item"><a data-fancybox-group="galleria" class="fancybox" href="' . $image_url . '"><img src="' . $image_url . '" /></a>' . '</li>';
        }

        $image_list .= '</ul>';
        echo $image_list;
    else:
        return false;
    endif;
}

function createGallery($post_id){
    $post_cntt = get_the_content($post_id);

    preg_match('/\[gallery.*ids=.(.*).\]/', $post_cntt, $ids);
    $image_ids = explode(",", $ids[1]); // Get all image ids from short code
    $images = array_slice($image_ids,0,3);

    if($images):
        $image_list = '<ul class="bxslider">';

        foreach($image_ids as $image_id) :

            $attachment = get_post( $image_id );
            $url =         $attachment->guid;
            $caption =     get_post_field('post_excerpt', $attachment->ID);
            // echo $image_id;
            // echo $url;
            // echo '</br>';
            // echo $caption;
            // echo '</br>';

            $image_list .= '<li class="gallery-item"><a data-fancybox-group="galleria" class="fancybox" href="' . $url . '" alt="'. $caption .'"><img src="' . $url . '" alt="'. $caption .'" /></a>' . '</li>';               
        endforeach;

    else:
        $image_list .= '<h5> Projeto sem imagens... </h5>';
    endif;
        $image_list .= '</ul>';
        echo $image_list;
}
function createGallery3($posts_id){
    $thumb_ID = get_post_thumbnail_id( $posts_id );
    $attachments = get_children( 
        array( 
            'post_parent' => $posts_id, 
            'post_status' => 'inherit', 
            'post_type' => 'attachment', 
            'post_mime_type' => 'image', 
            'order' => $atts['order'], 
            'orderby' => $atts['orderby'],
            'exclude' => $thumb_ID
            ) );

    $parentpost = get_post( $post_id ); 
    $gallery = get_post_gallery_images( $parentpost ); 

    $image_list = '<ul class="bxslider">';

    if($attachments):

        foreach ( $attachments as $item){
            $url =         wp_get_attachment_url( $item->ID );
            $caption =     $item->post_excerpt;

            $image_list .= '<li class="gallery-item"><a data-fancybox-group="galleria" class="fancybox" href="' . $url . '" alt="'. $caption .'"><img src="' . $url . '" alt="'. $caption .'" /></a>' . '</li>';
        }
    
    elseif ($gallery):
        $image_list = '<ul class="bxslider">';
        foreach( $gallery as $image_url ) {
            $image_list .= '<li class="gallery-item"><a data-fancybox-group="galleria" class="fancybox" href="' . $image_url . '"><img src="' . $image_url . '" /></a>' . '</li>';
        }

    else:
        $image_list .= '<h5> Projeto sem imagens... </h5>';
    endif;
        $image_list .= '</ul>';
        echo $image_list;
}

function panelimages($post_id){
  $post = get_post( $post_id ); 
  $gallery = get_post_gallery_images( $post ); 
  if($gallery):
        return $gallery;
    else:
        return false;
    endif;
}

// Get first image from post - From Zoo Theme
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = false;
  }
  return $first_img;
}

// Get Special Excerpt - From Zoo Theme
function string_limit_words($string, $word_limit){
      $words = explode(' ', $string, ($word_limit + 1));
      if(count($words) > $word_limit)
      array_pop($words);

      return implode(' ', $words);
}
function get_special_excerpt($count){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $count);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    return $excerpt;
}

function dimox_breadcrumbs() {

    /* === OPTIONS === */
    $text['home']     = 'Home'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page
    $text['page']     = 'Page %s'; // text 'Page N'
    $text['cpage']    = 'Comment Page %s'; // text 'Comment Page N'

    // $wrap_before    = '<div class="breadcrumbs">'; // the opening wrapper tag
    // $wrap_after     = '</div><!-- .breadcrumbs -->'; // the closing wrapper tag
    $wrap_before    = ''; // the opening wrapper tag
    $wrap_after     = ''; // the closing wrapper tag
    $sep            = '&nbsp;'; // separator between crumbs
    $sep_before     = '<span class="breadcrumbs separator">'; // tag before separator
    $sep_after      = '</span>'; // tag after separator
    $show_home_link = 0; // 1 - show the 'Home' link, 0 - don't show
    $show_on_home   = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $show_current   = 1; // 1 - show current page title, 0 - don't show
    $before         = '<span class="current">'; // tag before the current crumb
    $after          = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $home_link      = home_url('/');
    $link_before    = '<span>';
    $link_after     = '</span>';
    //$link_attr      = ' itemprop="url"';  
    $link_attr      = '';
    $link_in_before = '<span itemprop="title">';
    $link_in_after  = '</span>';
    $link_class     = 'subcategory link';
    $link           = $link_before . '<a href="%1$s"' . $link_attr . ' class="'. $link_class .'">' . $link_in_before . '%2$s' . $link_in_after . '</a>' . $link_after;
    $frontpage_id   = get_option('page_on_front');
    $parent_id      = $post->post_parent;
    $sep            = ' ' . $sep_before . $sep . $sep_after . ' ';

    if (is_home() || is_front_page()) {

        if ($show_on_home) echo $wrap_before . '<a href="' . $home_link . '" class="'. $link_class .'">' . $text['home'] . '</a>' . $wrap_after;

    } else {

        echo $wrap_before;
        if ($show_home_link) echo sprintf($link, $home_link, $text['home']);

        if ( is_category() ) {
            $cat = get_category(get_query_var('cat'), false);
            if ($cat->parent != 0) {
                $cats = get_category_parents($cat->parent, TRUE, $sep);
                $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .' class="'. $link_class .'">' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                if ($show_home_link) echo $sep;
                echo $cats;
            }
            if ( get_query_var('paged') ) {
                $cat = $cat->cat_ID;
                // echo $sep . sprintf($link, get_category_link($cat), get_cat_name($cat)) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
                echo sprintf($link, get_category_link($cat), get_cat_name($cat));
            } else {
                if ($show_current) echo $sep . $before . single_cat_title('', false) . $after;
            }

        } elseif ( is_search() ) {
            if (have_posts()) {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['search'], get_search_query()) . $after;
            } else {
                if ($show_home_link) echo $sep;
                echo $before . sprintf($text['search'], get_search_query()) . $after;
            }

        } elseif ( is_day() ) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $sep;
            echo sprintf($link, get_month_link(get_the_time('Y'), get_the_time('m')), get_the_time('F'));
            if ($show_current) echo $sep . $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            if ($show_home_link) echo $sep;
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y'));
            if ($show_current) echo $sep . $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            $show_current   = 0;
            if ($show_home_link) echo $sep;
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $home_link . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($show_current) echo $sep . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $sep);
                if (!$show_current || get_query_var('cpage')) $cats = preg_replace("#^(.+)$sep$#", "$1", $cats);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .' class="'. $link_class .'">' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo $cats;
                if ( get_query_var('cpage') ) {
                    echo $sep . sprintf($link, get_permalink(), get_the_title()) . $sep . $before . sprintf($text['cpage'], get_query_var('cpage')) . $after;
                } else {
                    if ($show_current) echo $before . get_the_title() . $after;
                }
            }

        // custom post type
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            if ( get_query_var('paged') ) {
                echo $sep . sprintf($link, get_post_type_archive_link($post_type->name), $post_type->label) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . $post_type->label . $after;
            }

        } elseif ( is_attachment() ) {
            if ($show_home_link) echo $sep;
            $parent = get_post($parent_id);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            if ($cat) {
                $cats = get_category_parents($cat, TRUE, $sep);
                $cats = preg_replace('#<a([^>]+)>([^<]+)<\/a>#', $link_before . '<a$1' . $link_attr .' class="'. $link_class .'">' . $link_in_before . '$2' . $link_in_after .'</a>' . $link_after, $cats);
                echo $cats;
            }
            printf($link, get_permalink($parent), $parent->post_title);
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_page() && !$parent_id ) {
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_page() && $parent_id ) {
            if ($show_home_link) echo $sep;
            if ($parent_id != $frontpage_id) {
                $breadcrumbs = array();
                while ($parent_id) {
                    $page = get_page($parent_id);
                    if ($parent_id != $frontpage_id) {
                        $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                    }
                    $parent_id = $page->post_parent;
                }
                $breadcrumbs = array_reverse($breadcrumbs);
                for ($i = 0; $i < count($breadcrumbs); $i++) {
                    echo $breadcrumbs[$i];
                    if ($i != count($breadcrumbs)-1) echo $sep;
                }
            }
            if ($show_current) echo $sep . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            if ( get_query_var('paged') ) {
                $tag_id = get_queried_object_id();
                $tag = get_tag($tag_id);
                echo $sep . sprintf($link, get_tag_link($tag_id), $tag->name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_current) echo $sep . $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
            }

        } elseif ( is_author() ) {
            global $author;
            $author = get_userdata($author);
            if ( get_query_var('paged') ) {
                if ($show_home_link) echo $sep;
                echo sprintf($link, get_author_posts_url($author->ID), $author->display_name) . $sep . $before . sprintf($text['page'], get_query_var('paged')) . $after;
            } else {
                if ($show_home_link && $show_current) echo $sep;
                if ($show_current) echo $before . sprintf($text['author'], $author->display_name) . $after;
            }

        } elseif ( is_404() ) {
            if ($show_home_link && $show_current) echo $sep;
            if ($show_current) echo $before . $text['404'] . $after;

        } elseif ( has_post_format() && !is_singular() ) {
            if ($show_home_link) echo $sep;
            echo get_post_format_string( get_post_format() );
        }

        echo $wrap_after;

    }
} // end of dimox_breadcrumbs()
