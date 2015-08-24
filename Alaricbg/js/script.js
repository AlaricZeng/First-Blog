// JavaScript Document
var element=document.getElementById('s');
var lastCommentID=null;

function inputSearch()
{
	if (element.value=="点些喜欢的东西吧")
	{
		element.value="";
		element.style.color="#000";
		element.style.outlineColor="#9ec0f7";
		element.style.outlineStyle="solid";
		element.style.outlineWidth="2px";
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
		element.style.outlineStyle="none";
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
				if (commentAuthor.value=="" && commentAuthor.style.outlineStyle!="solid")
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
		
				newDIV=createFormElement("用户名*:","author",author_name);
				newForm.appendChild(newDIV);
		
				newDIV=createFormElement("电子邮件*:","email",author_email);
				newForm.appendChild(newDIV);
		
				newDIV=createFormElement("站点:","url",author_url);
				newForm.appendChild(newDIV);
			
			
				newDIV=document.createElement("div");
				newLabel=document.createElement("label");
				newTextarea=document.createElement("textarea");
				newDIV.className="input-content";
				newLabel.for="comment";
				newLabel.appendChild(document.createTextNode("评论:"));
				newTextarea.name="comment";
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
				newInput.value="";
				newInput.className="submit";
				newForm.appendChild(newInput);
		
				containerDIV.appendChild(newForm);
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
		
			newDIV=createFormElement("用户名*:","author",author_name);
			newForm.appendChild(newDIV);
		
			newDIV=createFormElement("电子邮件*:","email",author_email);
			newForm.appendChild(newDIV);
		
			newDIV=createFormElement("站点:","url",author_url);
			newForm.appendChild(newDIV);
		
		
			newDIV=document.createElement("div");
			newLabel=document.createElement("label");
			newTextarea=document.createElement("textarea");
			newDIV.className="input-content";
			newLabel.for="comment";
			newLabel.appendChild(document.createTextNode("评论:"));
			newTextarea.name="comment";
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
			newInput.value="";
			newInput.className="submit";
			newForm.appendChild(newInput);
		
			containerDIV.appendChild(newForm);
			lastCommentID=commentID;
	}
}

function createFormElement(labelTextNote,inputName,inputValue)
{
	var newDIV=document.createElement("div");
	var newLabel=document.createElement("label");
	var newInput=document.createElement("input");
		newDIV.className="input-content";
		newLabel.for=inputName;
		newLabel.appendChild(document.createTextNode(labelTextNote));
		newInput.type="text";
		newInput.name=inputName;
		newInput.value=inputValue;
		newDIV.appendChild(newLabel);
		newDIV.appendChild(newInput);
	return newDIV;
}