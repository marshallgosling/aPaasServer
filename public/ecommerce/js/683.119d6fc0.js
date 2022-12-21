"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[683],{2761:function(e,t,a){var s=a(456);const l=s.ZP`
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
`;t["Z"]=l},5103:function(e,t,a){a.d(t,{Z:function(){return g}});var s=a(6252);const l={class:""},r={class:"block text-center"},d={class:"py-3 border-b block"},n=(0,s.Uk)("Edit Profile "),i={class:"py-3 border-b block"},u=(0,s.Uk)(" Addresses "),o={class:"py-3 border-b block"},m=(0,s.Uk)(" Orders "),c=(0,s._)("li",{class:"py-3 border-b block"},[(0,s._)("a",{class:"py-3",href:"#"}," Logout ")],-1);function p(e,t){const a=(0,s.up)("router-link");return(0,s.wg)(),(0,s.iD)("nav",l,[(0,s._)("ul",r,[(0,s._)("li",d,[(0,s.Wm)(a,{to:{name:"account.edit"},class:"py-3"},{default:(0,s.w5)((()=>[n])),_:1},8,["to"])]),(0,s._)("li",i,[(0,s.Wm)(a,{to:{name:"address.index"},class:"py-3"},{default:(0,s.w5)((()=>[u])),_:1},8,["to"])]),(0,s._)("li",o,[(0,s.Wm)(a,{to:{name:"orders.index"},class:"py-3"},{default:(0,s.w5)((()=>[m])),_:1},8,["to"])]),c])])}var f=a(3744);const _={},v=(0,f.Z)(_,[["render",p]]);var g=v},3653:function(e,t,a){a.d(t,{Z:function(){return c}});var s=a(6252),l=a(3577);const r={key:0,class:"text-sm text-gray-700"},d=["placeholder","name","type","disabled","value"],n={class:"text-red-500 mt-1 text-sm"};function i(e,t,a,i,u,o){return(0,s.wg)(),(0,s.iD)("div",null,[e.fieldLabel?((0,s.wg)(),(0,s.iD)("label",r,(0,l.zw)(e.fieldLabel),1)):(0,s.kq)("",!0),(0,s._)("input",{ref:"input",placeholder:e.placeholder,name:e.fieldName,type:e.fieldType,disabled:e.isDisabled,class:(0,l.C_)([e.customClass,"avored-input"]),value:e.value,onChange:t[0]||(t[0]=(...t)=>e.change&&e.change(...t))},null,42,d),(0,s._)("p",n,(0,l.zw)(e.fieldError),1)])}var u=(0,s.aZ)({props:{fieldLabel:{type:String,default:"",required:!1},fieldError:{type:String,default:"",required:!1},isDisabled:{type:Boolean,default:!1,required:!1},fieldName:{type:String,default:"",required:!1},fieldType:{type:String,default:"text",required:!1},customClass:{type:String,default:"text",required:!1},placeholder:{type:String,default:"text",required:!1},modelValue:{default:"",required:!1}},emits:["update:modelValue"],data(){return{value:NaN}},watch:{modelValue:{immediate:!0,handler(e){this.setValue(e)}}},methods:{change(e){this.setValue(e.target.value)},setValue(e){const t=this.value;let a=e;this.value=a,a===t&&(this.$refs.input.value=String(a)),this.$emit("update:modelValue",a,t)}}}),o=a(3744);const m=(0,o.Z)(u,[["render",i]]);var c=m},7683:function(e,t,a){a.r(t),a.d(t,{default:function(){return P}});var s=a(6252),l=a(3577);const r={class:""},d={class:"my-5 container mx-auto"},n={class:"bg-white"},i={key:0,class:"flex"},u={class:"w-40 bg-white shadow overflow-hidden sm:rounded-lg text-center"},o={class:"flex-1 ml-5"},m={class:"bg-white shadow overflow-hidden sm:rounded-lg"},c={class:"px-4 py-5 sm:px-6"},p={class:"flex w-full"},f={class:"text-lg leading-6 font-medium text-gray-900"},_={class:"border-t border-gray-200"},v={class:"px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},g={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},y={class:"px-4J py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},b={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},h={class:"px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},x={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},w={class:"px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},k={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},Z={class:"flex justify-center"};function V(e,t,a,V,q,S){const C=(0,s.up)("account-side-nav"),Q=(0,s.up)("avored-input"),D=(0,s.up)("vue-feather");return(0,s.wg)(),(0,s.iD)("div",r,[(0,s._)("div",null,[(0,s._)("div",d,[(0,s._)("div",n,[e.fetching?(0,s.kq)("",!0):((0,s.wg)(),(0,s.iD)("div",i,[(0,s._)("div",u,[(0,s.Wm)(C)]),(0,s._)("div",o,[(0,s._)("div",null,[(0,s._)("div",m,[(0,s._)("div",c,[(0,s._)("div",p,[(0,s._)("h3",f,(0,l.zw)(e.t("edit"))+" "+(0,l.zw)(e.t("personal_information")),1)])]),(0,s._)("div",_,[(0,s._)("dl",null,[(0,s._)("div",v,[(0,s._)("dd",g,[(0,s.Wm)(Q,{"field-label":e.t("first_name"),modelValue:e.data.customerQuery.first_name,"onUpdate:modelValue":t[0]||(t[0]=t=>e.data.customerQuery.first_name=t)},null,8,["field-label","modelValue"])])]),(0,s._)("div",y,[(0,s._)("dd",b,[(0,s.Wm)(Q,{"field-label":e.t("last_name"),modelValue:e.data.customerQuery.last_name,"onUpdate:modelValue":t[1]||(t[1]=t=>e.data.customerQuery.last_name=t)},null,8,["field-label","modelValue"])])]),(0,s._)("div",h,[(0,s._)("dd",x,[(0,s.Wm)(Q,{"field-label":"Email Address","model-value":e.data.customerQuery.email,"is-disabled":!0},null,8,["model-value"])])]),(0,s._)("div",w,[(0,s._)("dd",k,[(0,s._)("button",{onClick:t[2]||(t[2]=(...t)=>e.handleSubmit&&e.handleSubmit(...t)),class:"bg-red-500 block font-semibold hover:bg-red-600 py-3 text-sm text-white uppercase w-full"},[(0,s._)("span",Z,[(0,s.Wm)(D,{class:"mr-5",type:"shopping-cart"}),(0,s.Uk)(" "+(0,l.zw)(e.t("update_profile")),1)])])])])])])])])])]))])])])])}var q=a(456);const S=q.ZP`
    mutation CustomerEditMutation(
        $first_name: String!,
        $last_name: String!,
    ) {
        customerUpdate(   
            first_name: $first_name,
            last_name: $last_name
        )  {
            first_name
            last_name
        }
    }
`;var C=S,Q=a(2761),D=a(3653),W=a(5103),U=a(6121),$=a(9150),z=a(2119),E=a(2801),L=(0,s.aZ)({components:{"avored-input":D.Z,"account-side-nav":W.Z,"vue-feather":E.Z},setup(){const{t:e}=(0,$.QT)(),t=(0,z.tv)(),a=(0,U.Db)(C),s=()=>{let e={first_name:l.data.value.customerQuery.first_name,last_name:l.data.value.customerQuery.last_name};a.executeMutation(e).then((e=>{console.log(e),t.push({name:"account"})}))},l=(0,U.aM)({query:Q.Z});return{t:e,handleSubmit:s,fetching:l.fetching,data:l.data,error:l.error}}}),N=a(3744);const M=(0,N.Z)(L,[["render",V]]);var P=M}}]);
//# sourceMappingURL=683.119d6fc0.js.map