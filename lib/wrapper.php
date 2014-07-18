<?php

/**
 * Theme Wrapper
 * Simplify templates with a base wrapper used on all pages.
 * http://scribu.net/wordpress/theme-wrappers.html
 */

if( !class_exists( '_S_Wrapping' ) ) {

  // Return the full path of the template loaded.
  function _s_template_path() {
    return _S_Wrapping::$main_template;
  }

  // Return the base name of the template loaded.
  function _s_template_base() {
    return _S_Wrapping::$base;
  }


  class _S_Wrapping {

    // Full path to the main template file
    static $main_template;

    // Base name of the template file; e.g. 'page' for 'page.php' etc.
    static $base;

    // Wrap the template include.
    static function wrap( $template ) {

      self::$main_template = $template;

      self::$base = substr( basename( self::$main_template ), 0, -4 );

      if( 'index' == self::$base ) self::$base = false;

      $templates = array( 'base.php' );

      if( self::$base ) array_unshift( $templates, sprintf( 'base-%s.php', self::$base ) );

      return locate_template( $templates );
    }
    
  }

  add_filter( 'template_include', array( '_S_Wrapping', 'wrap' ), 99 );

}