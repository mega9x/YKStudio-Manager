// JavaScript Document
$(document).ready(function() {
    $(".wrapper").css("margin-top", (($(window).height() - 400) / 2) + "px");
	
	var oDivLogin=document.getElementById('loginForm');
    var oDivPwd=document.getElementById('pwdForm');
	
	
    $(".go-pwd").click(function() {
		oDivLogin.style.display="none";
		oDivPwd.style.display="block";
        $(".slide").animate({
            "margin-left": "0"
        });
    });

    $(".go-login").click(function() {
		oDivPwd.style.display="none";
		oDivLogin.style.display="block";
        $(".slide").animate({
            "margin-left": "0"
        });
    });
});

