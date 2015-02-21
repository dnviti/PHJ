<?php
/*
+----------------------------+
+ STRUCTURE OF A PHJ COMMAND +
+----------------------------+
index:tag("Arguments(n)")edit_elements;

Four parts:
1)The index, indicates the main function.
2)The tag, indicates the sub function of the index that you are using.
3)The Arguments of the command, USUALLY it's just one.
	The arguments are always treated as strings.
	NOTE: the correct syntax requires you to write the double quotes 
	right after the parenthesis when starting the Arguments list or 
	right before the parenthesis when ending the Arguments list.
<!!!		So this is not allowed: index:tag( "" )edit_elements;			!!!!!!!!!>
4) The edit elements, is a list of different attributes which 
	serves the index and the tag to accomplish their functionality or 
	sometimes improve them.
+----------------------------+
+ ANALYSIS OF THE COMMAND    +
+----------------------------+
e.g:
@:p("This is my article...")#["My_article"];
ANALYSIS:
index=@;
tag=p;
Arguments(1)=This is my article
*/

php:function("function_name()");
or
php:go("function_name()");
/*Calls php function.
Arguments(1): Name of the php function
***********************************************************************/


view:data("variable_name")method["GET/POST"]as["My name is $_PHJ_DATA"];
/*Stores php variable for printing.
Arguments(1): Name of the php variable,
method: method of the variable, it can be a GET method or a POST method.
***********************************************************************/


set:data("variable_value")method["variable_type"]name["variable_name"];
/*Sets a php $_POST variable (array) or a $_GET variable(array).
Arguments(1): value of your variable,
method: method of your variable,
name: name of your variable.
**********************************************************************/


sql:query("temp_var_name")do[sql_command];
/*Stores the result of a sql command inside a $_SESSION variable.
Arguments(1): name of the session variable,
do: your full sql command.
*********************************************************************/


harvest:directory("controllers_path")name["url_variable_name"];
/*Enables the Model View Controller (MVC) pattern.
Arguments(1): path of your php controller files starting from 
				the current directory.
				Controllers are php files with a specific name.
				The controller's name must be the same as it's 
				class(it must contain one class, no more and no 
				less).The class usually uses a first __construct()
				function inside which data is managed.
			,
name: name of your url variable.You defined this inside 
		your .htaccess file.If you followed the default pattern
		your variable should be called "focus".So name["focus"].
*********************************************************************/


js:uselist("js_directory_path");
/*Includes every javascript file that is located inside the specified directory.
Arguments(1): path of your javascript files' folder.
********************************************************************/


js:usefile("js_file_path");
/*Includes the specified javascript.
Arguments(1): path of the javascript file.
********************************************************************/


css:("")do[css_code];
/*Returns css code.
Arguments(0),
do: css code that will be evaluated.PHJ requires you to end your
	command with the character "!" instead of ";".
	Alternative: add "\s" after ";" at the end of your command and
	the evaluation will be successful.
	E.g: 
	#mydiv{
		color: #f45!
	}
	E.g Alternative:
	#mydiv{
		color: #f45;\s
	}
********************************************************************/


css:uselist("css_directory_path");
/*Includes every css file that is located inside the specified directory.
Arguments(1): path of your css files' folder.
*******************************************************************/


css:usefile("css_file_path");
/*Includes the specified css.
Arguments(1): path of the css file.
********************************************************************/



/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
				LIST OF EVENTS STARTS
				inline
				onblur
				onchange
				ondblclick
				onfocus
				onfocusin
				onfocusout
				onmouseenter
				onmouseout
				onmouseover
				onready
				onresize
				onselect
				onclick
				onmousedown
				onmouseup
				onmouseout
				onkeypress
				onscroll
				LIST OF EVENTS ENDS
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


