(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-20ab"],{"7bdd":function(t,a,e){"use strict";e.r(a);var s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("v-layout",[e("v-card",{attrs:{"contextual-style":"dark"}},[e("span",{attrs:{slot:"header"},slot:"header"},[t._v("\n      My Account\n    ")]),e("div",{attrs:{slot:"body"},slot:"body"},[e("table",{staticClass:"table table-striped"},[e("thead",[e("tr",[e("th",[t._v("\n              First Name\n            ")]),e("th",[t._v("\n              Last Name\n            ")]),e("th",[t._v("\n              Email\n            ")])])]),e("tbody",[e("tr",[e("td",[t._v("\n              "+t._s(t.$store.state.account.firstName)+"\n            ")]),e("td",[t._v("\n              "+t._s(t.$store.state.account.lastName)+"\n            ")]),e("td",[t._v("\n              "+t._s(t.$store.state.account.email)+"\n            ")])])])])]),e("div",{attrs:{slot:"footer"},slot:"footer"},[t._v("\n      Made with love by Vivid Web\n    ")])])],1)},n=[],l=e("ea2a"),o=e("ae8d"),r={name:"AccountIndex",components:{VLayout:l["a"],VCard:o["a"]}},i=r,c=e("2877"),u=Object(c["a"])(i,s,n,!1,null,null,null);u.options.__file="Index.vue";a["default"]=u.exports},ae8d:function(t,a,e){"use strict";var s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",{staticClass:"card"},[t.hasSlot("header")?e("h4",{class:t.classNamesHeader},[t._t("header")],2):t._e(),t.hasSlot("body")?e("div",{staticClass:"card-body"},[t._t("body")],2):t._e(),t.hasSlot("footer")?e("div",{staticClass:"card-footer"},[t._t("footer")],2):t._e()])},n=[],l={methods:{hasSlot:function(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:"default";return!!this.$slots[t]}}},o={name:"Card",mixins:[l],props:{contextualStyle:{default:"primary",type:String,required:!1}},computed:{classNamesHeader:function(){var t=["card-header"];return this.contextualStyle?(t.push("bg-".concat(this.contextualStyle)),t.push("text-white")):t.push("bg-default"),t}}},r=o,i=e("2877"),c=Object(i["a"])(r,s,n,!1,null,null,null);c.options.__file="Card.vue";a["a"]=c.exports},ea2a:function(t,a,e){"use strict";var s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("nav",{staticClass:"navbar navbar-expand-lg navbar-dark bg-dark"},[e("router-link",{staticClass:"navbar-brand",attrs:{to:{name:"home.index"}}},[t._v("\n      Vue 2 Boilerplate\n    ")]),e("button",{staticClass:"navbar-toggler",attrs:{type:"button"},on:{click:t.toggleMenu}},[e("span",{staticClass:"navbar-toggler-icon"})]),e("div",{staticClass:"collapse navbar-collapse",class:{show:t.menuCollapsed}},[e("ul",{staticClass:"navbar-nav mr-auto"},[e("router-link",{staticClass:"nav-item",attrs:{to:{name:"home.index"},"active-class":"active",tag:"li"}},[e("a",{staticClass:"nav-link"},[t._v("\n            Home\n          ")])]),e("router-link",{staticClass:"nav-item",attrs:{to:{name:"account.index"},"active-class":"active",tag:"li"}},[e("a",{staticClass:"nav-link"},[t._v("\n            Account\n          ")])])],1),e("span",{staticClass:"navbar-text"},[e("a",{staticClass:"btn btn-secondary",attrs:{href:"#"},on:{click:function(a){return a.preventDefault(),t.logout(a)}}},[e("i",{staticClass:"fa fa-sign-out"})])])])],1),e("div",{staticClass:"container pt-4"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col col-12"},[t._t("default")],2)])])])},n=[],l={name:"DefaultLayout",data:function(){return{menuCollapsed:!1}},methods:{logout:function(){this.$store.dispatch("auth/logout")},toggleMenu:function(){this.menuCollapsed=!this.menuCollapsed}}},o=l,r=e("2877"),i=Object(r["a"])(o,s,n,!1,null,null,null);i.options.__file="Default.vue";a["a"]=i.exports}}]);
//# sourceMappingURL=chunk-20ab.a69f8a67.js.map