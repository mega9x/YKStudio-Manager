/** layui-v0.1.5 跨设备模块化前端框架@LGPL www.layui.com By 贤心 */
;layui.define(["jquery","layer","util"],function(t){var e=layui.jquery,i=layui.util,n=layui.layer,c=function(){var t=this;t.box=e(".layui-form")};c.prototype.check=function(t,i){t=t||{};var c=t.custom=t.custom||{},a=this,o={check:{mobile:function(t){return/^1\d{10}$/g.test(t)?void 0:"手机格式不合法"},email:function(t){return/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(t)?void 0:"邮箱格式不正确"},identity:function(t){return/(^\d{15}$)|(^\d{17}(x|X|\d)$)/.test(t)?void 0:"请输入正确的身份证号"}},submit:function(t){t=e(t);var a=t.find("[required]"),s={},u=!0;o.check=e.extend(o.check,c),a.each(function(t,i){var i=e(i),c=i.attr("check"),a=i.attr("name"),l=i.val();if(o.check[c]){var r=o.check[c](l);if(r)return u=!1,i.focus(),n.msg(r,{icon:5}),!1}""!==l.replace(/\s/g,"")&&a&&(s[a]=l)}),u&&("function"==typeof i?i.call(this,s,t,a):function(){"form"===t[0].tagName.toLowerCase()&&t.submit()}())}};return t.form=t.form||".layui-form",t.button=t.button||".layui-form-button",e(t.form).each(function(){var i=e(this);"form"===this.tagName.toLowerCase()?i.submit(function(){return o.submit.call(this,i),!1}):i.on("click",t.button,function(){return o.submit.call(this,i),!1})}),a},c.prototype.pass=function(t){t=t||{};var i=this,n={show:function(t,e){t.find("span").css("width",(e||0)+"%")},event:function(t,e){t.on("keyup",function(){var i=t.val().replace(/\s/g,"");e.show(),""===i?(n.show(e),setTimeout(function(){e.hide()},300)):/^(?=.*[a-zA-Z])(?=.*[0-9])(?=.*\_)[a-zA-Z0-9_]{6,}$/g.test(i)?n.show(e,100):/[a-z0-9]{6,}/g.test(i)?n.show(e,50):/[\s\S]{3,6}/g.test(i)&&n.show(e,20)})}},c=t.pass||i.box.find("input[type=password]");return c.each(function(){var t=e(this),i=(t.parent(),e('<div class="layui-form-strength"><span></span></div>'));t.after(i),n.event.call(this,t,i)}),i},c.prototype.checkbox=function(t){t=t||{};var i=this,n={icon:"&#xe605",checked:function(t,e){this.checked=!0,this.value="on",t.addClass("layui-form-checked"),e.html(n.icon)},event:function(t,e){var i=this;t.on("click",function(){i.checked?(t.removeClass("layui-form-checked"),e.html(""),i.checked=!1,i.value=""):n.checked.call(i,t,e)})}},c=t.checkbox||i.box.find("input[type=checkbox]");return c.each(function(){var t=e(this),i=t.parent(),c=e('<span class="layui-icon layui-form-sure"></span>');i.addClass("layui-form-checkbox"),t.after(c),t[0].checked?n.checked.call(this,i,c):t[0].value="",n.event.call(this,i,c)}),i},c.prototype.select=function(t){t=t||{};var n=this,c={},a=t.select||n.box.find("select");return c.selected=function(n,a,o){var s=n.find(".layui-form-sltitle");s.on("click",function(t){var n=c.ul=e(this).next();i.stope(t),e(".layui-form-option").hide(),n.show(),e(document).off("click",c.hide).on("click",c.hide)}),n.find("li").on("click",function(){var i=e(this),n=i.attr("value");s.find("span").html(i.find("a").html()),o.val(n),"function"==typeof t.change&&t.change(n,o)})},c.hide=function(){c.ul.hide()},a.each(function(){var t=e(this),i=t.val(),n=e(this.options[this.selectedIndex]),a=e(function(){for(var e='<ul class="layui-form-option">',i=t.find("option"),n=0;n<i.length;n++)e+='<li value="'+i.eq(n).val()+'"><a href="javascript:;">'+(i.eq(n).html()||i.eq(n).val())+"</a></li>";return e+"</ul>"}()),o=e('<div class="layui-form-select"><div class="layui-form-sltitle"><span>'+(n.html()||i)+'</span><i class="layui-edge"></i></div>'+a.prop("outerHTML")+"</div>");o.addClass(t.attr("layui-class")||""),t.after(o),c.selected(o,a,t)}),n},t("form",new c)});
