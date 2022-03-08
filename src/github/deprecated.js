import { useBlockProps } from '@wordpress/block-editor';
import { __ } from '@wordpress/i18n';

export default [
	{
		attributes: {
			shortcode: {
				type: 'string',
				default: 'github'
			},
			owner: {
				type: 'string',
				default: 'wordpress'
			},
			repo: {
				type: 'string',
				default: 'gutenberg'
			},
			issue: {
				type: 'string'
			}
		},


		save: props => {
			const blockHeader = <h3>{ __( 'GitHub Issue', 'oik-bob-bing-wide' ) }</h3>;
			var lsb = '[';
			var rsb = ']';
			const blockProps = useBlockProps.save();
			return (
				<div {...blockProps} >
					{blockHeader}
					<div>{lsb}
						github {props.attributes.owner} {props.attributes.repo} issue {props.attributes.issue}
						{rsb}
					</div>
				</div>
			);
		}
	}
];
