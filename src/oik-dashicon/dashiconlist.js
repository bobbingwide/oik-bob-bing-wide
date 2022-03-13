import * as icon from '@wordpress/icons';
// Note: Some icons are no longer part of the icons package!
// They have to be commented out.
const dashiconslist = [
	'admin-appearance',
	'admin-collapse',
	'admin-comments',
	'admin-customizer',
	'admin-generic',
	'admin-home',
	'admin-links',
	'admin-media',
	'admin-multisite',
	'admin-network',
	'admin-page',
	'admin-plugins',
	'admin-post',
	'admin-settings',
	'admin-site-alt',
	'admin-site-alt2',
	'admin-site-alt3',
	'admin-site',
	'admin-tools',
	'admin-users',
	'airplane',
	'album',
	'align-center',
	'align-full-width',
	'align-left',
	'align-none',
	'align-pull-left',
	'align-pull-right',
	'align-right',
	'align-wide',
	'amazon',
	'analytics',
	'archive',
	'arrow-down-alt',
	'arrow-down-alt2',
	'arrow-down',
	'arrow-left-alt',
	'arrow-left-alt2',
	'arrow-left',
	'arrow-right-alt',
	'arrow-right-alt2',
	'arrow-right',
	'arrow-up-alt',
	'arrow-up-alt2',
	'arrow-up-duplicate',
	'arrow-up',
	'art',
	'awards',
	'backup',
	'bank',
	'beer',
	'bell',
	'block-default',
	'book-alt',
	'book',
	'buddicons-activity',
	'buddicons-bbpress-logo',
	'buddicons-buddypress-logo',
	'buddicons-community',
	'buddicons-forums',
	'buddicons-friends',
	'buddicons-groups',
	'buddicons-pm',
	'buddicons-replies',
	'buddicons-topics',
	'buddicons-tracking',
	'building',
	'businessman',
	'businessperson',
	'businesswoman',
	'button',
	'calculator',
	'calendar-alt',
	'calendar',
	'camera-alt',
	'camera',
	'car',
	'carrot',
	'cart',
	'category',
	'chart-area',
	'chart-bar',
	'chart-line',
	'chart-pie',
	'clipboard',
	'clock',
	'cloud-saved',
	'cloud-upload',
	'cloud',
	'code-standards',
	'coffee',
	'color-picker',
	'columns',
	'controls-back',
	'controls-forward',
	'controls-pause',
	'controls-play',
	'controls-repeat',
	'controls-skipback',
	'controls-skipforward',
	'controls-volumeoff',
	'controls-volumeon',
	'cover-image',
	'dashboard',
	'database-add',
	'database-export',
	'database-import',
	'database-remove',
	'database-view',
	'database',
	'desktop',
	'dismiss',
	'download',
	'drumstick',
	'edit-large',
	'edit-page',
	'edit',
	'editor-aligncenter',
	'editor-alignleft',
	'editor-alignright',
	'editor-bold',
	'editor-break',
	'editor-code-duplicate',
	'editor-code',
	'editor-contract',
	'editor-customchar',
	'editor-expand',
	'editor-help',
	'editor-indent',
	'editor-insertmore',
	'editor-italic',
	'editor-justify',
	'editor-kitchensink',
	'editor-ltr',
	'editor-ol-rtl',
	'editor-ol',
	'editor-outdent',
	'editor-paragraph',
	'editor-paste-text',
	'editor-paste-word',
	'editor-quote',
	'editor-removeformatting',
	'editor-rtl',
	'editor-spellcheck',
	'editor-strikethrough',
	'editor-table',
	'editor-textcolor',
	'editor-ul',
	'editor-underline',
	'editor-unlink',
	'editor-video',
	'ellipsis',
	'email-alt',
	'email-alt2',
	'email',
	'embed-audio',
	'embed-generic',
	'embed-photo',
	'embed-post',
	'embed-video',
	'excerpt-view',
	'exit',
	'external',
	'facebook-alt',
	'facebook',
	'feedback',
	'filter',
	'flag',
	'food',
	'format-aside',
	'format-audio',
	'format-chat',
	'format-gallery',
	'format-image',
	'format-quote',
	'format-status',
	'format-video',
	'forms',
	'fullscreen-alt',
	'fullscreen-exit-alt',
	'games',
	'google',
	'googleplus',
	'grid-view',
	'groups',
	'hammer',
	'heading',
	'heart',
	'hidden',
	'hourglass',
	'html',
	'id-alt',
	'id',
	'image-crop',
	'image-filter',
	'image-flip-horizontal',
	'image-flip-vertical',
	'image-rotate-left',
	'image-rotate-right',
	'image-rotate',
	'images-alt',
	'images-alt2',
	'index-card',
	'info-outline',
	'info',
	'insert-after',
	'insert-before',
	'insert',
	'instagram',
	'laptop',
	'layout',
	'leftright',
	'lightbulb',
	'linkedin',
	'list-view',
	'location-alt',
	'location',
	'lock-duplicate',
	'lock',
	'marker',
	'media-archive',
	'media-audio',
	'media-code',
	'media-default',
	'media-document',
	'media-interactive',
	'media-spreadsheet',
	'media-text',
	'media-video',
	'megaphone',
	'menu-alt',
	'menu-alt2',
	'menu-alt3',
	'menu',
	'microphone',
	'migrate',
	'minus',
	'money-alt',
	'money',
	'move',
	'nametag',
	'networking',
	'no-alt',
	'no',
	'open-folder',
	'palmtree',
	'paperclip',
	'pdf',
	'performance',
	'pets',
	'phone',
	'pinterest',
	'playlist-audio',
	'playlist-video',
	'plugins-checked',
	'plus-alt',
	'plus-alt2',
	'plus',
	'podio',
	'portfolio',
	'post-status',
	'pressthis',
	'printer',
	'privacy',
	'products',
	'randomize',
	'reddit',
	'redo',
	'remove',
	'rest-api',
	'rss',
	'saved',
	'schedule',
	'screenoptions',
	'search',
	'share-alt',
	'share-alt2',
	'share',
	'shield-alt',
	'shield',
	'shortcode',
	'slides',
	'smartphone',
	'smiley',
	'sort',
	'sos',
	'spotify',
	'star-empty',
	'star-filled',
	'star-half',
	'sticky',
	'store',
	'superhero-alt',
	'superhero',
	'table-col-after',
	'table-col-before',
	'table-col-delete',
	'table-row-after',
	'table-row-before',
	'table-row-delete',
	'tablet',
	'tag',
	'tagcloud',
	'testimonial',
	'text-page',
	'text',
	'thumbs-down',
	'thumbs-up',
	'tickets-alt',
	'tickets',
	'tide',
	'translation',
	'trash',
	'twitch',
	'twitter-alt',
	'twitter',
	'undo',
	'universal-access-alt',
	'universal-access',
	'unlock',
	'update-alt',
	'update',
	'upload',
	'vault',
	'video-alt',
	'video-alt2',
	'video-alt3',
	'visibility',
	'warning',
	'welcome-add-page',
	'welcome-comments',
	'welcome-learn-more',
	'welcome-view-site',
	'welcome-widgets-menus',
	'welcome-write-blog',
	'whatsapp',
	'wordpress-alt',
	'wordpress',
	'xing',
	'yes-alt',
	'yes',
	'youtube',
	{  icon: icon.addCard, name: 'add-card-icon'},
	{  icon: icon.addSubmenu, name: 'add-submenu-icon'},
	{  icon: icon.alignCenter, name: 'align-center-icon'},
	//{  icon: icon.alignJustifyAlt, name: 'align-justify-alt-icon'},
	{  icon: icon.alignJustify, name: 'align-justify-icon'},
	{  icon: icon.alignLeft, name: 'align-left-icon'},
	{  icon: icon.alignNone, name: 'align-none-icon'},
	{  icon: icon.alignRight, name: 'align-right-icon'},
	{  icon: icon.archiveTitle, name: 'archive-title-icon'},
	{  icon: icon.archive, name: 'archive-icon'},
	{  icon: icon.arrowDown, name: 'arrow-down-icon'},
	{  icon: icon.arrowLeft, name: 'arrow-left-icon'},
	{  icon: icon.arrowRight, name: 'arrow-right-icon'},
	{  icon: icon.arrowUp, name: 'arrow-up-icon'},
	{  icon: icon.aspectRatio, name: 'aspect-ratio-icon'},
	{  icon: icon.atSymbol, name: 'at-symbol-icon'},
	{  icon: icon.audio, name: 'audio-icon'},
	{  icon: icon.backup, name: 'backup-icon'},
	{  icon: icon.blockDefault, name: 'block-default-icon'},
	{  icon: icon.blockTable, name: 'block-table-icon'},
	{  icon: icon.box, name: 'box-icon'},
	{  icon: icon.brush, name: 'brush-icon'},
	{  icon: icon.bug, name: 'bug-icon'},
	{  icon: icon.button, name: 'button-icon'},
	{  icon: icon.buttons, name: 'buttons-icon'},
	{  icon: icon.calendar, name: 'calendar-icon'},
	{  icon: icon.cancelCircleFilled, name: 'cancel-circle-filled-icon'},
	{  icon: icon.capturePhoto, name: 'capture-photo-icon'},
	{  icon: icon.captureVideo, name: 'capture-video-icon'},
	{  icon: icon.category, name: 'category-icon'},
	{  icon: icon.chartBar, name: 'chart-bar-icon'},
	{  icon: icon.check, name: 'check-icon'},
	{  icon: icon.chevronDown, name: 'chevron-down-icon'},
	{  icon: icon.chevronLeft, name: 'chevron-left-icon'},
	{  icon: icon.chevronRightSmall, name: 'chevron-right-small-icon'},
	{  icon: icon.chevronRight, name: 'chevron-right-icon'},
	{  icon: icon.chevronUp, name: 'chevron-up-icon'},
	{  icon: icon.classic, name: 'classic-icon'},
	{  icon: icon.closeSmall, name: 'close-small-icon'},
	{  icon: icon.close, name: 'close-icon'},
	{  icon: icon.cloudUpload, name: 'cloud-upload-icon'},
	{  icon: icon.cloud, name: 'cloud-icon'},
	{  icon: icon.code, name: 'code-icon'},
	//{  icon: icon.cogAlt, name: 'cog-alt-icon'},
	{  icon: icon.cog, name: 'cog-icon'},
	{  icon: icon.color, name: 'color-icon'},
	{  icon: icon.column, name: 'column-icon'},
	{  icon: icon.columns, name: 'columns-icon'},
	{  icon: icon.commentAuthorAvatar, name: 'comment-author-avatar-icon'},
	{  icon: icon.commentAuthorName, name: 'comment-author-name-icon'},
	{  icon: icon.commentContent, name: 'comment-content-icon'},
	{  icon: icon.commentEditLink, name: 'comment-edit-link-icon'},
	{  icon: icon.commentReplyLink, name: 'comment-reply-link-icon'},
	{  icon: icon.comment, name: 'comment-icon'},
	{  icon: icon.cover, name: 'cover-icon'},
	{  icon: icon.create, name: 'create-icon'},
	{  icon: icon.crop, name: 'crop-icon'},
	{  icon: icon.currencyDollar, name: 'currency-dollar-icon'},
	{  icon: icon.currencyEuro, name: 'currency-euro-icon'},
	{  icon: icon.currencyPound, name: 'currency-pound-icon'},
	{  icon: icon.customLink, name: 'custom-link-icon'},
	{  icon: icon.customPostType, name: 'custom-post-type-icon'},
	{  icon: icon.desktop, name: 'desktop-icon'},
	{  icon: icon.download, name: 'download-icon'},
	{  icon: icon.dragHandle, name: 'drag-handle-icon'},
	{  icon: icon.external, name: 'external-icon'},
	{  icon: icon.file, name: 'file-icon'},
	{  icon: icon.flipHorizontal, name: 'flip-horizontal-icon'},
	{  icon: icon.flipVertical, name: 'flip-vertical-icon'},
	{  icon: icon.footer, name: 'footer-icon'},
	{  icon: icon.formatBold, name: 'format-bold-icon'},
	{  icon: icon.formatCapitalize, name: 'format-capitalize-icon'},
	{  icon: icon.formatIndentRTL, name: 'format-indent-rtl-icon'},
	{  icon: icon.formatIndent, name: 'format-indent-icon'},
	{  icon: icon.formatItalic, name: 'format-italic-icon'},
	{  icon: icon.formatListBulletsRTL, name: 'format-list-bullets-rtl-icon'},
	{  icon: icon.formatListBullets, name: 'format-list-bullets-icon'},
	{  icon: icon.formatListNumberedRTL, name: 'format-list-numbered-rtl-icon'},
	{  icon: icon.formatListNumbered, name: 'format-list-numbered-icon'},
	{  icon: icon.formatLowercase, name: 'format-lowercase-icon'},
	{  icon: icon.formatLtr, name: 'format-ltr-icon'},
	{  icon: icon.formatOutdentRTL, name: 'format-outdent-rtl-icon'},
	{  icon: icon.formatOutdent, name: 'format-outdent-icon'},
	{  icon: icon.formatRtl, name: 'format-rtl-icon'},
	{  icon: icon.formatStrikethrough, name: 'format-strikethrough-icon'},
	{  icon: icon.formatUnderline, name: 'format-underline-icon'},
	{  icon: icon.formatUppercase, name: 'format-uppercase-icon'},
	{  icon: icon.fullscreen, name: 'fullscreen-icon'},
	{  icon: icon.gallery, name: 'gallery-icon'},
	{  icon: icon.globe, name: 'globe-icon'},
	{  icon: icon.grid, name: 'grid-icon'},
	{  icon: icon.group, name: 'group-icon'},
	{  icon: icon.handle, name: 'handle-icon'},
	{  icon: icon.header, name: 'header-icon'},
	{  icon: icon.heading, name: 'heading-icon'},
	{  icon: icon.helpFilled, name: 'help-filled-icon'},
	{  icon: icon.help, name: 'help-icon'},
	{  icon: icon.home, name: 'home-icon'},
	{  icon: icon.html, name: 'html-icon'},
	{  icon: icon.image, name: 'image-icon'},
	{  icon: icon.inbox, name: 'inbox-icon'},
	{  icon: icon.info, name: 'info-icon'},
	{  icon: icon.insertAfter, name: 'insert-after-icon'},
	{  icon: icon.insertBefore, name: 'insert-before-icon'},
	//{  icon: icon.institute, name: 'institution-icon'},
	{  icon: icon.justifyCenter, name: 'justify-center-icon'},
	{  icon: icon.justifyLeft, name: 'justify-left-icon'},
	{  icon: icon.justifyRight, name: 'justify-right-icon'},
	{  icon: icon.justifySpaceBetween, name: 'justify-space-between-icon'},
	{  icon: icon.key, name: 'key-icon'},
	{  icon: icon.keyboardClose, name: 'keyboard-close-icon'},
	{  icon: icon.keyboardReturn, name: 'keyboard-return-icon'},
	{  icon: icon.layout, name: 'layout-icon'},
	{  icon: icon.lifesaver, name: 'lifesaver-icon'},
	{  icon: icon.lineDashed, name: 'line-dashed-icon'},
	{  icon: icon.lineDotted, name: 'line-dotted-icon'},
	{  icon: icon.lineSolid, name: 'line-solid-icon'},
	{  icon: icon.linkOff, name: 'link-off-icon'},
	{  icon: icon.link, name: 'link-icon'},
	{  icon: icon.listView, name: 'list-view-icon'},
	{  icon: icon.list, name: 'list-icon'},
	{  icon: icon.lock, name: 'lock-icon'},
	{  icon: icon.login, name: 'login-icon'},
	{  icon: icon.loop, name: 'loop-icon'},
	{  icon: icon.mapMarker, name: 'map-marker-icon'},
	{  icon: icon.mediaAndText, name: 'media-and-text-icon'},
	{  icon: icon.media, name: 'media-icon'},
	{  icon: icon.megaphone, name: 'megaphone-icon'},
	{  icon: icon.menu, name: 'menu-icon'},
	{  icon: icon.desktop, name: 'mobile-icon'},
	{  icon: icon.moreHorizontalMobile, name: 'more-horizontal-mobile-icon'},
	{  icon: icon.moreHorizontal, name: 'more-horizontal-icon'},
	{  icon: icon.moreVertical, name: 'more-vertical-icon'},
	{  icon: icon.more, name: 'more-icon'},
	{  icon: icon.moveTo, name: 'move-to-icon'},
	{  icon: icon.navigation, name: 'navigation-icon'},
	{  icon: icon.next, name: 'next-icon'},
	{  icon: icon.overlayText, name: 'overlay-text-icon'},
	{  icon: icon.pageBreak, name: 'page-break-icon'},
	{  icon: icon.page, name: 'page-icon'},
	{  icon: icon.pages, name: 'pages-icon'},
	{  icon: icon.paragraph, name: 'paragraph-icon'},
	{  icon: icon.payment, name: 'payment-icon'},
	{  icon: icon.pencil, name: 'pencil-icon'},
	{  icon: icon.people, name: 'people-icon'},
	{  icon: icon.percent, name: 'percent-icon'},
	{  icon: icon.pin, name: 'pin-icon'},
	{  icon: icon.plugins, name: 'plugins-icon'},
	{  icon: icon.plusCircleFilled, name: 'plus-circle-filled-icon'},
	{  icon: icon.plusCircle, name: 'plus-circle-icon'},
	{  icon: icon.plus, name: 'plus-icon'},
	{  icon: icon.positionCenter, name: 'position-center-icon'},
	{  icon: icon.positionLeft, name: 'position-left-icon'},
	{  icon: icon.positionRight, name: 'position-right-icon'},
	{  icon: icon.postAuthor, name: 'post-author-icon'},
	{  icon: icon.postCategories, name: 'post-categories-icon'},
	{  icon: icon.postCommentsCount, name: 'post-comments-count-icon'},
	{  icon: icon.postCommentsForm, name: 'post-comments-form-icon'},
	{  icon: icon.postComments, name: 'post-comments-icon'},
	{  icon: icon.postContent, name: 'post-content-icon'},
	{  icon: icon.postDate, name: 'post-date-icon'},
	{  icon: icon.postExcerpt, name: 'post-excerpt-icon'},
	{  icon: icon.postFeaturedImage, name: 'post-featured-image-icon'},
	{  icon: icon.postList, name: 'post-list-icon'},
	{  icon: icon.postTerms, name: 'post-terms-icon'},
	{  icon: icon.postTitle, name: 'post-title-icon'},
	{  icon: icon.preformatted, name: 'preformatted-icon'},
	{  icon: icon.previous, name: 'previous-icon'},
	{  icon: icon.pullLeft, name: 'pull-left-icon'},
	{  icon: icon.pullRight, name: 'pull-right-icon'},
	{  icon: icon.pullquote, name: 'pullquote-icon'},
	{  icon: icon.queryPaginationNext, name: 'query-pagination-next-icon'},
	{  icon: icon.queryPaginationNumbers, name: 'query-pagination-numbers-icon'},
	{  icon: icon.queryPaginationPrevious, name: 'query-pagination-previous-icon'},
	{  icon: icon.queryPagination, name: 'query-pagination-icon'},
	{  icon: icon.queryTitle, name: 'query-title-icon'},
	{  icon: icon.quote, name: 'quote-icon'},
	{  icon: icon.receipt, name: 'receipt-icon'},
	{  icon: icon.redo, name: 'redo-icon'},
	{  icon: icon.removeBug, name: 'remove-bug-icon'},
	{  icon: icon.replace, name: 'replace-icon'},
	{  icon: icon.reset, name: 'reset-icon'},
	{  icon: icon.resizeCornerNE, name: 'resize-corner-n-e-icon'},
	{  icon: icon.reusableBlock, name: 'reusable-block-icon'},
	{  icon: icon.rotateLeft, name: 'rotate-left-icon'},
	{  icon: icon.rotateRight, name: 'rotate-right-icon'},
	{  icon: icon.rss, name: 'rss-icon'},
	{  icon: icon.search, name: 'search-icon'},
	{  icon: icon.separator, name: 'separator-icon'},
	{  icon: icon.settings, name: 'settings-icon'},
	{  icon: icon.share, name: 'share-icon'},
	{  icon: icon.shield, name: 'shield-icon'},
	{  icon: icon.shipping, name: 'shipping-icon'},
	{  icon: icon.shortcode, name: 'shortcode-icon'},
	{  icon: icon.sidebar, name: 'sidebar-icon'},
	{  icon: icon.siteLogo, name: 'site-logo-icon'},
	//{  icon: icon.sparkles, name: 'sparkles-icon'},
	{  icon: icon.stack, name: 'stack-icon'},
	{  icon: icon.starEmpty, name: 'star-empty-icon'},
	{  icon: icon.starFilled, name: 'star-filled-icon'},
	{  icon: icon.starHalf, name: 'star-half-icon'},
	{  icon: icon.store, name: 'store-icon'},
	{  icon: icon.stretchFullWidth, name: 'stretch-full-width-icon'},
	{  icon: icon.stretchWide, name: 'stretch-wide-icon'},
	{  icon: icon.styles, name: 'styles-icon'},
	{  icon: icon.subscript, name: 'subscript-icon'},
	{  icon: icon.superscript, name: 'superscript-icon'},
	{  icon: icon.swatch, name: 'swatch-icon'},
	{  icon: icon.symbolFilled, name: 'symbol-filled-icon'},
	{  icon: icon.symbol, name: 'symbol-icon'},
	{  icon: icon.tableColumnAfter, name: 'table-column-after-icon'},
	{  icon: icon.tableColumnBefore, name: 'table-column-before-icon'},
	{  icon: icon.tableColumnDelete, name: 'table-column-delete-icon'},
	{  icon: icon.tableRowAfter, name: 'table-row-after-icon'},
	{  icon: icon.tableRowBefore, name: 'table-row-before-icon'},
	{  icon: icon.tableRowDelete, name: 'table-row-delete-icon'},
	{  icon: icon.table, name: 'table-icon'},
	{  icon: icon.tablet, name: 'tablet-icon'},
	{  icon: icon.tag, name: 'tag-icon'},
	{  icon: icon.tag, name: 'term-description-icon'},
	{  icon: icon.textColor, name: 'text-color-icon'},
	{  icon: icon.tip, name: 'tip-icon'},
	{  icon: icon.title, name: 'title-icon'},
	{  icon: icon.tool, name: 'tool-icon'},
	//{  icon: icon.trashFilled, name: 'trash-filled-icon'},
	{  icon: icon.trash, name: 'trash-icon'},
	{  icon: icon.trendingDown, name: 'trending-down-icon'},
	{  icon: icon.trendingUp, name: 'trending-up-icon'},
	{  icon: icon.typography, name: 'typography-icon'},
	{  icon: icon.undo, name: 'undo-icon'},
	{  icon: icon.ungroup, name: 'ungroup-icon'},
	{  icon: icon.unlock, name: 'unlock-icon'},
	{  icon: icon.update, name: 'update-icon'},
	{  icon: icon.upload, name: 'upload-icon'},
	{  icon: icon.verse, name: 'verse-icon'},
	{  icon: icon.video, name: 'video-icon'},
	{  icon: icon.warning, name: 'warning-icon'},
	{  icon: icon.widget, name: 'widget-icon'},
	{  icon: icon.wordpress, name: 'wordpress-icon'},
	/*
	{  icon: icon.AmazonIcon, name: 'amazon-link'},
	{  icon: icon.BandcampIcon, name: 'bandcamp-link'},
	{  icon: icon.BehanceIcon, name: 'behance-link'},
	{  icon: icon.ChainIcon, name: 'chain-link'},
	{  icon: icon.CodepenIcon, name: 'codepen-link'},
	{  icon: icon.DeviantArtIcon, name: 'deviantart-link'},
	{  icon: icon.DribbbleIcon, name: 'dribbble-link'},
	{  icon: icon.DropboxIcon, name: 'dropbox-link'},
	{  icon: icon.EtsyIcon, name: 'etsy-link'},
	{  icon: icon.FacebookIcon, name: 'facebook-link'},
	{  icon: icon.FeedIcon, name: 'feed-link'},
	{  icon: icon.FivehundredpxIcon, name: 'fivehundredpx-link'},
	{  icon: icon.FlickrIcon, name: 'flickr-link'},
	{  icon: icon.FoursquareIcon, name: 'foursquare-link'},
	{  icon: icon.GitHubIcon, name: 'github-link'},
	{  icon: icon.GoodreadsIcon, name: 'goodreads-link'},
	{  icon: icon.GoogleIcon, name: 'google-link'},
	{  icon: icon.InstagramIcon, name: 'instagram-link'},
	{  icon: icon.LastfmIcon, name: 'lastfm-link'},
	{  icon: icon.LinkedInIcon, name: 'linkedin-link'},
	{  icon: icon.MailIcon, name: 'mail-link'},
	{  icon: icon.MastodonIcon, name: 'mastodon-link'},
	{  icon: icon.MediumIcon, name: 'medium-link'},
	{  icon: icon.MeetupIcon, name: 'meetup-link'},
	{  icon: icon.PatreonIcon, name: 'patreon-link'},
	{  icon: icon.PinterestIcon, name: 'pinterest-link'},
	{  icon: icon.PocketIcon, name: 'pocket-link'},
	{  icon: icon.RedditIcon, name: 'reddit-link'},
	{  icon: icon.SkypeIcon, name: 'skype-link'},
	{  icon: icon.SnapchatIcon, name: 'snapchat-link'},
	{  icon: icon.SoundCloudIcon, name: 'soundcloud-link'},
	{  icon: icon.SpotifyIcon, name: 'spotify-link'},
	{  icon: icon.TelegramIcon, name: 'telegram-link'},
	{  icon: icon.TiktokIcon, name: 'tiktok-link'},
	{  icon: icon.TumblrIcon, name: 'tumblr-link'},
	{  icon: icon.TwitchIcon, name: 'twitch-link'},
	{  icon: icon.TwitterIcon, name: 'twitter-link'},
	{  icon: icon.VimeoIcon, name: 'vimeo-link'},
	{  icon: icon.VkIcon, name: 'vk-link'},
	{  icon: icon.WordPressIcon, name: 'wordpress-link'},
	{  icon: icon.YelpIcon, name: 'yelp-link'},
	{  icon: icon.YouTubeIcon, name: 'youtube-link'},
	*/
];
export  { dashiconslist };
