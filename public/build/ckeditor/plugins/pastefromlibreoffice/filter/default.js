!function(){function t(t,i){if(!(t.previous&&n(t.previous)&&t.getFirst().children.length&&1===t.children.length&&n(t.getFirst().getFirst())))return!1;for(var s=e(t.previous),l=0,a=s,o=function(){var t=!1;return function(e){return!t&&(n(e)||"li"===e.name?n(e):(t=!0,!1))}}();a=a.getAscendant(o);)l++;return!!(l=r(t,l))&&(s.add(l),l.filterChildren(i),!0)}function e(t){var r=t.children[t.children.length-1];return n(r)||"li"===r.name?e(r):t}function r(t,e){return e?r(t.getFirst().getFirst(),--e):t}function n(t){return"ol"===t.name||"ul"===t.name}function i(){return!1}var s=CKEDITOR.plugins.pastetools,l=s.filters.common,a=l.styles;CKEDITOR.plugins.pastetools.filters.libreoffice={rules:function(e,r,n){return{root:function(t){t.filterChildren(n)},comment:function(){return!1},elementNames:[[/^head$/i,""],[/^meta$/i,""],[/^strike$/i,"s"]],elements:{"!doctype":function(t){t.replaceWithChildren()},span:function(t){t.attributes.style&&(t.attributes.style=a.normalizedStyles(t,r),a.createStyleStack(t,n,r)),CKEDITOR.tools.object.entries(t.attributes).length||t.replaceWithChildren()},p:function(t){var e=CKEDITOR.tools.parseCssText(t.attributes.style);if(r.plugins.pagebreak&&("always"===e["page-break-before"]||"page"===e["break-before"])){var i=CKEDITOR.plugins.pagebreak.createElement(r);(i=CKEDITOR.htmlParser.fragment.fromHtml(i.getOuterHtml()).children[0]).insertBefore(t)}t.attributes.style=CKEDITOR.tools.writeCssText(e),t.filterChildren(n),a.createStyleStack(t,n,r)},div:function(t){a.createStyleStack(t,n,r)},a:function(t){if(t.attributes.style){var e=t.attributes;"#000080"===(t=CKEDITOR.tools.parseCssText(t.attributes.style)).color&&delete t.color,"underline"===t["text-decoration"]&&delete t["text-decoration"],t=CKEDITOR.tools.writeCssText(t),e.style=t}},h1:function(t){a.createStyleStack(t,n,r)},h2:function(t){a.createStyleStack(t,n,r)},h3:function(t){a.createStyleStack(t,n,r)},h4:function(t){a.createStyleStack(t,n,r)},h5:function(t){a.createStyleStack(t,n,r)},h6:function(t){a.createStyleStack(t,n,r)},pre:function(t){a.createStyleStack(t,n,r)},font:function(t){var e;(e="a"===t.parent.name&&"#000080"===t.attributes.color||1===t.parent.children.length&&("sup"===t.parent.name||"sub"===t.parent.name)&&"2"===t.attributes.size)&&t.replaceWithChildren(),e=CKEDITOR.tools.parseCssText(t.attributes.style);var r=t.getFirst();t.attributes.size&&r&&r.type===CKEDITOR.NODE_ELEMENT&&/font-size/.test(r.attributes.style)&&t.replaceWithChildren(),e["font-size"]&&(delete t.attributes.size,t.name="span",r&&r.type===CKEDITOR.NODE_ELEMENT&&r.attributes.size&&r.replaceWithChildren())},ul:function(e){if(t(e,n))return!1},ol:function(e){if(t(e,n))return!1},img:function(t){if(!t.attributes.src)return!1},table:function(t){var e=t.attributes;t=t.attributes.style;var r=CKEDITOR.tools.parseCssText(t);r["border-collapse"]||(r["border-collapse"]="collapse",t=CKEDITOR.tools.writeCssText(r)),e.style=t}},attributes:{style:function(t,e){return a.normalizedStyles(e,r)||!1},align:function(t,e){if("img"!==e.name){var r=CKEDITOR.tools.parseCssText(e.attributes.style);return r["text-align"]=e.attributes.align,e.attributes.style=CKEDITOR.tools.writeCssText(r),!1}},cellspacing:i,cellpadding:i,border:i}}}},CKEDITOR.pasteFilters.libreoffice=s.createFilter({rules:[l.rules,CKEDITOR.plugins.pastetools.filters.libreoffice.rules]})}();