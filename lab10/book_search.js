window.onload = function() {
    $("b_xml").onclick=function(){
		//construct a Prototype Ajax.request object
		var radio_button = $$("input[name=category]");
		//console.log(radio_button);
		var parameters = getCheckedRadio(radio_button);
		//console.log(parameters);
		new Ajax.Request("books.php", {
			method: "get",
			parameters: {category: parameters},
			onSuccess: showBooks_XML,
			onFailure: ajaxFailed
		});
	}
    $("b_json").onclick=function(){
		//console.log('clicked Json');
		//construct a Prototype Ajax.request object
		var radio_button = $$("input[name=category]");
		var parameters = getCheckedRadio(radio_button);

		new Ajax.Request("books_json.php", {
			method: "get",
			parameters: {category: parameters},
			onSuccess: showBooks_JSON,
			onFailure: ajaxFailed
		});
    }
};

function getCheckedRadio(radio_button){
	for (var i = 0; i < radio_button.length; i++) {
		if(radio_button[i].checked){
			return radio_button[i].value;
		}
	}
	return undefined;
}

function showBooks_XML(ajax) {
	//alert(ajax.responseText);
	//console.log(ajax.responseXML);
	var books = ajax.responseXML;
	var book = books.getElementsByTagName("book");
    //console.log(book);
    var content = "<ul>";
	for (var i=0; i<book.length; i++) {
		var children = book[i].children;
        content += "<li>";
		for (var j=0; j<children.length-1; j++) {
            //console.log(children[j].textContent);
            if(j === children.length-2) {
                content = content + "(" + children[j].textContent + ")";
            } else if (j === children.length-3) {
                content = content + children[j].textContent + " ";
            } else {
                content = content + children[j].textContent +", ";
            }
            //console.log(content);
        } 
        content += "</li>";
    }
    content += "</ul>";
    //console.log(content);
    //console.log($("books"));
    $("books").innerHTML = content;
}

function showBooks_JSON(ajax) {
	//console.log(ajax.responseText);
	var data = JSON.parse(ajax.responseText).books;
	//console.log('-----');
	console.log(data);
	var content = "<ul>";
	for (var i=0; i<data.length; i++) {
		content += "<li>";
		content += data[i].title;
		content += ", ";
		content += data[i].author;
		content += " (";
		content += data[i].year;
		content += ")</li>"
	}
	content += "</ul>";
	console.log(content);
	$("books").innerHTML = content;
}

function ajaxFailed(ajax, exception) {
	var errorMessage = "Error making Ajax request:\n\n";
	if (exception) {
		errorMessage += "Exception: " + exception.message;
	} else {
		errorMessage += "Server status:\n" + ajax.status + " " + ajax.statusText + 
		                "\n\nServer response text:\n" + ajax.responseText;
	}
	alert(errorMessage);
}
