/**
 * Implements the block equivalent of the [bw_dash] shortcode using the Dashicon component.
 *
 * @copyright (C) Copyright Bobbing Wide 2019-2022
 * @author Herb Miller @bobbingwide
 */
import './style.scss';
import './editor.scss';
import { transforms } from './transforms.js';
import { SVGSelectControl, SVGComboboxControl, SVGCustomSelectControl } from './SVGSelect';

import { DashiconsSelect } from './dashicons.js';
import { dashiconslist } from './dashiconlist.js';
import {__} from "@wordpress/i18n";

import clsx from 'clsx';
import { registerBlockType } from '@wordpress/blocks';

import {
	Dashicon,
	Icon,
	Toolbar,
	PanelBody,
	PanelRow,
	FormToggle,
	TextControl,
	RangeControl,
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
				className: clsx( {
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

			const onChangeSize = ( event ) => {
            	props.setAttributes( { size: event } );
			}

            const getIconortext = ( dashicon ) => {
            	if ( dashiconslist.includes( dashicon ) ) {
            		var icon = dashicon;
            		const style = { fontSize: attributes.size };
            		icon = <Icon icon={icon} size={ attributes.size} style={ style }/>;
				} else {
            		var icon = dashiconslist.find( element => element.name === dashicon );
            		icon = ( icon && icon.icon ) ? <Icon icon={icon.icon} size={attributes.size }/> : '';
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
					<PanelBody>
						<PanelRow>
							<RangeControl label={__('Icon size (pixels)', 'oik-bob-bing-wide')}
										  value={props.attributes.size}
										  onChange={onChangeSize}
										  allowReset
										  initialPosition={ props.attributes.size }
										  resetFallbackValue={24}
										  withInputField={ true }
										  min={2} max={250 } />
						</PanelRow>
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
