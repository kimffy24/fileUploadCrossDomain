/**
 * Created by jiefzz on 5/20/15.
 */

/**
 * 请修改此处为你设定的域名存放此项目的域名
 * @type {string}
 */
var fileServiceHost = undefined==storageHost?window.location.origin:storageHost;

var superUploadUrl = fileServiceHost+"/utils/upload/v1/uploadDialogChild.html";
var mainFunctionJs = fileServiceHost+"/utils/upload/v1/embedded_main.js";

$.getScript(fileServiceHost+"/share/js/artDialog/artDialog.js",function(){});
$.getScript(fileServiceHost+"/share/js/artDialog/iframeTools.js?v=",function(){});

function loadCss( url ){
    var link = document.createElement( "link" );
    link.type = "text/css";
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName( "head" )[0].appendChild( link );
};

loadCss(fileServiceHost+"/share/js/artDialog/skins/blue.css");


var callbackFunction = undefined;
var isSetCallback = false;

$.getScript(mainFunctionJs+"?v=NiuBiA",function(){});