<?php // (C) Copyright Bobbing Wide 2014

/**
 * Namify the label so that it can be used for a CSS class
 * 
 * Note: This doesn't cater for special characters which may not be valid for CSS class names
 * 
 * @param string $name
 * @return string - a sanitized CSS name
 */  
function bw_label_namify( $name ) {
  $name = trim( $name );
  $name = str_replace( ' ', '_', $name );
  $name = str_replace( '-', '_', $name );
  $name = strtolower( $name );
  return( $name ); 
}

/**
 * Create a responsive table column class definition
 *
 * @param integer $columns - actual columns displayed in the table
 * @param array $atts - shortcode parameters to pass on
 * @return string - the responsive column class name - default suffix "pc"
 *
 */
function bw_responsive_column_class( $columns, $atts=null ) {
  $percentage = round( 100 / $columns );
  $responsive_column_class = "w${percentage}pc"; 
  $responsive_column_class = apply_filters( "oik_responsive_column_class", $responsive_column_class, $columns, $atts );
  return( $responsive_column_class );
} 

/**
 * Create a Responsive Pricing Table (RPT) using bw_table/bw_csv logic converted to use divs
 *
 * So where with bw_csv we have
 * 
 * [bw_csv]Field,Single,Multi,Unlimited
 * Price,9,19,29
 * Buy now,link 1,link 2,link3
 * [/bw_csv]
 *
 * we would have the same source but use the [bw_rpt] shortcode
 * 
 * We create a series of divs rather than table cells.
 * We build the whole table and then take each column and convert it into a div.
 * The labels in the first column are used to create the CSS class name for each row
 * The headings in the first row are currently ignored
 * 
 * 
 */
function bw_rpt( $atts=null, $content=null, $tag=null ) {
  oik_require( "classes/class-oik-tables.php", "oik-bob-bing-wide" );
  $table = new OIK_table();
  if ( $content ) {
    $table->load_table( $content );
  } else {
    $src = bw_array_get_from( $atts, "src,0", null );
    if ( $src ) {
      if ( is_numeric( $src ) ) {
        $src = wp_get_attachment_url( $src );
      }  
      $table->load_table_from_file( $src );
    } else {
      p( "Invalid use of bw_rpt. src= parameter not set" );
    }  
  }
  $columns = $table->columns();
  //echo "Cols: $columns" ;
  $labels = bw_array_get( $atts, "labels", false );
  if ( $labels ) {
    $start_column = 0;
  } else {
    $start_column = 1;
  }  
  
  $responsive_column_class = bw_responsive_column_class( $columns - $start_column, $start_column, $atts );
  $columns--;
  $rows = $table->rows();
  //echo "Rows: $rows" ;
  $rows--;
  $class = bw_array_get( $atts, "class", null ); 
  
  sdiv( "bw_rpt $class" );
  for ( $column = $start_column; $column <= $columns; $column++ ) { 
    sdiv( "bw_rpt_cols_$columns bw_rpt_c_$column $responsive_column_class" );
    for ( $row=1; $row <= $rows; $row++ ) {
      $label = bw_label_namify( $table->cell( $row, 0 ));
      sdiv( "bw_rpt_${column}_${row} bw_rpt_$label" );
      e( $table->cell( $row, $column ) ); 
      ediv();
    }
    ediv(); 
  }
  ediv();
  return( bw_ret() );
}  
  
  
   
