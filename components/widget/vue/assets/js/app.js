(function(e){function t(t){for(var o,i,c=t[0],u=t[1],a=t[2],p=0,f=[];p<c.length;p++)i=c[p],Object.prototype.hasOwnProperty.call(r,i)&&r[i]&&f.push(r[i][0]),r[i]=0;for(o in u)Object.prototype.hasOwnProperty.call(u,o)&&(e[o]=u[o]);l&&l(t);while(f.length)f.shift()();return s.push.apply(s,a||[]),n()}function n(){for(var e,t=0;t<s.length;t++){for(var n=s[t],o=!0,c=1;c<n.length;c++){var u=n[c];0!==r[u]&&(o=!1)}o&&(s.splice(t--,1),e=i(i.s=n[0]))}return e}var o={},r={app:0},s=[];function i(t){if(o[t])return o[t].exports;var n=o[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,i),n.l=!0,n.exports}i.m=e,i.c=o,i.d=function(e,t,n){i.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},i.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},i.t=function(e,t){if(1&t&&(e=i(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)i.d(n,o,function(t){return e[t]}.bind(null,o));return n},i.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return i.d(t,"a",t),t},i.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},i.p="/";var c=window["webpackJsonp"]=window["webpackJsonp"]||[],u=c.push.bind(c);c.push=t,c=c.slice();for(var a=0;a<c.length;a++)t(c[a]);var l=u;s.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"15c9":function(e,t,n){"use strict";n("5397")},5397:function(e,t,n){},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var o=n("a026"),r=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("span",{staticClass:"title-com-one"},[e._v("ПЕРВЫЙ КОМПОНЕНТ!!! "+e._s(e.text))]),n("tes-comp",{attrs:{msg:e.info,items:e.items},on:{pause:e.paused}})],1)},s=[],i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"hello"},[n("button",{on:{click:e.cons}},[e._v("Pause")]),n("h4",[e._v("My Vue Web Component")]),n("hr"),n("div",[e._v("msg = "+e._s(e.msg))]),n("div",[e._v("items = "+e._s(e.items))])])},c=[],u=(n("b0c0"),{name:"TesComp",props:{msg:String,items:Array},methods:{cons:function(){console.log("Массив из первого component - ",this.items),this.$emit("pause",{name:this.name})}}}),a=u,l=n("2877"),p=Object(l["a"])(a,i,c,!1,null,"edc99778",null),f=p.exports,m={name:"NewComponent",props:{text:String},components:{TesComp:f},data:function(){return{info:"Hello",items:[{name:"Marcel",age:51},{name:"Deniz",age:46}]}},methods:{paused:function(){this.info="Paused"}}},d=m,v=(n("d0fe"),Object(l["a"])(d,r,s,!1,null,"7e7b37f6",null)),h=v.exports,b=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("span",{staticClass:"title-com-two"},[e._v("ВТОРОЙ КОМПОНЕНТ "),n("br"),e._v(" "+e._s(e.text))])])},_=[],g={name:"NewComponent2",props:{text:String}},w=g,y=(n("15c9"),Object(l["a"])(w,b,_,!1,null,"60bc17a6",null)),O=y.exports;window.Vue=o["a"],window.Vue.component("new-component",h),window.Vue.component("new-component2",O)},"7afc":function(e,t,n){},d0fe:function(e,t,n){"use strict";n("7afc")}});
//# sourceMappingURL=app.js.map