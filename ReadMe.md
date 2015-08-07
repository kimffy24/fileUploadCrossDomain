    简介 ：
        跨域ajax文件上传，目前版本只能一次上传一个文件。
        使用Html5的postMessage提供跨域之间的消息传递。注意console里面的输出调整项目。

    设置 ：
        打开/path/to/embedded.js
        修改hostOnSpro变量为你设定的存放此项目的域名。

    加载方法 ：
        1.业务页面中先加载Jquery库
        2.再加载 http://domain/path/to/embedded.js

    对指定标签绑定click事件 ：
        $("#inputId").click(function(){superUpload('inputId');});
        默认回调函数只更改传递的标签inputId的value值为上传的路径(没有域名，是从根路径开始的文件路径)

        eg:
                    $("#preview1").click(function(){
                        superUpload(this.id);
                    });
                    //其中superUpload为默认可用的回调函数
                    //更新服务器返回的值到对应的input#id的value属性中


    扩展 ：
        setUploadCallbackFunction(callback) 可设置自定义回调函数
        需在绑定的click事件触发之前执行；