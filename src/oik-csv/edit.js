import icons from "./icons";
import {__} from "@wordpress/i18n";

import clsx from 'clsx';
import ServerSideRender from '@wordpress/server-side-render';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import {
	Toolbar,
	PanelBody,
	PanelRow,
	FormToggle,
	TextControl,
	TextareaControl,
	ToggleControl,
	SelectControl } from '@wordpress/components';
import { Fragment} from '@wordpress/element';
import { map, partial } from 'lodash';

import {AlignmentControl, BlockControls, InspectorControls, useBlockProps, PlainText} from '@wordpress/block-editor';


/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/developers/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit  ( props ) {
	const { attributes, setAttributes, instanceId, focus, isSelected } = props;
	const { textAlign, label } = props.attributes;
	const blockProps = useBlockProps( {
		className: clsx( {
			[ `has-text-align-${ textAlign }` ]: textAlign,
		} ),
	} );


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
			"": __("Table", 'oik-bob-bing-wide' ),
			"u": __("Unordered list", 'oik-bob-bing-wide' ),
			"o": __("Ordered list", 'oik-bob-bing-wide' ),
			"d": __("Description list", 'oik-bob-bing-wide' )
		};

		var mapped = map(uoOptions, (key, label) => ({value: label, label: key}));
		//console.log( mapped );


		return (

			<Fragment>

				<InspectorControls>
					<PanelBody>
						<SelectControl label={__("Format",'oik-bob-bing-wide' )} value={attributes.uo} onChange={onChangeUo}
									   options={mapped}
						/>
						<PanelRow>
							<ToggleControl
								label={ __( 'Format table heading', 'oik-bob-bing-wide' ) }
								checked={ !! attributes.th }
								onChange={ onChangeTh }

							/>

						</PanelRow>
						<PanelRow>
							<TextControl
								label={ __( 'Source file: ID, URL or path', 'oik-bob-bing-wide' ) }
								value={  attributes.src }
								onChange={ onChangeSrc }

							/>

						</PanelRow>
					</PanelBody>
				</InspectorControls>


				<BlockControls
							   controls={[
								   {
									   icon: 'editor-table',
									   title: __('Display as table', 'oik-bob-bing-wide'),
									   isActive: isTable(),
									   onClick: setTable,
								   },

								   {
									   icon: 'editor-ul',
									   title: __('Display as unordered list', 'oik-bob-bing-wide'),
									   isActive: isUl(),
									   onClick: setUl,
								   },

								   {
									   icon: 'editor-ol',
									   title: __('Display as ordered list', 'oik-bob-bing-wide'),
									   isActive: isOl(),
									   onClick: setOl,

								   },
								   {
									   icon: icons.descriptionList,
									   title: __('Display as description list', 'oik-bob-bing-wide'),
									   isActive: isDl(),
									   onClick: setDl,
								   }
							   ]}


				/>


				<Fragment>
					<div { ...blockProps}>
						<PlainText
							value={attributes.content}
							placeholder={__('Enter your CSV data or specify a source file.', 'oik-bob-bing-wide')}
							onChange={onChangeContent}
						/>

						{!isSelected &&
							<ServerSideRender block="oik-bbw/csv" attributes={attributes}/>
						}
					</div>
				</Fragment>


			</Fragment>
		);
	}
