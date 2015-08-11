// JavaScript Document
var element=document.getElementById('s');
function inputSearch()
{
	if (element.value=="点些喜欢的东西吧")
	{
		element.value="";
		element.style.color="#000";
	}
	else
	{
		element.value=s.value;
	}
}

function finishSearch()
{
	if (element.value=="")
	{
		element.value="点些喜欢的东西吧";
		element.style.color="#999";
	}
}