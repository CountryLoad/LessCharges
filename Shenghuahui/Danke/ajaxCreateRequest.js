function createRequest(){

	var ajaxRequest;
	try{
		ajaxRequest = new XMLHttpRequest();
	}
	catch(e){
		try{
			ajaxRequest = new ActiveXObject("Msxm12.XMLHTTP");
		}
		catch(e){
			try{
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			}
			catch(e){
				return false;
			}
		}
	}
	return ajaxRequest;	
}
function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}