import { SelectControl, Icon } from '@wordpress/components';


import { dashiconslist } from './dashiconlist.js';

function renderOption( icon ) {
	var label = icon && icon.name ? icon.name : icon;
	//var iconValue = icon && icon.icon ? <Icon icon={icon.icon} /> : <Icon icon={icon} />
	var iconValue = icon && icon.name ? icon.name : icon;
	var option = { 'label': label, 'value': iconValue };
	return option;
}

function SVGSelectControl( { value, onChange, ...props }) {
	var SVGoptions = dashiconslist.map( ( icon ) => renderOption( icon ) );
	return <SelectControl label="Icon" value={value} options={ SVGoptions } onChange={onChange }/>;
}

export { SVGSelectControl };

