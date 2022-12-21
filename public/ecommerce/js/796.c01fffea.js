"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[796],{5103:function(e,r,s){s.d(r,{Z:function(){return b}});var t=s(6252);const a={class:""},o={class:"block text-center"},d={class:"py-3 border-b block"},l=(0,t.Uk)("Edit Profile "),n={class:"py-3 border-b block"},c=(0,t.Uk)(" Addresses "),i={class:"py-3 border-b block"},u=(0,t.Uk)(" Orders "),_=(0,t._)("li",{class:"py-3 border-b block"},[(0,t._)("a",{class:"py-3",href:"#"}," Logout ")],-1);function v(e,r){const s=(0,t.up)("router-link");return(0,t.wg)(),(0,t.iD)("nav",a,[(0,t._)("ul",o,[(0,t._)("li",d,[(0,t.Wm)(s,{to:{name:"account.edit"},class:"py-3"},{default:(0,t.w5)((()=>[l])),_:1},8,["to"])]),(0,t._)("li",n,[(0,t.Wm)(s,{to:{name:"address.index"},class:"py-3"},{default:(0,t.w5)((()=>[c])),_:1},8,["to"])]),(0,t._)("li",i,[(0,t.Wm)(s,{to:{name:"orders.index"},class:"py-3"},{default:(0,t.w5)((()=>[u])),_:1},8,["to"])]),_])])}var f=s(3744);const p={},m=(0,f.Z)(p,[["render",v]]);var b=m},4796:function(e,r,s){s.r(r),s.d(r,{default:function(){return q}});var t=s(6252),a=s(3577);const o={class:""},d={class:"my-5 container mx-auto"},l={class:"bg-white"},n={key:0,class:"flex"},c={class:"w-40 bg-white shadow overflow-hidden sm:rounded-lg text-center"},i={class:"flex-1 ml-5"},u={class:"bg-white shadow overflow-hidden sm:rounded-lg"},_=(0,t._)("div",{class:"px-4 py-5 sm:px-6"},[(0,t._)("div",{class:"flex w-full"},[(0,t._)("h3",{class:"text-lg leading-6 font-medium text-gray-900"}," Orders Information ")])],-1),v={class:"border-t border-gray-200"},f={class:"bg-gray-50 px-4 py-5 flex w-full"};function p(e,r,s,p,m,b){const g=(0,t.up)("account-side-nav");return(0,t.wg)(),(0,t.iD)("div",o,[(0,t._)("div",null,[(0,t._)("div",d,[(0,t._)("div",l,[e.fetching?(0,t.kq)("",!0):((0,t.wg)(),(0,t.iD)("div",n,[(0,t._)("div",c,[(0,t.Wm)(g)]),(0,t._)("div",i,[(0,t._)("div",null,[(0,t._)("div",u,[_,(0,t._)("div",v,[(0,t._)("dl",null,[(0,t._)("div",f,(0,a.zw)(e.data),1)])])])])])]))])])])])}var m=s(6121),b=s(5103),g=s(456);const w=g.ZP`
    query OrderQuery ($order_id : String!){
    order (
        id: $order_id
    ) {
        id
        shipping_option
        payment_option
        order_status_name
        created_at
        updated_at
        }
    }
`;var y=w,h=s(9150),k=s(2119),x=(0,t.aZ)({components:{"account-side-nav":b.Z},setup(){const{t:e}=(0,h.QT)(),r=(0,k.tv)(),s=r.currentRoute.value.params.order;console.log(s);const t=(0,m.aM)({query:y,variables:{order_id:s}});return{t:e,fetching:t.fetching,data:t.data,error:t.error}}}),Z=s(3744);const W=(0,Z.Z)(x,[["render",p]]);var q=W}}]);
//# sourceMappingURL=796.c01fffea.js.map