// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.19/esri/copyright.txt for details.
//>>built
define("esri/dijit/VisibleScaleRangeSlider/_RecommendedScaleRangeBounds",["./recommendedScales","dojo/_base/declare"],function(d,e){return e(null,{declaredClass:"esri.dijit.VisibleScaleRangeSlider._RecommendedScaleRangeBounds",beyondMinScale:function(b){var a=this.get("firstRange"),c=a.minScale,a=d.getRecommendedScale(a.id)||a.maxScale;return b<=c&&b>a},beyondMaxScale:function(b){var a=this.get("lastRange"),c=a.maxScale,a=d.getRecommendedScale(a.id)||a.minScale;return b<a&&b>=c}})});