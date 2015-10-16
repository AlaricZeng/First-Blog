// JavaScript Document
var showChildList=true;
var cancelChooseListImg=null;
var showChildChildListFir=true;
var showChildChildListSec=true;
var searchDiv=document.getElementById('search');
var searchInput=document.getElementById('s');
var searchButton=document.getElementById('submit-button');
var cancelChooseList=document.createElement("div");
var lastCommentID=null;

function showList(obj,add)
{
	var list=document.getElementById("side");
	var listIcon=document.getElementById("categories");
		cancelChooseListImg=add;
		listIcon.style.display="none";
		cancelChooseList.style.backgroundImage="url("+cancelChooseListImg+"/images/cancel_show_list.png)";
		cancelChooseList.style.position="absolute";
		cancelChooseList.style.width="15px";
		cancelChooseList.style.height="15px";
		cancelChooseList.style.top="15px";
		cancelChooseList.style.right="23px";
		cancelChooseList.onclick=function()
		{
			list.style.display="none";
			listIcon.style.display="block";
			displayList=true;
		}
		list.appendChild(cancelChooseList);
		list.style.display="block";
		displayList=false;
}

function showChildUl()
{
	var obj=document.getElementById("ul-img");
	var childUl=document.getElementById("child-ul");
		if (showChildList)
		{
			childUl.style.display="block";
			obj.src=cancelChooseListImg+"/images/close_child_categories.png";
			showChildList=false;
		}
		else
		{
			var childChildUl=document.getElementsByClassName("child-child-ul");
			var childUlImg1=document.getElementById("child-ul-img1");
			var childUlImg2=document.getElementById("child-ul-img2");
				childUl.style.display="none";
				childChildUl[0].style.display="none";
				childChildUl[1].style.display="none";	
				obj.src=cancelChooseListImg+"/images/child_categories.png";
				childUlImg1.src=cancelChooseListImg+"/images/child_categories.png";
				childUlImg2.src=cancelChooseListImg+"/images/child_categories.png";
				showChildChildListFir=true;
				showChildChildListSec=true;
				showChildList=true;
		}
}

function showChildChildUl(num)
{
	var obj=document.getElementById("child-ul-img"+(num+1));
	var childChildUl=document.getElementsByClassName("child-child-ul")[num];
		if (num==0)
		{
			if (showChildChildListFir==true)
			{
				obj.src=cancelChooseListImg+"/images/close_child_categories.png";
				childChildUl.style.display="block";
				showChildChildListFir=false;
			}
			else
			{
				obj.src=cancelChooseListImg+"/images/child_categories.png";
				childChildUl.style.display="none";
				showChildChildListFir=true;
			}
		}
		else
		{
			if (showChildChildListSec==true)
			{
				obj.src=cancelChooseListImg+"/images/close_child_categories.png";
				childChildUl.style.display="block";
				showChildChildListSec=false;
			}
			else
			{
				obj.src=cancelChooseListImg+"/images/child_categories.png";
				childChildUl.style.display="none";
				showChildChildListSec=true;
			}
		}
}

function inputSearch()
{
	var list=document.getElementById("side") ? document.getElementById("side") : document.getElementById("single-side");
		list.style.position="absolute";
		searchDiv.style.width="80%";
		searchInput.style.width="100%";
		searchButton.style.position="absolute";
		searchButton.style.right="-10%";
		if (searchInput.value=="搜索...")
		{
			searchInput.value="";
			searchInput.style.color="#000";
		}
		else
		{
			searchInput.value=s.value;
		}
}

function finishSearch()
{
	var list=document.getElementById("side") ? document.getElementById("side") : document.getElementById("single-side");
		list.style.position="fixed";
		searchDiv.style.width="200px";
		searchInput.style.width="120px";
		searchButton.style.position="relative";
		searchButton.style.right="0px";
		if (searchInput.value=="")
		{
			searchInput.value="搜索...";
			searchInput.style.color="#999";
			searchInput.style.outlineStyle="none";
		}
}

