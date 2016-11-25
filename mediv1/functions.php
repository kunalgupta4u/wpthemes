<?php 

/*testing git*/







global $wp_query;
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Extra Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

/* Logo customizer */
function m1_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'm1_logo' );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm1_logo', array(
        'label'    => __( 'Upload Logo (replaces text)', 'm1' ),
        'section'  => 'title_tagline',
        'settings' => 'm1_logo',
    ) ) );
}
add_action( 'customize_register', 'm1_customize_register' );

/* Page Featured Image */
function m2_customize_register( $wp_customize ) {
    $wp_customize->add_setting( 'm2_page_banner' ); // Add setting for Page Banner uploader
         
    // Add control for Page Banner uploader (actual uploader)
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'm2_page_banner', array(
        'label'    => __( 'Upload Page Banner (replaces text)', 'm2' ),
        'section'  => 'title_tagline',
        'settings' => 'm2_page_banner',
    ) ) );
}
add_action( 'customize_register', 'm2_customize_register' );
/* End Of Page Featured Image */

/* Post Thumbnail */
add_theme_support( 'post-thumbnails' );
add_image_size( 'custom-size', 1680, 750 );
/* End of Post Thumbnail */


// custom menu example @ https://digwp.com/2011/11/html-formatting-custom-menus/
function clean_custom_menus() {

	$menu_list = '';
    
    $menu_list .= wp_nav_menu( array(
    									'menu'=> '',
    									'container' => 'nav',
    									'container_class' => 'cl-effect-5',
    									'container_id' => 'cl-effect-5',
    									'menu_class'=> 'nav navbar-nav',
    									'menu_id'=> 'nav',
    									'depth' => 0,
    									'walker'          => new WPDocs_Walker_Nav_Menu()
    									));
    echo $menu_list;
}



/**
 * Custom walker class.
 */
class WPDocs_Walker_Nav_Menu extends Walker_Nav_Menu {
 
    /**
     * Starts the list before the elements are added.
     *
     * Adds classes to the unordered list sub-menus.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     */
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        // Depth-dependent classes.
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'sub-menu',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
        );
        $class_names = implode( ' ', $classes );
 
        // Build HTML for output.
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
 
    /**
     * Start the element output.
     *
     * Adds main/sub-classes to the list items and links.
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item   Menu item data object.
     * @param int    $depth  Depth of menu item. Used for padding.
     * @param array  $args   An array of arguments. @see wp_nav_menu()
     * @param int    $id     Current item ID.
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        // Depth-dependent classes.
        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
 
        // Passed classes.
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
 
        // Build HTML.
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" >';
 
        // Link attributes.
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
       // $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
 
        // Build HTML output and pass through the proper filter.
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            '<span data-hover="'.apply_filters( 'the_title', $item->title, $item->ID ).'">',
            apply_filters( 'the_title', $item->title, $item->ID ),
            '</span>',
            $args->link_after,
            $args->after
        );
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}
/**
 * End Of Custom walker class.
 */



/**
 * Copyright customizer
 */
function copyright_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'copyright_customizer_section_one',
        array(
            'title' => 'Copyright Settings',
            'description' => 'This is a copyright settings section.',
            'priority' => 35,
        ) 
    );
    $wp_customize->add_setting(
    'copyright_textbox',
    array(
        'default' => 'Default copyright text',
    )
);
    $wp_customize->add_control(
    'copyright_textbox',
    array(
        'label' => 'Copyright text',
        'section' => 'copyright_customizer_section_one',
        'type' => 'text',
    )
);
 $wp_customize->add_setting(
    'copyright_url',
    array(
        'default' => 'http://www.studentsonlinetest.com/',
    )
    );
  $wp_customize->add_control(
    'copyright_url',
    array(
        'label' => 'Copyright URL',
        'section' => 'copyright_customizer_section_one',
        'type' => 'text',
    )
);

}
add_action( 'customize_register', 'copyright_customizer' );
//////////////////////////////////////////////////////////



/**
 * Company Info customizer
 */
