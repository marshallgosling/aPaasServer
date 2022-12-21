"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[357],{1122:function(e,a,d){var l=d(456);const s=l.ZP`
    query {
        countryOptions {
            label
            value
        }
    }
`;a["Z"]=s},5103:function(e,a,d){d.d(a,{Z:function(){return v}});var l=d(6252);const s={class:""},r={class:"block text-center"},t={class:"py-3 border-b block"},o=(0,l.Uk)("Edit Profile "),i={class:"py-3 border-b block"},n=(0,l.Uk)(" Addresses "),c={class:"py-3 border-b block"},u=(0,l.Uk)(" Orders "),m=(0,l._)("li",{class:"py-3 border-b block"},[(0,l._)("a",{class:"py-3",href:"#"}," Logout ")],-1);function p(e,a){const d=(0,l.up)("router-link");return(0,l.wg)(),(0,l.iD)("nav",s,[(0,l._)("ul",r,[(0,l._)("li",t,[(0,l.Wm)(d,{to:{name:"account.edit"},class:"py-3"},{default:(0,l.w5)((()=>[o])),_:1},8,["to"])]),(0,l._)("li",i,[(0,l.Wm)(d,{to:{name:"address.index"},class:"py-3"},{default:(0,l.w5)((()=>[n])),_:1},8,["to"])]),(0,l._)("li",c,[(0,l.Wm)(d,{to:{name:"orders.index"},class:"py-3"},{default:(0,l.w5)((()=>[u])),_:1},8,["to"])]),m])])}var _=d(3744);const f={},y=(0,_.Z)(f,[["render",p]]);var v=y},6357:function(e,a,d){d.r(a),d.d(a,{default:function(){return ue}});var l=d(6252),s=d(3577),r=d(9963);const t={class:""},o={class:"my-5 container mx-auto"},i={class:"bg-white"},n={key:0,class:"flex"},c={class:"w-40 bg-white shadow overflow-hidden sm:rounded-lg text-center"},u={class:"flex-1 ml-5"},m={class:"bg-white shadow overflow-hidden sm:rounded-lg"},p={class:"px-4 py-5 sm:px-6"},_={class:"flex w-full"},f={class:"text-lg leading-6 font-medium text-gray-900"},y={class:"border-t border-gray-200"},v={class:"bg-gray-50 px-4 py-5"},g={class:"mt-3 flex w-full"},h={class:"block w-full"},b={class:"text-sm w-full text-gray-700"},w={value:"BILLING"},x={value:"SHIPPING"},V={key:0,class:"text-red-500 mt-1 text-sm"},Q={class:"mt-3 flex w-full"},k={class:"w-1/2"},$={class:"w-1/2 ml-3"},E={class:"mt-3 flex w-full"},S={class:"w-1/2"},U={class:"w-1/2 ml-3"},W={class:"mt-3 flex w-full"},Z={class:"w-1/2"},z={class:"w-1/2 ml-3"},D={class:"mt-3 flex w-full"},q={class:"w-1/2"},I={class:"flex ml-3 w-1/2"},O={key:0,class:"w-full"},M={class:"text-sm text-gray-700"},P=["value"],L={key:0,class:"text-red-500 mt-1 text-sm"},A={class:"mt-3 flex w-full"},R={class:"w-1/2"},C={class:"w-1/2 ml-3"},H={class:"px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6"},j={class:"mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"},F={class:"flex justify-center"};function G(e,a,d,G,N,B){const K=(0,l.up)("account-side-nav"),T=(0,l.up)("avored-input"),Y=(0,l.up)("vue-feather");return(0,l.wg)(),(0,l.iD)("div",t,[(0,l._)("div",null,[(0,l._)("div",o,[(0,l._)("div",i,[e.fetching?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("div",n,[(0,l._)("div",c,[(0,l.Wm)(K)]),(0,l._)("div",u,[(0,l._)("div",null,[(0,l._)("div",m,[(0,l._)("div",p,[(0,l._)("div",_,[(0,l._)("h3",f,(0,s.zw)(e.t("save_address_information")),1)])]),(0,l._)("div",y,[(0,l._)("dl",null,[(0,l._)("div",v,[(0,l._)("div",g,[(0,l._)("div",h,[(0,l._)("label",b,(0,s.zw)(e.t("address_type")),1),(0,l.wy)((0,l._)("select",{"onUpdate:modelValue":a[0]||(a[0]=a=>e.address.addressQuery.type=a),class:"w-full px-4 py-2 text-md text-gray-700"},[(0,l._)("option",w,(0,s.zw)(e.t("billing")),1),(0,l._)("option",x,(0,s.zw)(e.t("shipping")),1)],512),[[r.bM,e.address.addressQuery.type]]),e._.get(e.validationErrors,"type.0")?((0,l.wg)(),(0,l.iD)("p",V,(0,s.zw)(e._.get(e.validationErrors,"type.0")),1)):(0,l.kq)("",!0)])]),(0,l._)("div",Q,[(0,l._)("div",k,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.first_name,"onUpdate:modelValue":a[1]||(a[1]=a=>e.address.addressQuery.first_name=a),"field-label":e.t("first_name"),placeholder:e.t("first_name"),"field-error":e._.get(e.validationErrors,"first_name.0"),"field-name":"first_name"},null,8,["modelValue","field-label","placeholder","field-error"])]),(0,l._)("div",$,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.last_name,"onUpdate:modelValue":a[2]||(a[2]=a=>e.address.addressQuery.last_name=a),"field-label":e.t("last_name"),placeholder:e.t("last_name"),"field-error":e._.get(e.validationErrors,"last_name.0"),"field-name":"last_name"},null,8,["modelValue","field-label","placeholder","field-error"])])]),(0,l._)("div",E,[(0,l._)("div",S,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.company_name,"onUpdate:modelValue":a[3]||(a[3]=a=>e.address.addressQuery.company_name=a),"field-label":e.t("company_name"),placeholder:e.t("company_name"),"field-error":e._.get(e.validationErrors,"company_name.0"),"field-name":"company_name"},null,8,["modelValue","field-label","placeholder","field-error"])]),(0,l._)("div",U,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.phone,"onUpdate:modelValue":a[4]||(a[4]=a=>e.address.addressQuery.phone=a),"field-label":e.t("phone"),placeholder:e.t("phone"),"field-error":e._.get(e.validationErrors,"phone.0"),"field-name":"phone"},null,8,["modelValue","field-label","placeholder","field-error"])])]),(0,l._)("div",W,[(0,l._)("div",Z,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.address1,"onUpdate:modelValue":a[5]||(a[5]=a=>e.address.addressQuery.address1=a),"field-label":e.t("address1"),placeholder:e.t("address1"),"field-error":e._.get(e.validationErrors,"address1.0"),"field-name":"address1"},null,8,["modelValue","field-label","placeholder","field-error"])]),(0,l._)("div",z,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.address2,"onUpdate:modelValue":a[6]||(a[6]=a=>e.address.addressQuery.address2=a),"field-label":e.t("address2"),placeholder:e.t("address2"),"field-error":e._.get(e.validationErrors,"address2.0"),"field-name":"address2"},null,8,["modelValue","field-label","placeholder","field-error"])])]),(0,l._)("div",D,[(0,l._)("div",q,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.postcode,"onUpdate:modelValue":a[7]||(a[7]=a=>e.address.addressQuery.postcode=a),"field-label":e.t("postcode"),"field-error":e._.get(e.validationErrors,"postcode.0"),placeholder:e.t("postcode"),"field-name":"postcode"},null,8,["modelValue","field-label","field-error","placeholder"])]),(0,l._)("div",I,[e.countryOptionsResultFetching?(0,l.kq)("",!0):((0,l.wg)(),(0,l.iD)("div",O,[(0,l._)("label",M,(0,s.zw)(e.t("country")),1),(0,l.wy)((0,l._)("select",{"onUpdate:modelValue":a[8]||(a[8]=a=>e.address.addressQuery.country_id=a),class:"w-full p-2 text-md text-gray-700 focus:ring-1 focus:ring-red-600"},[((0,l.wg)(!0),(0,l.iD)(l.HY,null,(0,l.Ko)(e.countryOptionsResult.countryOptions,(e=>((0,l.wg)(),(0,l.iD)("option",{key:e.value,value:e.value},(0,s.zw)(e.label),9,P)))),128))],512),[[r.bM,e.address.addressQuery.country_id]]),e._.get(e.validationErrors,"country_id.0")?((0,l.wg)(),(0,l.iD)("p",L,(0,s.zw)(e._.get(e.validationErrors,"country_id.0")),1)):(0,l.kq)("",!0)]))])]),(0,l._)("div",A,[(0,l._)("div",R,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.state,"onUpdate:modelValue":a[9]||(a[9]=a=>e.address.addressQuery.state=a),"field-label":e.t("state"),"field-error":e._.get(e.validationErrors,"state.0"),placeholder:e.t("state"),"field-name":"state"},null,8,["modelValue","field-label","field-error","placeholder"])]),(0,l._)("div",C,[(0,l.Wm)(T,{modelValue:e.address.addressQuery.city,"onUpdate:modelValue":a[10]||(a[10]=a=>e.address.addressQuery.city=a),"field-label":e.t("city"),"field-error":e._.get(e.validationErrors,"city.0"),placeholder:e.t("city"),"field-name":"city"},null,8,["modelValue","field-label","field-error","placeholder"])])])])])]),(0,l._)("div",H,[(0,l._)("dd",j,[(0,l._)("button",{onClick:a[11]||(a[11]=(...a)=>e.handleSubmit&&e.handleSubmit(...a)),class:"bg-red-500 block font-semibold hover:bg-red-600 py-3 text-sm text-white uppercase w-full"},[(0,l._)("span",F,[(0,l.Wm)(Y,{class:"mr-5",type:"save"}),(0,l.Uk)(" "+(0,s.zw)(e.t("save_address")),1)])])])])])])])]))])])])])}var N=d(2262),B=d(6121),K=d(3653),T=d(5103),Y=d(9150),J=d(1122),X=d(456);const ee=X.ZP`
    mutation UpdateAddressMutation (
        $id: String!
        $type : String!
        $first_name: String!
        $last_name: String!
        $company_name: String
        $address1: String!
        $address2: String!
        $phone: String
        $city: String!
        $state: String!
        $postcode: String!
        $country_id: String!
    ) {
        updateAddress (
            id: $id
            type: $type
            first_name:$first_name
            last_name: $last_name
            company_name: $company_name
            address1: $address1
            phone: $phone
            address2: $address2
            postcode: $postcode
            city: $city
            state: $state
            country_id: $country_id
        ) {

            id
            customer_id
            type
        }
    }
