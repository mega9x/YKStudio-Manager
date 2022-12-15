layui.use(['layim','laypage'], function(){
	var layim=layui.layim,
	$ = layui.jquery,
	layer = layui.layer,
	laytpl = layui.laytpl,
	laypage = layui.laypage,
	islogin=0,
	userdata={};
	//基础配置
	layim.config({
		//获取主面板列表信息
		init: {
			url: 'index.php/chat/friend_json' //接口地址（返回的数据格式见下文）
			,type: 'get' //默认get，一般可不填
			,data: {} //额外参数
		}
	
		//获取群员接口
		,members: {
		  url: '' //接口地址（返回的数据格式见下文）
		  ,type: 'get' //默认get，一般可不填
		  ,data: {} //额外参数
		}
		
		,uploadImage: {
		  url: 'index.php/chat/inc_upload?dopost=image' //（返回的数据格式见下文）
		  ,type: '' //默认post
		}
		
		,uploadFile: {
		  url: 'index.php/chat/inc_upload?dopost=file' //（返回的数据格式见下文）
		  ,type: '' //默认post
		}
		
		//增加皮肤选择，如果不想增加，可以剔除该项
		,skin: [ 
		  //'http://xxx.com/skin.jpg', 
		] 
		
		,brief: false //是否简约模式（默认false，如果只用到在线客服，且不想显示主面板，可以设置 true）
		,title: '内部即时通讯' //主面板最小化后显示的名称
		//,isfriend: false //是否开启好友（默认true，即开启）
		,isgroup: false //是否开启群组（默认true，即开启）
		//,find: 'find.html' //查找好友/群地址。如果未填，不不在主面板显示该icon
		,chatLog: 'index.php/chat/chatlog' //聊天记录地址（如果未填则不显示）
		,copyright: true //是否授权，如果通过官网捐助获得LayIM，此处可填true
	});
	 //监听LayIM初始化就绪
	layim.on('ready', function(options){
		//监听发送消息
	  	layim.on('sendMessage', function(res){
			var toid = res.to.id,content=res.mine.content,type=res.to.type;
			$.post("index.php/chat/pm?dopost=send",{toid:toid,content:content,type:type},function(){},'json');	
		});
		//
		var onmessage = function()
		{
			$.get("index.php/chat/pm?dopost=get",function(res){
				if(res.length!=0){
					for(var key in res){
						if(res.type=='notice'){
						//处理好友请求
							workfriend(res[key]);					
						}
						//处理对话
						layim.getMessage(res[key]);
					}	
				}
				/*switch(res.type){
					case 'kefu':
						layim.getMessage(res.data);
						break;
					case 'friend':
						layim.getMessage(res.data);
						break; 
					case 'group':
						layim.getMessage(res.data);
						break; 
					case 'notice':
						layim.getMessage(res.data);
						break;
					default:
					break; 
				}*/
			},'json');
		}
		setInterval(onmessage, 3000);	
	});
	

if(tipclose==0){
layer.open({
  title: '系统提示'
  ,content: '请使用浏览器极速(高速)模式<img src="../../theme/windows/images/jsms.png"><br>推荐使用搜狗、火狐、谷歌、猎豹等浏览器'
  ,btn: ['我知道了', '不再提示']
  ,yes: function(index, layero){
    //按钮【按钮一】的回调

	layer.close(index); //关闭
  },btn2: function(index, layero){
    //按钮【按钮二】的回调
	
//关闭提示
$(function(){

      $.ajax({
            type: "get",
            url: "inc.tipclose.asp",//请求地址
            data: "tipclose=1",//参数
            success: function(msg){//msg返回消息

            }
      });

}); 

  }
  ,cancel: function(){ 
    //右上角关闭回调
  }
});
}
    
	
}); 