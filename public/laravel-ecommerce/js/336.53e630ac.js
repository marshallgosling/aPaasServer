"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[336],{8798:function(t,e,s){var a=s(456);const l=a.ZP`
    query CartItemAllQuery (
        $visitor_id: String!
    ) {
        cartItems (
            visitor_id: $visitor_id
        ) {
                visitor_id
                product_id
                product {
                    id
                    name
                    slug
                    price
                    main_image_url
                }
                qty
        }
    }
`;e["Z"]=l},4336:function(t,e,s){s.r(e),s.d(e,{default:function(){return X}});var a=s(6252),l=s(3577),r=s(9963);const o={key:0,class:""},c={class:"flex shadow-md my-10"},i={class:"w-3/4 bg-white px-10 py-10"},n={class:"flex justify-between border-b pb-8"},d={class:"font-semibold text-2xl"},u={class:"font-semibold text-2xl"},m={class:"flex mt-10 mb-5"},p={class:"font-semibold text-gray-600 text-xs uppercase w-2/5"},g={class:"font-semibold text-center text-gray-600 text-xs uppercase w-1/5"},_={class:"font-semibold text-center text-gray-600 text-xs uppercase w-1/5"},x={class:"font-semibold text-center text-gray-600 text-xs uppercase w-1/5"},v={class:"flex w-2/5"},f={class:"w-20"},w=["src"],h={class:"flex flex-col justify-between ml-4 flex-grow"},y={class:"font-bold text-sm"},b=["onClick"],z={class:"flex justify-center w-1/5"},C=(0,a._)("svg",{class:"fill-current text-gray-600 w-3",viewBox:"0 0 448 512"},[(0,a._)("path",{d:"M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"})],-1),k=["onUpdate:modelValue","onChange"],I=(0,a._)("svg",{class:"fill-current text-gray-600 w-3",viewBox:"0 0 448 512"},[(0,a._)("path",{d:"M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"})],-1),$={class:"text-center w-1/5 font-semibold text-sm"},q={class:"text-center w-1/5 font-semibold text-sm"},D=(0,a._)("svg",{class:"fill-current mr-2 text-indigo-600 w-4",viewBox:"0 0 448 512"},[(0,a._)("path",{d:"M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"})],-1),S={id:"summary",class:"w-1/4 px-8 py-10"},M={class:"font-semibold text-2xl border-b pb-8"},Z={class:"flex justify-between mt-10 mb-5"},j={class:"font-semibold text-sm uppercase"},H={class:"font-semibold text-sm"},T={class:"border-t mt-8"},U={class:"flex font-semibold justify-between py-6 text-sm uppercase"},V=(0,a._)("span",null,"Total cost",-1),O={class:"flex justify-center"};function B(t,e,s,B,P,W){const F=(0,a.up)("router-link"),Q=(0,a.up)("vue-feather");return t.fetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",o,[(0,a._)("div",c,[(0,a._)("div",i,[(0,a._)("div",n,[(0,a._)("h1",d,(0,l.zw)(t.t("shopping_cart")),1),(0,a._)("h2",u,[(0,a._)("span",null,(0,l.zw)(t.data.cartItems.length)+" "+(0,l.zw)(t.t("items")),1)])]),(0,a._)("div",m,[(0,a._)("h3",p,(0,l.zw)(t.t("product_details")),1),(0,a._)("h3",g,(0,l.zw)(t.t("quantity")),1),(0,a._)("h3",_,(0,l.zw)(t.t("price")),1),(0,a._)("h3",x,(0,l.zw)(t.t("total")),1)]),(0,a._)("div",null,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(t.data.cartItems,((e,s)=>((0,a.wg)(),(0,a.iD)("div",{key:`category-link-${s}`,class:"flex items-center hover:bg-gray-100 -mx-8 px-6 py-5"},[(0,a._)("div",v,[(0,a._)("div",f,[(0,a._)("img",{class:"h-24",src:e.product.main_image_url,alt:""},null,8,w)]),(0,a._)("div",h,[(0,a._)("span",y,(0,l.zw)(e.product.name),1),(0,a._)("button",{type:"button",onClick:(0,r.iM)((s=>t.deleteCartItemOnClick(e.product.slug)),["prevent"]),class:"font-semibold hover:text-red-500 text-gray-500 text-xs"},(0,l.zw)(t.t("remove")),9,b)])]),(0,a._)("div",z,[C,(0,a.wy)((0,a._)("input",{class:"mx-2 border text-center w-8",type:"text","onUpdate:modelValue":t=>e.qty=t,onChange:s=>t.updateCartItemOnChange(e.product.slug,e.qty)},null,40,k),[[r.nr,e.qty]]),I]),(0,a._)("span",$,"$"+(0,l.zw)(e.product.price),1),(0,a._)("span",q,"$"+(0,l.zw)(e.product.price*e.qty),1)])))),128))]),(0,a.Wm)(F,{to:{name:"home"},class:"flex font-semibold text-indigo-600 text-sm mt-10"},{default:(0,a.w5)((()=>[D,(0,a.Uk)(" "+(0,l.zw)(t.t("continue_shopping")),1)])),_:1})]),(0,a._)("div",S,[(0,a._)("h1",M,(0,l.zw)(t.t("order_summary")),1),(0,a._)("div",Z,[(0,a._)("span",j,"Items "+(0,l.zw)(t.data.cartItems.length),1),(0,a._)("span",H,"$ "+(0,l.zw)(t.getTotal(t.data.cartItems)),1)]),(0,a._)("div",T,[(0,a._)("div",U,[V,(0,a._)("span",null,"$"+(0,l.zw)(t.getTotal(t.data.cartItems)),1)])]),(0,a.Wm)(F,{to:{name:"checkout"},class:"bg-red-500 block font-semibold hover:bg-red-600 py-3 text-sm text-white uppercase w-full"},{default:(0,a.w5)((()=>[(0,a._)("span",O,[(0,a.Wm)(Q,{class:"mr-5",type:"shopping-cart"}),(0,a.Uk)(" "+(0,l.zw)(t.t("checkout")),1)])])),_:1})])])]))}var P=s(8798),W=s(2801),F=s(6121),Q=s(9150),A=s(9733),E=s(456);const K=E.ZP`
    mutation DeleteCartMutation (
        $slug: String!
        $visitor_id: String!
    ) {
        deleteCart(
            slug: $slug
            visitor_id: $visitor_id
        ) {
            visitor_id
        }
    }
