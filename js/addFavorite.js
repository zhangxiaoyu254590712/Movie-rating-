var xmlHttp;
var iid;
function addFavorite(obj) {
	xmlHttp = GetXmlHttpObject1();
	if(xmlHttp ==null)
	{
		alert("Browser does not support HTTP Request");
		return
	}
	var id = obj.value;
	iid = id;
	var url="addFavorite.php";
	url=url+"?fmovieId="+id;
	xmlHttp.onreadystatechange=stateChanged1;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function GetXmlHttpObject1()
{
	var xmlHttp=null;
	try
	 {
	 // Firefox, Opera 8.0+, Safari
	 	xmlHttp=new XMLHttpRequest();
	 }
		catch (e)
	 	{
		 //Internet Explorer
		 try
		  {
		  	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		  }
		 	catch (e)
		  {
		 	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		 }
	return xmlHttp;
}
function stateChanged1()
{
	if (xmlHttp.readyState== 4 || xmlHttp.readyState=="complete")
		 { 		 	
		 	document.getElementById("favoriteStatus"+iid).innerHTML=xmlHttp.responseText;
		 	// document.getElementById("favoriteStatus"+iid).innerHTML="!!!";
		 } 

}