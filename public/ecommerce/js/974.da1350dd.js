"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[974],{5103:function(e,s,a){a.d(s,{Z:function(){return v}});var t=a(6252);const l={class:""},d={class:"block text-center"},r={class:"py-3 border-b block"},n=(0,t.Uk)("Edit Profile "),o={class:"py-3 border-b block"},c=(0,t.Uk)(" Addresses "),i={class:"py-3 border-b block"},u=(0,t.Uk)(" Orders "),_=(0,t._)("li",{class:"py-3 border-b block"},[(0,t._)("a",{class:"py-3",href:"#"}," Logout ")],-1);function p(e,s){const a=(0,t.up)("router-link");return(0,t.wg)(),(0,t.iD)("nav",l,[(0,t._)("ul",d,[(0,t._)("li",r,[(0,t.Wm)(a,{to:{name:"account.edit"},class:"py-3"},{default:(0,t.w5)((()=>[n])),_:1},8,["to"])]),(0,t._)("li",o,[(0,t.Wm)(a,{to:{name:"address.index"},class:"py-3"},{default:(0,t.w5)((()=>[c])),_:1},8,["to"])]),(0,t._)("li",i,[(0,t.Wm)(a,{to:{name:"orders.index"},class:"py-3"},{default:(0,t.w5)((()=>[u])),_:1},8,["to"])]),_])])}var m=a(3744);const w={},f=(0,m.Z)(w,[["render",p]]);var v=f},3974:function(e,s,a){a.r(s),a.d(s,{default:function(){return q}});var t=a(6252),l=a(3577);const d={class:""},r={class:"my-5 container mx-auto"},n={class:"bg-white"},o={key:0,class:"flex"},c={class:"w-40 bg-white shadow overflow-hidden sm:rounded-lg text-center"},i={class:"flex-1 ml-5"},u={class:"bg-white shadow overflow-hidden sm:rounded-lg"},_={class:"px-4 py-5 sm:px-6"},p={class:"flex w-full"},m={class:"text-lg leading-6 font-medium text-gray-900"},w={class:"ml-auto"},f={class:"border-t border-gray-200"},v={class:"bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-2 sm:gap-4 sm:px-6"},y={class:"flex p-3 mb-5 border-b"},b={class:"ml-auto"};function g(e,s,a,g,k,h){const x=(0,t.up)("account-side-nav"),z=(0,t.up)("router-link");return(0,t.wg)(),(0,t.iD)("div",d,[(0,t._)("div",null,[(0,t._)("div",r,[(0,t._)("div",n,[e.fetching?(0,t.kq)("",!0):((0,t.wg)(),(0,t.iD)("div",o,[(0,t._)("div",c,[(0,t.Wm)(x)]),(0,t._)("div",i,[(0,t._)("div",null,[(0,t._)("div",u,[(0,t._)("div",_,[(0,t._)("div",p,[(0,t._)("h3",m,(0,l.zw)(e.t("address_information")),1),(0,t._)("div",w,[(0,t.Wm)(z,{to:{name:"address.create"}},{default:(0,t.w5)((()=>[(0,t.Uk)((0,l.zw)(e.t("create")),1)])),_:1},8,["to"])])])]),(0,t._)("div",f,[(0,t._)("dl",null,[(0,t._)("div",v,[((0,t.wg)(!0),(0,t.iD)(t.HY,null,(0,t.Ko)(e.data.allAddress,(s=>((0,t.wg)(),(0,t.iD)("div",{class:"border p-5 w-full",key:s.id},[(0,t._)("div",y,[(0,t._)("span",null,(0,l.zw)(s.type),1),(0,t._)("span",b,[(0,t.Wm)(z,{to:{name:"address.update",params:{id:s.id}}},{default:(0,t.w5)((()=>[(0,t.Uk)((0,l.zw)(e.t("edit")),1)])),_:2},1032,["to"])])]),(0,t._)("p",null,(0,l.zw)(s.first_name)+" "+(0,l.zw)(s.last_name),1),(0,t._)("p",null,(0,l.zw)(s.company_name)+" "+(0,l.zw)(s.phone),1),(0,t._)("p",null,(0,l.zw)(s.address1)+", ",1),(0,t._)("p",null,(0,l.zw)(s.address2),1),(0,t._)("p",null,(0,l.zw)(s.city),1),(0,t._)("p",null,(0,l.zw)(s.state)+" "+(0,l.zw)(s.postcode),1)])))),128))])])])])])])]))])])])])}var k=a(6121),h=a(5103),x=a(9150),z=a(456);const W=z.ZP`
    query AddressAllQuery {
        allAddress {
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
                created_at
                updated_at
        }
    }
`;var Z=W,A=(0,t.aZ)({components:{"account-side-nav":h.Z},setup(){const{t:e}=(0,x.QT)(),s=(0,k.aM)({query:Z});return{t:e,fetching:s.fetching,data:s.data,error:s.error}}}),D=a(3744);const U=(0,D.Z)(A,[["render",g]]);var q=U}}]);
//# sourceMappingURL=974.da1350dd.js.map