function createxmlhttp()
	{
		xmlhttpobj = false;
		try{
			xmlhttpobj = new XMLHttpRequest;
		}catch(e){
			try{
				xmlhttpobj=new ActiveXObject("MSXML2.XMLHTTP");
			}catch(e2){
				try{
					xmlhttpobj=new ActiveXObject("Microsoft.XMLHTTP");
				}catch(e3){
					xmlhttpobj = false;
				}
			}
		}
		return xmlhttpobj; 
	}

function checkcompany(Company,xuhao)
	{
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',common_customer_name+"?action=Companys&Company="+escape(Company)+ "&xuhao="+escape(xuhao)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//任务端完成请求
					  if(xmlhttpobj.status == 200){	//服务端完成处理并返回数据
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service返回了错误信息
								//alert("yes");
							  document.getElementById("check1").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("check1").innerHTML = ResponseText;
							  
//判断数据存在则改变按钮不可点！					  
if(ResponseText.indexOf("已存在") > 0 ){

document.getElementById("submit").disabled=false;
document.getElementById("submit").className="btn2 btnbaocno";
document.getElementById("submit").value="数据已存在，不可提交";
$('#submit').attr("disabled","disabled");

}else{
	
document.getElementById("submit").disabled=true;
document.getElementById("submit").className="btn2 btnbaoc";
document.getElementById("submit").value="保存";
$('#submit').removeAttr("disabled");
	
}
							  
						  }
					  }else{
						  document.getElementById("check1").innerHTML = '读取错误';//服务器出现异常
					  }
				  }else{
						document.getElementById("check1").innerHTML = '正在加载...';//请求未完成时的提示信息
				}
			}
			xmlhttpobj.send(null);//向服务器发送请求
		}else{
			document.getElementById("check1").innerHTML = '浏览器不兼容';//创建未成功
		}
	}

	
function getArea(jinke_diqu)
	{
		if(jinke_diqu==0){
			document.getElementById("Squarediv").innerHTML="<select name='Square' class='int'><option value='' selected>未选择大类</option></select>";
			return;
		};
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',common_getarea+"?id="+escape(jinke_diqu)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//任务端完成请求
					  if(xmlhttpobj.status == 200){	//服务端完成处理并返回数据
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service返回了错误信息
								//alert("yes");
							  document.getElementById("Squarediv").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("Squarediv").innerHTML = ResponseText;
						  }
					  }else{
						  document.getElementById("Squarediv").innerHTML = '读取错误';//服务器出现异常
					  }
				  }else{
						document.getElementById("Squarediv").innerHTML = '正在加载...';//请求未完成时的提示信息
				}
			}
			xmlhttpobj.send(null);//向服务器发送请求
		}else{
			document.getElementById("Squarediv").innerHTML = '浏览器不兼容';//创建未成功
		}
	}
	
	function getSquare(str){
		document.getElementById('Square').value= str.value ;
	}
	
function getTrade(Tradedata)
	{
		if(Tradedata==0){
			document.getElementById("Stradediv").innerHTML="<select name='Strade' class='int'><option value='' selected>未选择大类</option></select>";
			return;
		};
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',common_gettrade+"?id="+escape(Tradedata)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//任务端完成请求
					  if(xmlhttpobj.status == 200){	//服务端完成处理并返回数据
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service返回了错误信息
								//alert("yes");
							  document.getElementById("Stradediv").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("Stradediv").innerHTML = ResponseText;
						  }
					  }else{
						  document.getElementById("Stradediv").innerHTML = '读取错误';//服务器出现异常
					  }
				  }else{
						document.getElementById("Stradediv").innerHTML = '正在加载...';//请求未完成时的提示信息
				}
			}
			xmlhttpobj.send(null);//向服务器发送请求
		}else{
			document.getElementById("Stradediv").innerHTML = '浏览器不兼容';//创建未成功
		}
	}
	function getStrade(str){
		document.getElementById('Strade').value= str.value ;
	}
