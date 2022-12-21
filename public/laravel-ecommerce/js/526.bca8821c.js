"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[526],{4526:function(t,e,a){a.r(e),a.d(e,{default:function(){return $}});var l=a(6252),s=a(3577);const r={key:0,class:""},n={class:"px-10 mt-5 w-full mx-auto"},c={key:0,class:"w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left"},i={class:"md:flex items-center -mx-10"},o=(0,l._)("div",{class:"w-full md:w-1/2 px-10 mb-10 md:mb-0"},[(0,l._)("div",{class:"relative"},[(0,l._)("img",{src:"https://pngimg.com/uploads/raincoat/raincoat_PNG53.png",class:"w-full relative z-10",alt:""}),(0,l._)("div",{class:"border-4 border-red-200 absolute top-10 bottom-10 left-10 right-10 z-0"})])],-1),u={class:"w-full md:w-1/2 px-10"},d={class:"mb-10"},m={class:"font-bold uppercase text-2xl mb-5"},p={class:"text-sm"},g={class:"inline-block align-bottom mr-5"},v=(0,l._)("span",{class:"text-2xl leading-none align-baseline"},"$",-1),f={class:"font-bold text-5xl leading-none align-baseline"},b={class:"align-bottom ml-5"};function x(t,e,a,x,_,w){const h=(0,l.up)("AddToCart");return t.fetching?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("div",r,[(0,l._)("section",n,[t.fetching?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("div",c,[(0,l._)("div",i,[o,(0,l._)("div",u,[(0,l._)("div",d,[(0,l._)("h1",m,(0,s.zw)(t.data.product.name),1),(0,l._)("p",p,(0,s.zw)(t.data.product.description),1)]),(0,l._)("div",null,[(0,l._)("div",g,[v,(0,l._)("span",f,(0,s.zw)(t.data.product.price),1),(0,l._)("span",b,[(0,l.Wm)(h,{slug:t.data.product.slug},null,8,["slug"])])])])])])]))])]))}var _=a(8616),w=a(6121),h=a(2262),k=a(9150),y=a(456);const z=y.ZP`
    query ProductQuery ($slug: String!) {
        product(slug: $slug) {
            id
            name
            slug
            price
            description
        }
    }
`;var q=z,C=a(2119),Z=(0,l.aZ)({components:{AddToCart:_.Z},setup(){const{t:t}=(0,k.QT)(),e=(0,C.tv)(),a=(0,h.iH)(e.currentRoute.value.params.slug),l=(0,w.aM)({query:q,variables:{slug:a.value}});return{t:t,slug:a,fetching:l.fetching,data:l.data,error:l.error}}}),P=a(3744);const T=(0,P.Z)(Z,[["render",x]]);var $=T}}]);
//# sourceMappingURL=526.bca8821c.js.map