<?php



function admin_notice_elementor_not_installed() {
    ?>
    <div class="notice notice-warning is-dismissible">
        <p><?php _e( 'Elementor not installed in this site.', 'text-domain' ); ?></p>
    </div>
    <?php
}


if (in_array('elementor/elementor.php', apply_filters('active_plugins', get_option('active_plugins')))) {
    
    require_once('elementor-addon/elementor-addon.php');
    
} else {
    add_action( 'admin_notices', 'admin_notice_elementor_not_installed' );
    
}



function enqueue_bootstrap() {
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/assets/bootstrap/bootstrap.min.css');
    wp_enqueue_script('bootstrap', get_stylesheet_directory_uri().'/assets/bootstrap/bootstrap.min.js', array('jquery'), '', true);
}
add_action('wp_enqueue_scripts', 'enqueue_bootstrap');


function enqueue_child_theme_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri().'/style.css');
    wp_enqueue_style('child-style', get_stylesheet_directory_uri().'/custom.css', array('parent-style'), null);

}
add_action('wp_enqueue_scripts', 'enqueue_child_theme_styles');



function team_member_post_type() {
    $labels = array(
        'name'               => __( 'Team Members', 'text-domain' ),
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'show_ui'             => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'team-members' ),
        'capability_type'     => 'post',
        'menu_position'       => null,
        'menu_icon'           => 'dashicons-groups',
        'supports'            => array( 'title', 'editor', 'thumbnail'),
    );

    register_post_type( 'wse_team_member', $args );
}
add_action( 'init', 'team_member_post_type' );




function team_members_shortcode() {

    $query = new WP_Query([
        'post_type'     => 'wse_team_member',
        'posts_per_page'    => -1,
        ]);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $output .= '<h3>' . get_the_title() . '</h3>';
        }
        wp_reset_postdata();
    } else {
        $output = '<p>No team members found.</p>';
    }

    return $output;
}
add_shortcode('team_members', 'team_members_shortcode');




