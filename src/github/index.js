/**
 * Implements GitHub Issue shortcode block
 *
 * Uses [github] shortcode from oik-bob-bing-wide plugin
 *
 * @copyright (C) Copyright Bobbing Wide 2018-2021
 * @author Herb Miller @bobbingwide
 */
import './style.scss';
import './editor.scss';
import { transforms } from './transforms.js';

const blockHeader = <h3>{ __( 'GitHub Issue', 'oik-blocks' ) }</h3>;

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




/**
 * Register the GitHub block
 */
export default registerBlockType( 'oik-bbw/github',
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
          const onChangeInput = ( event ) => {
            props.setAttributes( { issue: event } );
          };

          const onChangeOwner = ( event ) => {
          	props.setAttributes( { owner: event } );
          };

          const onChangeRepo = ( event ) => {
				props.setAttributes( { repo: event } );
          };

          return (
			  <div { ...blockProps}>

				  {blockHeader}
				  <TextControl
					  id="owner"
					  label="Owner"
					  value={ props.attributes.owner }
					  onChange={ onChangeOwner }
					  onFocus={ focus }
				  />
				  <TextControl
					  id="repo"
					  label="Repository"
					  value={ props.attributes.repo }
					  onChange={ onChangeRepo }
					  onFocus={ focus }
				  />

			  	<TextControl
								id="issue"
								label="Issue"
								value={ props.attributes.issue }
								onChange={ onChangeInput }
								onFocus={ focus }
							/>

            </div>
          );
        },
        save: props => {


					var lsb = '[';
					var rsb = ']'
          return (
            <div >
						{blockHeader}
						<div>{lsb}
						github {props.attributes.owner} {props.attributes.repo} issue {props.attributes.issue}
						{rsb}
						</div>
            </div>
          );
        },
    },
);
