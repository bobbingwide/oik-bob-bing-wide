/* Transformation to oik-bbw/csv of oik-block/csv and [bw_csv]
 */
import { createBlock } from '@wordpress/blocks';

const transforms = {
    from: [
        {
            type: 'block',
            blocks: ['oik-block/csv'],
            transform: function (attributes) {
                return createBlock('oik-bbw/csv', {
                    content: attributes.content,
                    th: attributes.th,
                    uo: attributes.uo,

                });
            },
        },
        {
            type: 'shortcode',
            tag: 'bw_csv',
            attributes: {
                content: {
                    type: 'string',
                    source: 'html',
                    },
                },

            },
    ]
};

export { transforms } ;
