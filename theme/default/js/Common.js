/*JS容错*/
function killerrors() { return true; } 
window.onerror = killerrors;


/*显示隐藏层*/
function Showhiden(b,c,d,e,f){var g=typeof b=="string"?document.getElementById(b):b;var h=typeof c=="string"?document.getElementById(c):c;var i=e||"";var j=f||"";if(h.style.display!="none"){if(d)return;h.style.display="none";if(i&&j){g.innerHTML=j}}else{h.style.display="";if(i&&j){g.innerHTML=i}}}

//全选
function unselectall(thisform){
	if(thisform.chkAll.checked){
		thisform.chkAll.checked = thisform.chkAll.checked&0;
	}   
}
function CheckAll(thisform){
	for (var i=0;i<thisform.elements.length;i++){
		var e = thisform.elements[i];
		if (e.Name != "chkAll"&&e.disabled!=true)
		e.checked = thisform.chkAll.checked;
	}
}

//初始化XMLHttpRequest对象
function createXmlHttp(){
    xmlHttp = false;
    if (window.ActiveXObject) {
        try {xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");} 
        catch (e) {xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");}
    }else if (window.XMLHttpRequest) {xmlHttp = new XMLHttpRequest();}
}
//异步获取结果
function sendRequest(){
    createXmlHttp();
    var url = "?action=getmessage&timestamp=" + new Date().getTime();
    if (!xmlHttp) {
        alert("XMLHttpRequest is not Create!");
    }
    xmlHttp.open("GET", url, true);
    xmlHttp.onreadystatechange = function(){//回调函数开始
        var tag = document.getElementById("sendRequestContent");
        tag.innerHTML = "";
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
        tag.innerHTML = xmlHttp.responseText;
        }
    }//回调函数结束
xmlHttp.send(null);
}

//禁用右键
//document.oncontextmenu=new Function("event.returnValue=false;"); 
//禁用鼠标复制
//document.onselectstart=new Function("event.returnValue=false;"); 
//禁用链接拖动打开
document.ondragstart = new Function("return false;"); 

//写cookies 
function setCookie(name,value) 
{ 
	var Days = 1; 
	var exp = new Date(); 
	exp.setTime(exp.getTime() + Days*24*60*60*1000); 
	document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString(); 
} 
//读取cookies 
function getCookie(name) 
{ 
	var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

	if(arr=document.cookie.match(reg))

			return unescape(arr[2]); 
	else 
			return null; 
} 
//删除cookies 
function delCookie(name) 
{ 
	var exp = new Date(); 
	exp.setTime(exp.getTime() - 1); 
	var cval=getCookie(name); 
	if(cval!=null) 
	document.cookie= name + "="+cval+";expires="+exp.toGMTString(); 
}

