/*
 * Dashicons Select list
 *
 * @copyright (C) Copyright Bobbing Wide 2019-2022
 * @author Herb Miller @bobbingwide
 *
 * We want a big list of icons from which the user can choose one to have displayed in the Dashicon block.
 * The Dashicon component covers the standard WordPress list
 *
 * 'Blockicons', my name for the icons associated with blocks are a slightly different kettle of fish.
 * How do we enumerate the icon attributes of the registered block types?
 *
 *
 *
 */

import { Component }  from '@wordpress/element';
import { Dashicon, Icon } from '@wordpress/components';

import { dashiconslist } from './dashiconlist.js';


/**
 * This hard coded logic should be replaced by some mapping stuff
 * where each of the Dashicons values are displayed.
 * Assume we can do this in a standard select list
 */

class DashiconsSelect extends Component {

    render() {
        return(
                    <ul>
                        { dashiconslist.map ( ( icon ) => this.renderIcon( icon ) )}
                    </ul>
        );
    }
    renderDashicon( icon ) {
                    return( <li key={icon}><Dashicon icon={icon} /> {icon} </li> );
    }

    renderIcon( icon) {
    	var key = icon && icon.name ? icon.name : icon;
    	var iconValue = icon && icon.icon ? <Icon icon={icon.icon} /> : <Icon icon={icon} />
		return( <li key={key}>{iconValue}{key} </li> );
	}

}
export { DashiconsSelect };
