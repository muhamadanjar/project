// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.19/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/vectorTiles/VectorTileDisplayObject","require exports ../../core/tsSupport/extendsHelper ../webgl/BufferObject ../2d/engine/DisplayObject ../../core/libs/gl-matrix/vec2 ../../core/libs/gl-matrix/mat4 ./RenderBucket".split(" "),function(t,u,p,g,q,r,s,m){return function(n){function f(b,c,l,d,e,a,h,g,k,f,m){n.call(this);this._renderBuckets=[];this._symbolUpdateData=this._vectorTileData=null;this.topLeft=[0,0];this.bottomRight=[0,0];this.tileTransform={transform:Float32Array[16],
displayCoord:Float32Array[2]};this.stencilData={mask:0,reference:0};this.key=b;this.refKey=c;this.topLeft[0]=l[0];this.topLeft[1]=l[1];this.bottomRight[0]=l[2];this.bottomRight[1]=l[3];this.widthInPixels=d;this.coordRange=e;this.rotation=a;this._vectorTileData=h;this.styleLayers=g;this._glyphsMosaic=k;this.workerID=f;this._connection=m;this.id=b.id;this.status=3;this.tileTransform.transform=s.create();this.tileTransform.displayCoord=r.create()}p(f,n);f.prototype.updateSymbolData=function(b){b&&(this._symbolUpdateData=
b,this.requestRender())};f.prototype.dispose=function(){-1!==this.workerID&&(this._connection&&6!==this.status&&7!==this.status)&&this._connection.broadcast("destructTileData",{key:this.id,worker:this.workerID},[]);this.polygonTrianglesVertexArrayObject&&(this.polygonTrianglesVertexArrayObject.dispose(),this.polygonTrianglesVertexArrayObject=null);this.polygonOutlineVertexArrayObject&&(this.polygonOutlineVertexArrayObject.dispose(),this.polygonOutlineVertexArrayObject=null);this.lineTrianglesVertexArrayObject&&
(this.lineTrianglesVertexArrayObject.dispose(),this.lineTrianglesVertexArrayObject=null);this.lineJoinsVertexArrayObject&&(this.lineJoinsVertexArrayObject.dispose(),this.lineJoinsVertexArrayObject=null);this.iconVertexArrayObject&&(this.iconVertexArrayObject.dispose(),this.iconVertexArrayObject=null);this.textVertexArrayObject&&(this.textVertexArrayObject.dispose(),this.textVertexArrayObject=null);this.polygonTrianglesVertexBuffer&&(this.polygonTrianglesVertexBuffer.dispose(),this.polygonTrianglesVertexBuffer=
null);this.polygonTrianglesIndexBuffer&&(this.polygonTrianglesIndexBuffer.dispose(),this.polygonTrianglesIndexBuffer=null);this.polygonOutlinesVertexBuffer&&(this.polygonOutlinesVertexBuffer.dispose(),this.polygonOutlinesVertexBuffer=null);this.polygonOutlinesIndexBuffer&&(this.polygonOutlinesIndexBuffer.dispose(),this.polygonOutlinesIndexBuffer=null);this.lineVertexBuffer&&(this.lineVertexBuffer.dispose(),this.lineVertexBuffer=null);this.lineTrianglesIndexBuffer&&(this.lineTrianglesIndexBuffer.dispose(),
this.lineTrianglesIndexBuffer=null);this.lineJoinVertexBuffer&&(this.lineJoinVertexBuffer.dispose(),this.lineJoinVertexBuffer=null);this.iconVertexBuffer&&(this.iconVertexBuffer.dispose(),this.iconVertexBuffer=null);this.iconIndexBuffer&&(this.iconIndexBuffer.dispose(),this.iconIndexBuffer=null);this.textVertexBuffer&&(this.textVertexBuffer.dispose(),this.textVertexBuffer=null);this.textIndexBuffer&&(this.textIndexBuffer.dispose(),this.textIndexBuffer=null);this._renderBuckets=[];this.status=7};f.prototype.attach=
function(b){this.status=3;if(!this._vectorTileData)return!1;if(0===this._renderBuckets.length)for(var c=new Uint32Array(this._vectorTileData.bucketDataInfo),l=c.length,d=0;d<l;){var e=c[d],a=c[d+1];0===a?(a=new m.BackgroundRenderBucket,a.layerID=e,this._renderBuckets.push(a),d+=2):1===a?(a=new m.FillRenderBucket,a.layerID=e,a.triangleElementStart=c[d+2],a.triangleElementCount=c[d+3],a.outlineElementStart=c[d+4],a.outlineElementCount=c[d+5],this._renderBuckets.push(a),d+=6):2===a?(a=new m.LineRenderBucket,
a.layerID=e,a.triangleElementStart=c[d+2],a.triangleElementCount=c[d+3],a.joinStart=c[d+4],a.joinCount=c[d+5],this._renderBuckets.push(a),d+=6):3===a?(a=new m.SymbolRenderBucket,a.layerID=e,a.markerElementStart=c[d+2],a.marketElementCount=c[d+3],a.textElementStart=c[d+4],a.textElementCount=c[d+5],a.isSDF=0!==c[d+6],this._renderBuckets.push(a),d+=7):console.error("Bad bucket type!")}c=b.context;b=b.budget;l=new Uint32Array(this._vectorTileData.bufferDataInfo);d=l.length;for(a=e=0;a<d;a+=2,e++){var h=
l[a],f=l[a+1];if(!(0>=f||0===this._vectorTileData.bufferData[e].byteLength)){if(b&&b.done)return!1;switch(h){case 2:this.polygonTrianglesVertexBuffer||(this.polygonTrianglesVertexBuffer=g.createVertex(c,35044,this._vectorTileData.bufferData[e]));break;case 6:this.polygonTrianglesIndexBuffer||(this.polygonTrianglesIndexBuffer=g.createIndex(c,35044,new Uint32Array(this._vectorTileData.bufferData[e],0,f/4)));break;case 3:this.polygonOutlinesVertexBuffer||(this.polygonOutlinesVertexBuffer=g.createVertex(c,
35044,this._vectorTileData.bufferData[e]));break;case 7:this.polygonOutlinesIndexBuffer||(this.polygonOutlinesIndexBuffer=g.createIndex(c,35044,new Uint32Array(this._vectorTileData.bufferData[e],0,f/4)));break;case 0:this.lineVertexBuffer||(this.lineVertexBuffer=g.createVertex(c,35044,this._vectorTileData.bufferData[e]));break;case 8:this.lineTrianglesIndexBuffer||(this.lineTrianglesIndexBuffer=g.createIndex(c,35044,this._vectorTileData.bufferData[e]));break;case 1:this.lineJoinVertexBuffer||(this.lineJoinVertexBuffer=
g.createVertex(c,35044,this._vectorTileData.bufferData[e]));break;case 4:this.iconVertexBuffer||(this.iconVertexBuffer=g.createVertex(c,35044,this._vectorTileData.bufferData[e]));break;case 9:this.iconIndexBuffer||(this.iconIndexBuffer=g.createIndex(c,35044,new Uint32Array(this._vectorTileData.bufferData[e],0,f/4)));break;case 5:this.textVertexBuffer||(this.textVertexBuffer=g.createVertex(c,35044,this._vectorTileData.bufferData[e]));break;case 10:this.textIndexBuffer||(this.textIndexBuffer=g.createIndex(c,
35044,new Uint32Array(this._vectorTileData.bufferData[e],0,f/4)))}}}this.status=4;return!0};f.prototype.detach=function(b){};f.prototype.render=function(b){if(this.visible&&4===this.status){var c=b.context,g=b.renderer;if(c&&g){var d=b.drawphase;this._symbolUpdateData&&this._updateSymbolData(b);c.setStencilFunction(514,this.stencilData.reference,this.stencilData.mask);var e=this.styleLayers,a=void 0!==b.layerOpacity?b.layerOpacity:1;if(0!==a){var h,f=this._renderBuckets.length,k=0;if(0===d)for(k=
f-1;0<=k;k--)h=this._renderBuckets[k],3!==h.type&&h.hasData()&&g.renderBucket(c,h,b.displayLevel,b.requiredLevel,d,this,e.layers[h.layerID],a);else for(k=0;k<f;k++)h=this._renderBuckets[k],h.hasData()&&g.renderBucket(c,h,b.displayLevel,b.requiredLevel,d,this,e.layers[h.layerID],a)}}}};f.prototype._updateSymbolData=function(b){var c=new Uint32Array(this._symbolUpdateData.bucketDataInfo),f=c.length;if(0===f)return this._symbolUpdateData=null,!0;if(1>b.budget.remaining)return this.requestRender(),!1;
b=b.context;b.bindVAO(null);for(var d=new Uint32Array(this._symbolUpdateData.bufferDataInfo),e=d.length,a=0,h=0;h<e;h+=2,a++){var n=d[h],k=d[h+1];if(!(0>=k||0===this._symbolUpdateData.bufferData[a].byteLength))switch(n){case 4:this.iconVertexBuffer&&(this.iconVertexBuffer.dispose(),this.iconVertexBuffer=null);this.iconVertexBuffer=g.createVertex(b,35044,this._symbolUpdateData.bufferData[a]);break;case 9:this.iconIndexBuffer&&(this.iconIndexBuffer.dispose(),this.iconIndexBuffer=null);this.iconIndexBuffer=
g.createIndex(b,35044,new Uint32Array(this._symbolUpdateData.bufferData[a],0,k/4));break;case 5:this.textVertexBuffer&&(this.textVertexBuffer.dispose(),this.textVertexBuffer=null);this.textVertexBuffer=g.createVertex(b,35044,this._symbolUpdateData.bufferData[a]);break;case 10:this.textIndexBuffer&&(this.textIndexBuffer.dispose(),this.textIndexBuffer=null),this.textIndexBuffer=g.createIndex(b,35044,new Uint32Array(this._symbolUpdateData.bufferData[a],0,k/4))}}b=0;for(d=this._renderBuckets.length;b<
d;b++)this._renderBuckets[b]instanceof m.SymbolRenderBucket&&(e=this._renderBuckets[b],e.markerElementStart=0,e.marketElementCount=0,e.textElementStart=0,e.textElementCount=0);for(e=0;e<f;){h=c[e];a=-1;b=0;for(d=this._renderBuckets.length;b<d;b++)if(this._renderBuckets[b].layerID===h){a=b;break}-1===a&&console.log("bucket not found");if(b=this._renderBuckets[a])b.markerElementStart=c[e+2],b.marketElementCount=c[e+3],b.textElementStart=c[e+4],b.textElementCount=c[e+5];e+=7}this.iconVertexArrayObject&&
(this.iconVertexArrayObject.dispose(),this.iconVertexArrayObject=null);this.textVertexArrayObject&&(this.textVertexArrayObject.dispose(),this.textVertexArrayObject=null);this._symbolUpdateData=null;return!0};return f}(q)});