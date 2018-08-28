/*! Built with http://stenciljs.com */
DocsSite.loadBundle("ytwigzvv",["exports"],function(e){var t=window.DocsSite.h,n=function(){function e(){this.selectedIcon="",this.selectedIconType="md",this.isHeaderSearchVisible=!1,this.query=""}return e.prototype.escListener=function(e){"Escape"===e.code&&this.selectedIcon.length&&(this.selectedIcon="")},e.prototype.handleBodyClicked=function(){this.selectedIcon.length&&(this.selectedIcon="")},e.prototype.handleClearToast=function(){this.selectedIcon=""},e.prototype.handleScroll=function(){requestAnimationFrame(this.checkScroll.bind(this))},e.prototype.checkScroll=function(){for(var e=this.el.querySelectorAll(".icon-list__header-bar"),t=0;t<e.length;t++){var n=e[t];n.getBoundingClientRect().top<67?n.classList.add("sticky"):n.classList.remove("sticky")}},e.prototype.filterIcons=function(){var e=this.query.trim().toLowerCase(),t={icon:[],logo:[]};return this.data.icons.forEach(function(n){(""===e||n.tags.some(function(t){return t.indexOf(e)>-1}))&&n.icons.forEach(function(e){switch(e.substr(0,e.indexOf("-"))){case"ios":t.icon.push({name:n.name});break;case"logo":t.logo.push({name:n.name,icon:e});break;default:return}})}),t},e.prototype.handleIconMouseEnter=function(e){e.target.classList.remove("mouseOff"),e.target.classList.add("mouseOver")},e.prototype.handleIconMouseLeave=function(e){e.target.classList.remove("mouseOver"),e.target.classList.add("mouseOff")},e.prototype.handleIconClick=function(e,t){e.stopPropagation(),this.selectedIcon=t},e.prototype.handleToggleClick=function(e){e.stopPropagation(),"md"===this.selectedIconType?this.selectedIconType="ios":this.selectedIconType="md"},e.prototype.render=function(){var e=this,n=this.filterIcons(),o=this.data.icons.find(function(t){return t.name===e.selectedIcon});return n.icon.length||n.logo.length||!this.isHeaderSearchVisible||(document.documentElement.scrollTop=0),t("div",{class:"icon-list"},t("div",{class:"icon-list__search container--small"},t("icon-search",{query:this.query,size:"large",autofocus:"autofocus"})),n.icon.length?t("div",{class:"icon-list__wrapper"},t("div",{class:"icon-list__header-bar"},t("div",{class:"container--small"},t("h4",null,"App icons"),t("ul",{class:"toggle"},t("li",{class:"toggle__item "+("md"===this.selectedIconType?"active":""),onClick:function(t){return e.handleToggleClick(t)}},"Material style"),t("li",{class:"toggle__item "+("ios"===this.selectedIconType?"active":""),onClick:function(t){return e.handleToggleClick(t)}},"iOS style")))),t("div",{class:"container--small"},t("div",{class:"icon-results"},n.icon.map(function(n){return t("span",{class:"icon-results__cell "+(e.selectedIcon===n.name?"active":""),onClick:function(t){return e.handleIconClick(t,n.name)},onMouseEnter:function(t){return e.handleIconMouseEnter(t)},onMouseLeave:function(t){return e.handleIconMouseLeave(t)}},t("i",{class:"ion ion-"+e.selectedIconType+"-"+n.name}))})))):"",n.logo.length?t("div",{class:"icon-list__wrapper"},t("div",{class:"icon-list__header-bar"},t("div",{class:"container--small"},t("h4",null,"Logos"))),t("div",{class:"container--small"},t("div",{class:"icon-results"},n.logo.map(function(n){return t("span",{class:"icon-results__cell "+(e.selectedIcon===n.name?"active":""),onClick:function(t){return e.handleIconClick(t,n.name)},onMouseEnter:function(t){return e.handleIconMouseEnter(t)},onMouseLeave:function(t){return e.handleIconMouseLeave(t)}},t("i",{class:"ion ion-"+n.icon}))})))):"",n.icon.length||n.logo.length?"":t("div",{class:"icon-results--empty container--small"},t("h2",null,'No results for "',this.query,'"'),t("p",null,"Not finding an icon that you want? ",t("a",{href:"https://github.com/ionic-team/ionicons/issues"},"File an issue")," and suggest a new icon.")),t("toast-bar",{selectedIcon:o,selectedIconType:this.selectedIconType}))},Object.defineProperty(e,"is",{get:function(){return"icon-list"},enumerable:!0,configurable:!0}),Object.defineProperty(e,"properties",{get:function(){return{data:{type:"Any",attr:"data"},el:{elementRef:!0},isHeaderSearchVisible:{state:!0},query:{type:String,attr:"query"},selectedIcon:{state:!0},selectedIconType:{state:!0}}},enumerable:!0,configurable:!0}),Object.defineProperty(e,"listeners",{get:function(){return[{name:"body:keyup",method:"escListener"},{name:"body:click",method:"handleBodyClicked"},{name:"clearToast",method:"handleClearToast"},{name:"window:scroll",method:"handleScroll",passive:!0}]},enumerable:!0,configurable:!0}),Object.defineProperty(e,"style",{get:function(){return"icon-list .icon-list{margin-bottom:100px}icon-list .icon-list__search+.icon-list__wrapper{padding-top:90px}icon-list .icon-list__header-bar{-webkit-transition:-webkit-box-shadow .6s;transition:-webkit-box-shadow .6s;transition:box-shadow .6s;transition:box-shadow .6s,-webkit-box-shadow .6s;margin-bottom:14px;height:52px;background-color:#fff;-webkit-box-shadow:0;box-shadow:0;z-index:99}icon-list .icon-list__header-bar.sticky{position:-webkit-sticky;position:sticky;top:58px;-webkit-box-shadow:0 2px 4px 0 rgba(0,0,0,.06);box-shadow:0 2px 4px 0 rgba(0,0,0,.06)}icon-list .icon-list__header-bar .container--small{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between}icon-list .icon-list__header-bar h4{margin-top:21px;margin-bottom:0}icon-list .icon-results{display:grid;grid-template-columns:repeat(auto-fill,minmax(70px,1fr));grid-auto-rows:minmax(70px,auto);grid-gap:.5em;padding-bottom:60px;margin-left:-20px;margin-right:-20px}icon-list .icon-results .ion,icon-list .icon-results__cell{display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:center;-ms-flex-pack:center;justify-content:center}icon-list .icon-results__cell{-webkit-transition:background-color .4s;transition:background-color .4s;cursor:pointer;border-radius:8px;border:2px solid transparent;-webkit-box-sizing:border-box;box-sizing:border-box;-webkit-tap-highlight-color:rgba(236,240,246,.4)}icon-list .icon-results__cell .ion{width:42px;height:42px;font-size:32px;color:#373737}icon-list .icon-results__cell:not(.active).mouseOver{-webkit-animation-name:shadowIn;animation-name:shadowIn;-webkit-animation-duration:.3s;animation-duration:.3s;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards}\@-webkit-keyframes shadowIn{from{-webkit-box-shadow:0;box-shadow:0}to{-webkit-box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08);box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08)}}\@keyframes shadowIn{from{-webkit-box-shadow:0;box-shadow:0}to{-webkit-box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08);box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08)}}icon-list .icon-results__cell.active,icon-list .icon-results__cell:not(.active).mouseOff{-webkit-animation-name:shadowOut;animation-name:shadowOut;-webkit-animation-duration:.6s;animation-duration:.6s;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards}icon-list .icon-results__cell.active{-webkit-animation-duration:.3s;animation-duration:.3s;background-color:var(--color-catskill-white);cursor:default}\@-webkit-keyframes shadowOut{from{-webkit-box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08);box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08)}to{-webkit-box-shadow:0;box-shadow:0}}\@keyframes shadowOut{from{-webkit-box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08);box-shadow:0 3px 6px 0 rgba(0,0,0,.1),0 1px 3px 0 rgba(0,0,0,.08)}to{-webkit-box-shadow:0;box-shadow:0}}icon-list .icon-results--empty{text-align:center;padding-top:70px}icon-list .icon-results--empty h2{margin-top:0}icon-list .toggle{list-style-type:none;display:-webkit-box;display:-ms-flexbox;display:flex;margin-right:-4px;position:relative;bottom:-3px;margin-top:18px}icon-list .toggle__item{-webkit-transition:opacity .3s,padding-bottom .1s;transition:opacity .3s,padding-bottom .1s;opacity:.5;text-decoration:none;font-size:13px;font-weight:600;color:var(--color-dodger-blue);border-bottom:2px solid transparent}icon-list .toggle__item:not(.active){cursor:pointer}icon-list .toggle__item.active,icon-list .toggle__item:hover{opacity:1}icon-list .toggle__item.active{border-bottom:2px solid var(--color-dodger-blue);padding-bottom:2px}icon-list .toggle__item+.toggle__item{margin-left:20px}icon-list .icon-list__header-bar.sticky .toggle__item{padding-bottom:11px}\@media screen and (max-width:768px){icon-list .icon-results{margin-left:0;margin-right:0}icon-list .icon-list__search+.icon-list__wrapper{padding-top:40px}}\@media screen and (max-width:560px){icon-list .icon-results__cell.active,icon-list .icon-results__cell:not(.active).mouseOff,icon-list .icon-results__cell:not(.active).mouseOver{-webkit-animation-name:none;animation-name:none;-webkit-box-shadow:0;box-shadow:0}}"},enumerable:!0,configurable:!0}),e}(),o=function(){function e(){this.query=""}return e.prototype.render=function(){return t("main",null,t("div",{class:"wrapper"},t("div",{class:"container"},t("div",{class:"content"},t("h1",null,"Beautifully crafted open source icons"),t("p",{class:"lead"},"Premium designed icons for use in web, iOS, Android, and desktop apps. Support for SVG and web font. Completely open source, MIT licensed."))),t("icon-list",{query:this.query,data:this.data})),t("footer-bar",null))},Object.defineProperty(e,"is",{get:function(){return"landing-page"},enumerable:!0,configurable:!0}),Object.defineProperty(e,"properties",{get:function(){return{data:{type:"Any",attr:"data"},el:{elementRef:!0},query:{type:String,attr:"query"}}},enumerable:!0,configurable:!0}),Object.defineProperty(e,"style",{get:function(){return"landing-page{height:100%}landing-page .lead,landing-page h1{text-align:center}landing-page .lead{margin-bottom:40px}"},enumerable:!0,configurable:!0}),e}(),s=function(){function e(){this.hadIconOnce=!1}return e.prototype.handleCodeClick=function(e){var t=this,n=this.el.querySelector(".toast-bar__section:first-child"),o=document.createElement("textarea");o.value='<ion-icon name="'+e+'"></ion-icon>',o.setAttribute("readonly",""),o.style.position="absolute",o.style.left="-9999px",document.body.appendChild(o),o.select(),document.execCommand("copy"),document.body.removeChild(o),this.showCopiedConfirm&&(window.clearTimeout(this.showCopiedConfirm),this.showCopiedConfirm=0),n.classList.add("copied"),this.showCopiedConfirm=window.setTimeout(function(){n.classList.remove("copied"),t.showCopiedConfirm=0},1500)},e.prototype.componentDidLoad=function(){this.el.addEventListener("touchstart",this.handleTouchStart.bind(this),!1),this.el.addEventListener("touchend",this.handleTouchEnd.bind(this),!1)},e.prototype.handleTouchStart=function(e){e.target.classList.contains("toast-bar--inner")&&(e.preventDefault(),this.touchStartY=e.changedTouches[0].screenY)},e.prototype.handleTouchEnd=function(e){e.target.classList.contains("toast-bar--inner")&&(e.preventDefault(),this.touchEndY=e.changedTouches[0].screenY,this.touchEndY>this.touchStartY&&this.clearToast.emit())},e.prototype.render=function(){var e,n,o,s=this,i=null;return this.selectedIcon&&(this.hadIconOnce||(this.hadIconOnce=!0),o=this.selectedIcon.name,"logo"===(n=this.selectedIcon.icons[0].startsWith("logo-")?"logo":this.selectedIconType)&&(o="logo-"+o),e=8*('<ion-icon name="'+o+'"></ion-icon>').length+32,i=this.selectedIcon.icons.map(function(e){var n;switch(e.substr(0,e.indexOf("-"))){case"ios":n="iOS STYLE";break;case"md":n="MATERIAL STYLE";break;case"logo":n="LOGO"}return t("div",{class:"toast-bar__section"},t("div",{class:"toast-bar__section-header"},t("h6",null,n)),t("div",{class:"btn-group"},t("div",{class:"btn btn--gray btn--small btn--icon"},t("i",{class:"ion ion-"+e})),t("a",{class:"btn btn--gray btn--small",download:"/ionicons/svg/"+e+".svg",href:"/ionicons/svg/"+e+".svg"},t("i",{class:"ion ion-md-download"}),"SVG")))})),t("div",{class:"toast-bar "+(this.selectedIcon?"isVisible":"")+" "+(!this.selectedIcon&&this.hadIconOnce?"isHidden":"")+" "+(this.hadIconOnce?"":"preload"),onClick:function(e){return e.stopPropagation()}},t("div",{class:"container"},t("div",{class:"toast-bar--inner"},this.selectedIcon&&t("h4",null,this.selectedIcon.name),this.selectedIcon&&t("div",{class:"toast-bar__details"},t("div",{class:"toast-bar__section",style:{maxWidth:e+"px"}},t("div",{class:"toast-bar__section-header"},t("div",null,t("h6",null,"Web component code"),t("span",{class:"confirmation"},t("i",{class:"ion ion-md-checkmark"}),"Copied")),t("stencil-route-link",{url:"/usage#"+n+"-"+this.selectedIcon.name,onClick:function(){return s.toggleHeaderSearch.emit("hide")}},"Usage",t("i",{class:"ion ion-ios-arrow-forward"}))),t("code",null,t("span",{class:"hover-highlight",onClick:function(){return s.handleCodeClick(o)}},"<",t("span",{class:"yellow"},"ion-icon")," ",t("span",{class:"orange"},"name"),"=",t("span",{class:"green"},'"'+o+'"'),">","</",t("span",{class:"yellow"},"ion-icon"),">"))),i))))},Object.defineProperty(e,"is",{get:function(){return"toast-bar"},enumerable:!0,configurable:!0}),Object.defineProperty(e,"properties",{get:function(){return{el:{elementRef:!0},hadIconOnce:{state:!0},selectedIcon:{type:"Any",attr:"selected-icon"},selectedIconType:{type:String,attr:"selected-icon-type"},showCopiedConfirm:{state:!0},touchEndY:{state:!0},touchStartY:{state:!0}}},enumerable:!0,configurable:!0}),Object.defineProperty(e,"events",{get:function(){return[{name:"clearToast",method:"clearToast",bubbles:!0,cancelable:!0,composed:!0},{name:"toggleHeaderSearch",method:"toggleHeaderSearch",bubbles:!0,cancelable:!0,composed:!0}]},enumerable:!0,configurable:!0}),Object.defineProperty(e,"style",{get:function(){return"toast-bar .toast-bar{position:fixed;padding:12px 0;left:0;bottom:0;width:100%;-webkit-transform:translateY(100%);transform:translateY(100%)}toast-bar .toast-bar.isVisible{-webkit-animation-name:slideIn;animation-name:slideIn;-webkit-animation-duration:.6s;animation-duration:.6s;-webkit-animation-timing-function:var(--easeOutExpo);animation-timing-function:var(--easeOutExpo);-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards;opacity:1}\@-webkit-keyframes slideIn{from{-webkit-transform:translateY(100%);transform:translateY(100%)}to{-webkit-transform:translateY(0);transform:translateY(0)}}\@keyframes slideIn{from{-webkit-transform:translateY(100%);transform:translateY(100%)}to{-webkit-transform:translateY(0);transform:translateY(0)}}toast-bar .toast-bar.isHidden{-webkit-animation-name:slideOut;animation-name:slideOut;-webkit-animation-duration:.4s;animation-duration:.4s;-webkit-animation-timing-function:var(--easeOutExpo);animation-timing-function:var(--easeOutExpo);-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards}\@-webkit-keyframes slideOut{0%{opacity:1;-webkit-transform:translateY(0);transform:translateY(0)}99%{opacity:1}100%{opacity:0;-webkit-transform:translateY(100%);transform:translateY(100%)}}\@keyframes slideOut{0%{opacity:1;-webkit-transform:translateY(0);transform:translateY(0)}99%{opacity:1}100%{opacity:0;-webkit-transform:translateY(100%);transform:translateY(100%)}}toast-bar .toast-bar.preload{opacity:0}toast-bar .toast-bar--inner{background-color:var(--color-shark);height:80px;border-radius:15px;padding:0 20px 0 30px;color:#fff;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-shadow:0 16px 32px 0 rgba(0,0,0,.1),0 8px 16px 0 rgba(0,0,0,.08);box-shadow:0 16px 32px 0 rgba(0,0,0,.1),0 8px 16px 0 rgba(0,0,0,.08)}toast-bar .toast-bar--inner h4{color:#fff;margin:0 30px 0 0;white-space:nowrap}toast-bar .toast-bar__details{-webkit-box-flex:1;-ms-flex:1 0 auto;flex:1 0 auto;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:end;-ms-flex-pack:end;justify-content:flex-end}toast-bar .toast-bar__section-header,toast-bar .toast-bar__section-header>div{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;-webkit-box-align:center;-ms-flex-align:center;align-items:center}toast-bar .toast-bar__section-header{height:10px;margin-bottom:7px}toast-bar .toast-bar__section-header h6{display:inline-block}toast-bar .toast-bar__section-header a{-webkit-transition:border .3s;transition:border .3s;color:var(--color-melrose);font-size:9px;font-weight:600;text-transform:uppercase;letter-spacing:.05em;text-decoration:none;border-bottom:1px solid transparent}toast-bar .toast-bar__section-header a:hover{border-bottom-color:var(--color-melrose-dark)}toast-bar .toast-bar__section-header i{margin-left:3px}toast-bar .toast-bar__section:not(:first-child){margin-left:20px}toast-bar .toast-bar__section:first-child{position:relative;max-width:none}toast-bar .toast-bar__details code{position:relative;-webkit-box-sizing:border-box;box-sizing:border-box;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-align:center;-ms-flex-align:center;align-items:center;font-size:14px;line-height:14px;height:32px;padding:0 12px;cursor:text;overflow:hidden}\@supports (display:grid){toast-bar .toast-bar__section:not(:first-child){-webkit-box-flex:0;-ms-flex:0;flex:0}toast-bar .toast-bar__section:first-child{-webkit-box-flex:1;-ms-flex:1;flex:1}toast-bar .toast-bar__details code{overflow-x:auto}}toast-bar .toast-bar__details code>span{position:absolute;white-space:nowrap}toast-bar .toast-bar__section .confirmation{font-size:11px;font-family:Eina;font-weight:600;color:#aec6ff;display:-webkit-box;display:-ms-flexbox;display:flex;opacity:0;-webkit-transform:translateY(5px);transform:translateY(5px);margin-left:12px}toast-bar .toast-bar__section .confirmation .ion{color:#aec6ff;font-size:14px;margin-right:4px}toast-bar .toast-bar__section.copied .confirmation{-webkit-animation-name:slideInOut;animation-name:slideInOut;-webkit-animation-duration:1.5s;animation-duration:1.5s;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards}\@-webkit-keyframes slideInOut{0%{opacity:0;-webkit-transform:translateY(5px);transform:translateY(5px)}10%,90%{opacity:.9;-webkit-transform:translateY(0);transform:translateY(0)}100%{opacity:0;-webkit-transform:translateY(-5px);transform:translateY(-5px)}}\@keyframes slideInOut{0%{opacity:0;-webkit-transform:translateY(5px);transform:translateY(5px)}10%,90%{opacity:.9;-webkit-transform:translateY(0);transform:translateY(0)}100%{opacity:0;-webkit-transform:translateY(-5px);transform:translateY(-5px)}}toast-bar .toast-bar__details code:hover .hover-highlight{background-color:#5882b2}\@media screen and (max-width:768px){toast-bar .toast-bar__section:not(:first-child){display:none}}\@media screen and (max-width:540px){toast-bar .toast-bar--inner{padding:16px;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;-webkit-box-align:start;-ms-flex-align:start;align-items:flex-start;height:auto}toast-bar .toast-bar--inner h4{margin:0 0 16px}toast-bar .toast-bar__section{max-width:100%!important}toast-bar .toast-bar__details{-webkit-box-flex:0;-ms-flex:0 0 auto;flex:0 0 auto;width:100%}}"},enumerable:!0,configurable:!0}),e}();e.IconList=n,e.LandingPage=o,e.ToastBar=s,Object.defineProperty(e,"__esModule",{value:!0})});