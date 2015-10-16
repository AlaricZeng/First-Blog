// JavaScript Document
// JavaScript Document
var element=document.getElementById('s');
var lastCommentID=null;
var rotateNum=0;
var displayList=true;
var scrollTop=0;
var scrollLeft=0;
var lastScrollTop=0;
var ableScrollTop=false;
var maxScrollHeight=0;
var cancelChooseList=document.createElement("div");
var cancelChooseListImg=null;
var clickChildChildListNum=-1;
var clickChildChildList=false;
var showChildList=true;
var showChildChildListFir=true;
var showChildChildListSec=true;
var searchDiv=document.getElementById('search');
var searchInput=document.getElementById('s');
var searchButton=document.getElementById('submit-button');
var cancelChooseList=document.createElement("div");

function inputSearch()
{
	var list=document.getElementById("side") ? document.getElementById("side") : document.getElementById("single-side");
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

function inputComment(id)
{
	var commentElement=document.getElementById(id);
		commentElement.style.outlineStyle="solid";
		commentElement.style.outlineColor="#9ec0f7";
		commentElement.style.outlineWidth="2px";
		commentElement.style.backgroundColor="#f3f3f3";
		if (id=="author")
		{
			var warningText=document.getElementById("warning-author");
				warningText.style.visibility="hidden";
		}
		else if (id=="email")
		{
			var warningText=document.getElementById("warning-email");
				warningText.style.visibility="hidden";
		}
}

function finishCommentItem(id)
{
	var commentElement=document.getElementById(id);
		commentElement.style.outlineStyle="none";
		if (commentElement.value=="" && (id=="author" || id=="email"))
		{
			commentElement.style.outlineStyle="solid";
			commentElement.style.outlineColor="#f00";
			commentElement.style.outlineWidth="1px";
			commentElement.style.backgroundColor="#fbdcdc";
			if (id=="author")
			{
				var warningText=document.getElementById("warning-author");
					warningText.style.visibility="visible";
			}
			else
			{
				var warningText=document.getElementById("warning-email");
					warningText.style.visibility="visible";
			}
		}
}

function submitComment()
{
	var author=document.getElementById("author").value;
	var email=document.getElementById("email").value;
		if (author=="")
		{
			alert("请输入您的用户名");
			var commentAuthor=document.getElementById("author");
			var commentEmail=document.getElementById("email");
				if (commentAuthor.style.outlineStyle!="solid")
				{
					commentAuthor.style.outlineStyle="solid";
					commentAuthor.style.outlineColor="#f00";
					commentAuthor.style.outlineWidth="1px";
					commentAuthor.style.backgroundColor="#fbdcdc";
					document.getElementById("warning-author").style.visibility="visible";
				}
				if (commentEmail.value=="" && commentEmail.style.outlineStyle!="solid")
				{
					commentEmail.style.outlineStyle="solid";
					commentEmail.style.outlineColor="#f00";
					commentEmail.style.outlineWidth="1px";
					commentEmail.style.backgroundColor="#fbdcdc";
					document.getElementById("warning-email").style.visibility="visible";
					
				}
			return false;
		}
		else if (email=="")
		{
			alert("请输入您的邮箱");
			var commentEmail=document.getElementById("email");
				commentEmail.style.outlineStyle="solid";
				commentEmail.style.outlineColor="#f00";
				commentEmail.style.outlineWidth="1px";
				commentEmail.style.backgroundColor="#fbdcdc";
				document.getElementById("warning-email").style.visibility="visible";
			return false;
		}
	return true;
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
							newForm.querySelector(".warning-author").style.visibility="visible";
						}
						if (email.value=="" && email.style.outlineStyle!="solid")
						{
							email.style.outlineStyle="solid";
							email.style.outlineColor="#f00";
							email.style.outlineWidth="1px";
							email.style.backgroundColor="#fbdcdc";
							newForm.querySelector(".warning-email").style.visibility="visible";
					
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
							newForm.querySelector(".warning-email").style.visibility="visible";
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
				newTextarea.onfocus=function(){
					newTextarea.style.outlineStyle="solid";
					newTextarea.style.outlineColor="#9ec0f7";
					newTextarea.style.outlineWidth="2px";
				};
				newTextarea.onblur=function()
				{
					newTextarea.style.outlineStyle="none";
				};
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
						newForm.querySelector(".warning-author").style.visibility="visible";
					}
					if (email.value=="" && email.style.outlineStyle!="solid")
					{
						email.style.outlineStyle="solid";
						email.style.outlineColor="#f00";
						email.style.outlineWidth="1px";
						email.style.backgroundColor="#fbdcdc";
						newForm.querySelector(".warning-email").style.visibility="visible";
				
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
						newForm.querySelector(".warning-email").style.visibility="visible";
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
			newTextarea.onfocus=function(){
				newTextarea.style.outlineStyle="solid";
				newTextarea.style.outlineColor="#9ec0f7";
				newTextarea.style.outlineWidth="2px";
			};
			newTextarea.onblur=function()
			{
				newTextarea.style.outlineStyle="none";
			};

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
	var warningTextAuthor=document.createElement("span");
	var warningTextEmail=document.createElement("span");
		newDIV.className="input-content";
		newDIV.style.marginLeft="45px";
		newLabel.for=inputName;
		newLabel.appendChild(document.createTextNode(labelTextNote));
		newInput.type="text";
		newInput.className=inputName;
		newInput.name=inputName;
		newInput.value=inputValue;
		newInput.style.backgroundColor="#fff";
		newInput.onfocus=function()
		{
				newInput.style.outlineStyle="solid";
				newInput.style.outlineColor="#9ec0f7";
				newInput.style.outlineWidth="2px";
				newInput.style.backgroundColor="#f3f3f3";
				if (inputName=="author")
				{
					warningTextAuthor.style.visibility="hidden";
				}
				else if (inputName=="email")
				{
					warningTextEmail.style.visibility="hidden";
				}
		};
		newInput.onblur=function()
		{
			newInput.style.outlineStyle="none";
			if (newInput.value=="" && (inputName=="author" || inputName=="email"))
			{
					newInput.style.outlineStyle="solid";
					newInput.style.outlineColor="#f00";
					newInput.style.outlineWidth="1px";
					newInput.style.backgroundColor="#fbdcdc";
					if (inputName=="author")
					{
						warningTextAuthor.style.visibility="visible";
					}
					else
					{
						warningTextEmail.style.visibility="visible";
					}
			}
		};
		newDIV.appendChild(newLabel);
		newDIV.appendChild(newInput);
		if (inputName=="author")
		{
			warningTextAuthor.className="warning-author";
			warningTextAuthor.appendChild(document.createTextNode("请输入用户名"));
			newDIV.appendChild(warningTextAuthor);
		}
		else if (inputName=="email")
		{
			warningTextAuthor.className="warning-email";
			warningTextEmail.appendChild(document.createTextNode("请输入电子邮件"));
			newDIV.appendChild(warningTextEmail);
		}
	return newDIV;
}

function moveIcon(obj)
{
	function increaseAngle()
	{
		angle+=rotateAngle;
		if (angle<0.7 && angle > -0.7)
		{
			rotateNum++;
		}
		obj.style.transform="rotate("+angle+"deg)";
		if (angle<7)
		{
			increaseTimeoutID=setTimeout(increaseAngle,15);
		}	
		else
		{
			decreaseTimeoutID=setTimeout(decreaseAngle,15);
		}
		if (rotateNum==8)
		{
			clearTimeout(increaseTimeoutID);
			clearTimeout(decreaseTimeoutID);
			obj.style.transform="rotate(0deg)";
		}
	}
		
	function decreaseAngle()	
	{
		angle-=rotateAngle;
		if (angle<0.7 && angle > -0.7)
		{
			rotateNum++;
		}
		obj.style.transform="rotate("+angle+"deg)";
		if (angle > -7)
		{
			decreaseTimeoutID=setTimeout(decreaseAngle,15);
		}
		else
		{
			increaseTimeoutID=setTimeout(increaseAngle,15);
		}
		if (rotateNum==8)
		{
			clearTimeout(increaseTimeoutID);
			clearTimeout(decreaseTimeoutID);
			obj.style.transform="rotate(0deg)";
		}
	}
	increaseTimeoutID=setTimeout(increaseAngle,15);
}

function cancelMoveIcon(obj)
{
	clearTimeout(increaseTimeoutID);
	clearTimeout(decreaseTimeoutID);
	rotateNum=0;
	obj.style.transform="rotate(0deg)";
}

function showList(obj,add)
{
	var list=document.getElementById("side");
	var listIcon=document.getElementById("categories");
		if (displayList)
		{
			displayList=false;
			cancelChooseListImg=add;
			listIcon.style.backgroundImage="url("+cancelChooseListImg+"/images/cancel_show_list.png)";
			listIcon.style.marginTop="-60px";
			listIcon.style.marginRight="15px";
			list.appendChild(cancelChooseList);
			list.style.display="block";
			displayList=false;
		}
		else
		{
			list.style.display="none";
			listIcon.style.backgroundImage="url("+cancelChooseListImg+"/images/list.png)";
				listIcon.style.marginTop="-65px";
			listIcon.style.marginRight="20px";
			displayList=true;
		}
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

function showSingleList(obj,add)
{
	var list=document.getElementById("single-side");
	var listIcon=document.getElementById("single-categories");
		cancelChooseListImg=add;
		listIcon.style.display="none";
		list.style.display="block";
}

function unShowSingleList()
{
	var list=document.getElementById("single-side");
	var listIcon=document.getElementById("single-categories");
		listIcon.style.display="block";
		list.style.display="none";
}
