<?php // (C) Copyright Bobbing Wide 2014, 2015

/**
 * Return a unique ID
 *
 */
function bw_graphviz_id() {
  static $id=0;
  $id++;
  return( $id );
}

/**
 * Just in case they want a title
 */ 
function bw_graphviz_title( $atts ) {
  $title = bw_array_get( $atts, "title", null ); 
  if ( $title ) {
    h2( $title );
  }
}

/**
 * Build the script for the graph generation code
 *
 * @TODO - support something other than a simple digraph
 *
		$wpg_graph_spec .= '<script type="text/vnd.graphviz" id="' . $wpg_id . '">';
			$wpg_graph_spec .= $wpg_graph_dot;
		$wpg_graph_spec .= '</script>';
    
 */
function bw_graphviz_generate_graph( $id, $atts, $content ) { 
  stag( "script", null, "bw_gv_id_$id", kv( "type", "text/vnd.graphviz" ));
  e( "digraph bw_gv_id_$id { " );
  // Prepend any special stuff to make it easier 
  
  $content = str_replace(
			array('&lt;', '&gt;', '&quot;', '&#8220;', '&#8221;', '&#039;', '&#8125;', '&#8127;', '&#8217;', '&#038;', '&amp;', "\n", "\r", "\xa0", '&#8211;'),
			array('<',    '>',    '"',      '"',       '"',       "'",      "'",       "'",       "'",       '&',      '&',     '',   '',   '-',    ''),
			$content
		);
  
  e( $content ); 
  e( "}" );
  etag( "script" ); 
}

   
/**   
 * Build the script to execute the graph generation code
 *
 * Invoke createViz to create the graph defined in script 'bw_gv_id_$id'
 * inside the div with
 *
 * @TODO This doesn't look particularly jQueryish to me! Should it be improved?
 * @TODO Support something other then generating svg
 * @TODO Find out how to generate links in the graph
 */
function bw_graphviz_generate_createViz( $id ) {
  stag( "script" );
  e( "bw_gv_div_$id.innerHTML = createViz( 'bw_gv_id_$id', 'svg' );" );
  etag( "script" );
}  

/**
 * Implement the [bw_graphviz] shortcode
 *
 * @TODO Find a better way of determining when to enqueue the JavaScript. As id may exceed 1.
 
 *
   <div id=wpg_div_plugins>wpg_div_plugins</div>
   <script type="text/vnd.graphviz" id="wpg_plugins">
   digraph wpg_plugins { 
   node [ shape=box, fillcolor=blue, fontname=Courier, fontsize=10, labelfontsize=10 ]; 
   shortcode -> plugins [label=_oik_sc_plugin ]; 
   sc_param -> shortcode; sc_example -> shortcode; 
   shortcode -> function [ label=_oik_sc_func, fontname=Arial, fontsize=10]; 
   }
   </script>
   <script>
   wpg_div_plugins.innerHTML = createViz("wpg_plugins", "svg");
   </script>
 * 
 
  
  // Here the unwanted br's a p's are being stripped from the content
  // We tried to turn off wpautop() to do the same thing but that's no good
  // when the autop filter runs before shortcode expansion
  
  
		// Get the dot specification of the graph
	//	$wpg_graph_dot = preg_replace(array('#<br\s*
  /?>#i', '#</?p>#i'), ' ', $content);
    
 *
 */