event:js("")target["element_targeted_by_event"]do[js_code];
/*Returns javascript code upon event.
Index: this is the event on which the command will react.
		"inline" event means no event at all.
		e.g:
		inline:js("")do[
			alert("Hello world!!");\s
		];
		//this will simply send an alert to the user saying "Hello world!".
		,
Arguments(0),
target: element that will be targeted by the specified event.
		There are 4 different ways of specifying a target.
		1)By ID
			e.g.
			target["#my_id"]
		2)By CLASS
			e.g.
			target[".my_class"]
		3)By its name as an element through the Element Objects Reference (EO Reference)
			e.g.
			target["article"]
		4)By its name as en element through the Document Object Model Reference (DOM Reference)
			e.g.
			target["dom.document"]
			notice how "dom." specifies that "target"" is using a DOM Reference
		,
do: your javascript code.Remember that "do" does not allow 
	the characters "; " (semicolon followed by any white space (ordinary white space, new line, tab, ecc...)),
	so you need to end your commands with the character "!" or just 
	add "\s" after your ";"(semicolon), so you would get ";\s".
	e.g:
	alert("Hello World!My name is Jeff;\s")!
	//or
	alert("Hello World!My name is Jeff;")!		//Notice how I didn't bother to add "\s"
												//after my semicolon, that's because the
												//following character is not a white space,
												//it's instead null, nothing.
												//THIS would be wrong on the other hand:
												//alert("My name is Jeff; ")!
												//That requires "\s" since the following 
												//character is an ordinary white space.
												//RIGHT WAY to do id:
												//alert("My name is Jeff;\s ")!
	//or
	alert("Hello world!My name is Jeff;");\s
	
	basically "\s" is used to avoid any white space to follow your semicolon.
	"\s" is translated into "null", it means nothing in PHJ.
	[*]Note: This applies every time you use "do" and it also applies to "animate"(deprecated).
******************************************************************/


event:load("source_to_load")target["element_targeted_by_event"]to["element_targeted_by_load"]time["repeating_time"];
/*Loads the specified Argument(1) data inside "to" when "target" makes "event" true.
	If the specified Argument(1) is a valid source, that
	data will be loaded inside "to".
	Otherwise, if the specified Argument(1) is not a valid source, that 
	Argument(1) will be treated as an HTML element.
	e.g:
	onclick:load("hello.php")target[".button"]to[".mi_div"];
	where		*hello.php 
					<?php
						print("Hello world!");
					?>
	will result into:
					<input type="button" class="button" value="Load">
					<div class="my_div">
						Hello World!
					</div>
	when .button is clicked.
	The command will repeat every "time"ms.
	If "time" is not specified the command will not repeat.
	
Index: this is the event on which the command will react.
		"inline" event means no event at all.
		,
Argument(1): srouce/url to be loaded,
target: the element upon the event will react react on,
to: the element inside which the data will be loaded,
time: how long it will take the command to repeat itself in milliseconds (ms).
*****************************************************************/


event:ajax("source_to_load")target["element_targeted-by-event"]data["data_set_to_source"]method["GET/POST"]do[javascript code (if successful)];
/*sends "data" to Argument(1) php file when "target" makes "event" true, 
and returns javascript code through "do" if the "event" is successful.
Index: this is the event on which the command will react.
		"inline" event means no event at all.
		,
Argument(1): this is the path of the specific php script the
				command will send data to
				,
target: target: the element upon the event will react react on,
data: this is the data that will be sent to the php script.
		The value of "data" must be the value of a html element,
		targeted by:
		1)id
			e.g: data["#my_id"]
		+-----------------------------------------------------------------------+
		2)class
			e.g: data[".my_class"]
		+-----------------------------------------------------------------------+
		3)element's name (as html tag) (Experimental)
			e.g: data["html.div"] (Experimental)
			this will return the html content of the tag, its 
			content, NOT the "value" attribute of the tag.
		+-----------------------------------------------------------------------+
		4)dom
			e.g: data["dom.this"]
			this will return the value of this current object (the one targeted)
+---------------------------------------------------------------+
+---------------------------------------------------------------+
+---------------------------VARIABLES NAMES---------------------+
+"data" has a major priority since this will also generate		+
+your php variables' names.Their names are built like this:		+
+---------------------------------------------------------------+
		if 1) data["#my_id"]:
			The variable's name will be equal to "id_" (because it's an id 
			that you specified) followed by the id's value, 
			like this: $_GET["id_pizza"]; or $_POST["id_pizza"];
		
		if 2) data[".my_id"]:
			The variable's name will be equal to "class_" (because it's a class 
			that you specified) followed by the class' value,
			like this: $_GET["class_pizza"]; or $_POST["class_pizza"];
			
		if 3) data["html.div"]:
			The variable's name will be equal to "html_" followed by the element's name,
			like this: $_GET["html_div"]; or $_POST["html_div"];
			
		if 4) data["dom.this"]:
			The variable's name will be equal to "dom_" followed by
			the object's name ("this" in this case), 
			like this: $_GET["dom_this"]; or $_POST["dom_this"];
			
		+-----------------------------------------------------------------------+
method: http method.GET or POST method.This will decide how the
		variables will be called out in the php script if method
		is set on method["GET"] php variable should be called
		as: $_GET["var_name"], otherwise if method["POST"] it 
		should be called as $_POST["var_name"].

****************************************************************/


