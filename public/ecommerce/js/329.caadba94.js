"use strict";(self["webpackChunklaravel_ecommerce"]=self["webpackChunklaravel_ecommerce"]||[]).push([[329],{3329:function(e,t,a){a.r(t),a.d(t,{default:function(){return R}});var r=a(6252),o=a(3577);const s={key:0,class:""},u={class:"px-10 mt-5 w-full mx-auto"},l={class:"my-5 text-4xl font-semibold text-red-700"},n={class:"grid grid-cols-4 gap-6"},i={class:"overflow-hidden relative"},g=["src","alt"],c={class:"w-full"},p={class:"flex justify-center w-full absolute bottom-4 transition duration-500 ease-in-out opacity-0 group-hover:opacity-100"},d={class:"px-4 py-3 bg-white"},y={href:"#",class:""},m={class:"text-gray-800 font-semibold text-lg hover:text-red-500 transition duration-300 ease-in-out"},v={class:"flex py-2"},b={class:"text-red-600 font-bold text-2xl"},_={class:"mt-5 border-t border-gray-300 flex w-full p-5"};function f(e,t,a,f,x,h){const w=(0,r.up)("AddToCart"),P=(0,r.up)("Pagination");return e.fetching?(0,r.kq)("",!0):((0,r.wg)(),(0,r.iD)("div",s,[(0,r._)("section",u,[(0,r._)("h1",l,(0,o.zw)(e.data.category.name),1),(0,r._)("div",n,[((0,r.wg)(!0),(0,r.iD)(r.HY,null,(0,r.Ko)(e.data.category.products.data,((e,t)=>((0,r.wg)(),(0,r.iD)("div",{key:`product-card-${t}`,class:"shadow hover:shadow-lg transition duration-300 ease-in-out xl:mb-0 lg:mb-0 md:mb-0 mb-6 cursor-pointer group"},[(0,r._)("div",i,[(0,r._)("img",{class:"w-full transition duration-700 ease-in-out group-hover:opacity-60",src:e.main_image_url,alt:e.name},null,8,g),(0,r._)("div",c,[(0,r._)("div",p,[(0,r.Wm)(w,{slug:e.slug},null,8,["slug"])])])]),(0,r._)("div",d,[(0,r._)("a",y,[(0,r._)("h1",m,(0,o.zw)(e.name),1)]),(0,r._)("div",v,[(0,r._)("p",b," $"+(0,o.zw)(e.price),1)])])])))),128))]),(0,r._)("div",_,[(0,r.Wm)(P,{onPrevious:e.previousButtonOnClick,onNext:e.nextButtonOnClick,total:e.data.category.products.total,"per-page":e.data.category.products.per_page,"current-page":e.data.category.products.current_page,from:e.data.category.products.from,to:e.data.category.products.to,"last-page":e.data.category.products.last_page,"has-more-pages":e.data.category.products.has_more_pages},null,8,["onPrevious","onNext","total","per-page","current-page","from","to","last-page","has-more-pages"])])])]))}var x=a(456);const h=x.ZP`
    query GetCategoryQuery(
      $slug: String!
      $page : Int
    ) {
      category(
        slug: $slug
        page: $page
      ) {
          id
          name
          products {
            total
            per_page
            current_page
            from
            to
            last_page
            has_more_pages
            data {
              id
              slug
              name
              price
              main_image_url
            }
          }
      }
    }
`;var w=h,P=a(8616),k=a(6121),q=a(2262),C=a(9150),N=a(2119),$=a(9963);const z={class:"text-gray-500"},M={class:"ml-auto"},Q=["disabled"],Z=["disabled"];function B(e,t,a,s,u,l){return(0,r.wg)(),(0,r.iD)(r.HY,null,[(0,r._)("div",z,(0,o.zw)(e.t("pagination_result_text",{from:e.from,to:e.to,total:e.total})),1),(0,r._)("div",M,[(0,r._)("button",{type:"button",disabled:1===e.currentPage,class:(0,o.C_)([1!==e.currentPage?"hover:bg-gray-300":"hover:bg-gray-100 opacity-50","px-2 py-3 border border-gray-400 text-gray-600 bg-gray-100 rounded-md"]),onClick:t[0]||(t[0]=(0,$.iM)((t=>e.$emit("previous")),["prevent"]))},(0,o.zw)(e.t("previous")),11,Q),(0,r._)("button",{type:"button",disabled:!e.hasMorePages,class:(0,o.C_)([e.hasMorePages?"hover:bg-gray-300":"hover:bg-gray-100 opacity-50","px-2 py-3 border border-gray-400 text-gray-600 bg-gray-100 rounded-md ml-5"]),onClick:t[1]||(t[1]=(0,$.iM)((t=>e.$emit("next")),["prevent"]))},(0,o.zw)(e.t("next")),11,Z)])],64)}var D=(0,r.aZ)({props:{total:{type:[Number],required:!0},perPage:{type:[Number],required:!0},currentPage:{type:[Number],required:!0},from:{type:[Number],required:!0},to:{type:[Number],required:!0},lastPage:{type:[Number],required:!0},hasMorePages:{type:[Boolean],required:!0}},setup(){const{t:e}=(0,C.QT)();return{t:e}}}),H=a(3744);const O=(0,H.Z)(D,[["render",B]]);var T=O,Y=(0,r.aZ)({components:{AddToCart:P.Z,Pagination:T},setup(){const{t:e}=(0,C.QT)(),t=(0,N.tv)(),a=(0,q.iH)(t.currentRoute.value.params.slug),o=(0,q.iH)(1),s=(0,k.aM)({query:w,variables:{slug:a,page:o}});(0,r.YP)(t.currentRoute,(e=>{a.value=e.params.slug,s.executeQuery({variables:{slug:e.params.slug,page:o},requestPolicy:"network-only"})}));const u=()=>{o.value+=1,console.log("page "+o.value),s.executeQuery({variables:{slug:a,page:o},requestPolicy:"network-only"})},l=()=>{o.value-=1,o.value<0&&(o.value=0),console.log("page "+o.value),s.executeQuery({variables:{slug:a,page:o},requestPolicy:"network-only"})};return{t:e,nextButtonOnClick:u,previousButtonOnClick:l,slug:a,fetching:s.fetching,data:s.data,error:s.error}}});const A=(0,H.Z)(Y,[["render",f]]);var R=A}}]);
//# sourceMappingURL=329.caadba94.js.map