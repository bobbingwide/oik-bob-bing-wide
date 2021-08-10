/**
* Implements [wp] shortcode as a server side rendered block
*
* @copyright (C) Copyright Bobbing Wide 2018-2021
* @author Herb Miller @bobbingwide
*/
import './style.scss';
import './editor.scss';
import { transforms } from './transforms.js';

// Get just the __() localization function from wp.i18n
const { __ } = wp.i18n;
// Get registerBlockType from wp.blocks
const { 
	registerBlockType,
} = wp.blocks;
const { 
  InspectorControls,
    ServerSideRender,
} = wp.editor;
	 
const {
  Toolbar,
   PanelBody,
  PanelRow,
  FormToggle,

	TextControl,

} = wp.components;

/**
 * Register the WordPress block
 */
export default registerBlockType(
    // Namespaced, hyphens, lowercase, unique name
    'oik-bbw/wp',
    {
        // Localize title using wp.i18n.__()
        title: __( 'WordPress' ),
				
		description: 'Displays information about WordPress and PHP versions',

        // Category Options: common, formatting, layout, widgets, embed
        category: 'widgets',

        // Dashicons Options - https://goo.gl/aTM1DQ
        icon: 'wordpress',

        // Limit to 3 Keywords / Phrases
        keywords: [
            __( 'WordPress' ),
            __( 'oik' ),
            __( 'PHP'),
        ],

        // Set for each piece of dynamic data used in your block
        attributes: {
            v: {
                type: 'string',
            },
            p: {
                type: 'string'
            },
            m: {
                type: 'string'
            },
            g: {
                type: 'string'
            }
					
        },

        supports: {
            typography: {
                fontSize: true
            },
            color: {
                gradients: false,
                text: false,
                background: true,
                link: false
            }
        },

        transforms,

        edit: props => {

			const onChangeV = ( event ) => {
				props.setAttributes( { v: event } );
			};
			const onChangeP = ( event ) => {
			    props.setAttributes( { p: event } );
            };
            const onChangeM = ( event ) => {
                props.setAttributes( { m: event } );
            };
            const onChangeG = ( event ) => {
                props.setAttributes( { g: event } );
            };
					
            return [
                <InspectorControls >
								<PanelBody>
								<PanelRow>
									<TextControl label="Version"
											value={ props.attributes.v }
											onChange={ onChangeV }
									/>
                                </PanelRow>
                                <PanelRow>
                                    <TextControl label="PHP Version"
                                        value={ props.attributes.p }
                                        onChange={ onChangeP }
                                    />
								</PanelRow>
                                <PanelRow>
                                    <TextControl label="Memory limit"
                                        value={ props.attributes.m }
                                        onChange={ onChangeM }
                                    />
                                </PanelRow>
                                    <PanelRow>
                                        <TextControl label="Gutenberg details"
                                                     value={ props.attributes.g }
                                                     onChange={ onChangeG }
                                        />
                                    </PanelRow>
                                </PanelBody>

                </InspectorControls>
  				,
				<ServerSideRender
                    block="oik-bbw/wp" attributes={ props.attributes }
                />

          ];
        },
				
				
        save() {
				return null;
        },
    },
);
