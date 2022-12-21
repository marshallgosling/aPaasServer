"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[419],{8798:function(e,l,s){var a=s(456);const i=a.ZP`
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
`;l["Z"]=i},1122:function(e,l,s){var a=s(456);const i=a.ZP`
    query {
        countryOptions {
            label
            value
        }
    }
`;l["Z"]=i},2761:function(e,l,s){var a=s(456);const i=a.ZP`
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
`;l["Z"]=i},6419:function(e,l,s){s.r(l),s.d(l,{default:function(){return fl}});var a=s(6252),i=s(3577),t=s(9963);const r={class:"container mx-auto"},d={class:"text-2xl text-red-700 font-semibold my-5"},n={class:"flex"},o={key:0,class:"w-1/2"},p={class:"text-lg text-red-700 font-semibold my-5"},c={key:0,class:"bg-white p-5 border-2 border-blue-600 rounded-lg"},m={class:"flex w-full"},u={class:"text-xl"},_={class:"text-xl ml-3"},g={class:"w-full mt-2 flex"},f={class:"text-sm text-gray-500"},h={key:1,class:"flex item-center w-full"},y={class:"flex items-center"},v={class:"w-1/2"},b={class:"mt-3 flex w-full"},w={class:"w-1/2 ml-3"},V={class:"mt-3 flex w-full"},x={class:"flex items-center"},A={class:"w-full"},k={class:"flex items-center"},$={class:"w-1/2"},D={class:"w-1/2 ml-3"},E={class:"text-lg text-red-700 font-semibold my-5"},S={key:0},U={class:"flex"},z={class:"w-1/2"},W={class:"w-1/2 ml-3"},q={class:"flex items-center"},H={class:"w-1/2"},O={class:"w-1/2 ml-3"},Q={class:"flex items-center"},Z={class:"w-1/2"},I={class:"w-1/2 ml-3"},M={class:"flex items-center"},P={key:0,class:"w-1/2"},L={class:"text-sm text-gray-700"},R=["value"],C={key:0,class:"text-red-500 mt-1 text-sm"},F={class:"w-1/2 ml-3"},G={class:"flex items-center"},B={class:"w-1/2"},j={class:"w-1/2 ml-3"},K={class:"text-lg text-red-700 font-semibold my-5"},Y={key:0},N={class:"flex"},T={class:"w-1/2"},J={class:"w-1/2 ml-3"},X={class:"flex items-center"},ee={class:"w-1/2"},le={class:"w-1/2 ml-3"},se={class:"flex items-center"},ae={class:"w-1/2"},ie={class:"w-1/2 ml-3"},te={class:"flex items-center"},re={key:0,class:"w-1/2"},de={class:"text-sm text-gray-700"},ne=["value"],oe={key:0,class:"text-red-500 mt-1 text-sm"},pe={class:"w-1/2 ml-3"},ce={class:"flex items-center"},me={class:"w-1/2"},ue={class:"w-1/2 ml-3"},_e={class:"w-1/2 ml-3"},ge={class:"text-lg text-red-700 font-semibold my-5"},fe={class:"mt-6"},he={key:0,class:"mt-6"},ye={class:"flex items-center"},ve={class:"ml-2 text-sm text-gray-700"},be=(0,a._)("span",{class:"text-gray-600 text-sm"},null,-1),we={class:"mt-8"},Ve={class:"text-lg text-red-700 font-semibold my-5"},xe={key:0,class:"mt-6"},Ae={class:"flex items-center"},ke={class:"ml-2 text-sm text-gray-700"},$e=(0,a._)("span",{class:"text-gray-600 text-sm"},null,-1),De={class:"mt-8"},Ee={class:"text-lg text-red-700 font-semibold my-5"},Se={key:0,class:"mt-5 ml-3"},Ue={class:"flex w-2/5"},ze={class:"w-20"},We=["src","alt"],qe={class:"flex flex-col justify-between ml-4 flex-grow"},He={class:"font-bold text-sm"},Oe=(0,a._)("a",{href:"#",class:"font-semibold hover:text-red-500 text-gray-500 text-xs"},"Remove",-1),Qe={class:"flex justify-center w-1/5"},Ze=(0,a._)("svg",{class:"fill-current text-gray-600 w-3",viewBox:"0 0 448 512"},[(0,a._)("path",{d:"M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"})],-1),Ie=["value"],Me=(0,a._)("svg",{class:"fill-current text-gray-600 w-3",viewBox:"0 0 448 512"},[(0,a._)("path",{d:"M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"})],-1),Pe={class:"text-center w-1/5 font-semibold text-sm"},Le={class:"text-center w-1/5 font-semibold text-sm"},Re={type:"submit",class:"px-3 mt-8 ml-5 py-1 bg-red-500 text-white text-sm font-semibold leading-10 rounded"};function Ce(e,l,s,Ce,Fe,Ge){const Be=(0,a.up)("avored-input"),je=(0,a.up)("VueFeather");return(0,a.wg)(),(0,a.iD)("div",r,[(0,a._)("h1",d,(0,i.zw)(e.t("checkout_page")),1),(0,a._)("form",{onSubmit:l[27]||(l[27]=(0,t.iM)(((...l)=>e.handleSubmit&&e.handleSubmit(...l)),["prevent"])),id:"checkout-form",method:"post",action:"#"},[(0,a._)("div",n,[e.fetchingCustomer?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",o,[(0,a._)("h4",p,(0,i.zw)(e.t("personal_information")),1),(0,a._)("div",null,[e.fetchingCustomer?((0,a.wg)(),(0,a.iD)("div",h,[(0,a._)("div",y,[(0,a._)("div",v,[(0,a._)("div",b,[(0,a.Wm)(Be,{"field-label":e.t("first_name"),placeholder:e.t("first_name"),"field-error":e._.get(e.customerValidationErrors,"first_name.0"),modelValue:e.user.first_name,"onUpdate:modelValue":l[0]||(l[0]=l=>e.user.first_name=l),"field-name":"first_name"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",w,[(0,a._)("div",V,[(0,a.Wm)(Be,{"field-label":e.t("last_name"),placeholder:e.t("last_name"),"field-error":e._.get(e.customerValidationErrors,"last_name.0"),modelValue:e.user.last_name,"onUpdate:modelValue":l[1]||(l[1]=l=>e.user.last_name=l)},null,8,["field-label","placeholder","field-error","modelValue"])])])]),(0,a._)("div",x,[(0,a._)("div",A,[(0,a.Wm)(Be,{"field-label":e.t("email"),placeholder:e.t("email"),"field-error":e._.get(e.customerValidationErrors,"email.0"),modelValue:e.user.email,"onUpdate:modelValue":l[2]||(l[2]=l=>e.user.email=l)},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",k,[(0,a._)("div",$,[(0,a.Wm)(Be,{"field-label":e.t("password"),placeholder:e.t("password"),"field-error":e._.get(e.customerValidationErrors,"password.0"),modelValue:e.user.password,"onUpdate:modelValue":l[3]||(l[3]=l=>e.user.password=l),"field-type":"password"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",D,[(0,a.Wm)(Be,{"field-label":e.t("password_confirmation"),placeholder:e.t("password_confirmation"),"field-error":e._.get(e.customerValidationErrors,"password_confirmation.0"),modelValue:e.user.password_confirmation,"onUpdate:modelValue":l[4]||(l[4]=l=>e.user.password_confirmation=l),"field-type":"password"},null,8,["field-label","placeholder","field-error","modelValue"])])])])):((0,a.wg)(),(0,a.iD)("div",c,[(0,a._)("div",m,[(0,a._)("span",u,(0,i.zw)(e._.get(e.customerData,"customerQuery.first_name")),1),(0,a._)("span",_,(0,i.zw)(e._.get(e.customerData,"customerQuery.last_name")),1)]),(0,a._)("div",g,[(0,a._)("span",f,(0,i.zw)(e._.get(e.customerData,"customerQuery.email")),1)])]))]),(0,a._)("h4",E,(0,i.zw)(e.t("shipping_address")),1),(0,a._)("div",null,[e.setShippingAddress(e._.get(e.customerData,"customerQuery.addresses"))?((0,a.wg)(),(0,a.iD)("div",S,[(0,a._)("div",U,[(0,a._)("div",z,[(0,a.Wm)(Be,{"field-label":e.t("first_name"),placeholder:e.t("first_name"),"field-error":e._.get(e.shippingAddressValidationErrors,"first_name.0"),modelValue:e.shippingAddress.first_name,"onUpdate:modelValue":l[5]||(l[5]=l=>e.shippingAddress.first_name=l)},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",W,[(0,a.Wm)(Be,{"field-label":e.t("last_name"),placeholder:e.t("last_name"),"field-error":e._.get(e.shippingAddressValidationErrors,"last_name.0"),modelValue:e.shippingAddress.last_name,"onUpdate:modelValue":l[6]||(l[6]=l=>e.shippingAddress.last_name=l),"field-name":"shipping[last_name]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",q,[(0,a._)("div",H,[(0,a.Wm)(Be,{"field-label":e.t("company_name"),placeholder:e.t("company_name"),"field-error":e._.get(e.shippingAddressValidationErrors,"company_name.0"),modelValue:e.shippingAddress.company_name,"onUpdate:modelValue":l[7]||(l[7]=l=>e.shippingAddress.company_name=l),"field-name":"shipping[company_name]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",O,[(0,a.Wm)(Be,{"field-label":e.t("phone"),placeholder:e.t("phone"),"field-error":e._.get(e.shippingAddressValidationErrors,"phone.0"),modelValue:e.shippingAddress.phone,"onUpdate:modelValue":l[8]||(l[8]=l=>e.shippingAddress.phone=l),"field-name":"shipping[phone]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",Q,[(0,a._)("div",Z,[(0,a.Wm)(Be,{"field-label":e.t("address1"),placeholder:e.t("address1"),"field-error":e._.get(e.shippingAddressValidationErrors,"address1.0"),modelValue:e.shippingAddress.address1,"onUpdate:modelValue":l[9]||(l[9]=l=>e.shippingAddress.address1=l),"field-name":"shipping[address1]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",I,[(0,a.Wm)(Be,{"field-label":e.t("address2"),placeholder:e.t("address2"),"field-error":e._.get(e.shippingAddressValidationErrors,"address2.0"),modelValue:e.shippingAddress.address2,"onUpdate:modelValue":l[10]||(l[10]=l=>e.shippingAddress.address2=l),"field-name":"shipping[address2]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",M,[e.countryOptionsResultFetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",P,[(0,a._)("label",L,(0,i.zw)(e.t("country")),1),(0,a.wy)((0,a._)("select",{"onUpdate:modelValue":l[11]||(l[11]=l=>e.shippingAddress.country_id=l),class:"w-full p-2 text-md text-gray-700 focus:ring-1 focus:ring-red-600"},[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.countryOptionsResult.countryOptions,(e=>((0,a.wg)(),(0,a.iD)("option",{key:e.value,value:e.value},(0,i.zw)(e.label),9,R)))),128))],512),[[t.bM,e.shippingAddress.country_id]]),e._.get(e.shippingAddressValidationErrors,"country_id.0")?((0,a.wg)(),(0,a.iD)("p",C,(0,i.zw)(e._.get(e.shippingAddressValidationErrors,"country_id.0")),1)):(0,a.kq)("",!0)])),(0,a._)("div",F,[(0,a.Wm)(Be,{"field-label":e.t("state"),placeholder:e.t("state"),"field-error":e._.get(e.shippingAddressValidationErrors,"state.0"),modelValue:e.shippingAddress.state,"onUpdate:modelValue":l[12]||(l[12]=l=>e.shippingAddress.state=l),"field-name":"shipping[state]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",G,[(0,a._)("div",B,[(0,a.Wm)(Be,{"field-label":e.t("postcode"),placeholder:e.t("postcode"),"field-error":e._.get(e.shippingAddressValidationErrors,"postcode.0"),modelValue:e.shippingAddress.postcode,"onUpdate:modelValue":l[13]||(l[13]=l=>e.shippingAddress.postcode=l),"field-name":"shipping[postcode]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",j,[(0,a.Wm)(Be,{"field-label":e.t("city"),placeholder:e.t("city"),"field-error":e._.get(e.shippingAddressValidationErrors,"city.0"),modelValue:e.shippingAddress.city,"onUpdate:modelValue":l[14]||(l[14]=l=>e.shippingAddress.city=l),"field-name":"shipping[city]"},null,8,["field-label","placeholder","field-error","modelValue"])])])])):(0,a.kq)("",!0)]),(0,a._)("h4",K,(0,i.zw)(e.t("billing_address")),1),(0,a._)("div",null,[e.setBillingAddress(e._.get(e.customerData,"customerQuery.addresses"))?((0,a.wg)(),(0,a.iD)("div",Y,[(0,a._)("div",N,[(0,a._)("div",T,[(0,a.Wm)(Be,{"field-label":e.t("first_name"),placeholder:e.t("first_name"),"field-error":e._.get(e.billingAddressValidationErrors,"first_name.0"),modelValue:e.billingAddress.first_name,"onUpdate:modelValue":l[15]||(l[15]=l=>e.billingAddress.first_name=l),"field-name":"shipping[first_name]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",J,[(0,a.Wm)(Be,{"field-label":e.t("last_name"),placeholder:e.t("last_name"),"field-error":e._.get(e.billingAddressValidationErrors,"last_name.0"),modelValue:e.billingAddress.last_name,"onUpdate:modelValue":l[16]||(l[16]=l=>e.billingAddress.last_name=l),"field-name":"shipping[last_name]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",X,[(0,a._)("div",ee,[(0,a.Wm)(Be,{"field-label":e.t("company_name"),placeholder:e.t("company_name"),"field-error":e._.get(e.billingAddressValidationErrors,"company_name.0"),modelValue:e.billingAddress.company_name,"onUpdate:modelValue":l[17]||(l[17]=l=>e.billingAddress.company_name=l),"field-name":"shipping[company_name]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",le,[(0,a.Wm)(Be,{"field-label":e.t("phone"),phone:e.t("phone"),"field-error":e._.get(e.billingAddressValidationErrors,"phone.0"),modelValue:e.billingAddress.phone,"onUpdate:modelValue":l[18]||(l[18]=l=>e.billingAddress.phone=l),"field-name":"shipping[phone]"},null,8,["field-label","phone","field-error","modelValue"])])]),(0,a._)("div",se,[(0,a._)("div",ae,[(0,a.Wm)(Be,{"field-label":e.t("address1"),placeholder:e.t("address1"),"field-error":e._.get(e.billingAddressValidationErrors,"address1.0"),modelValue:e.billingAddress.address1,"onUpdate:modelValue":l[19]||(l[19]=l=>e.billingAddress.address1=l),"field-name":"shipping[address1]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",ie,[(0,a.Wm)(Be,{"field-label":e.t("address2"),placeholder:e.t("address2"),"field-error":e._.get(e.billingAddressValidationErrors,"address2.0"),modelValue:e.billingAddress.address2,"onUpdate:modelValue":l[20]||(l[20]=l=>e.billingAddress.address2=l),"field-name":"shipping[address2]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",te,[e.countryOptionsResultFetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",re,[(0,a._)("label",de,(0,i.zw)(e.t("country")),1),(0,a.wy)((0,a._)("select",{"onUpdate:modelValue":l[21]||(l[21]=l=>e.billingAddress.country_id=l),class:"w-full p-2 text-md text-gray-700 focus:ring-1 focus:ring-red-600"},[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.countryOptionsResult.countryOptions,(e=>((0,a.wg)(),(0,a.iD)("option",{key:e.value,value:e.value},(0,i.zw)(e.label),9,ne)))),128))],512),[[t.bM,e.billingAddress.country_id]]),e._.get(e.billingAddressValidationErrors,"country_id.0")?((0,a.wg)(),(0,a.iD)("p",oe,(0,i.zw)(e._.get(e.billingAddressValidationErrors,"country_id.0")),1)):(0,a.kq)("",!0)])),(0,a._)("div",pe,[(0,a.Wm)(Be,{"field-label":e.t("state"),placeholder:e.t("state"),"field-error":e._.get(e.billingAddressValidationErrors,"state.0"),modelValue:e.billingAddress.state,"onUpdate:modelValue":l[22]||(l[22]=l=>e.billingAddress.state=l),"field-name":"shipping[state]"},null,8,["field-label","placeholder","field-error","modelValue"])])]),(0,a._)("div",ce,[(0,a._)("div",me,[(0,a.Wm)(Be,{"field-label":e.t("postcode"),placeholder:e.t("postcode"),"field-error":e._.get(e.billingAddressValidationErrors,"postcode.0"),modelValue:e.billingAddress.postcode,"onUpdate:modelValue":l[23]||(l[23]=l=>e.billingAddress.postcode=l),"field-name":"shipping[postcode]"},null,8,["field-label","placeholder","field-error","modelValue"])]),(0,a._)("div",ue,[(0,a.Wm)(Be,{"field-label":e.t("city"),placeholder:e.t("city"),"field-error":e._.get(e.billingAddressValidationErrors,"city.0"),modelValue:e.billingAddress.city,"onUpdate:modelValue":l[24]||(l[24]=l=>e.billingAddress.city=l),"field-name":"shipping[city]"},null,8,["field-label","placeholder","field-error","modelValue"])])])])):(0,a.kq)("",!0)])])),(0,a._)("div",_e,[(0,a._)("div",null,[(0,a._)("h4",ge,(0,i.zw)(e.t("delivery_method")),1),(0,a._)("div",fe,[e.shippingFetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",he,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.shippingOptions.shippingQuery,((s,r)=>((0,a.wg)(),(0,a.iD)("button",{key:r,class:"flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none"},[(0,a._)("label",ye,[(0,a.wy)((0,a._)("input",{type:"radio","onUpdate:modelValue":l[25]||(l[25]=l=>e.placeOrderData.shipping_option=l),checked:"",value:"shipping.identifier",class:"form-radio h-5 w-5 text-blue-600"},null,512),[[t.G2,e.placeOrderData.shipping_option]]),(0,a._)("span",ve,(0,i.zw)(s.name),1)]),be])))),128))]))])]),(0,a._)("div",we,[(0,a._)("h4",Ve,(0,i.zw)(e.t("payment_method")),1),e.paymentFetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",xe,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.paymentOptions.paymentQuery,((s,r)=>((0,a.wg)(),(0,a.iD)("button",{key:r,class:"flex items-center justify-between w-full bg-white rounded-md border-2 border-blue-500 p-4 focus:outline-none"},[(0,a._)("label",Ae,[(0,a.wy)((0,a._)("input",{type:"radio","onUpdate:modelValue":l[26]||(l[26]=l=>e.placeOrderData.payment_option=l),checked:"",value:"payment.identifier",class:"form-radio h-5 w-5 text-blue-600"},null,512),[[t.G2,e.placeOrderData.payment_option]]),(0,a._)("span",ke,(0,i.zw)(s.name),1)]),$e])))),128))]))]),(0,a._)("div",De,[(0,a._)("h4",Ee,(0,i.zw)(e.t("cart_items")),1),e.fetching?(0,a.kq)("",!0):((0,a.wg)(),(0,a.iD)("div",Se,[((0,a.wg)(!0),(0,a.iD)(a.HY,null,(0,a.Ko)(e.data.cartItems,((e,l)=>((0,a.wg)(),(0,a.iD)("div",{key:`category-link-${l}`,class:"flex items-center hover:bg-gray-100 px-6 py-5"},[(0,a._)("div",Ue,[(0,a._)("div",ze,[(0,a._)("img",{class:"h-20 rounded object-cover",src:e.product.main_image_url,alt:e.product.name},null,8,We)]),(0,a._)("div",qe,[(0,a._)("span",He,(0,i.zw)(e.product.name),1),Oe])]),(0,a._)("div",Qe,[Ze,(0,a._)("input",{class:"mx-2 border text-center w-8",type:"text",value:e.qty},null,8,Ie),Me]),(0,a._)("span",Pe,"$"+(0,i.zw)(e.product.price),1),(0,a._)("span",Le,"$"+(0,i.zw)(e.product.price*e.qty),1)])))),128))]))]),(0,a._)("button",Re,[(0,a.Wm)(je,{class:"h-6 w-6 leading-norma l",type:"shopping-cart"}),(0,a.Uk)(" "+(0,i.zw)(e.t("place_order")),1)])])])],32)])}var Fe=s(8798),Ge=s(456);const Be=Ge.ZP`
    query ShippingQuery{
        shippingQuery {
                name
                identifier
                view
        }
    }