function showSingleList(obj,add)
{
	var list=document.getElementById("single-side");
	var listIcon=document.getElementById("single-categories");
		cancelChooseListImg=add;
		listIcon.style.display="none";
		cancelChooseList.style.backgroundImage="url("+cancelChooseListImg+"/images/click_single_cancel_show_list.png)";
		cancelChooseList.style.position="absolute";
		cancelChooseList.style.width="15px";
		cancelChooseList.style.height="15px";
		cancelChooseList.style.top="15px";
		cancelChooseList.style.right="23px";
		cancelChooseList.onclick=function()
		{
			list.style.display="none";
			listIcon.style.display="block";
			displayList=true;
		}
		list.appendChild(cancelChooseList);
		list.style.display="block";
		displayList=false;
}

function replyComment(postID,commentID,postURL,author_name,author_email,author_url)
{
	if (lastCommentID!=null)
	{
		if (lastCommentID==commentID)
		{
			var lastContainerDIV=document.getElementById("comment-"+lastCommentID);
				lastContainerDIV.removeChild(lastContainerDIV.lastChild);	
				lastCommentID=null;
		}
		else
		{
			var lastContainerDIV=document.getElementById("comment-"+lastCommentID);
			var containerDIV=document.getElementById("comment-"+commentID);
			var newForm=document.createElement("form");
			var newDIV=null;
				lastContainerDIV.removeChild(lastContainerDIV.lastChild);
				newForm.action=postURL;
				newForm.method="post";
				newForm.onsubmit=function()
				{
					var author=newForm.querySelector(".author");
					var email=newForm.querySelector(".email");
					if (author.value=="")
					{
						alert("请输入您的用户名");
						if (author.style.outlineStyle!="solid")
						{
							author.style.outlineStyle="solid";
							author.style.outlineColor="#f00";
							author.style.outlineWidth="1px";
							author.style.backgroundColor="#fbdcdc";
						}
						if (email.value=="" && email.style.outlineStyle!="solid")
						{
							email.style.outlineStyle="solid";
							email.style.outlineColor="#f00";
							email.style.outlineWidth="1px";
							email.style.backgroundColor="#fbdcdc";
						}
						return false;
					}
					else if (email.value=="")
					{
						alert("请输入您的邮箱");
						if (email.style.outlineStyle!="solid")
						{
							email.style.outlineStyle="solid";
							email.style.outlineColor="#f00";
							email.style.outlineWidth="1px";
							email.style.backgroundColor="#fbdcdc";
						}
						return false;
					}
					return true;	
				}
		
				newDIV=createFormElement("用户名*:","author",author_name,commentID);
				newForm.appendChild(newDIV);
		
				newDIV=createFormElement("电子邮件*:","email",author_email,commentID);
				newForm.appendChild(newDIV);
		
				newDIV=createFormElement("站点:","url",author_url,commentID);
				newForm.appendChild(newDIV);
			
			
				newDIV=document.createElement("div");
				newLabel=document.createElement("label");
				newTextarea=document.createElement("textarea");
				newDIV.className="input-content";
				newDIV.style.marginLeft="45px";
				newLabel.for="comment";
				newLabel.appendChild(document.createTextNode("评论:"));
				newTextarea.name="comment";
				newTextarea.style.backgroundColor="#fff";
				newTextarea.style.width="90%"
				newDIV.appendChild(newLabel);
				newDIV.appendChild(newTextarea);
				newForm.appendChild(newDIV);
				
		 		newInput=document.createElement("input");
				newInput.type="hidden";
				newInput.name="comment_post_ID";
				newInput.value=postID;
				newForm.appendChild(newInput);
				
				newInput=document.createElement("input");
				newInput.type="hidden";
				newInput.name="comment_parent";
				newInput.value=commentID;
				newForm.appendChild(newInput);
				
				newInput=document.createElement("input");
				newInput.type="submit";
				newInput.name="submit";
				newInput.value="提交";
				newInput.className="reply-submit"
				newForm.appendChild(newInput);
				
				containerDIV.appendChild(newForm);
				containerDIV.scrollIntoView();
				lastCommentID=commentID;
		}
	}
	else
	{
		var containerDIV=document.getElementById("comment-"+commentID);
		var newForm=document.createElement("form");
		var newDIV=null;
			newForm.action=postURL;
			newForm.method="post";
			newForm.onsubmit=function()
			{
				var author=newForm.querySelector(".author");
				var email=newForm.querySelector(".email");
				if (author.value=="")
				{
					alert("请输入您的用户名");
					if (author.style.outlineStyle!="solid")
					{
						author.style.outlineStyle="solid";
						author.style.outlineColor="#f00";
						author.style.outlineWidth="1px";
						author.style.backgroundColor="#fbdcdc";
					}
					if (email.value=="" && email.style.outlineStyle!="solid")
					{
						email.style.outlineStyle="solid";
						email.style.outlineColor="#f00";
						email.style.outlineWidth="1px";
						email.style.backgroundColor="#fbdcdc";	
					}
					return false;
				}
				else if (email.value=="")
				{
					alert("请输入您的邮箱");
					if (email.style.outlineStyle!="solid")
					{
						email.style.outlineStyle="solid";
						email.style.outlineColor="#f00";
						email.style.outlineWidth="1px";
						email.style.backgroundColor="#fbdcdc";
					}
					return false;
				}
				return true;	
			}
				
			newDIV=createFormElement("用户名*:","author",author_name,commentID);
			newForm.appendChild(newDIV);
		
			newDIV=createFormElement("电子邮件*:","email",author_email,commentID);
			newForm.appendChild(newDIV);
		
			newDIV=createFormElement("站点:","url",author_url,commentID);
			newForm.appendChild(newDIV);
		
		
			newDIV=document.createElement("div");
			newLabel=document.createElement("label");
			newTextarea=document.createElement("textarea");
			newDIV.className="input-content";
			newDIV.style.marginLeft="45px";
			newLabel.for="comment";
			newLabel.appendChild(document.createTextNode("评论:"));
			newTextarea.name="comment";
			newTextarea.style.backgroundColor="#fff";
			newTextarea.style.width="90%";
			
			newDIV.appendChild(newLabel);
			newDIV.appendChild(newTextarea);
			newForm.appendChild(newDIV);
			
	 		newInput=document.createElement("input");
			newInput.type="hidden";
			newInput.name="comment_post_ID";
			newInput.value=postID;
			newForm.appendChild(newInput);
			
			newInput=document.createElement("input");
			newInput.type="hidden";
			newInput.name="comment_parent";
			newInput.value=commentID;
			newForm.appendChild(newInput);
			
			newInput=document.createElement("input");
			newInput.type="submit";
			newInput.name="submit";
			newInput.value="提交";
			newInput.className="reply-submit"
			newForm.appendChild(newInput);
			
			containerDIV.appendChild(newForm);
			containerDIV.scrollIntoView();
			lastCommentID=commentID;
	}
}

function createFormElement(labelTextNote,inputName,inputValue,commentID)
{
	var newDIV=document.createElement("div");
	var newLabel=document.createElement("label");
	var newInput=document.createElement("input");
		newDIV.className="input-content";
		newDIV.style.marginLeft="45px";
		newLabel.for=inputName;
		newLabel.appendChild(document.createTextNode(labelTextNote));
		newInput.type="text";
		newInput.className=inputName;
		newInput.name=inputName;
		newInput.value=inputValue;
		newInput.style.backgroundColor="#fff";
		newDIV.appendChild(newLabel);
		newDIV.appendChild(newInput);
	return newDIV;
}
