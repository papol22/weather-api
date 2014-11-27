<button onclick="window.location='create'" >Create</button><br>
<?php foreach ($news as $news_item): ?> 
		
        <h2><?php echo $news_item['title'] ?></h2>
        <div class="main">
                <?php echo $news_item['text'] ?>
        </div>
        <p>	
			<a href="view/<?php echo $news_item['slug'] ?>">View article</a> 
			<a href="update/<?php echo $news_item['id'] ?>">Edit</a>
			<a href="delete/<?php echo $news_item['id'] ?>">Delete</a>
		</p>
		
		
<?php endforeach ?>

