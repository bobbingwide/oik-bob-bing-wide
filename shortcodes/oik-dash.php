<?php // (C) Copyright Bobbing Wide 2014-2018

/**
 * Enqueue the correct font for this icon
 * 
 *
 * We may find genericons in jetpack\_inc\genericons\genericons.css
 *
 * Note: 
 * Default sizes for dashicons are 20px, genericons 16px
 * So if we want to display a mixture then we'll need to do something to get the sizes consistent.  
 * 
 * @param string $icon - the name of the icon required
 * @param array $atts - shortcode parameters
 * @return string - the name of the base class to use based on the chosen font
 *  
 */
function bw_dash_enqueue_font( $icon, $atts ) {
  //bw_trace2();
  //e( $icon );
  $font = bw_array_get( $atts, "font", null );
  if ( !$font ) {
		$svgicons = bw_list_svgicons();
		$svgicon = bw_array_get( $svgicons, $icon, null );
		if ( !$svgicon ) {
			$dashicons = bw_assoc( bw_list_dashicons());
			$dashicon = bw_array_get( $dashicons, $icon, null );
			if ( !$dashicon ) {
				oik_require( "shortcodes/oik-gener.php", "oik-bob-bing-wide" );
				$genericons = bw_assoc( bw_list_genericons() );
				$genericon = bw_array_get( $genericons, $icon, null );
				if ( $genericon ) {
					$font = "genericons";
				} else {
				 // No need to load a font for this? OR do we default to dashicons anyway?
					// Or do we load up our special one which contains the definition of the extras
					// 
					$texticons = bw_assoc( bw_list_texticons() );
					$texticon = bw_array_get( $texticons, $icon, null );
					if ( $texticon ) {
						$font = "texticons";
					}
				} 	 
			} else {
				$font = "dashicons"; 
			}
		} else {
			$font = "svg";
		}	
  }
  switch ( $font ) {
		case "svg":
			$font = null;
			$font_class = "svg";
			break;
			
    case "genericons" :
      wp_register_style( 'genericons', oik_url( 'css/genericons/genericons.css' ), false );
      $font_class = "genericon";
      break;
      
    default:
      $font_class = $font;
  }    
  if ( $font ) {
    $enqueued = wp_style_is( $font, "enqueued" );
    if ( !$enqueued ) {
      wp_enqueue_style( $font );
    }
  }
  return( $font_class );
}  

                                        
/**
 * Implement [bw_dash] shortcode
 *
 * If there's any content then this is also displayed.
 * The styling may be a little wonky.
 *
 * Originally the code created a div, now it creates a span
 * This makes it easier to use dashicons inline.
 * 
 * @param array $atts - shortcode parameters
 * @param string $content - not (really) expected
 * @param string $tag - shortcode tag
 * @return string - generated HTML for the dash form
 */
function bw_dash( $atts=null, $content=null, $tag=null ) {
	//bw_trace2();
	$icons = bw_array_get_from( $atts, "icon,0", "menu" );
	$icons = bw_as_array( $icons );
	$class = bw_array_get_from( $atts, "class,1", null );
	$icon = bw_array_get( $icons, 0, null ); 
	
	oik_require( "shortcodes/oik-dash-svg-list.php", "oik-bob-bing-wide" );
	$svgicons = bw_dash_list_svg_icons();
	$font_class = bw_dash_enqueue_font( $icon, $atts );
	if ( $font_class === "svg" ) {
		foreach ( $icons as $icon ) {
			$dpath = bw_array_get( $svgicons, $icon, null );
			bw_dash_svg_icon( $icon, $font_class, $class, $dpath );
		}
	} else {

		foreach ( $icons as $icon ) {
			if ( !$font_class ) {
				$content = $icon . $content;
				$font_class = "texticons";
				$icon = "unknown";
			}
			//span( $class );	 - temporarily added to test class=hide
			span( "$font_class ${font_class}-$icon $class" );
			if ( $content ) {
				e( bw_do_shortcode( $content ) );
			}
			//epan();
			epan(); 
		}
	}
  return( bw_ret() );
}

/**
 * Try to do the same as in the new editor
 
	e( '<svg aria-hidden role="img" focusable="false" className=
				xmlns="http://www.w3.org/2000/svg"
				width={ size }
				height={ size }
				viewBox="0 0 20 20"
			>
				<path d={ path } />
			</svg>
 */
