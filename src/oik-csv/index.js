/**
 * Implements CSV block
 *
 * Uses [bw_csv] shortcode from oik- plugin
 *
 * @copyright (C) Copyright Bobbing Wide 2018, 2019, 2020
 * @author Herb Miller @bobbingwide
 */
import './style.scss';
import './editor.scss';
//import portOptions from "../oik-uk-tides/tidetimes-co-uk";
import { transforms } from './transforms.js';

// Get just the __() localization function from wp.i18n
const { __ } = wp.i18n;
// Get registerBlockType and Editable from wp.blocks
const { 
	registerBlockType,
} = wp.blocks;

const { 
	Editable,

  AlignmentToolbar,

	ServerSideRender,
 } = wp.editor;
const {
	InspectorControls,
	BlockControls,
	PlainText,

} = wp.blockEditor;
	 
const {
  Toolbar,
  Button,
  Tooltip,
  PanelBody,
  PanelRow,
  FormToggle,
	TextControl,
	SelectControl,
	ToggleControl,
} = wp.components;

const {
	withInstanceId,
} = wp.compose;	

const Fragment = wp.element.Fragment;
const RawHTML = wp.element.RawHTML;
import { map } from 'lodash';
// Set the header for the block since it is reused
//const blockHeader = <h3>{ __( 'Person' ) }</h3>;

//var TextControl = wp.blocks.InspectorControls.TextControl;

import icons from './icons.js';

/**
 * Register the oik-block/csv block
 * 
 * registerBlockType is a function which takes the name of the block to register
 * and an object that contains the properties of the block.
 * Some of these properties are objects and others are functions
 */
export default registerBlockType(
    // Namespaced, hyphens, lowercase, unique name
		'oik-bbw/csv',
    {
        // Localize title using wp.i18n.__()
        title: __( 'CSV' ),
				
		description: 'Displays CSV content',

        // Category Options: common, formatting, layout, widgets, embed
        category: 'layout',

        // Dashicons Options - https://goo.gl/aTM1DQ
        icon: 'media-spreadsheet',

        // Limit to 3 Keywords / Phrases
        keywords: [
            __( 'CSV' ),
						__( 'list' ),
            __( 'oik' ),
        ],

        // Set for each piece of dynamic data used in your block
        attributes: {
				
        	content: {
        		type: 'string',
            },
			uo: {
				type: 'string',
				default: '',
			},
			th: {
          		type: 'boolean',
				default: true,
			},
			src: {
          		type: 'string',
				default: '',
			}
					
        },
		transforms,
				
		supports: {
			customClassName: false,
			className: false,
			html: false,
		},
			
		edit: withInstanceId(
			( { attributes, setAttributes, instanceId, isSelected } ) => {
				const inputId = `blocks-csv-input-${instanceId}`;


				const onChangeContent = (value) => {
					value = value.replace( /<br>/g, '\n' );
					console.log( value );
					setAttributes({content: value});
				};

				const onChangeAlignment = (value) => {

				};

				const onChangeUo = (value) => {
					setAttributes({uo: value});
				};

				const onChangeSrc = (value) => {
					setAttributes( {src: value} );
				}

				function isTable() {
					return attributes.uo == "";
				}

				function isUl() {
					return attributes.uo == "u";
				}

				function isOl() {
					return attributes.uo == "o";
				}
				function isDl() {
					return attributes.uo == "d";
				}

				function setTable() {
					setAttributes({uo: ""});
				}

				function setUl() {
					setAttributes({uo: "u"});
				}

				function setOl() {
					setAttributes({uo: "o"});
				}
				function setDl() {
					setAttributes({uo: "d"});
				}

				const onChangeTh = ( event ) => {
					setAttributes(  { th: ! attributes.th } );
				}

				const uoOptions = {
					"": "Table",
					"u": "Unordered list",
					"o": "Ordered list",
					"d": "Description list",
				};

				var mapped = map(uoOptions, (key, label) => ({value: label, label: key}));
				console.log( mapped );


				return (

					<Fragment>

						<InspectorControls key="csv">
							<PanelBody>
								<SelectControl label="Format" value={attributes.uo} onChange={onChangeUo}
											   options={mapped}
								/>
								<PanelRow>
									<ToggleControl
										label={ __( 'Format table heading' ) }
										checked={ !! attributes.th }
										onChange={ onChangeTh }

									/>

								</PanelRow>
								<PanelRow>
									<TextControl
										label={ __( 'Source file: ID, URL or path' ) }
										value={  attributes.src }
										onChange={ onChangeSrc }

									/>

								</PanelRow>
							</PanelBody>
						</InspectorControls>


						<BlockControls key="flagbogtiddle"
									   controls={[
										   {
											   icon: 'editor-table',
											   title: __('Display as table'),
											   isActive: isTable(),
											   onClick: setTable,
										   },

										   {
											   icon: 'editor-ul',
											   title: __('Display as unordered list'),
											   isActive: isUl(),
											   onClick: setUl,
										   },

										   {
											   icon: 'editor-ol',
											   title: __('Display as ordered list'),
											   isActive: isOl(),
											   onClick: setOl,

										   },
										   {
										   		icon: icons.descriptionList,
											   title: __('Display as description list'),
											   isActive: isDl(),
											   onClick: setDl,
										   }
									   ]}


						/>


						<Fragment>
							<div className="wp-block-oik-block-csv">
								<PlainText
									id={inputId}
									value={attributes.content}
									placeholder={__('Enter your CSV data or specify a source file.')}
									onChange={onChangeContent}
								/>
							</div>
							{!isSelected &&
								<ServerSideRender block="oik-bbw/csv" attributes={attributes}/>
							}
						</Fragment>


					</Fragment>
				);
			}
		),




				

		/**
		 * We intend to render this dynamically. The content created by the user
		 * is stored in the content attribute.
		 * 
		 */
		save( { attributes } ) {
			return null;
		},
	},
);

