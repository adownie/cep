<?php



	
	function rc_scm_add_custom_nav_fields( $menu_item ) {
	
	    $menu_item->subtitle = get_post_meta( $menu_item->ID, '_menu_item_subtitle', true );
	    return $menu_item;
	    
	}
	
	/**
	 * Save menu custom fields
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_update_custom_nav_fields( $menu_id, $menu_item_db_id, $args ) {
	
	    // Check if element is properly sent
	    if ( is_array( $_REQUEST['menu-item-subtitle']) ) {
	        $subtitle_value = $_REQUEST['menu-item-subtitle'][$menu_item_db_id];
	        update_post_meta( $menu_item_db_id, '_menu_item_subtitle', $subtitle_value );
	    }
	    
	}
	
	/**
	 * Define new Walker edit
	 *
	 * @access      public
	 * @since       1.0 
	 * @return      void
	*/
	function rc_scm_edit_walker($walker,$menu_id) {
	
	    return 'Walker_Nav_Menu_Edit_Custom';
	    
	}



include_once( 'edit_custom_walker.php' );
include_once( 'custom_walker.php' );