`;var je=Be;const Ke=Ge.ZP`
    query PaymentQuery{
            paymentQuery {
                    name
                    identifier
                    view
            }
        }
`;var Ye=Ke,Ne=s(2761);const Te=Ge.ZP`
    mutation CustomerRegistration (
        $email: String!
        $password: String!
        $first_name: String!
        $last_name: String!
        $password_confirmation: String!
    ) {
        register (
            first_name: $first_name,
            last_name: $last_name,
            email: $email,
            password: $password
            password_confirmation: $password_confirmation
        ) {
            access_token
            id
        }
    }
`;var Je=Te;const Xe=Ge.ZP`
    mutation CreateAddressMutation (
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
        createAddress (
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
`;var el=Xe;const ll=Ge.ZP`
    mutation PlaceOrderMutation (
        $shipping_option: String!
        $payment_option: String!
        $shipping_address_id: String!
        $billing_address_id: String!
    ) {
        placeOrder (
            shipping_option: $shipping_option
            payment_option: $payment_option
            shipping_address_id: $shipping_address_id
            billing_address_id: $billing_address_id
        ) {
            id 
            shipping_option
            payment_option
            shipping_address_id
            billing_address_id
            track_code
            created_at
            updated_at
        }
    }
`;var sl=ll,al=s(2262),il=s(2801),tl=s(6121),rl=s(3653),dl=s(6486),nl=s.n(dl),ol=s(1122),pl=s(9150),cl=s(9733),ml=s(2119),ul=(0,a.aZ)({components:{VueFeather:il.Z,"avored-input":rl.Z},setup(){const{t:e}=(0,pl.QT)(),l=(0,tl.aM)({query:ol.Z});var s={};const a=(0,al.iH)({}),i=(0,al.iH)(""),t=(0,al.iH)(""),r=(0,al.iH)({}),d=(0,al.iH)(""),n=(0,al.iH)({}),o=(0,ml.tv)(),p=(0,al.iH)({first_name:"",last_name:"",email:"",password:"",password_confirmation:""}),c=(0,al.iH)({id:"",type:"SHIPPING",first_name:"",last_name:"",company_name:"",phone:"",address1:"",address2:"",state:"",city:"",postcode:"",country_id:""}),m=(0,al.iH)({shipping_option:"pickup",payment_option:"cash-on-delivery",customer_id:i.value,shipping_address_id:t.value,billing_address_id:d.value}),u=(0,tl.Db)(Je),_=(0,tl.Db)(el),g=(0,tl.Db)(sl),f=async()=>{localStorage.getItem(cl.iR)||await u.executeMutation(nl().pick(p.value,["first_name","last_name","email","password","password_confirmation"])).then((e=>{"validation"===nl().get(e,"error.graphQLErrors.0.extensions.category")?a.value=nl().get(e,"error.graphQLErrors.0.extensions.validation"):(localStorage.setItem(cl.UA,e.data.register.access_token),localStorage.setItem(cl.iR,"true"),i.value=e.data.register.id)})),c.value.id||await _.executeMutation(nl().pick(c.value,["type","first_name","last_name","company_name","phone","address1","address2","country_id","state","postcode","city"])).then((e=>{"validation"===nl().get(e,"error.graphQLErrors.0.extensions.category")?r.value=nl().get(e,"error.graphQLErrors.0.extensions.validation"):t.value=e.data.createAddress.id})),w.value.id||await _.executeMutation(nl().pick(w.value,["type","first_name","last_name","company_name","phone","address1","address2","country_id","state","postcode","city"])).then((e=>{"validation"===nl().get(e,"error.graphQLErrors.0.extensions.category")?n.value=nl().get(e,"error.graphQLErrors.0.extensions.validation"):d.value=e.data.createAddress.id})),m.value.shipping_address_id=c.value.id,m.value.billing_address_id=w.value.id,await g.executeMutation(m.value).then((e=>{console.log(e),o.push({name:"checkout.successs"})}))};var h=null;localStorage.getItem(cl.UA)&&(h=(0,tl.aM)({query:Ne.Z})),localStorage.getItem(cl.De)&&(s={visitor_id:localStorage.getItem(cl.De)});const y=(0,tl.aM)({query:Fe.Z,variables:s}),v=(0,tl.aM)({query:Ye}),b=(0,tl.aM)({query:je}),w=(0,al.iH)({id:"",type:"BILLING",customer_id:"",first_name:"",last_name:"",company_name:"",phone:"",address1:"",address2:"",state:"",city:"",postcode:"",country_id:""}),V=e=>(w.value=nl().find(e,(e=>{if("BILLING"===e.type)return e})),!!w.value.id),x=e=>(c.value=nl().find(e,(e=>{if("SHIPPING"===e.type)return e})),!!c.value.id);return{t:e,_:nl(),setBillingAddress:V,setShippingAddress:x,shippingAddress:c,customerValidationErrors:a,shippingAddressValidationErrors:r,billingAddressValidationErrors:n,user:p,billingAddress:w,handleSubmit:f,paymentFetching:v.fetching,paymentOptions:v.data,paymentError:v.error,shippingFetching:b.fetching,shippingOptions:b.data,shippingError:b.error,fetching:y.fetching,data:y.data,countryOptionsResult:l.data,countryOptionsResultFetching:l.fetching,error:y.error,placeOrderData:m,customerData:nl().get(h,"data"),fetchingCustomer:nl().get(h,"fetching")}}}),_l=s(3744);const gl=(0,_l.Z)(ul,[["render",Ce]]);var fl=gl}}]);
//# sourceMappingURL=419.d7f7a3e7.js.map