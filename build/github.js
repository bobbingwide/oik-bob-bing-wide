!function(){var e={184:function(e,t){var r;!function(){"use strict";var n={}.hasOwnProperty;function o(){for(var e=[],t=0;t<arguments.length;t++){var r=arguments[t];if(r){var i=typeof r;if("string"===i||"number"===i)e.push(r);else if(Array.isArray(r)){if(r.length){var s=o.apply(null,r);s&&e.push(s)}}else if("object"===i)if(r.toString===Object.prototype.toString)for(var u in r)n.call(r,u)&&r[u]&&e.push(u);else e.push(r.toString())}}return e.join(" ")}e.exports?(o.default=o,e.exports=o):void 0===(r=function(){return o}.apply(t,[]))||(e.exports=r)}()}},t={};function r(n){var o=t[n];if(void 0!==o)return o.exports;var i=t[n]={exports:{}};return e[n](i,i.exports,r),i.exports}r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,{a:t}),t},r.d=function(e,t){for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){"use strict";var e=window.wp.element,t=window.wp.blocks;const n={from:[{type:"block",blocks:["oik-block/github"],transform:function(e){return(0,t.createBlock)("oik-bbw/github",{content:e.content,owner:e.owner,repo:e.repo,issue:e.issue})}},{type:"shortcode",tag:"github",attributes:{owner:{type:"string",shortcode:e=>{let{named:{owner:t}}=e;return t}},repo:{type:"string",shortcode:e=>{let{named:{repo:t}}=e;return t}},issue:{type:"string",shortcode:e=>{let{named:{issue:t}}=e;return t}}}}]};var o=window.wp.i18n,i=r(184),s=r.n(i),u=window.wp.blockEditor,a=window.wp.serverSideRender,l=r.n(a),c=window.wp.components,b=(window.lodash,[{attributes:{shortcode:{type:"string",default:"github"},owner:{type:"string",default:"wordpress"},repo:{type:"string",default:"gutenberg"},issue:{type:"string"}},save:t=>{const r=(0,e.createElement)("h3",null,(0,o.__)("GitHub Issue","oik-bob-bing-wide")),n=u.useBlockProps.save();return(0,e.createElement)("div",n,r,(0,e.createElement)("div",null,"[","github ",t.attributes.owner," ",t.attributes.repo," issue ",t.attributes.issue,"]"))}}]);(0,t.registerBlockType)("oik-bbw/github",{transforms:n,deprecated:b,edit:t=>{const{attributes:r,setAttributes:n,instanceId:i,focus:a,isSelected:b}=t,{textAlign:p,label:d}=t.attributes,w=(0,u.useBlockProps)({className:s()({[`has-text-align-${p}`]:p})});return(0,e.createElement)("div",w,(0,e.createElement)(c.TextControl,{label:(0,o.__)("Owner","oik-bob-bing-wide"),value:t.attributes.owner,onChange:e=>{t.setAttributes({owner:e})},onFocus:a}),(0,e.createElement)(c.TextControl,{label:(0,o.__)("Repository","oik-bob-bing-wide"),value:t.attributes.repo,onChange:e=>{t.setAttributes({repo:e})},onFocus:a}),(0,e.createElement)(c.TextControl,{label:(0,o.__)("Issue","oik-bob-bing-wide"),value:t.attributes.issue,onChange:e=>{t.setAttributes({issue:e})},onFocus:a}),!b&&(0,e.createElement)(l(),{block:"oik-bbw/github",attributes:r}))},save:e=>null})}()}();