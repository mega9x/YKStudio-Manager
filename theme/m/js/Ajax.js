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

function checkcompany(intvalue,oldvalue)
	{
		
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',"inc.isok.asp?action=Companys&cCompany="+escape(intvalue)+ "&oldvalue="+escape(oldvalue)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//������������
					  if(xmlhttpobj.status == 200){	//�������ɴ�����������
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service�����˴�����Ϣ
								//alert("yes");
							  document.getElementById("check1").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("check1").innerHTML = ResponseText;
							  
//�ж����ݴ�����ı䰴ť���ɵ㣡					  
if(ResponseText.indexOf("��") > 0 ){

document.getElementById("submit").disabled=false;
document.getElementById("submit").className="btn2 btnbaocno";
document.getElementById("submit").value="�����Ѵ��ڣ������ύ";
$('#submit').attr("disabled","disabled");

}else if(ResponseText.indexOf("����") > 0 ){
	
document.getElementById("submit").disabled=true;
document.getElementById("submit").className="btn2 btnbaoc";
document.getElementById("submit").value="����";
$('#submit').removeAttr("disabled");
	
}
							  
						  }
					  }else{
						  document.getElementById("check1").innerHTML = '��ȡ����';//�����������쳣
					  }
				  }else{
						document.getElementById("check1").innerHTML = '���ڼ���...';//����δ���ʱ����ʾ��Ϣ
				}
			}
			xmlhttpobj.send(null);//���������������
		}else{
			document.getElementById("check1").innerHTML = '�����������';//����δ�ɹ�
		}
	
		
	}




function checklinkman(intvalue,oldvalue)
	{
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',"inc.isok.asp?action=cLinkman&Linkman="+escape(intvalue)+ "&oldvalue="+escape(oldvalue)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//������������
					  if(xmlhttpobj.status == 200){	//�������ɴ�����������
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service�����˴�����Ϣ
								//alert("yes");
							  document.getElementById("check2").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("check2").innerHTML = ResponseText;
							  
//�ж����ݴ�����ı䰴ť���ɵ㣡					  
if(ResponseText.indexOf("��") > 0 ){

document.getElementById("submit").disabled=false;
document.getElementById("submit").className="btn2 btnbaocno";
document.getElementById("submit").value="�����Ѵ��ڣ������ύ";
$('#submit').attr("disabled","disabled");

}else{
	
document.getElementById("submit").disabled=true;
document.getElementById("submit").className="btn2 btnbaoc";
document.getElementById("submit").value="����";
$('#submit').removeAttr("disabled");
	
}
							  
						  }
					  }else{
						  document.getElementById("check2").innerHTML = '��ȡ����';//�����������쳣
					  }
				  }else{
						document.getElementById("check2").innerHTML = '���ڼ���...';//����δ���ʱ����ʾ��Ϣ
				}
			}
			xmlhttpobj.send(null);//���������������
		}else{
			document.getElementById("check2").innerHTML = '�����������';//����δ�ɹ�
		}
	}
	
	

function checkmobile(intvalue,oldvalue)
	{
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',"inc.isok.asp?action=cMobile&Mobile="+escape(intvalue)+ "&oldvalue="+escape(oldvalue)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//������������
					  if(xmlhttpobj.status == 200){	//�������ɴ�����������
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service�����˴�����Ϣ
								alert("yes");
							  document.getElementById("check3").innerHTML = ResponseText;
						  }else{
							  alert("no");
							  document.getElementById("check3").innerHTML = ResponseText;
						  }
					  }else{
						  document.getElementById("check3").innerHTML = '��ȡ����';//�����������쳣
					  }
				  }else{
						document.getElementById("check3").innerHTML = '���ڼ���...';//����δ���ʱ����ʾ��Ϣ
				}
			}
			xmlhttpobj.send(null);//���������������
		}else{
			document.getElementById("check3").innerHTML = '�����������';//����δ�ɹ�
		}
	}





	
function getArea(jinke_diqu)
	{
		if(jinke_diqu==0){
			document.getElementById("Squarediv").innerHTML="<select name='Squares' class='int'><option value='' selected>δѡ�����</option></select>";
			return;
		};
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',"inc.isok.asp?action=Area&jinke_diqu="+escape(jinke_diqu)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//������������
					  if(xmlhttpobj.status == 200){	//�������ɴ�����������
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service�����˴�����Ϣ
								//alert("yes");
							  document.getElementById("Squarediv").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("Squarediv").innerHTML = ResponseText;
						  }
					  }else{
						  document.getElementById("Squarediv").innerHTML = '��ȡ����';//�����������쳣
					  }
				  }else{
						document.getElementById("Squarediv").innerHTML = '���ڼ���...';//����δ���ʱ����ʾ��Ϣ
				}
			}
			xmlhttpobj.send(null);//���������������
		}else{
			document.getElementById("Squarediv").innerHTML = '�����������';//����δ�ɹ�
		}
	}
	
	function getSquare(str){
		document.getElementById('Square').value= str.value ;
	}
	
function getTrade(Tradedata)
	{
		if(Tradedata==0){
			document.getElementById("Stradediv").innerHTML="<select name='Strade' class='int'><option value='' selected>δѡ�����</option></select>";
			return;
		};
		var xmlhttpobj = createxmlhttp();
		if(xmlhttpobj){
			xmlhttpobj.open('GET',"inc.isok.asp?action=Trade&Tradedata="+escape(Tradedata)+ "&number="+Math.random()+"",true);
			xmlhttpobj.onreadystatechange=function(){
				if(xmlhttpobj.readyState == 4){		//������������
					  if(xmlhttpobj.status == 200){	//�������ɴ�����������
						  var ResponseText = xmlhttpobj.responseText;
						  if(ResponseText == ""){	//service�����˴�����Ϣ
								//alert("yes");
							  document.getElementById("Stradediv").innerHTML = ResponseText;
						  }else{
							  //alert("no");
							  document.getElementById("Stradediv").innerHTML = ResponseText;
						  }
					  }else{
						  document.getElementById("Stradediv").innerHTML = '��ȡ����';//�����������쳣
					  }
				  }else{
						document.getElementById("Stradediv").innerHTML = '���ڼ���...';//����δ���ʱ����ʾ��Ϣ
				}
			}
			xmlhttpobj.send(null);//���������������
		}else{
			document.getElementById("Stradediv").innerHTML = '�����������';//����δ�ɹ�
		}
	}
	function getStrade(str){
		document.getElementById('Strade').value= str.value ;
	}