@:("value");
/*Returns Argument(1) as plain text.
Argument(1): text that will return.
				Notice that the characters "")" should
				be separated by "\s" to avoid unsuccessful string
				evaluation, like this: ""\s)" otherwise that will be
				considered the end of your Argument(1) value.
				e.g:
				@:("Hello world, my name is (" Michael "\s) Michael");
****************************************************************/


@:\n("value");
/*Returns Argument(1) as plain text and recognizes the "new line" character.
Argument(1): text that will return.
				Notice that the characters "")" should
				be separated by "\s" to avoid unsuccessful string
				evaluation, like this: ""\s)" otherwise that will be
				considered the end of your Argument(1) value.
				e.g:
				@:("Hello world, my name is (" Michael "\s) Michael");
****************************************************************/


@:reclink("value");
/*Returns Argument(1) as plain text and recognizes URLs as links.
Argument(1): text that will return.
				Notice that the characters "")" should
				be separated by "\s" to avoid unsuccessful string
				evaluation, like this: ""\s)" otherwise that will be
				considered the end of your Argument(1) value.
				e.g:
				@:("Hello world, my name is (" Michael "\s) Michael");
****************************************************************/


@:reclink\n("value");
/*Returns Argument(1) as plain text and recognizes URLs as links and
the "new line" character.
Argument(1): text that will return.
				Notice that the characters "")" should
				be separated by "\s" to avoid unsuccessful string
				evaluation, like this: ""\s)" otherwise that will be
				considered the end of your Argument(1) value.
				e.g:
				@:("Hello world, my name is (" Michael "\s) Michael");
****************************************************************/



@:[button]("value")inside["url"]custom["custom_html_attributes='value'"]name["name"].["class"]#["id"];
/*Returns a phj dynamic button redirects the user to "inside" url once it's clicked.
Argument(1): Visible value of the button (placeholder),
inside: destination URL of the button.
		NOTE: if no URL is specified then the button will redirect
		the user twards Argument(1).
		e.g:
		@:[button]("Home"); //note there is no inside[""] specified
		this will redirect to "your current location"/Home	//Argument(1) is case sensitive
		so if the current location was "127.0.1" then this button would redirect the user
		to 127.0.0.1/Home.
		,
custom: custom attributes for the button.
		e.g: custom["align='left' style='color:#f45'"],
name: name of button,
.: class of the button,
#: id of the button.
!WARNING!
Use this type of button only if the harvest:dir() command is 
included in the project.
****************************************************************/


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
				LIST OF DYNAMIC INPUT TAGS STARTS
				text/txt
				voice (experimental)
				password/pass
				email/mail
				textarea/txtarea
				option
				LIST OF DYNAMIC INPUT TAGS ENDS
/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


