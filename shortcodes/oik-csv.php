<?php // (C) Copyright Bobbing Wide 2013-2015

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
 * Get CSV formatting functions
 *
 * Determine the formatting functions to use to display the CSV
 *
 * @return array - mapping of uo= parameter value to function
 */
function bw_csv_get_funcs() {
  $funcs = array( "u" => "bw_csv_content_array_list" 
                , "ul" => "bw_csv_content_array_list"  
                , "o" => "bw_csv_content_array_list"
                , "ol" => "bw_csv_content_array_list"
                , "d" => "bw_csv_content_array_list"
                , "dl" => "bw_csv_content_array_list"
                , "table"=> "bw_csv_content_array_table"
                );
 // $funcs = apply_filters( "bw_csv_get_funcs", $funcs, $atts, $content );
 return( $funcs );
}

/**
 * Paginate an array of CSV content
 *
 * Note: This is prototype code. If you switch from a table to a list then you have to consider
 * what'll happen to the table heading.
 *
 * @param array $content_array - array of contents, incl. table heading which doesn't get paged
 * @param array $atts - shortcode atts
 */
function bw_csv_content_array_paged( $content_array, $atts ) {
  $posts_per_page = bw_array_get( $atts, "posts_per_page", null );
  if ( $posts_per_page ) {
    if ( !is_numeric( $posts_per_page ) ) {
      $posts_per_page = get_option( "posts_per_page" ); 
    }
    oik_require( "shortcodes/oik-navi.php" );
    $bwscid = bw_get_shortcode_id( true );
    $page = bw_check_paged_shortcode( $bwscid );
    $count = count( $content_array );
    $atts['uo'] = bw_array_get( $atts, "uo", "table" );
    if ( $atts['uo'] == "table" ) {
      $count--;
    }
    $pages = ceil( $count / $posts_per_page );
    $start = ( $page-1 ) * $posts_per_page;
    $end = min( $start + $posts_per_page, $count ) -1 ;                              
    bw_navi_s2eofn( $start, $end, $count );
    $select_array = bw_csv_content_array_select( $content_array, $start, $end, $atts );
    bw_csv_content_array( $select_array, $atts );
    bw_navi_paginate_links( $bwscid, $page, $pages ); 
  } else {
    bw_csv_content_array( $content_array, $atts );
  }
}

/**
 * Select the parts of the array that will be displayed
 *
 * We have to take into account the table heading when necessary ( ie. when uo=table ).
 * This processing is performed before any shortcode expansion of the fields in the array.
 *
 * @param array $content_array - the complete array
 * @param integer $start - the start index - starts from 0 ?
 * @param integer $end - the end index
 * @param array $atts - shortcode parameters
 * @return array - the selected rows from the array
 */
function bw_csv_content_array_select( $content_array, $start, $end, $atts ) {
  //bw_trace2();
  $select_array = array();
  if ( $atts['uo'] == "table" ) {
    $heading = array_shift( $content_array );
  }  
  //bw_trace2( $select_array, "select_array", false );
  //bw_trace2( $content_array, "content_array", false );
  $select_array = array_slice( $content_array, $start, 1+ $end-$start );
  
  if ( $atts['uo'] == "table" ) {
    array_unshift( $select_array, $heading );
  }  
  //bw_trace2( $select_array, "select_array ret", false );
  return( $select_array );
} 

/**
 * Display the contents of a CSV array
 *
 * Invokes the appropriate function to display the CSV
 * The HTML style is determined by the uo= parameter
 * The default is to format the contents in a table.
 * 
 * @param array - array of CSV records - the first may contain table column headings
 * @atts array - parameters, incl th=y|n and uo=u|o|d|other
 */
function bw_csv_content_array( $content_array, $atts=null ) {
  $uo = bw_array_get( $atts, "uo", "table" );
  $funcs = bw_csv_get_funcs();
  //bw_trace2( $funcs );
  $func = bw_array_get( $funcs, $uo, "bw_csv_content_array_table" );
  if ( is_callable( $func ) ) {
    call_user_func_array( $func, array( $content_array, $atts ) );
  } else {
    bw_csv_content_array_table( $content_array, $atts );
  } 
}

/**
 * Display CSV as a table
 *
 * @param array $content_array - array of contents to be displayed
 * @param array $atts - shortcode parameters 
 */ 
