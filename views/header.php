<?php ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Avatar Social Network</title>
  <meta name="description" content="Avatar Social Network">
  <meta name="author" content="Charbel Ghossain">
  <link rel="stylesheet" href="resources/css/styles.css?v=1.0">
  <!--[if lt IE 9]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js" type="text/javascript"></script>
  
  <script type="text/javascript">
  var openTab = 0;
  
	$(document).ready(function() {
		initializeAvatar();
	});
	
	function selectTab(tabId){
		
		if(openTab != tabId){
			$("li[id^='av_child']").hide('slow');
			$("#av_child" + tabId).show('slow');
			openTab = tabId;
		}
	}
	
	function setGender(gen){
		if(gen == 0){
			$("img[id^='male_']").show(); // hide all male specific avatar items
			$("img[id^='female_']").hide(); // hide all female specific avatar items
		}
		else if(gen == 1){
			$("img[id^='male_']").hide(); // hide all male specific avatar items
			$("img[id^='female_']").show(); // hide all female specific avatar items
		}
	}
	
	/* function that handles all drop-downs on change events, given the dropdown id where the change event occured 
	*/
	function dropdownEvent(id){
		if(id == 'gender_dropdown'){
			setGender($("#" + id).val());
		}
	}
	
	/* create default avatar tab menu
	*/
	function initializeAvatar(){
		$("li[id^='av_child']").hide();
		setGender($("#gender_dropdown").val());
		selectTab(4);
	}
	
	function changeAvatar(type,value,src){
		if(type=='skin'){
			$("#face_img").attr("src", "resources/images/people/face" + value + ".png");
			$("#hands_img").attr("src", "resources/images/people/hands" + value + ".png");
			$("#feet_img").attr("src", "resources/images/people/feet" + value + ".png");
			$("#av_face_value").val(value);
		}
		else{
		$("#" + type + "_img").attr("src", src);
		$("#av_" + type + "_value").val(value);
		}
		
		
		//document.getElementById('av_' + type + '_value').value = value;
	}
	
  </script>
  
</head>
<body>

	<div id="headerMenu" class="transparent centered roundCorners shadowEffect">
		<div id="logoSection">
			<a href="?"><img src="resources/images/logo.png" id="logoImage" alt="logo image" /></a>
		</div>
		<div id="menuSection">
			<a href="?controller=add&amp;action=index"><img src="resources/images/addUser.png" class="menuButton" alt="Add User Button" /></a>
		</div>
		<div class="clear">
		</div>
	</div>

	<div id="contentBox" class="transparent centered roundCorners shadowEffect">