function bw_dash_svg_icon( $icon, $font_class, $class, $dpath ) {
	$svg = null;
	$svg .= kv( "role", 'img' );
	$svg .= kv( "focusable", "false" );
	$svg .= kv( "className", $font_class ); // needed?
	$svg .= kv( "xmlns", "http://www.w3.org/2000/svg" );
	$svg .= kv( "width", 20 );
	$svg .= kv( "height", 20 );
	$svg .= kv( "viewBox", "0 0 20 20" );
	
	stag( "svg aria-hidden", $font_class, null, $svg );
	bw_dash_svg_icon_dpath( $dpath );
	etag( "svg" );
}

function bw_dash_svg_icon_dpath( $dpath ) {
	$kv = kv( "d", $dpath );
	bw_echo( "<path" . $kv . " />" );
	
}

/**
 * Produce a list of the possible dashicons in the dashicons.css file
 * 
 * Icon list copied on 2014/06/21
 * OR we could parse the values from 
 * wp-includes/css/dashicons.css
 * 
 * @link https://github.com/melchoyce/dashicons/blob/master/index.html
 *
 * List updated from WordPress 4.1 version of dashicons.css
 *
 * - Added the 20 icons mentioned in post 4.1 blogs
 * - Added some others added between 3.9 and 4.1
 * - Added - quite a few I'd previously omitted for no good reason
 * 
 * @return array - array of dashicon class names excluding the "dashicons-" prefix
 */