function bw_graphviz( $atts=null, $content=null, $tag=null ) {

  //wp_register_script( "viz.js", plugin_dir_url( __FILE__) . "jquery/viz.js", null  );  
  //wp_enqueue_script( "viz.js" );
  
  //wp_register_script( "viz-public", plugin_dir_url( __FILE__) . "jquery/viz-public.js", null );
  //wp_enqueue_script( "viz-public" );
  //$type = bw_array_get( $atts, "type", "digraph" );
  
  //if ( $type == "noderef" ) {
  //  
  //
  //}
  ///$result = apply_filters( "bw_graphviz_$type", $content, $atts, $tag );
  $output = bw_array_get( $atts, "output", "svg" );
  $lang = bw_array_get( $atts, "lang", "dot" );
  $id = bw_graphviz_id();
  //if ( 1 == $id ) {
    oik_require( "shortcodes/oik-jquery.php" );
    bw_jquery_javascript( oik_url( "shortcodes/jquery/viz.js", "oik-bob-bing-wide" ) );
    bw_jquery_javascript( oik_url( "shortcodes/jquery/viz-public.js", "oik-bob-bing-wide" ) );
  //}  
  sdiv( null, "bw_gv_div_$id" );
  e( "bw_gv_div_$id" );
  ediv(); 
  bw_graphviz_generate_graph( $id, $atts, $content );
  bw_graphviz_generate_createViz( $id );
  return( bw_ret() );
}

/**
 * Implement help hook for [bw_graphviz]
 */
function bw_graphviz__help( $shortcode="bw_graphviz" ) {
  return( "Display a GraphViz diagram");
}

/**
 * Implement syntax help for [bw_graphviz] shortcode
 */
function bw_graphviz__syntax( $shortcode="bw_graphviz" ) {
  $syntax = array( "output" => bw_skv( "skv", "", "Output format" )
                 , "lang" => bw_skv( "dot", "", "Content language" )
                 );
  return( $syntax );
}

/* 
 * Implement example hook for [bw_graphviz] shortcode
 *
 * Display a simple digraph with oik pointing to 3 other nodes: bob, bing and wide
 *
 */                               
function bw_graphviz__example( $shortcode="bw_graphviz" ) {
 $text = "Display a simple digraph with oik pointing to 3 other nodes: bob, bing and wide" ;
 $example = ']oik -> bob,bing,wide[/bw_graphviz';
 bw_invoke_shortcode( $shortcode, $example, $text );
}


/*
			'type' => false,
			'graph' => '',
			'lang' => 'dot',
			'simple' => false,
			'output' => 'svg',
			'href' => false,
			'size' => '',
			'title' => '',
			'showdot' => false,
		), $attr);




		// Build the dot specification of the graph when not complete
		if($bw_atts['simple']) { # emulate eht-graphviz
			$bw_atts['type'] = 'digraph';
		} 
		$bw_graph_size = '';
		if($bw_atts['size'] !== '') {
			$bw_graph_size = ' size="' . $bw_atts['size'] . '"; ';
		}
		if ($bw_atts['type']) {
			$bw_graph_dot = $bw_atts['type'] . ' ' . $bw_id . ' {' . $bw_graph_size . $bw_graph_dot . '}';
		}

		// Build the script to generate the graph
		$bw_graph_spec .= '<script type="text/vnd.graphviz" id="' . $bw_id . '">';
			$bw_graph_spec .= $bw_graph_dot;
		$bw_graph_spec .= '</script>';

		// Build the script to generate the graph and replace the placeholder div with the graph itself
		$bw_graph_doc .= '<script>';
			$bw_graph_doc .= $bw_div_id . '.innerHTML = createViz("' . $bw_id . '", "svg");';

			// Check value to showdot
			if (bw_string_to_bool($bw_atts['showdot'])) {
				$bw_graph_doc .= $bw_div_id . '.innerHTML += "' . __('<h4>DOT specification for graph id = ', WPG_PLUGIN) . $bw_id . '.</h4>";';
				$bw_graph_doc .= $bw_div_id . '.innerHTML += "<blockquote>' . esc_html($bw_graph_spec) . '</blockquote>";';
			}
		$bw_graph_doc .= '</script>';

    
		$bw_shortcode_output .= '<div id=' . $bw_div_id . '>' . $bw_div_id . '</div>';
		$bw_shortcode_output .= $bw_graph_spec;
		$bw_shortcode_output .= $bw_graph_doc;

		//$bw_shortcode_output = 'TESTING wp_graphviz_dot_shortcode<br/>';

*/
