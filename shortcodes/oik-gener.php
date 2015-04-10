<?php // (C) Copyright Bobbing Wide 2014

/**
 * Produce a list of the possible genericons in the genericons.css file
 * 
 * Icon list copied on 2014/10/27 from genericons v3.2 
 * 
 * Downloaded genericons.zip from {@link http://genericons.com} and extracted
 *
 * Notes: 
 * 
 * - JetPack enqueues genericons.css for Social sharing - sharedaddy
 * - Some of these icons are not yet available in Jetpack's genericons.css
 * - If Jetpack is not activated then the CSS will be loaded from oik, where the icons are implemented.   
 * - See also [bw_plug name=fonticons], [bw_plug name=genericond]
 *
 * @return array - array of genericons
 */
function bw_list_genericons() {
  $gi = array();
  $gi[] = '404'; //  { content: "\f423"; }
  $gi[] = 'activity'; //  { content: "\f508"; }
  $gi[] = 'anchor'; //  { content: "\f509"; }
  $gi[] = 'aside'; //  { content: "\f101"; }
  $gi[] = 'attachment'; //  { content: "\f416"; }
  $gi[] = 'audio'; //  { content: "\f109"; }
  $gi[] = 'bold'; //  { content: "\f471"; }
  $gi[] = 'book'; //  { content: "\f444"; }
  $gi[] = 'bug'; //  { content: "\f50a"; }
  $gi[] = 'cart'; //  { content: "\f447"; }
  $gi[] = 'category'; //  { content: "\f301"; }
  $gi[] = 'chat'; //  { content: "\f108"; }
  $gi[] = 'checkmark'; //  { content: "\f418"; }
  $gi[] = 'close'; //  { content: "\f405"; }
  $gi[] = 'close-alt'; //  { content: "\f406"; }
  $gi[] = 'cloud'; //  { content: "\f426"; }
  $gi[] = 'cloud-download'; //  { content: "\f440"; }
  $gi[] = 'cloud-upload'; //  { content: "\f441"; }
  $gi[] = 'code'; //  { content: "\f462"; }
  $gi[] = 'codepen'; //  { content: "\f216"; }
  $gi[] = 'cog'; //  { content: "\f445"; }
  $gi[] = 'collapse'; //  { content: "\f432"; }
  $gi[] = 'comment'; //  { content: "\f300"; }
  $gi[] = 'day'; //  { content: "\f305"; }
  $gi[] = 'digg'; //  { content: "\f221"; }
  $gi[] = 'document'; //  { content: "\f443"; }
  $gi[] = 'dot'; //  { content: "\f428"; }
  $gi[] = 'downarrow'; //  { content: "\f502"; }
  $gi[] = 'download'; //  { content: "\f50b"; }
  $gi[] = 'draggable'; //  { content: "\f436"; }
  $gi[] = 'dribbble'; //  { content: "\f201"; }
  $gi[] = 'dropbox'; //  { content: "\f225"; }
  $gi[] = 'dropdown'; //  { content: "\f433"; }
  $gi[] = 'dropdown-left'; //  { content: "\f434"; }
  $gi[] = 'edit'; //  { content: "\f411"; }
  $gi[] = 'ellipsis'; //  { content: "\f476"; }
  $gi[] = 'expand'; //  { content: "\f431"; }
  $gi[] = 'external'; //  { content: "\f442"; }
  $gi[] = 'facebook'; //  { content: "\f203"; }
  $gi[] = 'facebook-alt'; //  { content: "\f204"; }
  $gi[] = 'fastforward'; //  { content: "\f458"; }
  $gi[] = 'feed'; //  { content: "\f413"; }
  $gi[] = 'flag'; //  { content: "\f468"; }
  $gi[] = 'flickr'; //  { content: "\f211"; }
  $gi[] = 'foursquare'; //  { content: "\f226"; }
  $gi[] = 'fullscreen'; //  { content: "\f474"; }
  $gi[] = 'gallery'; //  { content: "\f103"; }
  $gi[] = 'github'; //  { content: "\f200"; }
  $gi[] = 'googleplus'; //  { content: "\f206"; }
  $gi[] = 'googleplus-alt'; //  { content: "\f218"; }
  $gi[] = 'handset'; //  { content: "\f50c"; }
  $gi[] = 'heart'; //  { content: "\f461"; }
  $gi[] = 'help'; //  { content: "\f457"; }
  $gi[] = 'hide'; //  { content: "\f404"; }
  $gi[] = 'hierarchy'; //  { content: "\f505"; }
  $gi[] = 'home'; //  { content: "\f409"; }
  $gi[] = 'image'; //  { content: "\f102"; }
  $gi[] = 'info'; //  { content: "\f455"; }
  $gi[] = 'instagram'; //  { content: "\f215"; }
  $gi[] = 'italic'; //  { content: "\f472"; }
  $gi[] = 'key'; //  { content: "\f427"; }
  $gi[] = 'leftarrow'; //  { content: "\f503"; }
  $gi[] = 'link'; //  { content: "\f107"; }
  $gi[] = 'linkedin'; //  { content: "\f207"; }
  $gi[] = 'linkedin-alt'; //  { content: "\f208"; }
  $gi[] = 'location'; //  { content: "\f417"; }
  $gi[] = 'lock'; //  { content: "\f470"; }
  $gi[] = 'mail'; //  { content: "\f410"; }
  $gi[] = 'maximize'; //  { content: "\f422"; }
  $gi[] = 'menu'; //  { content: "\f419"; }
  $gi[] = 'microphone'; //  { content: "\f50d"; }
  $gi[] = 'minimize'; //  { content: "\f421"; }
  $gi[] = 'minus'; //  { content: "\f50e"; }
  $gi[] = 'month'; //  { content: "\f307"; }
  $gi[] = 'move'; //  { content: "\f50f"; }
  $gi[] = 'next'; //  { content: "\f429"; }
  $gi[] = 'notice'; //  { content: "\f456"; }
  $gi[] = 'paintbrush'; //  { content: "\f506"; }
  $gi[] = 'path'; //  { content: "\f219"; }
  $gi[] = 'pause'; //  { content: "\f448"; }
  $gi[] = 'phone'; //  { content: "\f437"; }
  $gi[] = 'picture'; //  { content: "\f473"; }
  $gi[] = 'pinned'; //  { content: "\f308"; }
  $gi[] = 'pinterest'; //  { content: "\f209"; }
  $gi[] = 'pinterest-alt'; //  { content: "\f210"; }
  $gi[] = 'play'; //  { content: "\f452"; }
  $gi[] = 'plugin'; //  { content: "\f439"; }
  $gi[] = 'plus'; //  { content: "\f510"; }
  $gi[] = 'pocket'; //  { content: "\f224"; }
  $gi[] = 'polldaddy'; //  { content: "\f217"; }
  $gi[] = 'portfolio'; //  { content: "\f460"; }
  $gi[] = 'previous'; //  { content: "\f430"; }
  $gi[] = 'print'; //  { content: "\f469"; }
  $gi[] = 'quote'; //  { content: "\f106"; }
  $gi[] = 'rating-empty'; //  { content: "\f511"; }
  $gi[] = 'rating-full'; //  { content: "\f512"; }
  $gi[] = 'rating-half'; //  { content: "\f513"; }
  $gi[] = 'reddit'; //  { content: "\f222"; }
  $gi[] = 'refresh'; //  { content: "\f420"; }
  $gi[] = 'reply'; //  { content: "\f412"; }
  $gi[] = 'reply-alt'; //  { content: "\f466"; }
  $gi[] = 'reply-single'; //  { content: "\f467"; }
  $gi[] = 'rewind'; //  { content: "\f459"; }
  $gi[] = 'rightarrow'; //  { content: "\f501"; }
  $gi[] = 'search'; //  { content: "\f400"; }
  $gi[] = 'send-to-phone'; //  { content: "\f438"; }
  $gi[] = 'send-to-tablet'; //  { content: "\f454"; }
  $gi[] = 'share'; //  { content: "\f415"; }
  $gi[] = 'show'; //  { content: "\f403"; }
  $gi[] = 'shuffle'; //  { content: "\f514"; }
  $gi[] = 'sitemap'; //  { content: "\f507"; }
  $gi[] = 'skip-ahead'; //  { content: "\f451"; }
  $gi[] = 'skip-back'; //  { content: "\f450"; }
  $gi[] = 'skype'; //  { content: "\f220"; }
  $gi[] = 'spam'; //  { content: "\f424"; }
  $gi[] = 'spotify'; //  { content: "\f515"; }
  $gi[] = 'standard'; //  { content: "\f100"; }
  $gi[] = 'star'; //  { content: "\f408"; }
  $gi[] = 'status'; //  { content: "\f105"; }
  $gi[] = 'stop'; //  { content: "\f449"; }
  $gi[] = 'stumbleupon'; //  { content: "\f223"; }
  $gi[] = 'subscribe'; //  { content: "\f463"; }
  $gi[] = 'subscribed'; //  { content: "\f465"; }
  $gi[] = 'summary'; //  { content: "\f425"; }
  $gi[] = 'tablet'; //  { content: "\f453"; }
  $gi[] = 'tag'; //  { content: "\f302"; }
  $gi[] = 'time'; //  { content: "\f303"; }
  $gi[] = 'top'; //  { content: "\f435"; }
  $gi[] = 'trash'; //  { content: "\f407"; }
  $gi[] = 'tumblr'; //  { content: "\f214"; }
  $gi[] = 'twitch'; //  { content: "\f516"; }
  $gi[] = 'twitter'; //  { content: "\f202"; }
  $gi[] = 'unapprove'; //  { content: "\f446"; }
  $gi[] = 'unsubscribe'; //  { content: "\f464"; }
  $gi[] = 'unzoom'; //  { content: "\f401"; }
  $gi[] = 'uparrow'; //  { content: "\f500"; }
  $gi[] = 'user'; //  { content: "\f304"; }
  $gi[] = 'video'; //  { content: "\f104"; }
  $gi[] = 'videocamera'; //  { content: "\f517"; }
  $gi[] = 'vimeo'; //  { content: "\f212"; }
  $gi[] = 'warning'; //  { content: "\f414"; }
  $gi[] = 'website'; //  { content: "\f475"; }
  $gi[] = 'week'; //  { content: "\f306"; }
  $gi[] = 'wordpress'; //  { content: "\f205"; }
  $gi[] = 'xpost'; //  { content: "\f504"; }
  $gi[] = 'youtube'; //  { content: "\f213"; }
  $gi[] = 'zoom'; //  { content: "\f402"; }
  return( $gi );
} 
 
