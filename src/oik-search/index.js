/**
 * Implements Search as a server rendered block
 *
 * Originally intended to uses [bw_search] shortcode from oik-bob-bing-wide plugin
 * but it's much easier to use get_search_form... that's all that [bw_search] does.
 *
 * @copyright (C) Copyright Bobbing Wide 2018-2021
 * @author Herb Miller @bobbingwide
 */
//import './style.scss';
//import './editor.scss';
import {__} from "@wordpress/i18n";
import clsx from 'clsx';
import ServerSideRender from '@wordpress/server-side-render';

import { useBlockProps } from '@wordpress/block-editor';
import { registerBlockType } from '@wordpress/blocks';



/**
 * Register the WordPress block
 */
export default registerBlockType(
    // Namespaced, hyphens, lowercase, unique name
    'oik-bbw/search',
    {

        example: {
        },

        edit: props => {
			const { attributes, setAttributes, instanceId, focus, isSelected } = props;
			const { textAlign, label } = props.attributes;
			const blockProps = useBlockProps( {
				className: clsx( {
					[ `has-text-align-${ textAlign }` ]: textAlign,
				} ),
			} );
            return (
                <div {...blockProps}>
					<ServerSideRender block="oik-bbw/search" attributes={ props.attributes }
                	/>
                </div>

            );
        },


        save() {
            return null;
        },
    },
);
