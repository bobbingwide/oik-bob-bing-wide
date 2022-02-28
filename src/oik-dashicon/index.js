/**
 * Implements the block equivalent of the [bw_dash] shortcode using the Dashicon component.
 *
 * @copyright (C) Copyright Bobbing Wide 2019-2021
 * @author Herb Miller @bobbingwide
 */
import './style.scss';
import './editor.scss';
import { transforms } from './transforms.js';
import { SVGSelectControl, SVGComboboxControl, SVGCustomSelectControl } from './SVGSelect';

import { DashiconsSelect } from './dashicons.js';
import { dashiconslist } from './dashiconlist.js';
import {__} from "@wordpress/i18n";

import classnames from 'classnames';
import { registerBlockType } from '@wordpress/blocks';

import {
	Dashicon,
	Icon,
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
		example: {},

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

            const onChangeSelectedItem = ( selectedItem ) => {
            	console.log( selectedItem );
            	onChangeDashicon( selectedItem.key );
			}

            const getIconortext = ( dashicon ) => {
            	if ( dashiconslist.includes( dashicon ) ) {
            		var icon = dashicon;
            		icon = <Icon icon={icon} />;
				} else {
            		var icon = dashiconslist.find( element => element.name === dashicon );
            		icon = ( icon && icon.icon ) ? <Icon icon={icon.icon}/> : '';
				}
            	console.log( icon );
            	return icon;
			}

            var icon = getIconortext(attributes.dashicon );


			//	renderIcon( icon) {
			//	var key = icon && icon.name ? icon.name : icon;
			//	var iconValue = icon && icon.icon ? icon.icon.props : icon;
			//	return( <li key={key}><Icon icon={iconValue} /> {key} </li> );
			//  }

            return (
                <Fragment>
                <InspectorControls >
                    <PanelBody>
						{false &&
						<PanelRow>
							<TextControl label={__("Dashicon", 'oik-bob-bing-wide')}
										 value={props.attributes.dashicon}
										 onChange={onChangeDashicon}
							/>
						</PanelRow>
						}
						{false &&
							<PanelRow>
							<SVGSelectControl value={props.attributes.dashicon} onChange={onChangeDashicon} />
							</PanelRow>
						}
						<PanelRow>
							<SVGComboboxControl value={ props.attributes.dashicon} onChange={onChangeDashicon} />
						</PanelRow>

						<PanelRow>
							<SVGCustomSelectControl value={ props.attributes.dashicon} setAttributes={ setAttributes }   />
						</PanelRow>

						{false &&
						<PanelRow>
							<DashiconsSelect/>
						</PanelRow>
						}




                    </PanelBody>

                </InspectorControls>

				<div {...blockProps} >
					{ icon }
				</div>

                </Fragment>

            );
        },

		deprecated: [
			{

				attributes : {
					dashicon: {
						type: 'string',
						default: 'heart'
					},
					className: {
						type: 'string',
						default: 'wp-block-oik-bbw-dashicon'
					}
				},


				//isEligible: ( {dashicon }) => true,
				save: props => {
					const blockProps = useBlockProps.save();
					return(
						<div {...blockProps} >
							<Dashicon icon={props.attributes.dashicon} />
						</div>

					);
				},
			}
		],

		save(  props  ) {
			return null;
		},
    },
);