function company_info_customizer( $wp_customize ) {
    $wp_customize->add_section(
        'company_info_customizer_section_one',
        array(
            'title' => 'Company Info Settings',
            'description' => 'This is a compnay info settings section.',
            'priority' => 35,
        ) 
    );
    $wp_customize->add_setting(
    'company_email',
    array(
        'default' => 'xyz@example.com',
    )
);
    $wp_customize->add_control(
    'company_email',
    array(
        'label' => 'Company Email',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);
 $wp_customize->add_setting(
    'company_phone',
    array(
        'default' => '+91 8130730435',
    )
    );
  $wp_customize->add_control(
    'company_phone',
    array(
        'label' => 'Company Phone',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

 $wp_customize->add_setting(
    'company_fb',
    array(
        'default' => 'https://www.facebook.com/Timesnow/',
    )
    );
  $wp_customize->add_control(
    'company_fb',
    array(
        'label' => 'Facebook Link',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);
  
 $wp_customize->add_setting(
    'company_twitter',
    array(
        'default' => 'https://twitter.com/TimesNow?ref_src=twsrc google twcamp serp twgr author',
    )
    );
  $wp_customize->add_control(
    'company_twitter',
    array(
        'label' => 'Twitter Link',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);


 $wp_customize->add_setting(
    'company_gplus',
    array(
        'default' => 'https://plus.google.com/+TimesNow',
    )
    );
  $wp_customize->add_control(
    'company_gplus',
    array(
        'label' => 'Google Plus',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_pintrest',
    array(
        'default' => 'https://plus.google.com/+TimesNow',
    )
    );
  $wp_customize->add_control(
    'company_pintrest',
    array(
        'label' => 'Pintrest',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_dribbble',
    array(
        'default' => 'https://plus.google.com/+Dribbble',
    )
    );
  $wp_customize->add_control(
    'company_dribbble',
    array(
        'label' => 'Dribbble',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_rss',
    array(
        'default' => 'https://plus.google.com/+Dribbble',
    )
    );
  $wp_customize->add_control(
    'company_rss',
    array(
        'label' => 'RSS',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_rss',
    array(
        'default' => 'https://plus.google.com/+Dribbble',
    )
    );
  $wp_customize->add_control(
    'company_rss',
    array(
        'label' => 'RSS',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);


$wp_customize->add_setting(
    'company_rss',
    array(
        'default' => 'https://plus.google.com/+Dribbble',
    )
    );
  $wp_customize->add_control(
    'company_rss',
    array(
        'label' => 'RSS',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_street',
    array(
        'default' => '370 Wolfstreet',
    )
    );
  $wp_customize->add_control(
    'company_street',
    array(
        'label' => 'Street',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_city',
    array(
        'default' => 'New Delhi',
    )
    );
  $wp_customize->add_control(
    'company_city',
    array(
        'label' => 'City',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_state',
    array(
        'default' => 'Delhi',
    )
    );
  $wp_customize->add_control(
    'company_state',
    array(
        'label' => 'State',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_pin',
    array(
        'default' => '110029',
    )
    );
  $wp_customize->add_control(
    'company_pin',
    array(
        'label' => 'PIN',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

$wp_customize->add_setting(
    'company_country',
    array(
        'default' => 'India',
    )
    );
  $wp_customize->add_control(
    'company_country',
    array(
        'label' => 'Country',
        'section' => 'company_info_customizer_section_one',
        'type' => 'text',
    )
);

}
add_action( 'customize_register', 'company_info_customizer' );
//////////////////////////////////////////////////////////

function wpdocs_excerpt_more( $more ) {

    return ' <div class="more"><a href="'.get_the_permalink().'" class="hvr-curl-bottom-right">Read More...</a></div>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


function mytheme_comment($comment, $args, $depth) {
    ?>
     <div class="admin">
                    <div class="admin-left">
                        <?php if ( $args['avatar_size'] != 0 ) { 
                            echo get_avatar( $comment, 150); 
                        }?>
                    </div>
                    <div class="admin-right">
                        <h1> <a href="#"><?php echo get_comment_author_link()?></a></h1>
                        <p><?php comment_text(); ?></p>
                        <a href="#respond"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a>

      
                    </div>
                    <div class="clearfix"> </div>
                </div><br/>
    <?php
    }

// Add placeholder for Name and Email
function modify_comment_form_fields($fields){
    $fields['author'] = '<input id="author" placeholder="Name" name="author" type="text" value="" size="30"/>';
    $fields['email'] = '<input id="email" placeholder="Email" name="email" type="text" size="30"/>';
    $fields['url'] = '<input id="url" name="url" placeholder="Website" type="text" size="30" />';
    return $fields;
}
add_filter('comment_form_default_fields','modify_comment_form_fields');

function the_excerpt_max_charlength($charlength) {
    $excerpt = get_the_excerpt();
    $charlength++;

    if ( mb_strlen( $excerpt ) > $charlength ) {
        $subex = mb_substr( $excerpt, 0, $charlength - 5 );
        $exwords = explode( ' ', $subex );
        $excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
        if ( $excut < 0 ) {
        ?>
            <p> <?php echo mb_substr( $subex, 0, $excut )?></p>
        <?php
        } else {
            ?>
             <p><?php echo $subex ?></p>
            <?php
           
        }
        ?>
        <div class="more"><a href="<?php the_permalink()?>" class="hvr-curl-bottom-right">Read More...</a></div>

        <?php
        
    } else {
      ?>
        <p><?php echo $excerpt;?></p>
        <?php
    }
}



function footer_menu_right() {

    register_sidebar( array(
        'name'          => 'Footer Menu Right',
        'id'            => 'footer_menu_right',
        'before_widget' => '',
        'after_widget'  => '',
    ) );
}
add_action( 'widgets_init', 'footer_menu_right' );

function footer_menu_left() {

    register_sidebar( array(
        'name'          => 'Footer Menu Left',
        'id'            => 'footer_menu_left',
        'before_widget' => '',
        'after_widget'  => '',
    ) );
}
add_action( 'widgets_init', 'footer_menu_left' );


?>