`;var ae=ee,de=d(2801),le=d(2119);const se=X.ZP`
    query AddressQuery (
        $addressId : String!
    ){
        addressQuery(
            id: $addressId 
        ) {
            id
            type
            first_name
            last_name
            company_name
            phone
            address1
            address2
            state
            city
            postcode
            country_id
            created_at
            updated_at
        }
    }

`;var re=se,te=d(6486),oe=d.n(te),ie=(0,l.aZ)({components:{"avored-input":K.Z,"account-side-nav":T.Z,"vue-feather":de.Z},setup(){const{t:e}=(0,Y.QT)(),a=(0,le.tv)(),d=(0,le.yj)(),l=(0,N.iH)({}),s=d.params.id,r=(0,B.aM)({query:re,variables:{addressId:s}}),t=r.data,o=()=>{i.executeMutation(t.value.addressQuery).then((e=>{"validation"===oe().get(e,"error.graphQLErrors.0.extensions.category")?l.value=oe().get(e,"error.graphQLErrors.0.extensions.validation"):a.push({name:"account"})}))},i=(0,B.Db)(ae),n=(0,B.aM)({query:J.Z});return{t:e,_:oe(),validationErrors:l,address:r.data,handleSubmit:o,countryOptionsResult:n.data,countryOptionsResultFetching:n.fetching,fetching:r.fetching}}}),ne=d(3744);const ce=(0,ne.Z)(ie,[["render",G]]);var ue=ce}}]);
//# sourceMappingURL=357.50973f50.js.map