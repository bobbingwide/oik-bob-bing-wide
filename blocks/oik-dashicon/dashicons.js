/*
 * Dashicons Select list
 *
 * @copyright (C) Copyright Bobbing Wide 2019
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

const { Component }  = wp.element;
const { Dashicon } = wp.components;

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
                        { dashiconslist.map ( ( icon ) => this.renderDashicon( icon ) )}
                    </ul>
        );
    }
    renderDashicon( icon ) {
                    return( <li><Dashicon icon={icon} /> {icon} </li> );
    }
}
export { DashiconsSelect };



