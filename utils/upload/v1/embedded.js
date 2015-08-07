/**
 * Created by jiefzz on 5/20/15.
 */

/**
 * 请修改此处为你设定的域名存放此项目的域名
 * @type {string}
 */
var hostOnSpro = "http://file.test";

var superUploadUrl = hostOnSpro+"/utils/upload/v1/show.php";
var mainFunctionJs = hostOnSpro+"/utils/upload/v1/embedded_main.js";

$.getScript(hostOnSpro+"/share/js/artDialog/artDialog.js",function(){});
$.getScript(hostOnSpro+"/share/js/artDialog/iframeTools.js?v=",function(){});

function loadCss( url ){
    var link = document.createElement( "link" );
    link.type = "text/css";
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName( "head" )[0].appendChild( link );
};

loadCss(hostOnSpro+"/share/js/artDialog/skins/blue.css");


var callbackFunction = undefined;
var isSetCallback = false;

$.getScript(mainFunctionJs+"?v=NiuBiA",function(){});