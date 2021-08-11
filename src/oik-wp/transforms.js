/* Transformation to oik-bbw/wp of oik-block/wp and [wp]
 *
 * You'll find that the shortcode doesn't transform if it's been coded with positional parameters.

 */
import { registerBlockType, createBlock } from '@wordpress/blocks';

const transforms = {
    from: [
        {
            type: 'block',
            blocks: ['oik-block/wp'],
            transform: function (attributes) {
                return createBlock('oik-bbw/wp', {
                    v: attributes.v,
                    p: attributes.p,
                    m: attributes.m,

                });
            },
        },
        {
            type: 'shortcode',
            tag: 'wp',
            attributes: {
                v: {
                    type: 'string',
                    shortcode: ( { named: { v } } ) => {
                        return v;
                    },
                },

            },
        },
    ]
};

export { transforms } ;

