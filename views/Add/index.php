<form name="addUser" action="?controller=add&action=process" method="post">
<div id="addFormContainer" class="centered">
<div id="leftForm">

<div class="centered"> <h1> User Information </h1> </div>

<?php
/* display all textfields
*/
foreach($viewmodel->textfields AS $textfield){
?>
<div class="addFormLabel">
	<h2><?php echo $textfield['label']; ?></h2>
</div>

<div class="addFormControl">
	<input type="text" name="<?php echo $textfield['type']; ?>" class="addFormTextField roundCorners"/>
</div>

<div class="clear"></div>
<?php
}

/* display all dropdowns 
*/

foreach($viewmodel->dropdowns AS $dropdown){
?>

<div class="addFormLabel">
	<h2> <?php echo $dropdown[0]['type']; ?> </h2>
</div>

<div class="addFormControl">
<select name="<?php echo $dropdown[0]['type']; ?>" id="<?php echo $dropdown[0]['type']; ?>_dropdown" onchange="dropdownEvent('<?php echo $dropdown[0]['type']; ?>_dropdown');" class="addFormDD roundCorners shadowEffects">
	<?php
	foreach($dropdown AS $dvalue){
	?>
		<option value="<?php echo $dvalue['value']; ?>"> <?php echo $dvalue['key'] ?> </option>
	<?php
	}
	?>
</select>
</div>


<div class="clear">
</div>

<?php
}
?>

<input type="submit" value="Finish" class="formButton centered roundCorners" style="position:relative; top:100px;"/>

</div>

<div id="rightForm">
<div class="centered"> <h1> Create your avatar </h1> </div>

	<div id="tabbedAvatarMenu">
		<ul id="menuContainer">
			<?php
				$itemCounter = 0;
				foreach($viewmodel->avatarItems AS $item){
				$itemCounter++;
			?>
			<li id="av_parent<?php echo $itemCounter; ?>" onclick="selectTab(<?php echo $itemCounter; ?>);" class="tabHeading"><?php echo $item[0]['type']; ?></li><li id="av_child<?php echo $itemCounter; ?>">
			<ul class="tabContainer">
			<?php
				foreach($item AS $avatarItem){
			?>
			<li> <img onclick="changeAvatar('<?php echo $avatarItem['type'];?>','<?php echo $avatarItem['value'];?>','<?php echo RES . 'images/people/' . $avatarItem['filename']; ?>')" src="<?php echo RES . 'images/people/' . $avatarItem['filename']; ?>" class="avatarItem" id="<?php echo $avatarItem['gender'] . '_' . $avatarItem['type']; ?>" /> </li>
			<?php
			}
			?>
			</ul>
			</li>
			<?php
			}
			?>
			
		</ul>
	</div>
	
	<div id="avatarDisplay" class="roundCorners">
			<div id="avatarCharacter" class="middle">
				<div class="av_hair"><img src="<?php echo RES . 'images/people/' . $viewmodel->avatar->getItemImage('hair',$viewmodel->avatar->hairValue); ?>" id="hair_img"/></div>
				<div class="av_face"><img src="<?php echo RES . 'images/people/' .  $viewmodel->avatar->getItemImage('skin',$viewmodel->avatar->skinValue,'face'); ?>" id="face_img" /></div>
				<div class="av_shirt"><img src="<?php echo RES . 'images/people/' . $viewmodel->avatar->getItemImage('shirt',$viewmodel->avatar->shirtValue); ?>" id="shirt_img"/></div>
				<div class="av_pants"><img src="<?php echo RES . 'images/people/' . $viewmodel->avatar->getItemImage('pants',$viewmodel->avatar->pantsValue); ?>" id="pants_img"/></div>
				<div class="av_feet"><img src="<?php echo RES . 'images/people/' .  $viewmodel->avatar->getItemImage('skin',$viewmodel->avatar->skinValue,'feet'); ?>" id="feet_img"/></div>
				<div class="av_hands"><img src="<?php echo RES . 'images/people/' .  $viewmodel->avatar->getItemImage('skin',$viewmodel->avatar->skinValue,'hands'); ?>" id="hands_img"/></div>
			</div>
	</div>

</div>

<div class="clear">
</div>

	
</div>

<input type="hidden" name="av_hair_value" id="av_hair_value" value="1" />
<input type="hidden" name="av_face_value" id="av_face_value" value="1" />
<input type="hidden" name="av_shirt_value" id="av_shirt_value" value="1" />
<input type="hidden" name="av_pants_value" id="av_pants_value" value="1" />
<input type="hidden" name="av_feet_value" id="av_feet_value" value="1" />
<input type="hidden" name="av_hands_value" id="av_hands_value" value="1" />
</form>