function bw_csv_content_array_table( $content_array, $atts=null ) {
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
			$tablerow = bw_csv_dashicons( $tablerow, $atts );
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

/**
 * Display CSV as a list
 *
 * - The list format is determined by the uo= parameter
 * - Empty lines are ignored
 *
 * @param array $content_array - array of contents to be displayed
 * @param array $atts - shortcode parameters 
 * 
 */
function bw_csv_content_array_list( $content_array, $atts=null ) {
  oik_require( "shortcodes/oik-list.php" );
  $ol = bw_sl( $atts );
  foreach ( $content_array as $line ) {
    $line = trim( $line );
    if ( $line ) {
      $tablerow = str_getcsv( $line );
      $tablerow = bw_csv_expand_shortcodes( $tablerow );
      bw_csv_output_list_item( $tablerow, $ol );
    }    
  }
  bw_el( $ol );
}

/**
 * Display a list item
 *
 * @TODO Determine if there is any need for a separator other than blank
 * @TODO Determine what to do when not unordered, ordered or definition list. e.g. comma separated?
 *
 * @param array $tablerow - array of output
 * @param string $uo - list type  
 */
function bw_csv_output_list_item( $tablerow, $uo ) {
  switch ( $uo ) {
    case "u":
    case "ul":
    case "o":
    case "ol":
      $item = implode( " ", $tablerow);
      li( $item );
      break;
      
    case "d":
    case "dl":
      $term = array_shift( $tablerow );
      $data = implode( " ", $tablerow );
      stag( "dt" );
      e( $term );
      etag( "dt" );
      stag( "dd" );
      e( $data );
      etag( "dd" ); 
      break;
      
    default:
      //span( $class );
      $item = implode( " ", $tablerow );
      br( $item );
  }    
}
 
/* 
 * Implement [bw_csv] shortcode for simpler table display
 *
 * - If there's embedded content then this is displayed
 * - If there is a src= parameter or unnamed parameter then this indicates the CSV source file
 * - If this is numeric it's considered to be a post ID
 * _ The display format is controlled using the uo= and th= parameters
 *
 * @param array $atts - shortcode parameters
 * @param string $content - inline content is accepted
 * @param string $tag - shortcode tag
 */                     
function bw_csv( $atts=null, $content=null, $tag=null ) {
  //bw_trace2();
  if ( $content ) {
    $content = rtrim( $content ); 
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
    bw_csv_content_array_paged( $content_array, $atts ); 
  }   
  return( bw_ret() );
}

/**
 * Help hook for [bw_csv] shortcode
 */
function bw_csv__help( $shortcode="bw_csv" ) {
  return( "Display CSV data in a table or list" );
}

/**
 * Syntax hook for [bw_csv] shortcode
 *
 */
function bw_csv__syntax( $shortcode="bw_csv" ) {
  $syntax = array( "src,0" => bw_skv( null, "file", "File containing CSV data to display" )
                 , "th" => bw_skv( "y", "n", "Format table headings" )
                 , "uo" => bw_skv( "table", "u|ul|o|ol|d|dl", "Format as list - unordered, ordered or definition" )
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

function bw_csv_get_mapping( $atts, $key ) {
	$map = bw_array_get( $atts, $key, null );
	switch ( $map ) {
		case null:
			$map = $key;
			break;
			
		case "Y":
			$map = "[bw_dash yes]";
			break;
			
		case "N":
			$map = "[bw_dash no]";
			break;
			
		default: 
			// Whatever they said
	}
	return( $map );
}

/**
 * Convert to dash icons 
 *
 * @param array $tablerow array of columns
 * @param array $atts 
 * @return array updated tablerow
 */
function bw_csv_dashicons( $tablerow, $atts ) {
	//$stars = bw_array_get( $atts, "stars", null );
	bw_trace2();
	
	$mapping["Y"] = bw_csv_get_mapping( $atts, "y" );
	$mapping["N"] = bw_csv_get_mapping( $atts, "n" );
	
	$dashed = array();
	
	foreach ( $tablerow as $col ) {
		$ucol = strtoupper( $col );
		$dashed[] = bw_array_get( $mapping, $ucol, $col );
	}
	return( $dashed ); 
} 
		 
  
