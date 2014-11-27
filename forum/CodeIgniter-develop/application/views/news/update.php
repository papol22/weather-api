<h2><?php echo $title; ?></h2>


<?php  echo form_open('news/update') ?>
	
	<input type='hidden' name='id' value='<?php echo $news_item['id']; ?>'/> 
	
    <label for="title">Title</label>
    <input type="input" name="title" value='<?php echo $news_item['title'] ?>' /><br />

    <label for="text">Text</label><br />
    <textarea name="text" ><?php echo $news_item['text'] ?> </textarea><br />
	
    <input type="submit" name="update" value="UPDATE" />
	
</form>