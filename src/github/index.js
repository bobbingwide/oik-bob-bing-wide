/**
 * Implements GitHub Issue shortcode block
 *
 * Uses SSR to invoke [github] shortcode functionality from oik-bob-bing-wide plugin
 *
 * @copyright (C) Copyright Bobbing Wide 2018-2022
 * @author Herb Miller @bobbingwide
 */
//import './style.scss';
//import './editor.scss';
import { transforms } from './transforms.js';

//const blockHeader = <h3>{ __( 'GitHub Issue', 'oik-bob-bing-wide' ) }</h3>;

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
import deprecated from './deprecated.js';

/**
 * Register the GitHub block
 */
export default registerBlockType( 'oik-bbw/github',
{
		transforms,
		deprecated,

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

				  <TextControl
					  label={ __("Owner",'oik-bob-bing-wide') }
					  value={ props.attributes.owner }
					  onChange={ onChangeOwner }
					  onFocus={ focus }
				  />
				  <TextControl
					  label={ __("Repository",'oik-bob-bing-wide' ) }
					  value={ props.attributes.repo }
					  onChange={ onChangeRepo }
					  onFocus={ focus }
				  />

			  		<TextControl
					label={ __("Issue", 'oik-bob-bing-wide' ) }
					value={ props.attributes.issue }
					onChange={ onChangeInput }
					onFocus={ focus }
					/>



					{!isSelected &&
					<ServerSideRender block="oik-bbw/github" attributes={attributes}/>
					}
				</div>

          );
        },
        save: props => {
			return null;
        },
    },
);
