<div class="centered homeContent">
<?php
foreach($viewmodel->users AS $user){
?>
				<div class="homeAvatar">
				<div class="av_hair"><img src="<?php echo RES . 'images/people/' . $user->avatar->getItemImage('hair',$user->avatar->hairValue); ?>" id="hair_img"/></div>
				<div class="av_face"><img src="<?php echo RES . 'images/people/' .  $user->avatar->getItemImage('skin',$user->avatar->skinValue,'face'); ?>" id="face_img" /></div>
				<div class="av_shirt"><img src="<?php echo RES . 'images/people/' . $user->avatar->getItemImage('shirt',$user->avatar->shirtValue); ?>" id="shirt_img"/></div>
				<div class="av_pants"><img src="<?php echo RES . 'images/people/' . $user->avatar->getItemImage('pants',$user->avatar->pantsValue); ?>" id="pants_img"/></div>
				<div class="av_feet"><img src="<?php echo RES . 'images/people/' .  $user->avatar->getItemImage('skin',$user->avatar->skinValue,'feet'); ?>" id="feet_img"/></div>
				<div class="av_hands"><img src="<?php echo RES . 'images/people/' .  $user->avatar->getItemImage('skin',$user->avatar->skinValue,'hands'); ?>" id="hands_img"/></div>
				
				<div class="infoBox">
				<?php echo $user->fname . ' ' . $user->lname; ?><br />
				<?php echo '<b>Gender: </b>' . $user->getReadableFormat('gender',$user->gender); ?><br /> 
				<?php echo '<b>Status: </b>' . $user->getReadableFormat('status',$user->status); ?><br /> 
				</div>
				
				</div>

<?php
}
?>
<div class="clear"></div>
</div>