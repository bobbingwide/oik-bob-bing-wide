/**
* Implements [wp] shortcode as a server side rendered block
*
* @copyright (C) Copyright Bobbing Wide 2018-2021
* @author Herb Miller @bobbingwide
*/
import { transforms } from './transforms.js';
import './style.scss';
import './editor.scss';

import { __ } from '@wordpress/i18n';
import classnames from 'classnames';

import { registerBlockType, createBlock } from '@wordpress/blocks';
import {AlignmentControl, BlockControls, InspectorControls, useBlockProps, PlainText} from '@wordpress/block-editor';
import ServerSideRender from '@wordpress/server-side-render';
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

//import metadata from './block.json';


/**
 * Register the WordPress block
 */
export default registerBlockType( 'oik-bbw/wp',
    {
        transforms,
		example: {
        	attributes: {
        		v: true,
				g: true
			}
		},
        edit: props => {
			const { attributes, setAttributes, instanceId, focus, isSelected } = props;
			const { textAlign, label } = props.attributes;
			const blockProps = useBlockProps( {
				className: classnames( {
					[ `has-text-align-${ textAlign }` ]: textAlign,
				} ),
			} );

			const onChangeV = ( event ) => {
				props.setAttributes( { v: ! props.attributes.v } );
			};
			const onChangeP = ( event ) => {
			    props.setAttributes( { p: ! props.attributes.p } );
            };
            const onChangeM = ( event ) => {
                props.setAttributes( { m: !props.attributes.m } );
            };
            const onChangeG = ( event ) => {
                props.setAttributes( { g: !props.attributes.g } );
            };

            return (
            	<Fragment>
                	<InspectorControls >
						<PanelBody>
							<PanelRow>
								<ToggleControl label={__("Show WordPress version", 'oik-bob-bing-wide' )}
										   checked={ !! props.attributes.v }
											onChange={ onChangeV }
								/>
                        	</PanelRow>
							<PanelRow>
								<ToggleControl label={__("Show Gutenberg details", 'oik-bob-bing-wide' )}
													   checked={ !! props.attributes.g }
													   onChange={ onChangeG }
								/>
							</PanelRow>
                        	<PanelRow>
                           		<ToggleControl label={__("Show PHP version", 'oik-bob-bing-wide' )}
												   checked={ !! props.attributes.p }
												   onChange={ onChangeP }
								/>
							</PanelRow>
                        	<PanelRow>
                     	   <	ToggleControl label={__("Show Memory limit", 'oik-bob-bing-wide' )}
												   checked={ !! props.attributes.m }
												   onChange={ onChangeM }
						   	/>
                        	</PanelRow>
						</PanelBody>
                	</InspectorControls>
					<div {...blockProps}>
						<ServerSideRender
                    		block="oik-bbw/wp" attributes={ props.attributes }
                		/>
					</div>
				</Fragment>
			);
        },


        save() {
				return null;
        },
    },
);
