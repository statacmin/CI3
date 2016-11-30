
<form action="/ci3/index.php/topic/add" method="post" class="span10">
	<?php echo validation_errors(); ?>
	<input type="text" name="title" placeholder="제목" class="span12">
	<textarea name="description" placeholder="본문" class="span12" rows="15"></textarea>
	<div class="form_control">
		<input type="submit" name="" class="btn">
	</div>
</form>
<script src="/ci3/static/lib/ckeditor/ckeditor.js"></script>
<script>
	CKEDITOR.replace('description', {
		'filebrowserUploadUrl': '/ci3/index.php/topic/upload_receive'
	});
</script>