function bw_list_dashicons() {
 //<!-- admin menu -->
 $di = array();
 /*
 <!-- admin menu -->
			<div data-code="f333" class="dashicons dashicons-menu"></div>
			<div data-code="f319" class="dashicons dashicons-admin-site"></div>
			<div data-code="f226" class="dashicons dashicons-dashboard"></div>
			<div data-code="f109" class="dashicons dashicons-admin-post"></div>
			<div data-code="f104" class="dashicons dashicons-admin-media"></div>
			<div data-code="f103" class="dashicons dashicons-admin-links"></div>
			<div data-code="f105" class="dashicons dashicons-admin-page"></div>
			<div data-code="f101" class="dashicons dashicons-admin-comments"></div>
			<div data-code="f100" class="dashicons dashicons-admin-appearance"></div>
			<div data-code="f106" class="dashicons dashicons-admin-plugins"></div>
			<div data-code="f110" class="dashicons dashicons-admin-users"></div>
			<div data-code="f107" class="dashicons dashicons-admin-tools"></div>
			<div data-code="f108" class="dashicons dashicons-admin-settings"></div>
			<div data-code="f112" class="dashicons dashicons-admin-network"></div>
			<div data-code="f102" class="dashicons dashicons-admin-home"></div>
			<div data-code="f111" class="dashicons dashicons-admin-generic"></div>
			<div data-code="f148" class="dashicons dashicons-admin-collapse"></div>
 */
 $di[] = 'menu';
 $di[] = 'admin-site';
 $di[] = 'dashboard';
 $di[] = 'admin-post';
 $di[] = 'admin-media';
 $di[] = 'admin-links';
 $di[] = 'admin-page';
 $di[] = 'admin-comments';
 $di[] = 'admin-appearance';
 $di[] = 'admin-plugins';
 $di[] = 'admin-users';
 $di[] = 'admin-tools';
 $di[] = 'admin-settings';
 $di[] = 'admin-network';
 $di[] = 'admin-home';
 $di[] = 'admin-generic';
 $di[] = 'admin-collapse';
 
 /*
			<!-- welcome screen -->
			<div data-code="f119" class="dashicons dashicons-welcome-write-blog"></div>
			<!--<div data-code="f119" class="dashicons dashicons-welcome-edit-page"></div> Duplicate -->
			<div data-code="f133" class="dashicons dashicons-welcome-add-page"></div>
			<div data-code="f115" class="dashicons dashicons-welcome-view-site"></div>
			<div data-code="f116" class="dashicons dashicons-welcome-widgets-menus"></div>
			<div data-code="f117" class="dashicons dashicons-welcome-comments"></div>
			<div data-code="f118" class="dashicons dashicons-welcome-learn-more"></div>
 */     
 $di[] = 'welcome-write-blog';
 $di[] = 'welcome-add-page';
 $di[] = 'welcome-view-site';
 $di[] = 'welcome-widgets-menus';
 $di[] = 'welcome-comments';
 $di[] = 'welcome-learn-more';
 
 /*
			<!-- post formats -->
			<!--<div data-code="f109" class="dashicons dashicons-format-standard"></div> Duplicate -->
			<div data-code="f123" class="dashicons dashicons-format-aside"></div>
			<div data-code="f128" class="dashicons dashicons-format-image"></div>
			<div data-code="f161" class="dashicons dashicons-format-gallery"></div>
			<div data-code="f126" class="dashicons dashicons-format-video"></div>
			<div data-code="f130" class="dashicons dashicons-format-status"></div>
			<div data-code="f122" class="dashicons dashicons-format-quote"></div>
			<!--<div data-code="f103" class="dashicons dashicons-format-links"></div> Duplicate -->
			<div data-code="f125" class="dashicons dashicons-format-chat"></div>
			<div data-code="f127" class="dashicons dashicons-format-audio"></div>
			<div data-code="f306" class="dashicons dashicons-camera"></div>
			<div data-code="f232" class="dashicons dashicons-images-alt"></div>
			<div data-code="f233" class="dashicons dashicons-images-alt2"></div>
			<div data-code="f234" class="dashicons dashicons-video-alt"></div>
			<div data-code="f235" class="dashicons dashicons-video-alt2"></div>
			<div data-code="f236" class="dashicons dashicons-video-alt3"></div>
 */
 $di[] = 'format-aside';
 $di[] = 'format-image';
 $di[] = 'format-gallery';
 $di[] = 'format-video';
 $di[] = 'format-status';
 $di[] = 'format-quote';
 $di[] = 'format-chat';
 $di[] = 'format-audio';
 $di[] = 'camera';
 $di[] = 'images-alt';
 $di[] = 'images-alt2';
 $di[] = 'video-alt';
 $di[] = 'video-alt2';
 $di[] = 'video-alt3';
 
 /*
			<!-- media -->
			<div data-code="f501" class="dashicons dashicons-media-archive"></div>
			<div data-code="f500" class="dashicons dashicons-media-audio"></div>
			<div data-code="f499" class="dashicons dashicons-media-code"></div>
			<div data-code="f498" class="dashicons dashicons-media-default"></div>
			<div data-code="f497" class="dashicons dashicons-media-document"></div>
			<div data-code="f496" class="dashicons dashicons-media-interactive"></div>
			<div data-code="f495" class="dashicons dashicons-media-spreadsheet"></div>
			<div data-code="f491" class="dashicons dashicons-media-text"></div>
			<div data-code="f490" class="dashicons dashicons-media-video"></div>
			<div data-code="f492" class="dashicons dashicons-playlist-audio"></div>
			<div data-code="f493" class="dashicons dashicons-playlist-video"></div>
 */     
 $di[] = 'media-archive';
 $di[] = 'media-audio';
 $di[] = 'media-code';
 $di[] = 'media-default';
 $di[] = 'media-document';
 $di[] = 'media-interactive';
 $di[] = 'media-spreadsheet';
 $di[] = 'media-text';
 $di[] = 'media-video';
 $di[] = 'playlist-audio';
 $di[] = 'playlist-video';
 /*
			<!-- image editing -->
			<div data-code="f165" class="dashicons dashicons-image-crop"></div>
			<div data-code="f166" class="dashicons dashicons-image-rotate-left"></div>
			<div data-code="f167" class="dashicons dashicons-image-rotate-right"></div>
			<div data-code="f168" class="dashicons dashicons-image-flip-vertical"></div>
			<div data-code="f169" class="dashicons dashicons-image-flip-horizontal"></div>
			<div data-code="f171" class="dashicons dashicons-undo"></div>
			<div data-code="f172" class="dashicons dashicons-redo"></div>
 */     
 $di[] = 'image-crop';
 $di[] = 'image-rotate-left';
 $di[] = 'image-rotate-right';
 $di[] = 'image-flip-vertical';
 $di[] = 'image-flip-horizontal';
 $di[] = 'undo';
 $di[] = 'redo';
 
 /*

			<!-- tinymce -->
			<div data-code="f200" class="dashicons dashicons-editor-bold"></div>
			<div data-code="f201" class="dashicons dashicons-editor-italic"></div>
			<div data-code="f203" class="dashicons dashicons-editor-ul"></div>
			<div data-code="f204" class="dashicons dashicons-editor-ol"></div>
			<div data-code="f205" class="dashicons dashicons-editor-quote"></div>
			<div data-code="f206" class="dashicons dashicons-editor-alignleft"></div>
			<div data-code="f207" class="dashicons dashicons-editor-aligncenter"></div>
			<div data-code="f208" class="dashicons dashicons-editor-alignright"></div>
			<div data-code="f209" class="dashicons dashicons-editor-insertmore"></div>
			<div data-code="f210" class="dashicons dashicons-editor-spellcheck"></div>
			<!-- <div data-code="f211" class="dashicons dashicons-editor-distractionfree"></div> Duplicate -->
			<div data-code="f211" class="dashicons dashicons-editor-expand"></div>
			<div data-code="f506" class="dashicons dashicons-editor-contract"></div>
			<div data-code="f212" class="dashicons dashicons-editor-kitchensink"></div>
			<div data-code="f213" class="dashicons dashicons-editor-underline"></div>
			<div data-code="f214" class="dashicons dashicons-editor-justify"></div>
			<div data-code="f215" class="dashicons dashicons-editor-textcolor"></div>
			<div data-code="f216" class="dashicons dashicons-editor-paste-word"></div>
			<div data-code="f217" class="dashicons dashicons-editor-paste-text"></div>
			<div data-code="f218" class="dashicons dashicons-editor-removeformatting"></div>
			<div data-code="f219" class="dashicons dashicons-editor-video"></div>
			<div data-code="f220" class="dashicons dashicons-editor-customchar"></div>
			<div data-code="f221" class="dashicons dashicons-editor-outdent"></div>
			<div data-code="f222" class="dashicons dashicons-editor-indent"></div>
			<div data-code="f223" class="dashicons dashicons-editor-help"></div>
			<div data-code="f224" class="dashicons dashicons-editor-strikethrough"></div>
			<div data-code="f225" class="dashicons dashicons-editor-unlink"></div>
			<div data-code="f320" class="dashicons dashicons-editor-rtl"></div>
			<div data-code="f474" class="dashicons dashicons-editor-break"></div>
			<div data-code="f475" class="dashicons dashicons-editor-code"></div>
			<div data-code="f476" class="dashicons dashicons-editor-paragraph"></div>
   */
   
 $di[] = 'editor-bold';
 $di[] = 'editor-italic';
 $di[] = 'editor-ul';
 $di[] = 'editor-ol';
 $di[] = 'editor-quote';
 $di[] = 'editor-alignleft';
 $di[] = 'editor-aligncenter';
 $di[] = 'editor-alignright';
 $di[] = 'editor-insertmore';
 $di[] = 'editor-spellcheck';
 $di[] = 'editor-distractionfree';
 $di[] = 'editor-expand';
 $di[] = 'editor-contract';
 $di[] = 'editor-kitchensink';
 $di[] = 'editor-underline';
 $di[] = 'editor-justify';
 $di[] = 'editor-textcolor';
 $di[] = 'editor-paste-word';
 $di[] = 'editor-removeformatting';
 $di[] = 'editor-video';
 $di[] = 'editor-customchar';
 $di[] = 'editor-outdent';
 $di[] = 'editor-indent';
 $di[] = 'editor-help';
 $di[] = 'editor-strikethrough';
 $di[] = 'editor-unlink';
 //$di[] = 'editor-link';		- Editor link doesn't exist as a separate icon. use admin-links
 $di[] = 'editor-rtl';
 $di[] = 'editor-break';
 $di[] = 'editor-code';
 $di[] = 'editor-paragraph';
  /* 

			<!-- posts -->
			<div data-code="f135" class="dashicons dashicons-align-left"></div>
			<div data-code="f136" class="dashicons dashicons-align-right"></div>
			<div data-code="f134" class="dashicons dashicons-align-center"></div>
			<div data-code="f138" class="dashicons dashicons-align-none"></div>
			<div data-code="f160" class="dashicons dashicons-lock"></div>
			<div data-code="f145" class="dashicons dashicons-calendar"></div>
			<div data-code="f177" class="dashicons dashicons-visibility"></div>
			<div data-code="f173" class="dashicons dashicons-post-status"></div>
			<div data-code="f464" class="dashicons dashicons-edit"></div>
			<div data-code="f182" class="dashicons dashicons-trash"></div>
   */
 $di[] = 'align-left';
 $di[] = 'align-right';
 $di[] = 'align-center';
 $di[] = 'align-none';
 $di[] = 'lock';
 $di[] = 'calendar';
 $di[] = 'calendar-alt';
 $di[] = 'visibility';
 $di[] = 'post-status';
 $di[] = 'edit';
 $di[] = 'trash';

   /*
			<!-- sorting -->
			<div data-code="f504" class="dashicons dashicons-external"></div>
			<div data-code="f142" class="dashicons dashicons-arrow-up"></div>
			<div data-code="f140" class="dashicons dashicons-arrow-down"></div>
			<div data-code="f139" class="dashicons dashicons-arrow-right"></div>
			<div data-code="f141" class="dashicons dashicons-arrow-left"></div>
			<div data-code="f342" class="dashicons dashicons-arrow-up-alt"></div>
			<div data-code="f346" class="dashicons dashicons-arrow-down-alt"></div>
			<div data-code="f344" class="dashicons dashicons-arrow-right-alt"></div>
			<div data-code="f340" class="dashicons dashicons-arrow-left-alt"></div>
			<div data-code="f343" class="dashicons dashicons-arrow-up-alt2"></div>
			<div data-code="f347" class="dashicons dashicons-arrow-down-alt2"></div>
			<div data-code="f345" class="dashicons dashicons-arrow-right-alt2"></div>
			<div data-code="f341" class="dashicons dashicons-arrow-left-alt2"></div>
			<div data-code="f156" class="dashicons dashicons-sort"></div>
			<div data-code="f229" class="dashicons dashicons-leftright"></div>
			<div data-code="f503" class="dashicons dashicons-randomize"></div>
			<div data-code="f163" class="dashicons dashicons-list-view"></div>
			<div data-code="f164" class="dashicons dashicons-exerpt-view"></div>
   */
   
 $di[] = 'external';
 $di[] = 'arrow-up';
 $di[] = 'arrow-down';
 $di[] = 'arrow-right';
 $di[] = 'arrow-left';
 $di[] = 'arrow-up-alt';
 $di[] = 'arrow-down-alt';
 $di[] = 'arrow-right-alt';
 $di[] = 'arrow-left-alt';
 $di[] = 'arrow-up-alt2';
 $di[] = 'arrow-down-alt2';
 $di[] = 'arrow-right-alt2';
 $di[] = 'arrow-left-alt2';
 $di[] = 'sort';
 $di[] = 'leftright';
 $di[] = 'randomize';
 $di[] = 'list-view';
 $di[] = 'exerpt-view';  // sic	- not been fixed yet
 $di[] = 'grid-view';
  
   
   /*
			<!-- social -->
			<div data-code="f237" class="dashicons dashicons-share"></div>
			<div data-code="f240" class="dashicons dashicons-share-alt"></div>
			<div data-code="f242" class="dashicons dashicons-share-alt2"></div>
			<div data-code="f301" class="dashicons dashicons-twitter"></div>
			<div data-code="f303" class="dashicons dashicons-rss"></div>
			<div data-code="f465" class="dashicons dashicons-email"></div>
			<div data-code="f466" class="dashicons dashicons-email-alt"></div>
			<div data-code="f304" class="dashicons dashicons-facebook"></div>
			<div data-code="f305" class="dashicons dashicons-facebook-alt"></div>
			<div data-code="f462" class="dashicons dashicons-googleplus"></div>
			<div data-code="f325" class="dashicons dashicons-networking"></div>
  */
  $di[] = 'share';
  $di[] = 'share1';
  $di[] = 'share-alt';
  $di[] = 'share-alt2';
  $di[] = 'twitter';
  $di[] = 'rss';
  $di[] = 'email';
  $di[] = 'email-alt';
  $di[] = 'facebook';
  $di[] = 'facebook-alt';
  $di[] = 'googleplus';
  $di[] = 'networking';
  
  /*
			<!-- WPorg specific icons: Jobs, Profiles, WordCamps -->
			<div data-code="f308" class="dashicons dashicons-hammer"></div>
			<div data-code="f309" class="dashicons dashicons-art"></div>
			<div data-code="f310" class="dashicons dashicons-migrate"></div>
			<div data-code="f311" class="dashicons dashicons-performance"></div>
			<div data-code="f483" class="dashicons dashicons-universal-access"></div>
			<div data-code="f507" class="dashicons dashicons-universal-access-alt"></div>
			<div data-code="f486" class="dashicons dashicons-tickets"></div>
			<div data-code="f484" class="dashicons dashicons-nametag"></div>
			<div data-code="f481" class="dashicons dashicons-clipboard"></div>
			<div data-code="f487" class="dashicons dashicons-heart"></div>
			<div data-code="f488" class="dashicons dashicons-megaphone"></div>
			<div data-code="f489" class="dashicons dashicons-schedule"></div>
  */
  $di[] = 'hammer';
  $di[] = 'art';
  $di[] = 'migrate';
  $di[] = 'performance';
  $di[] = 'universal-access';
  $di[] = 'universal-access-alt';
  $di[] = 'tickets';
  $di[] = 'nametag';
  $di[] = 'clipboard';
  $di[] = 'heart';
  $di[] = 'megaphone';
  $di[] = 'schedule';
  /*
			<!-- internal/products -->
			<div data-code="f120" class="dashicons dashicons-wordpress"></div>
			<div data-code="f324" class="dashicons dashicons-wordpress-alt"></div>
			<div data-code="f157" class="dashicons dashicons-pressthis"></div>
			<div data-code="f463" class="dashicons dashicons-update"></div>
			<div data-code="f180" class="dashicons dashicons-screenoptions"></div>
			<div data-code="f348" class="dashicons dashicons-info"></div>
			<div data-code="f174" class="dashicons dashicons-cart"></div>
			<div data-code="f175" class="dashicons dashicons-feedback"></div>
			<div data-code="f176" class="dashicons dashicons-cloud"></div>
			<div data-code="f326" class="dashicons dashicons-translation"></div>
  */
  $di[] = 'wordpress';
  $di[] = 'wordpress-alt';
  $di[] = 'pressthis';
  $di[] = 'update';
  $di[] = 'screenoptions';
  $di[] = 'info';
  $di[] = 'cart';
  $di[] = 'feedback';
  $di[] = 'cloud';
  $di[] = 'translation';
  /*
			<!-- taxonomies -->
			<div data-code="f323" class="dashicons dashicons-tag"></div>
			<div data-code="f318" class="dashicons dashicons-category"></div>
  */
  $di[] = 'tag';
  $di[] = 'category';

  /*
			<!-- widgets -->
			<div data-code="f480" class="dashicons dashicons-archive"></div>
			<div data-code="f479" class="dashicons dashicons-tagcloud"></div>
			<div data-code="f478" class="dashicons dashicons-text"></div>
  */
  $di[] = 'archive';
  $di[] = 'tagcloud';
  $di[] = 'text';
  /*
			<!-- alerts/notifications/flags -->
			<div data-code="f147" class="dashicons dashicons-yes"></div>
			<div data-code="f158" class="dashicons dashicons-no"></div>
			<div data-code="f335" class="dashicons dashicons-no-alt"></div>
			<div data-code="f132" class="dashicons dashicons-plus"></div>
			<div data-code="f502" class="dashicons dashicons-plus-alt"></div>
			<div data-code="f460" class="dashicons dashicons-minus"></div>
			<div data-code="f153" class="dashicons dashicons-dismiss"></div>
			<div data-code="f159" class="dashicons dashicons-marker"></div>
			<div data-code="f155" class="dashicons dashicons-star-filled"></div>
			<div data-code="f459" class="dashicons dashicons-star-half"></div>
			<div data-code="f154" class="dashicons dashicons-star-empty"></div>
			<div data-code="f227" class="dashicons dashicons-flag"></div>
  */
  $di[] = 'yes';
  $di[] = 'no';
  $di[] = 'no-alt';
  $di[] = 'plus';
  $di[] = 'plus-alt';
  $di[] = 'minus';
  $di[] = 'dismiss';
  $di[] = 'marker';
  $di[] = 'star-filled';
  $di[] = 'star-half';
  $di[] = 'star-empty';
  $di[] = 'flag';
  /*
			<!-- misc/cpt -->
			<div data-code="f230" class="dashicons dashicons-location"></div>
			<div data-code="f231" class="dashicons dashicons-location-alt"></div>
			<div data-code="f178" class="dashicons dashicons-vault"></div>
			<div data-code="f332" class="dashicons dashicons-shield"></div>
			<div data-code="f334" class="dashicons dashicons-shield-alt"></div>
			<div data-code="f468" class="dashicons dashicons-sos"></div>
			<div data-code="f179" class="dashicons dashicons-search"></div>
			<div data-code="f181" class="dashicons dashicons-slides"></div>
			<div data-code="f183" class="dashicons dashicons-analytics"></div>
			<div data-code="f184" class="dashicons dashicons-chart-pie"></div>
			<div data-code="f185" class="dashicons dashicons-chart-bar"></div>
			<div data-code="f238" class="dashicons dashicons-chart-line"></div>
			<div data-code="f239" class="dashicons dashicons-chart-area"></div>
			<div data-code="f307" class="dashicons dashicons-groups"></div>
			<div data-code="f338" class="dashicons dashicons-businessman"></div>
			<div data-code="f336" class="dashicons dashicons-id"></div>
			<div data-code="f337" class="dashicons dashicons-id-alt"></div>
			<div data-code="f312" class="dashicons dashicons-products"></div>
			<div data-code="f313" class="dashicons dashicons-awards"></div>
			<div data-code="f314" class="dashicons dashicons-forms"></div>
			<div data-code="f473" class="dashicons dashicons-testimonial"></div>
			<div data-code="f322" class="dashicons dashicons-portfolio"></div>
			<div data-code="f330" class="dashicons dashicons-book"></div>
			<div data-code="f331" class="dashicons dashicons-book-alt"></div>
			<div data-code="f316" class="dashicons dashicons-download"></div>
			<div data-code="f317" class="dashicons dashicons-upload"></div>
			<div data-code="f321" class="dashicons dashicons-backup"></div>
			<div data-code="f469" class="dashicons dashicons-clock"></div>
			<div data-code="f339" class="dashicons dashicons-lightbulb"></div>
			<div data-code="f482" class="dashicons dashicons-microphone"></div>
			<div data-code="f472" class="dashicons dashicons-desktop"></div>
			<div data-code="f471" class="dashicons dashicons-tablet"></div>
			<div data-code="f470" class="dashicons dashicons-smartphone"></div>
			<div data-code="f328" class="dashicons dashicons-smiley"></div>
		</div>
 */
  $di[] = 'location';
  $di[] = 'location-alt';
  $di[] = 'vault';
  $di[] = 'shield';
  $di[] = 'shield-alt';
  $di[] = 'sos';
  $di[] = 'search';
  $di[] = 'slides';
  $di[] = 'analytics';
  $di[] = 'chart-pie';
  $di[] = 'chart-bar';
  $di[] = 'chart-line';
  $di[] = 'chart-area';
  $di[] = 'groups';
  $di[] = 'businessman';
  $di[] = 'id';
  $di[] = 'id-alt';
  $di[] = 'products';
  $di[] = 'awards';
  $di[] = 'forms';
  $di[] = 'testimonial';
  $di[] = 'portfolio';
  $di[] = 'book';
  $di[] = 'book-alt';
  $di[] = 'download';
  $di[] = 'upload';
  $di[] = 'backup';
  $di[] = 'clock';
  $di[] = 'lightbulb';
  $di[] = 'microphone';
  $di[] = 'desktop';
  $di[] = 'tablet';
  $di[] = 'smartphone';
  $di[] = 'smiley';
  

  // New in WordPress 4.1
  $di[] = "controls-play";
  $di[] = "controls-pause";
  $di[] = "controls-forward";
  $di[] = "controls-skipforward";
  $di[] = "controls-back";
  $di[] = "controls-skipback";
  $di[] = "controls-repeat";
  $di[] = "controls-volumeon";
  $di[] = "controls-volumeoff"; 
  $di[] = "align-left";
  $di[] = "align-right";
  $di[] = "align-center";
  $di[] = "align-none";
  $di[] = "phone";
  $di[] = "building";
  $di[] = "store";
  $di[] = "album";
  $di[] = "palmtree";
  $di[] = "tickets-alt";
  $di[] = "money";
  
  $di[] = 'index-card';
  $di[] = 'carrot';

	// New in WordPress up to 4.7
	$di[] = "filter";
	$di[] = "admin-customizer";
	$di[] = "admin-multisite";
	$di[] = "image-rotate";
	$di[] = "image-filter";
	$di[] = "editor-table";
	$di[] = "unlock";
	$di[] = "hidden";
	$di[] = "sticky";
	$di[] = "excerpt-view";  // Now corrected
	$di[] = "move";
	$di[] = "plus-alt2";
	$di[] = "warning";
	$di[] = "laptop";
	$di[] = "thumbs-up";
	$di[] = "thumbs-down";
	$di[] = "layout";
	$di[] = "paperclip";
	
	// New in WordPress 4.x
	//$di[] = "button";

 return( $di );

}

