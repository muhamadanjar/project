// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.19/esri/copyright.txt for details.
//>>built
define("esri/dijit/analysis/_Widget",["dijit/_WidgetBase","dojo/_base/lang","dojo/dom-class"],function(b,c,d){return b.createSubclass({declaredClass:"esri.dijit.analysis.Widget",create:function(a,b){a=c.mixin({viewModel:{}},a);a.viewModel=this._ensureViewModelInstance(a.viewModel);this.inherited(arguments,[a,b])},destroy:function(){this.inherited(arguments);this.viewModel.destroy&&this.viewModel.destroy();this.viewModel=null},viewModel:null,_setViewModelAttr:function(a){this._set("viewModel",this._ensureViewModelInstance(a))},
viewModelType:null,visible:!0,_setVisibleAttr:function(a){this._set("visible",a);d.toggle(this.domNode,"esri-hidden",!a)},_ensureViewModelInstance:function(a){return!a||a.declaredClass||!this.viewModelType?a:new this.viewModelType(a)}})});