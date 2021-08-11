/**
 * Implements [bw_dash] shortcode
 *
 * tries to use Dashicon component
 *
 * @copyright (C) Copyright Bobbing Wide 2019-2021
 * @author Herb Miller @bobbingwide
 */
//import './style.scss';
//import './editor.scss';
import { transforms } from './transforms.js';

import { DashiconsSelect } from './dashicons.js';
//import { BlockiconsSelect } from './blockicons.js';
import {__} from "@wordpress/i18n";

import classnames from 'classnames';
import { registerBlockType } from '@wordpress/blocks';

import {
	Dashicon,
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
 * Register the WordPress block
 */
export default registerBlockType(
    // Namespaced, hyphens, lowercase, unique name
    'oik-bbw/dashicon',
    {
        transforms,

        edit: props => {
			const { attributes, setAttributes, instanceId, focus, isSelected } = props;
			const { textAlign, label } = props.attributes;
			const blockProps = useBlockProps( {
				className: classnames( {
					[ `has-text-align-${ textAlign }` ]: textAlign,
				} ),
			} );

            const onChangeDashicon = ( event ) => {
                props.setAttributes( { dashicon: event } );
            };


            return (
                <Fragment>
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

				<div {...blockProps} >
                <Dashicon icon={ props.attributes.dashicon} />
				</div>

                </Fragment>

            );
        },
        save: props => {
        	const blockProps = useBlockProps.save();
            return(
				<div {...blockProps} >
                <Dashicon icon={props.attributes.dashicon} />
				</div>

            );
        },
    },
);
