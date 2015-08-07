/**
 * Created by jiefzz on 6/2/15.
 */

/**
 * 默认回调函数,更改传递的key值对应的input标签
 * @param ev
 */
function defaultUploadCallback(ev){
    var receiveObj = JSON.parse(ev.data);
    console.log("Receive data from postMessage(): "+receiveObj);
    $.each(receiveObj, function(index, item){
        if($("#"+index))
            $("#"+index).attr("value", item);
    });
}

/**
 * 设置自定义回调函数
 * @param callback
 */
function setUploadCallbackFunction(callback){
    if(callback && (callback  instanceof Function)){
        callbackFunction = callback;
    }
}

/**
 * 设置监听postMEssage的函数
 * @param callback
 */
function setUploadCallback(callback){
    if(callback && (callback  instanceof Function)){
        window.addEventListener("message", callback);
    }
}

function superUpload(key){
    //没设置回调函数的情况下设置回调
    if(!isSetCallback){
        if(callbackFunction){
            //使用自定义回调函数
            setUploadCallback(callbackFunction);
        } else {
            //使用默认回调函数
            setUploadCallback(defaultUploadCallback);
        }
        isSetCallback=true;
    }
    art.dialog.open(superUploadUrl+"?k="+key+"&pre="+window.location.host, {
        title: 'test_name',
        id: 'test_id',
        width: '650px',
        height: '420px',
        lock: true,
        fixed: true,
        background:"#CCCCCC",
        opacity:0,
        ok: function(){},
        cancel: true
    });
}