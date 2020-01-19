/* Transformation of [bw_csv] shortcode to oik-blocks/csv
 * Is this possible?
 *
 * Well. If you use source: 'text' then the new lines disappear
 * If you use source: 'html' then you get <br> tags
 * How can I use a function?
 * Maybe we can strip the <br> tags in some onChange logic
 *
 */
const { createBlock
} = wp.blocks;

const transforms = {
    from: [
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