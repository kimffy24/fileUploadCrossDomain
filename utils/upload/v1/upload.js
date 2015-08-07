/**
 * Created by jiefzz on 5/19/15.
 */

function getQueryString(name) {
    var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
    var r = location.search.substr(1).match(reg);
    if (r != null) return unescape(decodeURI(r[2])); return null;
}

/**
 * update img element (with an identification "${targetId}") and show image which input on input element which with has an identification "${sourceId}"
 * @param sourceId 输入源input标签的id
 * @param targetId 展示预览图的img便签的id
 */
function previewImgOnTarget(sourceId, targetId) {
    if(targetId == undefined) return;
    var reader = new FileReader();
    reader.onload = function(e) {
        var img = document.getElementById(targetId);
        img.src = this.result;
    }
    reader.readAsDataURL(document.getElementById(sourceId).files[0]);
    $("#imagePreview").attr("class", "form-group");
    $("#imgPre").attr("class", "uploadShow");
}

/**
 * 初始化函数
 * @param sourceId
 * @param targetId
 */
function setNiuBiUpload(sourceId, targetId){
    if (typeof FileReader === 'undefined') {
        alert('Html5 未获得支持.请更换支持Html5的浏览器');
        return;
    }
    $("#"+sourceId).change(function(){
        previewImgOnTarget(sourceId, targetId);
    });
    setNiuBiTriggers(sourceId);
}

/**
 * 绑定提交按钮（单个文件）
 * @param sourceId
 */
function setNiuBiTriggers(sourceId){
    $("#submit").click(function () {
        $.ajaxFileUpload({
            url: 'upload.php', //用于文件上传的服务器端请求地址
            data: {pre: getQueryString("pre")},
            secureuri: false, //是否需要安全协议，一般设置为false
            fileElementId: sourceId, //文件上传域的ID
            dataType: 'json', //返回值类型 一般设置为json
            success: function (data, status) //服务器成功响应处理函数
            {
                var str = JSON.stringify(data);
                //我们把这个json字符串发送到Domain2
                //因为这个Domain2上的目标页面被嵌在了主页面上作为iframe，所以我们取得这个iframe然后让他来发送信息
                //信息的内容是我们的包含个人信息内容的json字符串
                console.log("send ajaxFileUpload resule: "+str);
                var iframe = window.parent;
                iframe.postMessage(str, '*');

                $("#uploadTips").attr("class", "form-group");
            },
            error: function (data, status, e)//服务器响应失败处理函数
            {
                //alert(e);
                console.log(e);
                console.log("Well, there some error occur on invoke $.ajaxFileUpload()");
            }
        });
    });
}

$(function(){
    if (window.applicationCache) {
        console.log("Gook luck!");
    } else {
        console.log("It will be fail to use this page!");
    }
});