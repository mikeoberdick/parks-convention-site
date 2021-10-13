<?php 
// Deregister Sidebars
function d4tw_remove_sidebars () {
	unregister_sidebar( 'hero' );
    unregister_sidebar( 'herocanvas' );
	unregister_sidebar( 'statichero' );
	unregister_sidebar( 'footerfull' );
	unregister_sidebar( 'left-sidebar' );
	unregister_sidebar( 'right-sidebar' );
}

add_action( 'widgets_init', 'd4tw_remove_sidebars', 11 );
?>