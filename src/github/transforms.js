/* Transformation to oik-bbw/github of oik-block/github and [github]
 *
 * You'll find that the shortcode doesn't transform if it's been coded with positional parameters.
 */
import { createBlock } from '@wordpress/blocks';

const transforms = {
    from: [
        {
            type: 'block',
            blocks: ['oik-block/github'],
            transform: function (attributes) {
                return createBlock('oik-bbw/github', {
                    content: attributes.content,
                    owner: attributes.owner,
                    repo: attributes.repo,
                    issue: attributes.issue,

                });
            },
        },
        {
            type: 'shortcode',
            tag: 'github',
            attributes: {
                owner: {
                    type: 'string',
                    shortcode: ( { named: { owner } } ) => {
                        return owner;
                    },
                },
                repo: {
                    type: 'string',
                    shortcode: ( { named: { repo } } ) => {
                        return repo;
                    },
                },
                issue: {
                    type: 'string',
                    shortcode: ( { named: { issue } } ) => {
                        return issue;
                    },
                },

            },
        },
    ]
};

export { transforms } ;