/** 
 * Return a list of texticons which are normal characters
 * but displayed using dashicons logic
 * 
 */
function bw_list_texticons() {
  $ti = array();
  $ti[] = 'cent';
  $ti[] = 'css';
  $ti[] = 'shortcode';
  $ti[] = 'sterling';
  $ti[] = 'euro';
  $ti[] = 'yen';
  $ti[] = 'dollar';
  return( $ti );
}

/**
 * Returns a list of SVG icons
 *
 * SVG icons are the new way of doing icons
 *
 * @return array names for SVG icons
 */
function bw_list_svgicons() {
	oik_require( "shortcodes/oik-dash-svg.php", "oik-bob-bing-wide" );
	$svgicons =	bw_dash_list_svg_icons();
	return $svgicons;
}

  


function bw_dash__help( $shortcode="bw_dash" ) {
  return( "Display a dash icon" );
} 

function bw_dash__syntax( $shortcode="bw_dash" ) {
  $icons = bw_list_dashicons();
  array_shift( $icons );
  $values = implode( $icons, "|" );
  oik_require( "shortcodes/oik-gener.php", "oik-bob-bing-wide" );
  $icons = bw_list_genericons();
  $values .= "|" ;
  $values .= implode( $icons, "|" );
  $icons = bw_list_texticons();
  $values .= "|" ;
  $values .= implode( $icons, "|" );
  $syntax = array( bw_skv( null, "text", "Dash icon to display"  )
                 , "icon,0" => bw_skv( "menu", $values, "Dash icon to display"  )
                 , "class,1" => bw_skv( null, "<i>classnames</i>", "CSS classes" )
                 );
  return( $syntax );
}

