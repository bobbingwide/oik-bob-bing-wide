/**
 * Implements CSV block
 *
 * Uses [bw_csv] shortcode from oik- plugin
 *
 * @copyright (C) Copyright Bobbing Wide 2018, 2019, 2020, 2021
 * @author Herb Miller @bobbingwide
 */
import './style.scss';
import './editor.scss';
import Edit from './edit';
import { transforms } from './transforms';

import { registerBlockType } from '@wordpress/blocks';


/**
 * Register the oik-bbw/csv block
 *
 * registerBlockType is a function which takes the name of the block to register
 * and an object that contains the properties of the block.
 * Some of these properties are objects and others are functions
 */
export default registerBlockType(
    // Namespaced, hyphens, lowercase, unique name
		'oik-bbw/csv',
    {

		transforms,
		



		/**
		 * @see ./edit.js
		 */
		edit: Edit,

		/**
		 * We intend to render this dynamically. The content created by the user
		 * is stored in the content attribute.
		 *
		 */
		save( { attributes } ) {
			return null;
		},
	},
);