`;var L=K;const Y=E.ZP`
    mutation UpdateCartMutation (
        $slug: String!
        $visitor_id: String!
        $qty: Float!
    ) {
        updateCart(
            slug: $slug
            visitor_id: $visitor_id
            qty: $qty
        ) {
            visitor_id
            product_id
            qty
        }
    }
`;var G=Y,J=(0,a.aZ)({components:{"vue-feather":W.Z},setup(){const{t:t}=(0,Q.QT)();var e={},s={},a={};const l=(0,F.Db)(L),r=(0,F.Db)(G);localStorage.getItem(A.De)&&(e={visitor_id:localStorage.getItem(A.De)});const o=(0,F.aM)({query:P.Z,variables:e}),c=t=>{var e=0;return t.forEach((t=>{e+=t.product.price*t.qty})),e},i=t=>{localStorage.getItem(A.De)&&(s={visitor_id:localStorage.getItem(A.De),slug:t},l.executeMutation(s).then((t=>{console.log(t)})))},n=(t,e)=>{localStorage.getItem(A.De)&&(a={visitor_id:localStorage.getItem(A.De),slug:t,qty:parseFloat(e)},console.log(a),r.executeMutation(a).then((t=>{console.log(t)})))};return{t:t,getTotal:c,fetching:o.fetching,data:o.data,error:o.error,deleteCartItemOnClick:i,updateCartItemOnChange:n}}}),N=s(3744);const R=(0,N.Z)(J,[["render",B]]);var X=R}}]);
//# sourceMappingURL=336.53e630ac.js.map