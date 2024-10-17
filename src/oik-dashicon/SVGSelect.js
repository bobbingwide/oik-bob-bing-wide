import { SelectControl, Icon, ComboboxControl, CustomSelectControl, Fragment } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

import { dashiconslist } from './dashiconlist.js';

function renderOption( icon ) {
	var label = icon && icon.name ? icon.name : icon;
	//var iconValue = icon && icon.icon ? <Icon icon={icon.icon} /> : <Icon icon={icon} />
	var iconValue = icon && icon.name ? icon.name : icon;
	var option = { 'label': label, 'value': iconValue };
	return option;
}

function renderCustom( icon ) {
	var label = icon && icon.name ? icon.name : icon;
	//var iconValue = icon && icon.icon ? <Icon icon={icon.icon} /> : <Icon icon={icon} />
	var iconValue = ( icon && icon.icon ) ? <Icon icon={icon.icon } /> : <Icon icon={icon} />;
	var option = { 'key': label, 'name': iconValue };
	return option;
}

function SVGSelectControl( { value, onChange, ...props }) {
	var SVGoptions = dashiconslist.map( ( icon ) => renderOption( icon ) );
	return <SelectControl label={__("Icon select", 'oik-bob-bing-wide')} value={value} options={ SVGoptions } onChange={onChange }/>;
}

function SVGComboboxControl( { value, onChange, ...props } ) {
	var SVGoptions = dashiconslist.map( ( icon ) => renderOption( icon ) );
	return <ComboboxControl label={__("Icon combo", 'oik-bob-bing-wide')}value={value} options={ SVGoptions } onChange={onChange }/>;
}

/**
 * SVGCustomSelectControl for Dashicons.
 *
 * This is a different beast from the other controls.
 * The options are structured differently
 * and the way the selected value is updated is also different.
 * I got a lot of React messages about uncontrolled updates until I passed setAttributes
 * in from the calling routine.
 *
 * @param value
 * @param setAttributes
 * @param props
 * @returns {JSX.Element}
 * @constructor
 */
function SVGCustomSelectControl( { value, setAttributes, ...props } ) {
	//console.log( props );
	//const { setAttributes } = props;
	var SVGoptions = dashiconslist.map( ( icon ) => renderCustom( icon ) );
	//console.log( SVGoptions );
	var selectedValue= SVGoptions.find(  (option ) => option.key === value ) ;

	return <CustomSelectControl label={__("Icon custom select", 'oik-bob-bing-wide')} value={ selectedValue  } options={ SVGoptions }
	onChange={ ( { selectedItem } ) => setAttributes( { dashicon: selectedItem.key } ) }/>;
}



export { SVGSelectControl, SVGComboboxControl, SVGCustomSelectControl };
