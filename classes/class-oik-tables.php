<?php // (C) Copyright Bobbing Wide 2014

class OIK_table {

  
  /**
   * The table is stored as a simple array of rows and columns
   * The first row ( row=0 ) is the table heading
   * The first column (column=0)  is the row label
   * 
   */
    
  public $table = null;
  
  function __construct() {
    $table = null;
  }
  
  function columns() {
    return( count( $this->table[0]) );
  }
  
  function rows() {
    bw_trace2( $this->table, "this->table" );
    return( count( $this->table ) );
  }
  
  /**
   * Return the cell having expanded any shortcodes
   * 
   * @param integer $row - 
   * @param integer $column -
   * @return string - the expanded cell
   */
  function cell( $row, $column ) {
    if ( isset( $this->table[$row][$column] ) ) {
      $cell = $this->table[$row][$column];
    } else {
      $cell = "&nbsp;";
    }  
    if ( false !== strpos( $cell, "[" ) ) {
      $cell = bw_do_shortcode( $cell );
    }
    return( $cell );
  }
  
  /**
   * Parse the content array into the table
   *
   * @param array $content_array - array of CSV records
   */
  function parse_content_array( $content_array ) {
    foreach ( $content_array as $line ) {
      $line = trim( $line );
      $row = str_getcsv( $line );
      bw_trace2( $row, "row from $line!", false);
      if ( $row ) {
        $this->table[] = $row;
      }
    }
  }
  
  /**
   * Parse the content into the table
   *
   * Note: Explode can produce an unwanted empty line
   *
   * @param string $content - the shortcode content
   *
   */ 
  function load_table( $content ) {
    $content = trim( $content );
    $content_array = explode( "\n", $content );
    $this->parse_content_array( $content_array );  
  }
  
  /**
   * Load the CSV table from a file
   *
   * @param string $file - full file name
   *
   */
  function load_table_from_file( $file ) {
    $content_array = file( $file );
    $this->parse_content_array( $content_array ); 
  }
  
  
  
}
