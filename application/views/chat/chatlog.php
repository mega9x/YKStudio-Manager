<?php if(!defined('BASEPATH')) exit('No direct script access allowed');?>
<!doctype html>
<html>
<head>
<title>聊天记录</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="renderer" content="webkit">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/layui/css/layui.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>theme/layui/css/layuim.css"/>
<style>
.layim-chat-friend{ padding-bottom:30px;}
#chatpages{ position:fixed; left:0px; right:0px; bottom:0px; background-color:#fff; text-align:center; padding-top:5px;}
</style>
<script type="text/javascript" src="<?php echo base_url()?>theme/layui/layui.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

<body>
<script>
layui.use(['layim','laypage','laydate'], function(){
	var layim=layui.layim,
	$ = layui.jquery,
	layer = layui.layer,
	laytpl = layui.laytpl,
	laypage = layui.laypage,
	laydate = layui.laydate
	mine = parent.layui.layim.cache().mine;
 
	var data = <?php echo $list?>;

 

	//遍历聊天记录
	for(i in data){
		 //格式化时间字符串
		 var sendtime = laydate.now(data[i].timestamp * 1000, "YYYY-MM-DD hh:mm:ss"),
		 classmine=(data[i].id==mine.id)?'class="layim-chat-mine"':'';//判断是否自己发送	 		 
		 var namehtml=(data[i].id==mine.id)?'<cite><i>'+sendtime+'</i>'+data[i].username+'</cite>':'<cite>'
+data[i].username+'<i>'+sendtime+'</i></cite>';
		 //对话列表渲染
		 var html ='<li '+classmine+'><div class="layim-chat-user"><img src="'+data[i].avatar+'">'+namehtml
+'</div><div class="layim-chat-text">'+layim.content(data[i].content)+'</div></li>';
		 //列表追加到面板	
		 $(".layim-chat-main ul").append(html);
	}
	  

  	//处理分页
	laypage({
		cont: 'chatpages',
		pages: <?php echo $this->lib_page->totalPages;?>, //可以叫服务端把总页数放在某一个隐藏域,再获取。假设我们获取到的是18
		first: '首页', //将首页显示为数字1,。若不显示,设置false即可
		last: '尾页', //将尾页显示为总页数。若不显示,设置false即可
		prev: '上一页', //若不显示,设置false即可
    	next: '下一页', //若不显示,设置false即可
		groups:1,
		skip: false,
		curr: function(){ //通过url获取当前页,也可以同上(pages)方式获取
			var page = location.search.match(/page=(\d+)/);
			return page ? page[1] : 1;
		}(), 
		jump: function(e, first){ //触发分页后的回调
			if(!first){ //一定要加此判断,否则初始时会无限刷新
				var id = location.search.match(/id=(\d+)/),type=location.search.match(/type=([a-z]+)/);
				location.href = '?id='+id[1]+'&type='+type[1]+'&page='+e.curr;
			}
		}
	});
});
</script>
<div class="layim-chat layim-chat-friend">
  <div class="layim-chat-main" style="width:70%; height:100%">
    <ul>
      
    </ul>
  </div>
  <div id="chatpages">
  	
  </div>
</div>
</body>
</html>