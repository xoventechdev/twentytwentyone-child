<?php


 
    function register_wse_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/wse-widget-1.php' );
	require_once( __DIR__ . '/widgets/team-memers-widget.php' );


	$widgets_manager->register( new \WSE_Hello_World_Widget_1() );
	$widgets_manager->register( new \WSE_Team_Members() );

    }
    
    
    add_action( 'elementor/widgets/register', 'register_wse_widget' );













