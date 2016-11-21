<form action="/ci3/index.php/topic/add" method="post" class="span10">
	<?php echo validation_errors(); ?>
	<input type="text" name="title" placeholder="제목" class="span12">
	<textarea name="description" placeholder="본문" class="span12" rows="15"></textarea>
	<input type="submit" name="" class="btn">
</form>