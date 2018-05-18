// All material copyright ESRI, All Rights Reserved, unless otherwise specified.
// See http://js.arcgis.com/3.19/esri/copyright.txt for details.
//>>built
define("esri/layers/vectorTiles/views/support/screenshotUtils",["require","exports","dojo/_base/lang"],function(D,m,t){m.adjustScreenshotSettings=function(a,c){a=t.mixin({format:"png",quality:100},a||{});var d,e;a.includePadding?(d=c.width,e=c.height):(d=c.width-c.padding.left-c.padding.right,e=c.height-c.padding.top-c.padding.bottom);var h=d/e;void 0!==a.width&&void 0===a.height?a.height=a.width/h:void 0!==a.height&&void 0===a.width&&(a.width=h*a.height);void 0!==a.height&&(a.height=Math.floor(a.height));
void 0!==a.width&&(a.width=Math.floor(a.width));!a.area&&!a.includePadding&&(a.area={x:c.padding.left,y:c.padding.top,width:d,height:e});return a};m.resampleHermite=function(a,c,d,e,h,u,v){void 0===v&&(v=!0);var n=c/h;d/=u;for(var m=Math.ceil(n/2),t=Math.ceil(d/2),g=0;g<u;g++)for(var k=0;k<h;k++){for(var p=4*(k+(v?u-g-1:g)*h),b=0,l=0,w=0,x=0,y=0,z=0,A=0,B=(g+0.5)*d,q=Math.floor(g*d);q<(g+1)*d;q++)for(var r=Math.abs(B-(q+0.5))/t,C=(k+0.5)*n,r=r*r,s=Math.floor(k*n);s<(k+1)*n;s++){var f=Math.abs(C-(s+
0.5))/m,b=Math.sqrt(r+f*f);-1<=b&&1>=b&&(b=2*b*b*b-3*b*b+1,0<b&&(f=4*(s+q*c),A+=b*a[f+3],w+=b,255>a[f+3]&&(b=b*a[f+3]/250),x+=b*a[f],y+=b*a[f+1],z+=b*a[f+2],l+=b))}e[p]=x/l;e[p+1]=y/l;e[p+2]=z/l;e[p+3]=A/w}}});