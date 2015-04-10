<?php // (C) Copyright Bobbing Wide 2013, 2014

/**
 * Expand any shortcodes in the row
 *
 * Each row in the [bw_csv] table, including the header row, may contain shortcodes which we want to expand.
 * We do a simple check for left square brackets before attempting to expand the shortcodes
 * If there isn't a '[' then we can save some time.
 * 
 * @param array $tablerow - an array of cells of content, which may contain shortcodes
 * @return array - array of expanded cells
 */
function bw_csv_expand_shortcodes( $tablerow ) {
  $et = array();
  foreach ( $tablerow as $row ) {
    if ( false !== strpos( $row, "[" ) ) {
      $et[] = bw_do_shortcode( $row );
    } else {
      $et[] = $row;
    }
  }
  return( $et );
}

/**
 * Display the contents of a CSV array
 *
 * Lines which are empty are ignored.
 *  
 * 
 * @param array - array of CSB records - the first may contain table column headings
 * @atts array - parameters, incl th=y|n
 *  
 */
function bw_csv_content_array( $content_array, $atts=null ) {
  $class = bw_array_get( $atts, "class", null );
  stag( "table", "bw_csv " . $class );
  oik_require( "bobbforms.inc" );
  $th = bw_array_get( $atts, "th", "y"  );
  $th = bw_validate_torf( $th );
  foreach ( $content_array as $line ) {
    //bw_trace2( $line, "line" );
    $line = trim( $line );
    if ( $line ) {
      $tablerow = str_getcsv( $line );
      $tablerow = bw_csv_expand_shortcodes( $tablerow );
      if ( $th ) {
        bw_tablerow( $tablerow, "tr", "th" );
        $th = false;
      } else {    
        bw_tablerow( $tablerow );
      }
    }    
  }
  etag( "table" ); 
}  
                     
/* 
 * Implement [bw_csv] shortcode for simpler table display
 *
 * If there is a src= parameter or unnamed parameter then this indicates the CSV source file.
 * If this is numeric it's considered to be a post ID.
 *
 * @param array $atts - shortcode parameters
 * @param string $content - inline content is accepted
 * @param string $tag - shortcode tag
 *
 */                     
function bw_csv( $atts=null, $content=null, $tag=null ) {
  bw_trace2();
  if ( $content ) {
    $content_array = explode( "\n", $content );
  } else {
    $src = bw_array_get_from( $atts, "src,0", null );
    if ( $src ) {
      if ( is_numeric( $src ) ) {
        $src = wp_get_attachment_url( $src );
      }  
      $content_array = file( $src );
    } else {
      p( "Invalid use of bw_csv. src= parameter not set" );
      $content_array = null;
    }  
  }
  if ( $content_array ) { 
    bw_csv_content_array( $content_array, $atts ); 
  }   
  return( bw_ret() );
}

/**
 * Help hook for [bw_csv] shortcode
 */
function bw_csv__help( $shortcode="bw_csv" ) {
  return( "Display CSV data in a table" );
}

/**
 * Syntax hook for [bw_csv] shortcode
 */
function bw_csv__syntax( $shortcode="bw_csv" ) {
  $syntax = array( "src" => bw_skv( null, "file", "File containing CSV data to display" )
                 , "th" => bw_skv( "y", "n", "Format table headings" )
                 );
  return( $syntax );                 
}

/**
 * Example hook for [bw_csv] shortcode
 */
function bw_csv__example( $shortcode="bw_csv" ) {
 $text = "Display a simple table" ;
 $example = ']a,b' . PHP_EOL . '1,2[/bw_csv';
 bw_invoke_shortcode( $shortcode, $example, $text );
}

/**
 * Snippet hook for [bw_csv] shortcode
 */
function bw_csv__snippet( $shortcode="bw_csv" ) {
 $example = ']a,b' . PHP_EOL . '1,2[/bw_csv';
  _sc__snippet( $shortcode, $example );
} 


 
