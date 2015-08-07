function layer_tips(content){
    layer.open({
	    content: content,
	    style: 'background-color:#333; color:#fff; border:none;',
	    time: 3
	});
}

function layer_alert(title,content){
    layer.open({
	    title: [
	        title,
	        'background-color:#333; color:#fff;'
	    ],
	    content: content
	    
	});
}

function layer_msg(content){
    layer.open({
	    content: content,
	    btn: ['确定'],
	    yes: function(index){
	        location.reload();
	        layer.close(index);
	    }
	});
}

function layer_confirm(content,fun_yes,fun_no){
    layer.open({
	    content: content,
	    btn: ['确认', '取消'],
	    shadeClose: false,
	    yes: function(){
	    	if(fun_yes){
	    		fun_yes();
	    	}
	    }, no: function(){
	    	if(fun_no){
	    		fun_no();
	    	}
	    }
	});
}

function layer_html(content,width,height){
	var width = width?width:240;
	var height = height?height:180;

    layer.open({
	    type: 1,
	    content: content,
	    style: 'width:'+width+'px; height:'+height+'px; padding:10px; background-color:#F05133; color:#fff; border:none;'
	});
}

function layer_page(content){
    var pageii = layer.open({
	    type: 1,
	    content: content,
	    style: 'width:100%; height:'+ document.documentElement.clientHeight +'px; background-color:#3F3F3F; border:none;'
	});
}

function layer_loading(content){
    layer.open({
	    type: 3,
	    content: content
	});
}

function layer_href(content,url){
    layer.open({
	    content: content,
	    btn: ['确定'],
	    yes: function(index){
	        location.href = url;
	    }
	});
}