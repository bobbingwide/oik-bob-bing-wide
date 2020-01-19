/**
 * Implements [bw_dash] shortcode
 *
 * tries to use Dashicon component
 *
 * @copyright (C) Copyright Bobbing Wide 2019, 2020
 * @author Herb Miller @bobbingwide
 */
//import './style.scss';
//import './editor.scss';

// Get just the __() localization function from wp.i18n
const { __ } = wp.i18n;
// Get registerBlockType from wp.blocks
const {
    registerBlockType,
} = wp.blocks;
const {
    ServerSideRender,
} = wp.editor;
const {
    InspectorControls,
} = wp.blockEditor;

const {
    Toolbar,
    PanelBody,
    PanelRow,
    FormToggle,
    TextControl,
    Dashicon,

} = wp.components;

import { DashiconsSelect } from './dashicons.js';
//import { BlockiconsSelect } from './blockicons.js';

/**
 * Register the WordPress block
 */
export default registerBlockType(
    // Namespaced, hyphens, lowercase, unique name
    'oik-block/dashicon',
    {
        // Localize title using wp.i18n.__()
        title: __( 'Dashicon' ),

        description: 'Displays icons',

        // Category Options: common, formatting, layout, widgets, embed
        category: 'widgets',

        // Dashicons Options - https://goo.gl/aTM1DQ
        icon: 'heart',

        // Limit to 3 Keywords / Phrases
        keywords: [
            __( 'icon' ),
            __( 'oik' ),
            __( 'dash'),
        ],

        // Set for each piece of dynamic data used in your block
        attributes: {
            dashicon: {
                type: 'string',
                default: 'heart'
            },


        },

        edit: props => {

            const onChangeDashicon = ( event ) => {
                props.setAttributes( { dashicon: event } );
            };


            return [
                <InspectorControls >
                    <PanelBody>
                        <PanelRow>
                            <TextControl label="Dashicon"
                                         value={ props.attributes.dashicon }
                                         onChange={ onChangeDashicon }
                            />
                        </PanelRow>

                        <PanelRow>
                            <DashiconsSelect />
                        </PanelRow>


                    </PanelBody>

                </InspectorControls>
                ,
                <p>
                <Dashicon icon={ props.attributes.dashicon} />

                </p>

            ];
        },
        /*
        <ServerSideRender
                    block="oik-block/dashicon" attributes={ props.attributes }
                />
         */
        save: props => {
            return(
                <Dashicon icon={props.attributes.dashicon} />

            );
        },
    },
);
