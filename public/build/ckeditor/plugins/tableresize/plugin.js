!function(){function e(e){return CKEDITOR.env.ie?e.$.clientWidth:parseInt(e.getComputedStyle("width"),10)}function t(e,t){var o=e.getComputedStyle("border-"+t+"-width"),n={thin:"0px",medium:"1px",thick:"2px"};return 0>o.indexOf("px")&&(o=o in n&&"none"!=e.getComputedStyle("border-style")?n[o]:0),parseFloat(o)}function o(e){(e.data||e).preventDefault()}function n(n){function a(){f=0,h.setOpacity(0),p&&l();var e=m.table;setTimeout((function(){e.removeCustomData("_cke_table_pillars")}),0),c.removeListener("dragstart",o)}function l(){for(var o=m.rtl,a=o?D.length:y.length,r=0,l=0;l<a;l++){var s=y[l],u=D[l],d=m.table;CKEDITOR.tools.setTimeout((function(e,t,l,s,u,m){e&&e.setStyle("width",i(Math.max(t+m,1))),l&&l.setStyle("width",i(Math.max(s-m,1))),u&&d.setStyle("width",i(u+m*(o?-1:1))),++r==a&&n.fire("saveSnapshot")}),0,this,[s,s&&e(s),u,u&&e(u),(!s||!u)&&e(d)+t(d,"left")+t(d,"right"),p])}}function s(t){o(t),n.fire("saveSnapshot"),t=m.index;for(var a=CKEDITOR.tools.buildTableMap(m.table),i=[],r=[],l=Number.MAX_VALUE,s=l,v=m.rtl,T=0,E=a.length;T<E;T++){var O=(x=a[T])[t+(v?1:0)],x=x[t+(v?0:1)];O=O&&new CKEDITOR.dom.element(O),x=x&&new CKEDITOR.dom.element(x);O&&x&&O.equals(x)||(O&&(l=Math.min(l,e(O))),x&&(s=Math.min(s,e(x))),i.push(O),r.push(x))}y=i,D=r,b=m.x-l,C=m.x+s,h.setOpacity(.5),g=parseInt(h.getStyle("left"),10),p=0,f=1,h.on("mousemove",d),c.on("dragstart",o),c.on("mouseup",u,this)}function u(e){e.removeListener(),a()}function d(e){v(e.data.getPageOffset().x)}var m,c,h,f,g,p,v,y,D,b,C;c=n.document,h=CKEDITOR.dom.element.createFromHtml('<div data-cke-temp=1 contenteditable=false unselectable=on style="position:absolute;cursor:col-resize;filter:alpha(opacity=0);opacity:0;padding:0;background-color:#004;background-image:none;border:0px none;z-index:10000"></div>',c),n.on("destroy",(function(){h.remove()})),r||c.getDocumentElement().append(h),this.attachTo=function(e){var t,o,n;f||(r&&(c.getBody().append(h),p=0),t=(m=e).alignedPillars[0],o=m.alignedPillars[m.alignedPillars.length-1],n=t.y,t=o.height+o.y-t.y,h.setStyles({width:i(e.width),height:i(t),left:i(e.x),top:i(n)}),r&&h.setOpacity(.25),h.on("mousedown",s,this),c.getBody().setStyle("cursor","col-resize"),h.show())},v=this.move=function(e,t){if(!m)return 0;if(!(f||e>=m.x&&e<=m.x+m.width&&t>=m.y&&t<=m.y+m.height))return m=null,f=p=0,c.removeListener("mouseup",u),h.removeListener("mousedown",s),h.removeListener("mousemove",d),c.getBody().setStyle("cursor","auto"),r?h.remove():h.hide(),0;var o=e-Math.round(h.$.offsetWidth/2);if(f){if(o==b||o==C)return 1;o=Math.max(o,b),o=Math.min(o,C),p=o-g}return h.setStyle("left",i(o)),1}}function a(e){var t=e.data.getTarget();if("mouseout"==e.name){if(!t.is("table"))return;for(var o=new CKEDITOR.dom.element(e.data.$.relatedTarget||e.data.$.toElement);o&&o.$&&!o.equals(t)&&!o.is("body");)o=o.getParent();if(!o||o.equals(t))return}t.getAscendant("table",1).removeCustomData("_cke_table_pillars"),e.removeListener()}var i=CKEDITOR.tools.cssLength,r=CKEDITOR.env.ie&&(CKEDITOR.env.ie7Compat||CKEDITOR.env.quirks);CKEDITOR.plugins.add("tableresize",{requires:"tabletools",init:function(e){e.on("contentDom",(function(){var i,r=e.editable(),l=r.isInline()?r:e.document;r.attachListener(l,"mousemove",(function(r){if((u=(r=r.data).getTarget()).type==CKEDITOR.NODE_ELEMENT){var l=r.getPageOffset().x,s=r.getPageOffset().y;if(i&&i.move(l,s))o(r);else if((u.is("table")||u.getAscendant({thead:1,tbody:1,tfoot:1},1))&&(r=u.getAscendant("table",1),e.editable().contains(r))){(u=r.getCustomData("_cke_table_pillars"))||(r.setCustomData("_cke_table_pillars",u=function(e){var o=[],n={},a="rtl"===e.getComputedStyle("direction"),i=CKEDITOR.tools.array.zip(new CKEDITOR.dom.nodeList(e.$.rows).toArray(),CKEDITOR.tools.buildTableMap(e));return CKEDITOR.tools.array.forEach(i,(function(i){var r=i[0].$;i=i[1];var l=-1,s=0,u=null;u=r?{height:(s=new CKEDITOR.dom.element(r)).$.offsetHeight,position:s.getDocumentPosition()}:void 0,r=CKEDITOR.env.ie&&!CKEDITOR.env.edge;for(var d="collapse"===e.getComputedStyle("border-collapse"),m=(s=u.height,u=u.position,0);m<i.length;m++){var c,h,f=new CKEDITOR.dom.element(i[m]),g=i[m+1]&&new CKEDITOR.dom.element(i[m+1]),p=f.getDocumentPosition().x;l+=f.$.colSpan||1,a?h=p+t(f,"left"):c=p+f.$.offsetWidth-t(f,"right"),g?(p=g.getDocumentPosition().x,a?c=p+g.$.offsetWidth-t(g,"right"):h=p+t(g,"left")):(p=e.getDocumentPosition().x,a?c=p:h=p+e.$.offsetWidth),f=Math.max(h-c,3),r&&d&&(c-=f,f=Math.max(h-c,3)),f={table:e,index:l,x:c,y:u.y,width:f,height:s,rtl:a},n[l]=n[l]||[],n[l].push(f),f.alignedPillars=n[l],o.push(f)}})),o}(r)),r.on("mouseout",a),r.on("mousedown",a));e:{r=u;for(var u=0,d=r.length;u<d;u++){var m=r[u];if(l>=m.x&&l<=m.x+m.width&&s>=m.y&&s<=m.y+m.height){l=m;break e}}l=null}l&&(!i&&(i=new n(e)),i.attachTo(l))}}})),r.attachListener(l,"scroll",(function(){var e=r.find("table").toArray();CKEDITOR.tools.array.forEach(e,CKEDITOR.tools.debounce((function(e){e.removeCustomData("_cke_table_pillars")}),200))}))}))}})}();