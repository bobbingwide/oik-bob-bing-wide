!function(){var e,t={698:function(e,t,n){"use strict";var r=window.wp.element,o=window.wp.blocks;const i={from:[{type:"block",blocks:["oik-block/wp"],transform:function(e){return(0,o.createBlock)("oik-bbw/wp",{v:e.v,p:e.p,m:e.m})}},{type:"shortcode",tag:"wp",attributes:{v:{type:"string",shortcode:e=>{let{named:{v:t}}=e;return t}}}}]};var l=window.wp.i18n,a=n(184),s=n.n(a),u=window.wp.blockEditor,c=window.wp.serverSideRender,b=n.n(c),p=window.wp.components;window.lodash,(0,o.registerBlockType)("oik-bbw/wp",{transforms:i,example:{attributes:{v:!0,g:!0}},edit:e=>{const{attributes:t,setAttributes:n,instanceId:o,focus:i,isSelected:a}=e,{textAlign:c,label:f}=e.attributes,w=(0,u.useBlockProps)({className:s()({[`has-text-align-${c}`]:c})});return(0,r.createElement)(r.Fragment,null,(0,r.createElement)(u.InspectorControls,null,(0,r.createElement)(p.PanelBody,null,(0,r.createElement)(p.PanelRow,null,(0,r.createElement)(p.ToggleControl,{label:(0,l.__)("Show WordPress version","oik-bob-bing-wide"),checked:!!e.attributes.v,onChange:t=>{e.setAttributes({v:!e.attributes.v})}})),(0,r.createElement)(p.PanelRow,null,(0,r.createElement)(p.ToggleControl,{label:(0,l.__)("Show Gutenberg details","oik-bob-bing-wide"),checked:!!e.attributes.g,onChange:t=>{e.setAttributes({g:!e.attributes.g})}})),(0,r.createElement)(p.PanelRow,null,(0,r.createElement)(p.ToggleControl,{label:(0,l.__)("Show PHP version","oik-bob-bing-wide"),checked:!!e.attributes.p,onChange:t=>{e.setAttributes({p:!e.attributes.p})}})),(0,r.createElement)(p.PanelRow,null,(0,r.createElement)(p.ToggleControl,{label:(0,l.__)("Show Memory limit","oik-bob-bing-wide"),checked:!!e.attributes.m,onChange:t=>{e.setAttributes({m:!e.attributes.m})}})))),(0,r.createElement)("div",w,(0,r.createElement)(b(),{block:"oik-bbw/wp",attributes:e.attributes})))},save:()=>null})},184:function(e,t){var n;!function(){"use strict";var r={}.hasOwnProperty;function o(){for(var e=[],t=0;t<arguments.length;t++){var n=arguments[t];if(n){var i=typeof n;if("string"===i||"number"===i)e.push(n);else if(Array.isArray(n)){if(n.length){var l=o.apply(null,n);l&&e.push(l)}}else if("object"===i)if(n.toString===Object.prototype.toString)for(var a in n)r.call(n,a)&&n[a]&&e.push(a);else e.push(n.toString())}}return e.join(" ")}e.exports?(o.default=o,e.exports=o):void 0===(n=function(){return o}.apply(t,[]))||(e.exports=n)}()}},n={};function r(e){var o=n[e];if(void 0!==o)return o.exports;var i=n[e]={exports:{}};return t[e](i,i.exports,r),i.exports}r.m=t,e=[],r.O=function(t,n,o,i){if(!n){var l=1/0;for(c=0;c<e.length;c++){n=e[c][0],o=e[c][1],i=e[c][2];for(var a=!0,s=0;s<n.length;s++)(!1&i||l>=i)&&Object.keys(r.O).every((function(e){return r.O[e](n[s])}))?n.splice(s--,1):(a=!1,i<l&&(l=i));if(a){e.splice(c--,1);var u=o();void 0!==u&&(t=u)}}return t}i=i||0;for(var c=e.length;c>0&&e[c-1][2]>i;c--)e[c]=e[c-1];e[c]=[n,o,i]},r.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(t,{a:t}),t},r.d=function(e,t){for(var n in t)r.o(t,n)&&!r.o(e,n)&&Object.defineProperty(e,n,{enumerable:!0,get:t[n]})},r.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},function(){var e={752:0,49:0};r.O.j=function(t){return 0===e[t]};var t=function(t,n){var o,i,l=n[0],a=n[1],s=n[2],u=0;if(l.some((function(t){return 0!==e[t]}))){for(o in a)r.o(a,o)&&(r.m[o]=a[o]);if(s)var c=s(r)}for(t&&t(n);u<l.length;u++)i=l[u],r.o(e,i)&&e[i]&&e[i][0](),e[i]=0;return r.O(c)},n=self.webpackChunkoik_bob_bing_wide=self.webpackChunkoik_bob_bing_wide||[];n.forEach(t.bind(null,0)),n.push=t.bind(null,n.push.bind(n))}();var o=r.O(void 0,[49],(function(){return r(698)}));o=r.O(o)}();