/**
 * Example hook for [bw_dash] shortcode
 * 
 */ 
function bw_dash__example( $shortcode="bw_dash" ) {
  $icons = bw_list_dashicons();
  $class = null;
  
  wp_enqueue_style( 'dashicons' );
  asort( $icons );
  
  h3( "font=dashicons" );
  
  foreach ( $icons as $icon ) {
    sdiv( "inline" ); 
    span( "dashicons dashicons-$icon $class", null, kv( "text", $icon) );
    epan();
    e( $icon );
    ediv();
    
  }
  bw_genericons_example();
  bw_texticons_example();
}

/**
 * Display all the genericons that are available.
 * 
 * Note: There will be duplicates with dashicons
 * 
 * 
 */
function bw_genericons_example() {
  oik_require( "shortcodes/oik-gener.php", "oik-bob-bing-wide" );
  $icons = bw_list_genericons();
  $class = null;
  if ( !wp_style_is( 'genericons', 'registered' ) ) {
    wp_register_style( 'genericons', oik_url( 'css/genericons/genericons.css' ), false );
  }
  wp_enqueue_style( 'genericons' );
  asort( $icons );
  h3( "font=genericons" );
  foreach ( $icons as $icon ) {
    sdiv( "inline" ); 
    span( "genericon genericon-$icon $class", null, kv( "text", $icon) );
    epan();
    e( $icon );
    ediv();
  } 
}

 
/**
 * Display all the texticons that are available.
 * 
 * Note: There may be duplicates with dashicons
 * 
 */
function bw_texticons_example() {
  $icons = bw_list_texticons();
  $class = null;
  asort( $icons );
  h3( "font=texticons" );
  foreach ( $icons as $icon ) {
    sdiv( "inline" ); 
    span( "texticons texticons-$icon $class", null, kv( "text", $icon) );
    epan();
    e( " " );
    e( $icon );
    ediv();
  } 
}

/**
 * Enqueue fonts
 *
 * @param array $icons - array of icons
 * @param array $atts - shortcode parameters
 * @return string - the registered font class - may be texticon 
 */
function bw_dash_enqueue_fonts( $icons, $atts ) {
	$font_class =null;
	foreach ( $icons as $icon ) {
		$font_class = bw_dash_enqueue_font( $icon, $atts );
	}
	return( $font_class );
}
	 




