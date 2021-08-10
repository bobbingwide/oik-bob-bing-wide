/* Transformation to oik-bbw/dashicon of oik-block/dashicon and [bw_dash]
 *
 * You'll find that the shortcode doesn't transform if it's been coded with positional parameters.
 * Actually, I can't get it to work with a parameter name of icon either.
 */
const { createBlock
} = wp.blocks;

const transforms = {
    from: [
        {
            type: 'block',
            blocks: ['oik-block/dashicon'],
            transform: function (attributes) {
                return createBlock('oik-bbw/dashicon', {
                    dashicon: attributes.dashicon,

                });
            },
        },
        {
            type: 'shortcode',
            tag: 'bw_dash',
            attributes: {
                dashicon: {
                    type: 'string',
                    shortcode: ( { named: { icon } } ) => {
                        return icon;
                    },
                },

            },
        },
    ]
};

export { transforms } ;

