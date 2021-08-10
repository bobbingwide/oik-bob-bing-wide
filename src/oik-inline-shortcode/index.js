/**
 * Prototype code to try to create inline shortcodes using Format Types
 * Prompted by Paul Bunkham
 * See https://developer.wordpress.org/block-editor/tutorials/format-api/1-register-format/
 *
 * The idea is to be able to use a toolbar icon to insert a shortcode to perform a specific task
 *
 *
 *
 * @copyright (C) Copyright Bobbing Wide 2020
 * @author Herb Miller @bobbingwide
 */

//import { registerFormatType } from '@wordpress/rich-text';
const { registerFormatType, toggleFormat } = wp.richText;
//import { RichTextToolbarButton } from '@wordpress/block-editor';
const { RichTextToolbarButton } = wp.blockEditor;

const OikInlineShortcodeButton = props => {
    return <RichTextToolbarButton
        icon='shortcode'
        title='Inline shortcode'
        onClick={ () => {
            console.log( 'Inline shortcode toggle' );
            props.onChange( toggleFormat(
                props.value,
                { type: 'oik-bbw/inline-shortcode' }
            ) );
        } }
        isActive={ props.isActive }
    />
};



registerFormatType(
    'oik-bbw/inline-shortcode', {
        title: 'Inline shortcode',
        tagName: 'samp',
        className: null,
        edit: OikInlineShortcodeButton,
    }
);