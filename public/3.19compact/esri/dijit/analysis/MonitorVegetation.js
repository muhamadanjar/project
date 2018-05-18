// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.19/esri/copyright.txt for details.
//>>built
require({cache:{"url:esri/dijit/analysis/templates/MonitorVegetation.html":'\x3cdiv class\x3d"esriAnalysis"\x3e\r\n  \x3cdiv data-dojo-type\x3d"dijit/layout/ContentPane" style\x3d"margin-top:0.5em; margin-bottom: 0.5em;"\x3e\r\n    \x3cdiv data-dojo-attach-point\x3d"_MonitorVegetationToolContentTitle" class\x3d"analysisTitle"\x3e\r\n      \x3ctable class\x3d"esriFormTable" \x3e \r\n        \x3ctr\x3e\r\n          \x3ctd class\x3d"esriToolIconTd"\x3e\x3cdiv class\x3d"monitorVegetationIcon"\x3e\x3c/div\x3e\x3c/td\x3e\r\n          \x3ctd class\x3d"esriAlignLeading esriAnalysisTitle" data-dojo-attach-point\x3d"_toolTitle"\x3e\r\n            \x3clabel data-dojo-attach-point\x3d"_titleLbl"\x3e${i18n.monitorVegetation}\x3c/label\x3e\r\n            \x3cnav class\x3d"breadcrumbs"  data-dojo-attach-point\x3d"_analysisModeLblNode" style\x3d"display:none;"\x3e\r\n              \x3ca href\x3d"#" class\x3d"crumb" style\x3d"font-size:12px;" data-dojo-attach-event\x3d"onclick:_handleModeCrumbClick" data-dojo-attach-point\x3d"_analysisModeCrumb"\x3e\x3c/a\x3e\r\n              \x3ca href\x3d"#" class\x3d"crumb is-active" data-dojo-attach-point\x3d"_analysisTitleCrumb" style\x3d"font-size:16px;"\x3e${i18n.monitorVegetation}\x3c/a\x3e\r\n            \x3c/nav\x3e              \r\n          \x3c/td\x3e\r\n          \x3ctd\x3e\r\n            \x3cdiv class\x3d"esriFloatTrailing" style\x3d"padding:0;"\x3e\r\n                \x3cdiv class\x3d"esriFloatLeading"\x3e\r\n                  \x3ca href\x3d"#" class\x3d\'esriFloatLeading helpIcon\' esriHelpTopic\x3d"toolDescription"\x3e\x3c/a\x3e\r\n                \x3c/div\x3e\r\n                \x3cdiv class\x3d"esriFloatTrailing"\x3e\r\n                  \x3ca href\x3d"#" data-dojo-attach-point\x3d"_closeBtn" title\x3d"${i18n.close}" class\x3d"esriAnalysisCloseIcon"\x3e\x3c/a\x3e\r\n                \x3c/div\x3e              \r\n            \x3c/div\x3e  \r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e\r\n      \x3c/table\x3e\r\n    \x3c/div\x3e\r\n    \x3cdiv style\x3d"clear:both; border-bottom: #CCC thin solid; height:1px;width:100%;"\x3e\x3c/div\x3e\r\n  \x3c/div\x3e\r\n  \x3cdiv data-dojo-type\x3d"dijit/form/Form" data-dojo-attach-point\x3d"_form" readOnly\x3d"true"\x3e\r\n     \x3ctable class\x3d"esriFormTable"\x3e \r\n       \x3ctbody\x3e\r\n        \x3ctr data-dojo-attach-point\x3d"_titleRow"\x3e\r\n          \x3ctd  colspan\x3d"3" class\x3d"sectionHeader" data-dojo-attach-point\x3d"_interpolateToolDescription" \x3e\x3c/td\x3e\r\n        \x3c/tr\x3e\r\n        \x3ctr data-dojo-attach-point\x3d"_analysisLabelRow" style\x3d"display:none;"\x3e\r\n          \x3ctd colspan\x3d"2" style\x3d"padding-bottom:0;"\x3e\r\n            \x3clabel class\x3d"esriFloatLeading  esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.oneLabel}\x3c/label\x3e\r\n            \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.analysisLayerLabel}\x3c/label\x3e\r\n          \x3c/td\x3e\r\n          \x3ctd class\x3d"shortTextInput" style\x3d"padding-bottom:0;"\x3e\r\n            \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' esriHelpTopic\x3d"inputLayer"\x3e\x3c/a\x3e\r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e\r\n        \x3ctr data-dojo-attach-point\x3d"_selectAnalysisRow" style\x3d"display:none;"\x3e\r\n          \x3ctd  colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n            \x3cselect class\x3d"esriLeadingMargin1 longInput esriLongLabel"  style\x3d"margin-top:1.0em;" data-dojo-type\x3d"dijit/form/Select" data-dojo-attach-point\x3d"_analysisSelect" data-dojo-attach-event\x3d"onChange:_handleAnalysisLayerChange"\x3e\x3c/select\x3e\r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e  \r\n         \x3ctr\x3e\r\n           \x3ctd colspan\x3d"2"\x3e\r\n             \x3clabel data-dojo-attach-point\x3d"_labelOne" class\x3d"esriFloatLeading esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.twoLabel}\x3c/label\x3e\r\n             \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.indexType}\x3c/label\x3e\r\n           \x3c/td\x3e\r\n           \x3ctd class\x3d"shortTextInput"\x3e\r\n             \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' data-dojo-attach-point\x3d"_analysisVegetationIndexTypeHelpLink" esrihelptopic\x3d"vegetationIndexType"\x3e\x3c/a\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr\x3e\r\n           \x3ctd colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n             \x3cselect class\x3d"esriLeadingMargin1 longInput esriLongLabel" data-dojo-type\x3d"dijit/form/Select" data-dojo-attach-point\x3d"_indexTypeInput" data-dojo-attach-event\x3d"onChange:_handleIndexTypeChange"\x3e\x3c/select\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr\x3e\r\n           \x3ctd colspan\x3d"3" class\x3d"clear"\x3e\x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr\x3e\r\n           \x3ctd colspan\x3d"2" \x3e\r\n             \x3clabel class\x3d"esriFloatLeading esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.threeLabel}\x3c/label\x3e\r\n             \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.bandIndexes}\x3c/label\x3e\r\n           \x3c/td\x3e\r\n           \x3ctd class\x3d"shortTextInput" \x3e\r\n             \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' data-dojo-attach-point\x3d"_bandIndexesHelpLink" esrihelptopic\x3d"bandIndexes"\x3e\x3c/a\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr\x3e\r\n           \x3ctd colspan\x3d"2" style\x3d"padding-top:0;"\x3e\r\n             \x3ctable style\x3d"width:100%;"\x3e\r\n               \x3ctr\x3e\r\n                 \x3ctd style\x3d"width:45%"\x3e\r\n                   \x3cinput type\x3d"text" class\x3d"esriLeadingMargin1" data-dojo-type\x3d"dijit/form/NumberTextBox" data-dojo-props\x3d"intermediateChanges:true,required:true,invalidMessage:\'${i18n.distanceMsg}\'" data-dojo-attach-point\x3d"_nirBandIndexInput" style\x3d"width:90%;"\x3e\r\n                 \x3c/td\x3e\r\n                 \x3ctd style\x3d"width:45%"\x3e\r\n                   \x3cinput type\x3d"text" class\x3d"esriLeadingMargin1" data-dojo-type\x3d"dijit/form/NumberTextBox" data-dojo-props\x3d"intermediateChanges:true,required:true,invalidMessage:\'${i18n.distanceMsg}\'" data-dojo-attach-point\x3d"_redBandIndexInput" style\x3d"width:90%;"\x3e\r\n                 \x3c/td\x3e\r\n               \x3c/tr\x3e\r\n             \x3c/table\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr data-dojo-attach-point\x3d"_soilLine" style\x3d"display:none;"\x3e\r\n           \x3ctd colspan\x3d"3"\x3e\r\n             \x3cdiv\x3e\r\n               \x3ctable class\x3d"esriFormTable"\x3e\r\n                 \x3ctbody\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"2" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.slopeOfSoilLine}\x3c/label\x3e\r\n                     \x3c/td\x3e\r\n                     \x3ctd class\x3d"shortTextInput" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' data-dojo-attach-point\x3d"_slopeOfSoilLineHelpLink" esrihelptopic\x3d"slopeOfSoilLine"\x3e\x3c/a\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n                       \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/NumberTextBox" data-dojo-props\x3d"intermediateChanges:true,placeHolder:\'${i18n.slopeOfSoilLine}\'" data-dojo-attach-point\x3d"_a" style\x3d"width:100%;"\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"2" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.gradientOfSoilLine}\x3c/label\x3e\r\n                     \x3c/td\x3e\r\n                     \x3ctd class\x3d"shortTextInput" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' data-dojo-attach-point\x3d"_gradientOfSoilLineHelpLink" esrihelptopic\x3d"interceptOfSoilLine"\x3e\x3c/a\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n                       \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/NumberTextBox" data-dojo-props\x3d"intermediateChanges:true,placeHolder:\'${i18n.gradientOfSoilLine}\'" data-dojo-attach-point\x3d"_b" style\x3d"width:100%;"\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                 \x3c/tbody\x3e\r\n               \x3c/table\x3e\r\n             \x3c/div\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr data-dojo-attach-point\x3d"_greenVegetativeCover" style\x3d"display:none;"\x3e\r\n           \x3ctd colspan\x3d"3"\x3e\r\n             \x3cdiv\x3e\r\n               \x3ctable class\x3d"esriFormTable"\x3e\r\n                 \x3ctbody\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"2" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.greenVegetativeCover}\x3c/label\x3e\r\n                     \x3c/td\x3e\r\n                     \x3ctd class\x3d"shortTextInput" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' data-dojo-attach-point\x3d"_greenVegetativeCoverHelpLink" esrihelptopic\x3d"greenVegetativeCover"\x3e\x3c/a\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n                       \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/NumberTextBox" data-dojo-props\x3d"intermediateChanges:true,placeHolder:\'${i18n.greenVegetativeCover}\'" data-dojo-attach-point\x3d"_l" style\x3d"width:100%;"\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                 \x3c/tbody\x3e\r\n               \x3c/table\x3e\r\n             \x3c/div\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n         \x3ctr data-dojo-attach-point\x3d"_adjustmentFactor" style\x3d"display:none;"\x3e\r\n           \x3ctd colspan\x3d"3"\x3e\r\n             \x3cdiv\x3e\r\n               \x3ctable class\x3d"esriFormTable"\x3e\r\n                 \x3ctbody\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"2" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.adjustmentFactor}\x3c/label\x3e\r\n                     \x3c/td\x3e\r\n                     \x3ctd class\x3d"shortTextInput" style\x3d"padding-bottom:0;"\x3e\r\n                       \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' data-dojo-attach-point\x3d"_adjustmentFactorHelpLink" esrihelptopic\x3d"adjustmentFactor"\x3e\x3c/a\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                   \x3ctr\x3e\r\n                     \x3ctd colspan\x3d"3" style\x3d"padding-top:0;"\x3e\r\n                       \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/NumberTextBox" data-dojo-props\x3d"intermediateChanges:true,placeHolder:\'${i18n.adjustmentFactor}\'" data-dojo-attach-point\x3d"_x" style\x3d"width:100%;"\x3e\r\n                     \x3c/td\x3e\r\n                   \x3c/tr\x3e\r\n                 \x3c/tbody\x3e\r\n               \x3c/table\x3e\r\n             \x3c/div\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e    \r\n        \x3ctr\x3e\r\n          \x3ctd colspan\x3d"3" class\x3d"clear"\x3e\x3c/td\x3e\r\n        \x3c/tr\x3e\r\n        \x3ctr\x3e\r\n          \x3ctd colspan\x3d"2"\x3e\r\n            \x3clabel class\x3d"esriFloatLeading esriTrailingMargin025 esriAnalysisNumberLabel"\x3e${i18n.twoLabel}\x3c/label\x3e\r\n            \x3clabel class\x3d"esriAnalysisStepsLabel"\x3e${i18n.outputLayerLabel}\x3c/label\x3e\r\n          \x3c/td\x3e\r\n          \x3ctd class\x3d"shortTextInput"\x3e\r\n            \x3ca href\x3d"#" class\x3d\'esriFloatTrailing helpIcon\' esriHelpTopic\x3d"outputLayer"\x3e\x3c/a\x3e \r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e\r\n        \x3ctr\x3e\r\n          \x3ctd colspan\x3d"3"\x3e\r\n            \x3cinput type\x3d"text" data-dojo-type\x3d"dijit/form/ValidationTextBox" data-dojo-props\x3d"trim:true,required:true" class\x3d"longTextInput esriLeadingMargin1" data-dojo-attach-point\x3d"_outputLayerInput"\x3e\x3c/input\x3e\r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e\r\n        \x3ctr\x3e\r\n          \x3ctd colspan\x3d"3"\x3e\r\n             \x3cdiv data-dojo-attach-point\x3d"_chooseFolderRow" class\x3d"esriLeadingMargin1"\x3e\r\n               \x3clabel class\x3d"esriSaveLayerlabel"\x3e${i18n.saveResultIn}\x3c/label\x3e\r\n               \x3cinput class\x3d"longInput" data-dojo-attach-point\x3d"_webMapFolderSelect" data-dojo-type\x3d"dijit/form/FilteringSelect" trim\x3d"true" style\x3d"width:55%;"\x3e\x3c/input\x3e\r\n             \x3c/div\x3e              \r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e\r\n         \x3ctr\x3e\r\n           \x3ctd colspan\x3d"3"\x3e\r\n             \x3cdiv data-dojo-attach-point\x3d"_chooseLayerTypeRow" class\x3d"esriLeadingMargin1"\x3e\r\n               \x3clabel class\x3d"esriSaveLayerlabel"\x3e${i18n.saveLayerType}\x3c/label\x3e\r\n               \x3cinput class\x3d"longInput esriLongLabel" data-dojo-attach-point\x3d"_webLayerTypeSelect" data-dojo-type\x3d"dijit/form/FilteringSelect" trim\x3d"true" style\x3d"width:55%;"\x3e\x3c/input\x3e\r\n             \x3c/div\x3e\r\n           \x3c/td\x3e\r\n         \x3c/tr\x3e\r\n      \x3c/tbody\x3e\r\n     \x3c/table\x3e\r\n   \x3c/div\x3e\r\n  \x3cdiv style\x3d"padding:5px;margin-top:5px;border-top:solid 1px #BBB;"\x3e\r\n    \x3cdiv class\x3d"esriExtentCreditsCtr"\x3e\r\n      \x3ca class\x3d"esriFloatTrailing esriSmallFont"  href\x3d"#" data-dojo-attach-point\x3d"_showCreditsLink" data-dojo-attach-event\x3d"onclick:_handleShowCreditsClick"\x3e${i18n.showCredits}\x3c/a\x3e\r\n     \x3clabel data-dojo-attach-point\x3d"_chooseExtentDiv" class\x3d"esriSelectLabel esriExtentLabel"\x3e\r\n       \x3cinput type\x3d"radio" data-dojo-attach-point\x3d"_useExtentCheck" data-dojo-type\x3d"dijit/form/CheckBox" data-dojo-props\x3d"checked:true" name\x3d"extent" value\x3d"true"/\x3e\r\n         ${i18n.useMapExtent}\r\n     \x3c/label\x3e\r\n    \x3c/div\x3e\r\n    \x3cdiv\x3e\r\n      \x3ctable class\x3d"esriFormTable"\x3e\r\n        \x3ctr\x3e\r\n          \x3ctd\x3e\r\n            \x3cbutton data-dojo-type\x3d"dijit/form/Button" type\x3d"submit" data-dojo-attach-point\x3d"_saveBtn" class\x3d"esriAnalysisSubmitButton" data-dojo-attach-event\x3d"onClick:_handleSaveBtnClick"\x3e\r\n              ${i18n.runAnalysis}\r\n            \x3c/button\x3e\r\n          \x3c/td\x3e\r\n        \x3c/tr\x3e\r\n      \x3c/table\x3e\r\n    \x3c/div\x3e\r\n  \x3c/div\x3e\r\n  \x3cdiv data-dojo-type\x3d"dijit/Dialog" title\x3d"${i18n.creditTitle}" data-dojo-attach-point\x3d"_usageDialog" style\x3d"width:40em;"\x3e\r\n    \x3cdiv data-dojo-type\x3d"esri/dijit/analysis/CreditEstimator"  data-dojo-attach-point\x3d"_usageForm"\x3e\x3c/div\x3e\r\n  \x3c/div\x3e\r\n\x3c/div\x3e\r\n'}});
define("esri/dijit/analysis/MonitorVegetation","dojo/_base/declare dojo/_base/lang dojo/has dojo/dom-class dojo/dom-style dijit/_WidgetBase dijit/_TemplatedMixin dijit/_WidgetsInTemplateMixin dijit/_OnDijitClickMixin dijit/_FocusMixin ../../kernel ./RasterAnalysisMixin dojo/i18n!../../nls/jsapi dojo/text!./templates/MonitorVegetation.html".split(" "),function(d,f,g,b,e,h,k,l,m,n,p,q,r,s){d=d([h,k,l,m,n,q],{declaredClass:"esri.dijit.analysis.MonitorVegetationTool",templateString:s,widgetsInTemplate:!0,
inputLayer:null,bandindexes:"1 2",indexType:1,nirBandIndex:1,redBandIndex:2,store:null,ids:0,toolName:"MonitorVegetationTool",helpFileName:"MonitorVegetation",toolNlsName:r.monitorVegetationTool,_getRasterFunction:function(){return"BandArithmetic"},_getRasterArguments:function(){var a=this.get("nirBandIndex"),b=this.get("redBandIndex"),c=this.get("indexType"),a=a+" "+b;8==c||5==c?a="1 2 3 4 5 6":2==c?a=a+" "+this._l.get("value"):6==c?a=a+" "+this._a.get("value")+" "+this._b.get("value"):3==c&&(a=
a+" "+this._a.get("value")+" "+this._b.get("value")+" "+this._x.get("value"));return{Method:c,BandIndexes:a}},_getOutputItemProperties:function(){return this._getDefaultOutputItemProperties(1,"Red to Green","RSP_BilinearInterpolation")},_setDefaultInputs:function(){this._indexTypeInput.addOption([{value:5,label:this.i18n.GEMI},{value:7,label:this.i18n.GVITM},{value:4,label:this.i18n.MSAVI},{value:1,label:this.i18n.NDVI},{value:6,label:this.i18n.PVI},{value:2,label:this.i18n.SAVI},{value:8,label:this.i18n.Sultan},
{value:3,label:this.i18n.TSAVI}]);this.nirBandIndex&&this._nirBandIndexInput.set("value",this.nirBandIndex);this.redBandIndex&&this._redBandIndexInput.set("value",this.redBandIndex);this.indexType&&this._indexTypeInput.set("value",this.indexType)},_handleIndexTypeChange:function(a){e.set(this._soilLine,"display",3==a||6==a?"block":"none");e.set(this._greenVegetativeCover,"display",2==a?"block":"none");e.set(this._adjustmentFactor,"display",3==a?"block":"none")},_handleOptionsBtnClick:function(){b.contains(this._optionsDiv,
"disabled")||(b.contains(this._optionsDiv,"optionsClose")?(b.remove(this._optionsDiv,"optionsClose"),b.add(this._optionsDiv,"optionsOpen")):b.contains(this._optionsDiv,"optionsOpen")&&(b.remove(this._optionsDiv,"optionsOpen"),b.add(this._optionsDiv,"optionsClose")))},_setIndexTypeAttr:function(a){this.indexType=a},_getIndexTypeAttr:function(){this._indexTypeInput&&this._indexTypeInput.get("value")&&(this.indexType=this._indexTypeInput.get("value"));return this.indexType},_setNirBandIndexAttr:function(a){this.nirBandIndex=
a},_getNirBandIndexAttr:function(){this._nirBandIndexInput&&this._nirBandIndexInput.get("value")&&(this.nirBandIndex=this._nirBandIndexInput.get("value"));return this.nirBandIndex},_setRedBandIndexAttr:function(a){this.redBandIndex=a},_getRedBandIndexAttr:function(){this._redBandIndexInput&&this._redBandIndexInput.get("value")&&(this.redBandIndex=this._redBandIndexInput.get("value"));return this.redBandIndex},_setBandIndexesAttr:function(a){this.bandIndexes=a},_getBandIndexesAttr:function(){this._bandIndexesInput&&
this._bandIndexesInput.get("value")&&(this.bandIndexes=this._bandIndexesInput.get("value"));return this.bandIndexes}});g("extend-esri")&&f.setObject("dijit.analysis.MonitorVegetationTool",d,p);return d});