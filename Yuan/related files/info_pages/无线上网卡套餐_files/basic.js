//显示、隐藏、切换、指定id的display状态
//type "show"显示 "hide"隐藏 "toggle"切换
function display(id,type){
	elem=document.getElementById(id);
	if(type=="show"){
		elem.style.display="";
	}else if(type=="hide"){
		elem.style.display="none";
	}else if(type=="toggle"){
		(elem.style.display=="none")?elem.style.display="":elem.style.display="none";
	}
}
function os(){
 if(document.getElementById("text1").innerHTML =="（点击查看）"){
  document.getElementById("text1").innerHTML ="（点击隐藏）"
 }else{
  document.getElementById("text1").innerHTML ="（点击查看）"
 }
}
function es(){
 if(document.getElementById("text2").innerHTML =="（点击查看）"){
  document.getElementById("text2").innerHTML ="（点击隐藏）"
 }else{
  document.getElementById("text2").innerHTML ="（点击查看）"
 }
}
function bs(){
 if(document.getElementById("text3").innerHTML =="（点击查看）"){
  document.getElementById("text3").innerHTML ="（点击隐藏）"
 }else{
  document.getElementById("text3").innerHTML ="（点击查看）"
 }
}
function uo(){
 if(document.getElementById("text4").innerHTML =="（点击查看）"){
  document.getElementById("text4").innerHTML ="（点击隐藏）"
 }else{
  document.getElementById("text4").innerHTML ="（点击查看）"
 }
}
function zf(){
 if(document.getElementById("text5").innerHTML =="（点击查看）"){
  document.getElementById("text5").innerHTML ="（点击隐藏）"
 }else{
  document.getElementById("text5").innerHTML ="（点击查看）"
 }
}
function tf(elem){
 if(elem.innerHTML =="（点击查看）"){
  elem.innerHTML ="（点击隐藏）"
 }else{
  elem.innerHTML ="（点击查看）"
 }
}
var urlMap={"a":"http://mall.10010.com/mall-web/chseFeeSetList/init?serAttrs=contract_packagetype_s:%E6%9B%B4%E5%A4%9A%E4%B8%8A%E7%BD%91%E6%B5%81%E9%87%8F",
"b":"http://mall.10010.com/mall-web/chseFeeSetList/init?serAttrs=contract_packagetype_s:%E6%9B%B4%E5%A4%9A%E9%95%BF%E9%80%94%E6%BC%AB%E6%B8%B8",
"c":"http://mall.10010.com/mall-web/chseFeeSetList/init?serAttrs=contract_packagetype_s:%E6%9B%B4%E5%A4%9A%E6%9C%AC%E5%9C%B0%E9%80%9A%E8%AF%9D",
"wo20":"http://mall.10010.com/goodsdetail/981206044808.html",
"wo36":"http://mall.10010.com/goodsdetail/981207205180.html",
"wifi":"http://mall.10010.com/mall-web/chse3GCardList/init?serAttrs=netcard_packagetype_s:%E5%8C%85%E5%B9%B4%E5%A5%97%E9%A4%90",
"iphone":"http://s.10010.com/SearchApp/chseMobileList/init?serAttrs=terminal_brand_s:Apple"}
function toBuy(type){
  window.open(urlMap[type]);
}
