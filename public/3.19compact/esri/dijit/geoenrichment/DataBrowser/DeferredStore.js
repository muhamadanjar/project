// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.19/esri/copyright.txt for details.
//>>built
define("esri/dijit/geoenrichment/DataBrowser/DeferredStore",["dojo/_base/declare","dojo/_base/lang","dojo/_base/array","dojo/store/util/SimpleQueryEngine","dojo/store/util/QueryResults"],function(d,e,g,h,k){function f(a,b,c){a=a&&a(b);return!a||a.isFulfilled()?c():a.then(function(){return c()})}d=d(null,{idProperty:"id",index:null,data:null,resolver:null,queryEngine:h,constructor:function(a){e.mixin(this,a);this.setData(this.data)},setData:function(a){this.data=[];this.index={};g.forEach(a,function(a,
c){this.data[c]=a;this.index[this.getIdentity(a)]=c},this)},get:function(a){return this.data[this.index[a]]},getIdentity:function(a){return a[this.idProperty]},query:function(a,b){return k(f(this.resolver,a,e.hitch(this,this.syncQuery,a,b)))},syncQuery:function(a,b){return this.queryEngine(a,b)(this.data)}});d.resolveCallback=f;return d});