>:dynamic_input_tag("initial_visible_value")value["initial_value"]custom["custom_html_attributes='value'"]max["max_length"]name["name"].["class"]#["id"];
/*Returns a phj dynamic input field.
Argument(1): visible value of the input field (placeholder),
value: the actual value of the input field,
custom: custom attributes for the button.
		e.g: custom["align='left' style='color:#f45'"],
max: maximum length of the field's "value" (not Argument(1)),
name: name of button,
.: class of the button,
#: id of the button.
***************************************************************/


>>:dynamic_input_tag("initial_visible_value")value["initial_value"]custom["custom_html_attributes='value'"]max["max_length"]name["name"]title["html_title"].["class"]#["id"];
/*Returns a phj dynamic input field.
+---------------------------------------------------------------+
+ NOTE: unlike the previews ">:dynamic_input_tag("");" command, +
+ this one is REQUIRED.											+
+---------------------------------------------------------------+
Argument(1): visible value of the input field (placeholder),
value: the actual value of the input field,
custom: custom attributes for the button.
		e.g: custom["align='left' style='color:#f45'"],
max: maximum length of the field's "value" (not Argument(1)),
name: name of button,
title: title of the element (usually visible on mouseover),
.: class of the button,
#: id of the button.
***************************************************************/


phj:uselist("phj_directory_path");
/*Includes every phj file that is located inside the specified directory.
Arguments(1): path of your phj files' folder.
*******************************************************************/


phj:usefile("phj_file_path");
/*Includes the specified phj.
Arguments(1): path of the phj file.
********************************************************************/


src:img("")custom["custom_html_attributes='value'"]name["name"]title["html_title"].["class"]#["id"];
/*Returns an image.
Argument(1): URL of the image,
custom: custom attributes for the button.
		e.g: custom["align='left' style='color:#f45'"],
name: name of button,
title: title of the element (usually visible on mouseover),
.: class of the button,
#: id of the button.
********************************************************************/


src:php("php_file_path");
/*Calls php file.
Argument(1): path of the php file.
********************************************************************/


src:phj("phj_file_path");
/*Calls phj file.Same as phj:usefile("").
Argument(1): path of the phj file.
********************************************************************/


src:mirror("source_path");
/*Returns the content of ANY source (External HTML content included).
Argument(1): path of the external/local source.
********************************************************************/


src:file("file_path");
/*Returns the content of a file located inside your root.
Argument(1): path of the file (starting from your root project).
			*Check your project's main php file to find your root project easily.
********************************************************************/


src:youtube("video_url")width["width_of_frame"]height["height_of_frame"]custom["custom_html_attributes='value'"]name["name"]title["html_title"].["class"]#["id"];
/*Returns iframe of the specified youtube video or youtube list of videos.
Argument(1): URL of the youtube video or list of videos,
custom: custom attributes for the button.
		e.g: custom["align='left' style='color:#f45'"],
name: name of button,
title: title of the element (usually visible on mouseover),
.: class of the button,
#: id of the button.
********************************************************************/


a:html_content("")custom["custom_html_attributes='value'"]name["name"]title["html_title"].["class"]#["id"];
/*Returns a html anchor using the phj tag as its content.
tag: content that will be subject to the anchor (HTML allowed),
custom: custom attributes for the button.
		e.g: custom["align='left' style='color:#f45'"],
name: name of button,
title: title of the element (usually visible on mouseover),
.: class of the button,
#: id of the button.
********************************************************************/


tool:tip("on/enable");
/*Enables tool tip for your project.
Argument(1): enables tool tip.Two possible vcalues: "on" or "enable".
NOTE: id #tooltip is reserved for the tool tip.
		in order for this to work properly include:
			#tooltip{
				position: absolute;
			}
			in the CSS files.
		class .tooltip will be the trigger that will make the tool tip 
		appear on mouseover event and the edit element "tooltip["value"] will
		containt the tool tip's value for that object.
		e.g:
		tool:tip("on");
		@:p("Hello world!").["tooltip"]tooltip["How are you, world?"];
********************************************************************/
?>
