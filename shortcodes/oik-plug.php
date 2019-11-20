<?php // (C) Copyright Bobbing Wide 2012-2017

/**
 * Implements the [bw_plug] shortcode 
 *  
 * 
 *
 * Notes:
 * - When the table parameter is set to true then the data is formatted in a table. 
 * - A table header and footer is added.
 * 
 * Instead of coding: 
 * `[bw_plug name='oik' table='y'][bw_plug name='wordpress-google-plus-one-button' table='y']`
 * simplify it to  `[bw_plug name='oik,wordpress-google-plus-one-button' table='y']`
 * 
 * In fact - you can omit the table= parameter since it's forced when there's more than one name.
 * 
 * @param array $atts - shortcode parameters
 * @param string $content - not expected
 * @param string $tag - not expected
 * @return string - generated HTML for the shortcode link or table of shortcodes
 */
if ( !function_exists( "bw_plug" ) ) {
function bw_plug( $atts=null, $content=null, $tag=null ) {
  $name = bw_array_get_from( $atts, 'name,0', 'oik' );
  $link = bw_array_get( $atts, 'link', 'n' );
  $table = bw_array_get( $atts, 'table', NULL ); 
  $option = bw_array_get( $atts, 'option', NULL );
  $banner = bw_array_get( $atts, 'banner', null );
  bw_trace( $atts, __FUNCTION__, __LINE__, __FILE__, "atts" );
  
  $table = bw_validate_torf( $table );
  $link = bw_get_notes_page_url( $link );
	//return( "bw_plug dummy" );
  
  bw_trace( $table, __FUNCTION__, __LINE__, __FILE__, "table", BW_TRACE_DEBUG );
  
  if ( !empty( $option ) ) {
    $names = bw_plug_list_plugins( $option );
  } else {
    $name = wp_strip_all_tags( $name, TRUE );
    $names = explode( ",", $name );
  }
  
  // Force table format if there is more than one plugin name listed
  if ( count( $names) > 1 )
    $table = true;
  
  bw_plug_table( $table );

  foreach ( $names as $name ) {
  
    $name = bw_plugin_namify( $name );
  
    $plugininfo = bw_get_plugin_info( $name, $table );
    bw_trace( $plugininfo, __FUNCTION__, __LINE__, __FILE__, "plugininfo", BW_TRACE_INFO );
		if ( is_array( $plugininfo ) ) {
			$plugininfo = (object) $plugininfo;
		} 
    
    if ( is_wp_error( $plugininfo ) || !$plugininfo || !property_exists( $plugininfo, "name" ) ) {
      if ( $table ) {
        bw_format_plug_table( $name, $link, FALSE );
      }  
      else {
        bw_format_default( $name, $link );
      } 
    }   
    else {
			$plugininfo->short_description = bw_get_property( $plugininfo, "short_description", null );
      if ( $table ) {
        bw_format_plug_table( $name, $link, $plugininfo );
      }  
      else {
        bw_format_link( $name, $link, $plugininfo, $banner );
      }  
    }  
  } 
  bw_plug_etable( $table ); 
  return( bw_ret());  
}


/**
 * Get the URL structure for the notes page
 * 
 * If there is a defined notes_page this value should become the default on the bw_array_get() 
 * NOT the 'n' we're now setting it to. 
 * So we need to reset that logic AND provide the admin page
 * **?** we'll leave this for oik-bob-bing-wide v2 Herb 2012/11/08
 * 
 * @param string $link can be "true" or "false" or an URL
 * @return $link - link to the notes page or null
 */   
function bw_get_notes_page_url( $link ) {
  $torf = bw_validate_torf( $link );
  if ( $torf ) {
    $link = bw_get_option( "notes_page", "bw_bobbingwide" );  // **?** Not yet implemented
    if ( !$link ) {
      $link = "https://www.bobbingwidewebdesign.com/plugins";  // For some backward compatibility
    }  
  } else {
    // It's false so it could have been an URL
    if ( false === strpos( $link, "http" ) ) {
      $link = null;
    }
  }
  bw_trace2( $link, "link", false );
  return( $link );
} 

              

/**
 * table header for bw_plug
 *
 * Produce a table header like this:
 * ```
 * <table>
 * <tbody>
 * <tr>
 * <th>Plugin name and description</th>
 * <th>Plugin links</th>
 * <th>Version, total downloads, last update, tested</th>
 * </tr>
 * ```
 *
 * @param bool $table - true if a table is being displayed
 *
 */
function bw_plug_table( $table=false ) {
  if ( $table ) {
    stag( "table", "bw_plug" );
    stag( "tbody" );
    stag( "tr" );
    th( "Plugin name and description", 'name' );
    th( "Plugin links", 'links' );
    th( "Version, total downloads, last update, tested", 'vtdlut' );
    etag( "tr" );
  }  
}

/**
 * table footer for bw_plug 
 *
 * Produce the table footer, if required
 *
 * @param bool $table - true if a table is being displayed
 */
function bw_plug_etable( $table=false ) { 
  if ( $table ) {
    etag( "tbody" );
    etag( "table" );
  }  
}

/**
 * Cache load of plugin info - new version
 * 
 * - If no response then try our registered plugins
 * - If we can find the server then we try talking to that
 * - If no response then try WordPress 
 * - 
 * Rather than assume it's a WordPress plugin we can check if we know about it
 * by looking in the plugin directory
 * 
 * @param string $plugin_slug - the plugin slug e.g. oik or jetpack
 * @return XML - XML form of information about the plugin
 * @return object - object form of information about the plugin
 */ 
function bw_get_plugin_info_cache2( $plugin_slug ) {
  bw_trace2();
  //$response_xml = wp_cache_get( "bw_plug2", $plugin_slug );
  
  $response_xml = get_transient( 'bw_plug2_'. $plugin_slug );
	if ( is_array( $response_xml ) ) {
		$response_xml = (object) $response_xml;
	}
	bw_trace2( $response_xml, "response_xml" );
  if ( empty( $response_xml ) || !is_object( $response_xml ) ) {
    $response = bw_get_oik_plugins_info( $plugin_slug );
    if ( $response ) {
      $response_xml = null;
      //$cache_xml = bw_get_response_as_xml( $response );
      
      //wp_cache_set( "bw_plug2", $response, $plugin_slug, 43200 );
      
      set_transient( "bw_plug2_" . $plugin_slug, $response, 43200 );
      //gobang();
    } else {
      $response_xml = bw_get_plugin_info2( $plugin_slug );
    }  
    if ( !empty( $response_xml ) ) {
      $response_xml = _bw_tidy_response_xml( $response_xml ); 
      //wp_cache_set( "bw_plug2", $response_xml, $plugin_slug, 43200 );
      
      set_transient( "bw_plug2_" . $plugin_slug, $response_xml, 43200 );
    }  
  } else {
    bw_trace2( $response_xml, "response_xml from cache" );
  
  }
  bw_trace2( $response_xml, "response_xml" );
  
  if ( $response_xml ) {
    $simple_xml = $response_xml; //simplexml_load_string( $response_xml );   
  } else {  
    $simple_xml = $response;
  } 
  bw_trace2( $simple_xml, "simple_xml", false ); 
  return( $simple_xml );
}

/**
 * Convert the response object to an XML string
 */
function bw_get_response_as_xml( $response ) { 

  return( $xml );

}

/**
 * Return information on an oik-plugins plugin.
 * 
 * perhaps we should switch to the php serialized version... it could be easier **?**
 * 
 * @param string $plugin_slug - the plugin slug e.g. oik-fields
 * @return object - a plugininfo structure
 * 
 */
function bw_get_oik_plugins_info( $plugin_slug ) {
  oik_require( "admin/oik-admin.php" );
  oik_require( "includes/oik-remote.inc" );
  $server = bw_get_defined_plugin_server( $plugin_slug ); 
  if ( $server ) {
    oik_register_plugin_server( $plugin_slug, $server );
    $result = oik_lazy_pluginsapi( false, "plugin_information", array( "slug" => $plugin_slug) );
		
    if ( is_wp_error( $result ) ) {
		  $result = false;
		} elseif ( $result ) {
      $result->oik_server = $server;
      //$result['oik_server'] = $server;
    }
  } else {
    $result = false; 
  }
  bw_trace2( $result ); 
  return( $result ); 
}

/**
 * Get defined plugin server
 *
 * Obtain the plugin information from bw_plugins
 * If set, find the server name - defaulting to the value of oik_get_plugins_server()
 * 
 * 
 * @param string $plugin_slug - the plugin slid e.g. oik-bob-bing-wide
 * @erturn string - the plugin server  e.g. 
 */
function bw_get_defined_plugin_server( $plugin_slug ) {
  $plugin = bw_get_option( $plugin_slug, "bw_plugins" );
  bw_trace2( $plugin, "plugin", false );
  if ( $plugin ) { 
    $server = bw_array_get_dcb( $plugin, "server", null, "oik_get_plugins_server" );
    if ( !$server ) {
      $server = oik_get_plugins_server();
    }
  } else {
    $server = null;
  }
  bw_trace2( $server, "plugin server" );
  return( $server );
}

  

/** 
 * Get plugin information in XML format for cacheing
 *
 * If the plugin is installed locally we can obtain the information from the plugin data
 * BUT this doesn't necessarily tell us if it's hosted on WordPress.org
 * 
 * A null response from bw_get_local_plugin_xml() tells us it's either hosted on wordpress.org OR we don't know about the plugin.
 * 
 * If the oik_server is set then we don't bother accessing WordPress.org but point to the oik server.
 * For plugins that are dual hosted ( wordpress.org and an oik server) then it all depends on what's in the current setting for the plugin server.
 *
 * response_xml oik_server action
 * ------------ ---------- ---------------------------------
 * null         null       find information from wordpress.org
 * null         set        NOT possible
 * set          null       possibly find information from wordpress.org
 * set          set        don't bother
 
 

 *  bw_get_plugin_info2(4) plugin_data Array
(
    [Name] => oik-nivo-slider
    [PluginURI] => http://www.oik-plugins.com/oik-plugins/oik-nivo-slider/
    [Version] => 1.9
    [Description] => [nivo] shortcode for the Nivo slider using oik <cite>By <a href="http://www.bobbingwide.com" title="Visit author homepage">bobbingwide</a>.</cite>
    [Author] => <a href="http://www.bobbingwide.com" title="Visit author homepage">bobbingwide</a>
    [AuthorURI] => http://www.bobbingwide.com
    [TextDomain] => 
    [DomainPath] => 
    [Network] => 
    [Title] => <a href="http://www.oik-plugins.com/oik-plugins/oik-nivo-slider/" title="Visit plugin homepage">oik-nivo-slider</a>
    [AuthorName] => bobbingwide
)

These come from the readme.txt file

Requires at least: 3.5
Tested up to: 3.6


<?xml version="1.0" encoding="utf-8"?>
<plugin>
<name type="string">
<![CDATA[ oik-nivo-slider ]]></name>
<slug type="string"><![CDATA[ oik-nivo-slider ]]></slug>
<version type="string"><![CDATA[ 1.8 ]]> </version>
<author type="string">  <![CDATA[<a href="http://www.bobbingwide.com">bobbingwide</a> ]]> </author>
<author_profile type="string"><![CDATA[ http://profiles.wordpress.org/bobbingwide ]]>    </author_profile>   <contributors type="array">  <bobbingwide type="string">  <![CDATA[ http://profiles.wordpress.org/bobbingwide ]]>
</bobbingwide>
</contributors>
<requires type="string">
<![CDATA[ 3.3 ]]>
</requires>
<tested type="string">
<![CDATA[ 3.5.2 ]]>
</tested>


<rating type="double">73.4</rating>
<num_ratings type="integer">12</num_ratings>
<downloaded type="integer">56775</downloaded>

<last_updated type="string">
<![CDATA[ 2013-02-21 ]]>
</last_updated>
<added type="string">
<![CDATA[ 2012-04-11 ]]>
</added>
<homepage type="string">
<![CDATA[
http://www.oik-plugins.com/oik-plugins/oik-nivo-slider/
]]>
</homepage>
*/
function bw_get_plugin_info2( $plugin_slug ) {
  list( $response_xml, $oik_server ) = bw_get_local_plugin_data( $plugin_slug );
  //bw_trace( $response_xml, __FUNCTION__, __LINE__, __FILE__, "response_xml" );
  if ( $oik_server ) {
    // We found the plugin information and also know that it's an oik server
  } else {
    // We may have found the plugin information OR believe it's wordpress.org
    // let's check wordpress.org. If we find some information overwrite what we already know.
    $request_url = "http://api.wordpress.org/plugins/info/1.0/$plugin_slug.php?fields[short_description]=true";
    $response_xml = bw_remote_get2( $request_url ); //, null );
    //$response_xml = bw_analyze_response_xml2( $response_xml2, $response_xml );
  }
  //bw_trace( $response_xml, __FUNCTION__, __LINE__, __FILE__, "response_xml" );
  return $response_xml;
}

/**
 * Get local plugin info
 *
 * Loads the plugin information from the plugin file, if available
 * If the PluginURI is not wordpress.org then either set 
 * oik_server if defined or set plugin_server to "unknown"
 * 
 * @param string $plugin_slug - the name of the plugin we're looking for
 * @return array consisting of xml_string and server
 */
function bw_get_local_plugin_data( $plugin_slug ) {
  $server = null;
  $plugin_data = bw_get_plugin_data( $plugin_slug );
  if ( $plugin_data ) {
    $pluginURI = bw_array_get( $plugin_data, "PluginURI", null );
    $url = parse_url( $pluginURI );
    $url_host = bw_array_get( $url, 'host', null );
    if ( $url_host != "wordpress.org" ) {
    
      //$xml = new SimpleXmlElement( "<plugin></plugin>" );
      //$plugin = $xml->plugin;
      
      //bw_trace2( $xml );
      bw_add_array_key( $plugin_data, "Name" ) ;
      bw_add_array_key( $plugin_data, "Name", "slug" );
      bw_add_array_key( $plugin_data, "Version" );
      bw_add_array_key( $plugin_data, "PluginURI", "homepage" );
      bw_add_array_key( $plugin_data, "Description", "short_description" );
      $server = bw_get_defined_plugin_server( $plugin_slug ); 
      if ( $server ) {
        $plugin_data["PluginURI"] = "$server/oik-plugins/$plugin_slug/";
        bw_add_array_key( $plugin_data, "PluginURI", "oik_server" );
      } else {
        // don't set oik_server yet
        $plugin_data["plugin_server"] = "unknown"; 
      } 
      $readme_data = bw_get_readme_data( $plugin_slug ); 
			//bw_trace2( $plugin_data, "plugin_data bfore", false );
			if ( $readme_data ) {
				$plugin_data = array_merge( $plugin_data, $readme_data );
			}	
			//bw_trace2( $plugin_data, "plugin_data after", false );
      //bw_add_array_key( $plugin_data, $readme_data, "Tested" );
      //bw_add_array_key( $xml, $readme_data, "Last_updated" );
      
      //$xml_string = $xml->asXML();
    }  
  } else {
    // Never mind - assume WordPress.org ?
  }   
  return( array( $plugin_data, $server) );  
} 



/**
 * Get local plugin info XML
 *
 * Loads the plugin information from the plugin file, if available
 * If the PluginURI is not wordpress.org then either set 
 * oik_server if defined or set plugin_server to "unknown"
 * 
 * @param string $plugin_slug - the name of the plugin we're looking for
 * @return array consisting of xml_string and server
 */
function bw_get_local_plugin_xml( $plugin_slug ) {
  $xml_string = null;
  $server = null;
  $plugin_data = bw_get_plugin_data( $plugin_slug );
  if ( $plugin_data ) {
    $pluginURI = bw_array_get( $plugin_data, "PluginURI", null );
    $url = parse_url( $pluginURI );
    if ( $url['host'] != "wordpress.org" ) { 
    
      $xml = new SimpleXmlElement( "<plugin></plugin>" );
      //$plugin = $xml->plugin;
      
      bw_trace2( $xml );
      bw_add_xml_child( $xml, $plugin_data, "Name" ) ;
      bw_add_xml_child( $xml, $plugin_data, "Name", "slug" );
      bw_add_xml_child( $xml, $plugin_data, "Version" );
      bw_add_xml_child( $xml, $plugin_data, "PluginURI", "homepage" );
      bw_add_xml_child( $xml, $plugin_data, "Description", "short_description" );
      $server = bw_get_defined_plugin_server( $plugin_slug ); 
      if ( $server ) {
        $plugin_data["PluginURI"] = "$server/oik-plugins/$plugin_slug/";
        bw_add_xml_child( $xml, $plugin_data, "PluginURI", "oik_server" );
      } else {
        // don't set oik_server yet
        $xml->addChild( "plugin_server", "unknown" ); 
      } 
      $readme_data = bw_get_readme_data( $plugin_slug ); 
      bw_add_xml_child( $xml, $readme_data, "Tested" );
      bw_add_xml_child( $xml, $readme_data, "Last_updated" );
      
      $xml_string = $xml->asXML();
    }  
  } else {
    // Never mind - assume WordPress.org ?
  }   
  return( array( $xml_string, $server) );  
} 

/** 
 * Get plugin data if available
 *
 * @param string $plugin_slug - plugin slug e.g. oik-fields
 * @return string - plugin data for the plugin if the main plugin file exists
 */
function bw_get_plugin_data( $plugin_slug ) {

	//$plugins = get_plugins( '/' . $plugin_slug ) ;
	//print_r( $plugins );

  require_once( ABSPATH . "wp-admin/includes/plugin.php" );

  $file = oik_path( "$plugin_slug.php" , $plugin_slug ); 
  if ( file_exists( $file ) ) {
    $plugin_data = get_plugin_data( $file );
  } else {
    $plugin_data = null;
  }    
  bw_trace2( $plugin_data, "plugin_data" );
  return( $plugin_data );
}

/** 
 * Obtain the "Tested up to" information and, if available "Last updated" from the readme.txt file
 * 
 * e.g. 
 *  Tested up to: 3.6
 *  Last updated: some form of date string
 *
 * @param string $plugin_slug - plugin slug e.g. oik-fields
 * @return array - readme_data with "Tested" and "Last_updated" keys set
 */
function bw_get_readme_data( $plugin_slug ) {
  require_once( ABSPATH . "wp-admin/includes/plugin.php" );
  $file = oik_path( "readme.txt" , $plugin_slug ); 
  if ( file_exists( $file ) ) {
    $headers = array( "Tested" => "Tested up to" 
                    , "Last_updated" => "Last updated" 
                    );
    $readme_data = get_file_data( $file, $headers, 'plugin' );
    if ( !$readme_data['Last_updated'] ) {
      $readme_data['Last_updated'] = bw_format_date( filemtime( $file ));
    }
  } else {
    $readme_data = null;
		bw_trace2( $file, "file does not exist", true, BW_TRACE_WARNING );
		// Perhaps it's README.txt 
		bw_backtrace();
  }    
  bw_trace2( $readme_data, "readme_data" );
  return( $readme_data );
}  

/**
 * Add a child node to the simple XML
 * 
 * Update the SimpleXML with the field from plugin_data
 *
 * @param SimpleXML object $xml - SimpleXML object
 * @param array $plugin_data - the source of the data to be added
 * @param string $src - the field name
 * @param string $target - the target name if different from $src
 */
function bw_add_xml_child( &$xml, $plugin_data, $src, $target=null ) {
  if ( !$target ) {
    $target = strtolower( $src );
  }  
  $value = bw_array_get( $plugin_data, $src, null ); 
  $xml->addChild( $target, $value ); 
}



/**
 * Add a field from another entry in the array
 * 
 */
function bw_add_array_key( &$plugin_data, $src, $target=null ) {
  if ( !$target ) {
    $target = strtolower( $src );
  }  
  $value = bw_array_get( $plugin_data, $src, null ); 
  $plugin_data[$target] = $value; 
}

/**
 * Analyze the response from bw_remote_get2()
 *
 * WordPress.org may reply with an empty XML block
 * which is going to be less than 70 characters
 *
   <?xml version="1.0" encoding="utf-8"?>
   <plugin>
   <NULL /></plugin>
 
 * @param string $response_xml2 from wordpress.org
 * @param string $response_xml from the plugin data  
 * @returns string - the wordpress.org string if it contains data  
 */
function bw_analyze_response_xml2( $response_xml2, $response_xml ) {
  if ( $response_xml2 && strlen( $response_xml2 ) >= 70 ) {
    bw_trace2( $response_xml2, "response_xml2" );
    $response_xml = $response_xml2;
  }
  return( $response_xml );
}

/**
 * 
 * Some strings cause simplexml_load_string() to produce warning message
 *
 * Warning: simplexml_load_string(): Entity: line 2: parser error : Entity 'rarr' not defined 
 *
 * e.g. The &rarr; from Human Made's wordpressbackup plugin
 *
 *   [Description] => Simple automated backups of your WordPress powered website. 
 *   Once activated you&#8217;ll find me under <strong>Tools &rarr; Backups</strong>. 
 *   <cite>By <a href="http://hmn.md/" title="Visit author homepage">Human Made Limited</a>.</cite>
 *
 * This can be fixed by converting unrecognised entities to numeric entities.
 * e.g   &rarr; becomes &#nnnn; 
 *
 * @link http://stackoverflow.com/questions/3805050/xml-parser-error-entity-not-defined    
 * 
 * @param string $response_xml - the raw XML which may contain HTML entities
 * @return string XML with HTML entities converted to numeric entities 
 */
function _bw_tidy_response_xml( $response_xml ) {
  //$response_xml = ent2ncr( $response_xml );
  return( $response_xml );
}

/**
 * Format a link or links to the plugin
 * 
 * When formatting two links they appear as: plugin(notes)
 * 
 * @param string $name - the plugin name
 * @param string $link - link to the notes page URL
 * @param object $plugininfo - plugininfo object - which may also contain oik_server
 */    
function bw_format_link( $name, $link, $plugininfo, $banner=null ) {
  if ( $banner ) {
    sdiv( "bw_plug" );
    bw_link_plugin_banner( $name, $plugininfo, $banner );
  } else { 
    span( "bw_plug" );
    bw_link_plugin_download( $name, $plugininfo );
  }
  bw_link_notes_page( $name, $link, "(", ")" );
  if ( $banner ) {
    ediv();
  } else {
    epan();
  }  
}

/**
 * Create a plugin banner link 
 * 
 * The link used to be to s-plugins.wordpress.org, then changed to ps.w.org sometime in 2016
 * 
 * @param string $name the plugin name
 * @param array $plugininfo
 * @param string $banner
 * @return string a link to the plugin via the banner image
 */ 
function bw_link_plugin_banner( $name, $plugininfo, $banner ) {
  if ( $banner ) {    
    switch ( strtolower( substr( $banner, 0, 1) ) ) {
      case 'y':
        $file = bw_get_banner_file_URL( $name, $plugininfo );
        if ( $file ) {
          $image = retimage( "bw_banner", $file, $name );
          //alink( "bw_banner", $plugininfo->oik_server, $image, $file );
          // 2014/03/01 - trying homepage again.
          alink( "bw_banner", $plugininfo->homepage, $image, $file );
        } else {
          bw_trace2( "Cannot determine banner file URL" );
        }  
        break;   
      
      case 'p':
        // Deliver a .png style banner image from WordPress.org
        $banner_type = ".png";
				//
        $file = "https://ps.w.org/$name/assets/banner-772x250$banner_type";
        $image = retimage( "bw_banner", $file, $name );
        alink( "bw_banner", "https://wordpress.org/plugins/$name", $image, $file );   
        break;
    
      case 'j':
      default:
        // Deliver a .jpg banner image from WordPress.org
        
        $banner_type = ".jpg"; 
        $file = "https://ps.w.org/$name/assets/banner-772x250$banner_type";
        $image = retimage( "bw_banner", $file, $name );
        alink( "bw_banner", "https://wordpress.org/plugins/$name", $image, $file );   
        break;
    }
  }
}

/**
 * Get the banner file URL 
 *
 * We have a couple of places where we can find the information about the banner image to display: homepage and oik_server
 * If oik_server contains /oik-plugins/ then we should be able to replace it with /banner/
 * otherwise we have to work from the homepage, stripping anything after /oik-plugins/
 * and replacing it with /banner/$name
 * This is because the oik-plugins server returns the full URL of the oik-plugins page
 * 
 *  
 * Deliver an oik-plugins style image from the oik-plugins server
        // $file = $plugininfo->oik_server ."/banner/" . $name; 
 */
function bw_get_banner_file_URL( $name, $plugininfo ) {
  bw_trace2( );
	if ( isset( $plugininfo->oik_server ) ) {
		$pos = strpos( $plugininfo->oik_server, "/oik-plugins/" );
	} else {
		$pos = false;
	}
  if ( $pos === false ) {
    $pos = strpos( $plugininfo->homepage, "/oik-plugins/" );
    if  ( $pos === false ) {
      $file = null;
    } else {
      $file = substr( $plugininfo->homepage, 0, $pos );
      $file .= "/banner/$name";
    }  
  } else {    
    $file = str_replace( "/oik-plugins/", "/banner/", $plugininfo->oik_server );
  }
  bw_trace2( $file, "file" );
  return( $file );
}  

/**
 * Create a link to the plugin's download page
 *
 * The link to the download page is determined from a number of fields in the plugininfo structure
 * which get set as we're trying to find out about the plugin.
 *
 * oik_server  plugin_server  link to set 
 * ----------  -------------  -------------------------
 * null        "unknown"      $homepage - since this is neither a wordpress.org or "oik" plugin
 * null        not set        wordpress.org/plugins/$name
 * set         n/a            oik_server 
 *
 * @param string $name - the plugin slug name e.g. oik, jetpack, woocommerce
 * @param mixed $plugininfo - some form of SimpleXMLElement Object 
 * @return string - the download page URL... which may have a trailing slash
 * 
 */
function bw_link_plugin_download( $name, $plugininfo ) {
  $title = "Link to the $plugininfo->name ($name: $plugininfo->short_description) plugin" ;
  $download_page = bw_array_get( $plugininfo, "oik_server", null );
  if ( !$download_page ) {
    $plugin_server = bw_array_get( $plugininfo, "plugin_server", null );
    if ( $plugin_server == "unknown" ) {
      $download_page = bw_array_get( $plugininfo, "homepage", null );
    } else { 
      $download_page = "https://wordpress.org/plugins/".$name;
    }
  } else {
    $download_page = bw_array_get( $plugininfo, "homepage", $download_page );
  }
  alink( "plugin", $download_page , $plugininfo->slug, $title );
  return( $download_page );  
}


/** 
 * Create a link to the notes page.
 */
function bw_link_notes_page( $name, $link, $lp=null, $rp=null ) {
  if ( $link ) {
    $link .= "/";
    $link .= $name;
    e( $lp );
    alink( "bwlink", $link, "...", "Link to notes on ".$name );
    e( $rp ); 
  }  
}


/** Format the bw_plug output as a table with a number of columns
 * 1. plugin name and short description
 * 2. link to plugin, link to plugin's home page, link to [bw]'s notes on the plugin
 * 3. other stuff: version, number times downloaded, last update date, tested up to WP x.x.xx 
 */  
function bw_format_plug_table( $name, $link, $plugininfo ) {
  stag( "tr");
  if ( $plugininfo === FALSE ) {
    td( $name );
    td( "No info available <!-- $link -->" );
    td( "&nbsp;" );
    }
  else {
    stag( "td", 'name' );
    strong( $plugininfo->name );
    br();
    e( $plugininfo->short_description );
    etag( "td" );
    stag( "td", 'links' );
    $download_page = bw_link_plugin_download( $name, $plugininfo );
    if ( $download_page != $plugininfo->homepage ) {
      br();
      alink( "home", $plugininfo->homepage, "home", "Link to plugin homepage" ); 
    }  
    br();
    bw_link_notes_page( $name, $link );
    etag( "td" );
    stag( 'td', 'vtdlut');
    sepan( 'version', $plugininfo->version );
    br();
	$downloaded = bw_get_property( $plugininfo, "Downloaded", null );
	sepan( 'downloaded', number_format_i18n( $downloaded, 0 ) );
	br();
	$last_updated = bw_get_property( $plugininfo, "Last_updated", null );
	if ( function_exists( 'wp_date') ) {
		$time = strtotime( $last_updated ) ;
		$format = get_option( 'date_format' );
		$formatted_date = wp_date( $format, $time );
	} else {
		$formatted_date = substr( $last_updated, 0, 10 );
	}
	sepan( 'updated', $formatted_date );
	br();
	$tested = bw_get_property( $plugininfo, "Tested", null );
	sepan( 'tested', $tested );
    etag( 'td' );
  } 
  etag("tr");  
}

/**
 * Extract unique plugin names from an array of plugins
 *
 * given an array of (active) plugin names return a list of the uniquely downloadable plugins
*/ 
function bw_get_unique_plugin_names( $plugins ) {
  $names = array();
  foreach ( $plugins as $plugin ) {
    $name = explode( "/", $plugin );
    // bw_trace( $name, __FUNCTION__, __LINE__, __FILE__, "name" ); 
    $names[$name[0]] = $name[0];
  }
  // bw_trace( $names, __FUNCTION__, __LINE__, __FILE__, "names" );
  sort( $names ); 
  return( $names );            
}

   
/**
 * get a simple list of plugin names satisfying the option value
 * Note: 'active-plugins' is the only value you can currently use
 *
 */
function bw_plug_list_plugins( $option='active_plugins' ) {
  $plugins = get_option( $option );
  bw_trace( $plugins, __FUNCTION__, __LINE__, __FILE__, "plugins" );
  $names = bw_get_unique_plugin_names( $plugins );
  return( $names );
}


/**
 * We don't know about this plugin so we assume it's a WordPress one
 * WordPress will do its 404 processing to help us
 * The link to the notes page, if required, may have difficult too
 */
function bw_format_default( $name, $link ) { 
  $title = "Link to the $name plugin on wordpress.org" ;
  alink( NULL, "https://wordpress.org/plugins/".$name, $name, $title );  
  bw_link_notes_page( $name, $link, "(", ")" );
}

/**
 * Syntax for bw_plug shortcode
 *
 * Example [bw_plug name="plugin name" link="URL" table="t/f,y/n,1/0"] shortcode
 */ 
function bw_plug__syntax( $shortcode='bw_plug' ) {
  $syntax = array( "name" => bw_skv( 'oik', "<i>plugin-a,plugin-b</i>", "names of plugins to summarise" )
                 , "table" => bw_skv( 'Y', 'N|t|f|1|0', "Show detailed information. Defaults to 'Y' if more than one plugin is listed" )
                 , "option" => bw_skv( '', "active_plugins", "Summarise the activated plugins" )
                 , "link" => bw_skv( 'n', "y|<i>URL</i>", "URL for where to find additional information" )
                 , "banner" => bw_skv( null, "y|j|p", "Display the plugin banner image" )
                 );
  return( $syntax );
}

/**
 * Return the object property if it exists
 */
function bw_get_property( $object, $property, $default=null ) {
	$lprop = strtolower( $property ); 
	if ( property_exists( $object, $property ) ) {
		$value = $object->{$property};
	} elseif ( property_exists( $object, $lprop ) ) { 
	 	$value = $object->{$lprop};
	} else {
		$value = $default;
	}
	return( $value );

}

/**
 * Gets plugin info
 * 
 * Uses oik-plugins if available.
 * 
 * Cut out the middle man if the plugin is defined to the local system
 * and we can get all the data we need. 
 
 * If not then call bw_get_plugin_info_cache2().
 *
 * @param string $name the plugin slug?
 * @param bool $table 
 * @return array $plugininfo
 */
function bw_get_plugin_info( $name, $table ) {
	$plugininfo = null;
	if ( function_exists( "oikp_template_redirect" ) ) {
		oik_require( "feed/oik-plugins-feed.php", "oik-plugins" );
		$plugin = oikp_load_plugin( $name );
		if ( $plugin ) {
			if ( $table ) {
				$plugin_type = get_post_meta( $plugin->ID, "_oikp_type", true );
				switch ( $plugin_type ) {
					case '1':
					case '6': 
						$plugininfo = bw_get_plugin_info_cache2( $name );	
						break;
					
					default:
						$plugininfo = bw_get_plugin_info_as_xml( $name, $plugin );
					 	break;
				}
			} else {	
				$plugininfo = bw_get_plugin_info_as_xml( $name, $plugin );
			}
		}
	}

	if ( null == $plugininfo ) {
		$plugininfo = bw_get_plugin_info_cache2( $name );
	}
	return( $plugininfo );
}


/**
 * Get local plugin info. 
 * 
 * Currently ignoring plugin version
 * 
 * @param string $slug
 * @param object $post - the oik-plugin post
 * @return object partially completed plugininfo.
 */
function bw_get_plugin_info_as_xml( $slug, $post ) {
	$response = new stdClass;
	$response->slug = $slug;
	$version = oikp_load_pluginversion( $post );
	
	//bw_trace2( $version, "version" );
	$response->name = $slug; 
	if ( $version ) {
		$response->last_updated = $version->post_modified;
		$response->version = oikp_get_latestversion( $version );
		$response->requires = oikp_get_requires( $version );
		$response->tested = oikp_get_tested( $version );
		$response->compatibility = oikp_get_compatibility( $version, $response->version );
		// We can't call oikp_get_sections() as it can go recursive
		//$response->sections = oikp_get_sections( $post, $version );
		$response->download_url = oikp_get_package( $post, $version, $response->version );
		$response->download_link = $response->download_url;
		$response->downloaded = oikp_get_downloaded( $post, $version ); 
	}	else {
		$response->version = "";
	}
			
	$response->author = bw_get_author_name( $post );
	$response->author_profile = bw_get_author_profile( $post );
	$response->homepage = get_permalink( $post->ID );
	$response->short_description = get_post_meta( $post->ID, "_oikp_desc", true );
	$response->oik_server = $response->homepage;
	return( $response );

}


} /* end !function_exists( "bw_plug" ) */
