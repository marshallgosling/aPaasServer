"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[73],{2761:function(t,s,e){var a=e(456);const r=a.ZP`
    query GetCustomer{
        customerQuery {
            id
            first_name
            last_name
            email
            created_at
            updated_at
            addresses {
                id
                type
                first_name
                last_name
                company_name
                phone
                address1
                address2
                city
                state
                postcode
                country_id
                country_name
                created_at
                updated_at
            }
        }
    }
`;s["Z"]=r},5103:function(t,s,e){e.d(s,{Z:function(){return f}});var a=e(6252);const r={class:""},d={class:"block text-center"},c={class:"py-3 border-b block"},l=(0,a.Uk)("Edit Profile "),n={class:"py-3 border-b block"},o=(0,a.Uk)(" Addresses "),m={class:"py-3 border-b block"},i=(0,a.Uk)(" Orders "),u=(0,a._)("li",{class:"py-3 border-b block"},[(0,a._)("a",{class:"py-3",href:"#"}," Logout ")],-1);function _(t,s){const e=(0,a.up)("router-link");return(0,a.wg)(),(0,a.iD)("nav",r,[(0,a._)("ul",d,[(0,a._)("li",c,[(0,a.Wm)(e,{to:{name:"account.edit"},class:"py-3"},{default:(0,a.w5)((()=>[l])),_:1},8,["to"])]),(0,a._)("li",n,[(0,a.Wm)(e,{to:{name:"address.index"},class:"py-3"},{default:(0,a.w5)((()=>[o])),_:1},8,["to"])]),(0,a._)("li",m,[(0,a.Wm)(e,{to:{name:"orders.index"},class:"py-3"},{default:(0,a.w5)((()=>[i])),_:1},8,["to"])]),u])])}var p=e(3744);const g={},y=(0,p.Z)(g,[["render",_]]);var f=y},7073:function(t,s,e){e.r(s),e.d(s,{default:function(){return E}});var a=e(6252),r=e(3577);const d={class:""},c={class:"my-5 container mx-auto"},l={class:"bg-white"},n={key:0,class:"flex"},o={class:"w-40 bg-white shadow overflow-hidden sm:rounded-lg text-center"},m={class:"flex-1 ml-5"},i={class:"bg-white shadow overflow-hidden sm:rounded-lg"},u={class:"px-4 py-5 sm:px-6"},_={class:"flex w-full"},p={class:"text-lg leading-6 font-medium text-gray-900"},g={class:"ml-auto"},y={class:"border-t border-gray-200"},f={class:"bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},v={class:"text-sm font-medium text-gray-500"},x={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},w={class:"bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},b={class:"text-sm font-medium text-gray-500"},h={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},k={class:"bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},z={class:"text-sm font-medium text-gray-500"},Z={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"};function Q(t,s,e,Q,W,U){const q=(0,a.up)("account-side-nav"),C=(0,a.up)("router-link");return(0,a.wg)(),(0,a.iD)("div",d,[(0,a._)("div",null,[(0,a._)("div",c,[(0,a._)("div",l,[t.fetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",n,[(0,a._)("div",o,[(0,a.Wm)(q)]),(0,a._)("div",m,[(0,a._)("div",null,[(0,a._)("div",i,[(0,a._)("div",u,[(0,a._)("div",_,[(0,a._)("h3",p,(0,r.zw)(t.t("personal_information")),1),(0,a._)("div",g,[(0,a.Wm)(C,{to:{name:"account.edit"}},{default:(0,a.w5)((()=>[(0,a.Uk)((0,r.zw)(t.t("edit")),1)])),_:1},8,["to"])])])]),(0,a._)("div",y,[(0,a._)("dl",null,[(0,a._)("div",f,[(0,a._)("dt",v,(0,r.zw)(t.t("first_name")),1),(0,a._)("dd",x,(0,r.zw)(t.data.customerQuery.first_name),1)]),(0,a._)("div",w,[(0,a._)("dt",b,(0,r.zw)(t.t("last_name")),1),(0,a._)("dd",h,(0,r.zw)(t.data.customerQuery.last_name),1)]),(0,a._)("div",k,[(0,a._)("dt",z,(0,r.zw)(t.t("email")),1),(0,a._)("dd",Z,(0,r.zw)(t.data.customerQuery.email),1)])])])])])])]))])])])])}var W=e(6121),U=e(5103),q=e(2761),C=e(9150),D=(0,a.aZ)({components:{"account-side-nav":U.Z},setup(){const t=(0,W.aM)({query:q.Z}),{t:s}=(0,C.QT)();return{t:s,fetching:t.fetching,data:t.data,error:t.error}}}),P=e(3744);const A=(0,P.Z)(D,[["render",Q]]);var E=A}}]);
//# sourceMappingURL=73.13da8f2a.js.map