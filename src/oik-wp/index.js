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
	SelectControl } from '@wordpress/components';
import { Fragment} from '@wordpress/element';
import { map, partial } from 'lodash';

import metadata from './block.json';


/**
 * Register the WordPress block
 */
export default registerBlockType( metadata,
    {
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
