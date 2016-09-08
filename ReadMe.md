## 简介 ：
------
跨域ajax文件上传，目前版本只能一次上传一个文件。<br />
使用Html5的postMessage提供跨域之间的消息传递。<br />
注意console里面的输出调整项目。<br />


### 测试设置 ：
把setting.nginx.conf配置加入到nginx的配置里面<br />
修改nginx配置把root指向当前的目录，即跟这个ReadMe.md同级的目录<br />
设置 /etc/hosts 加入一下<br />

> 127.0.0.1 file.domain.xyz dev.domain.com

其中dev.domain.com为测试业务域名<br />
file.domain.xyz为文件存储服务提供者的域名<br />
启动nginx<br />
访问[http://dev.domain.com/test/demo.php](#http://dev.domain.com/test/demo.php)

### 加载方法 ：
1.业务页面中先加载Jquery库<br />
2.在JQuery的加载代码后面放入

    <script type="text/javascript">
        var storageHost="file.domain.xyz";
        $.getScript(storageHost+"/utils/upload/v1/embedded.js",function(){});
    </script>

其中storageHost填入文件存储服务提供者的域名,这里是file.domain.xyz

对指定标签绑定click事件 ：

    $("#inputId").click(function(){superUpload('inputId');});
    默认回调函数只更改传递的标签inputId的value值为upload.php的返回值。

    eg:
        $("#preview1").click(function(){
            superUpload(this.id);
        });
        //其中superUpload为默认可用的回调函数
        //更新服务器返回的值到对应的input#id的value属性中


扩展 ：

    setUploadCallbackFunction(callback) 可设置自定义回调函数
    需在绑定的click事件触发之前执行；