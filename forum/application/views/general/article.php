<div id='article-wrapper'>

	<div id='a-top'>

		<div class='at-left'>
			<?php echo $this->pagination->create_links(); ?>
		</div>

		<div class='at-right'>
			<?php
				if($login == TRUE)
				{
					echo "<a href='new_article''>Start New Article</a>";
				}
				else
				{
					echo "<a href='".base_url()."sign-in''>Please log in to post</a>";
				}
			?>
		</div>
	</div>
	<div id='a-bot'>
		<div class='ab-top'></div>
		<div class='ab-main'>
			<?php
				
				foreach ($records->result_array() as $rows) {

					foreach ($users->result_array() as $u) {
						if($rows['user'] == $u['id']){
							$this->table->add_row(
								anchor('general/view-article/'.$rows['id'], $rows['title']),ucfirst($u['username']),date('d M Y', $rows['datetime'])
							);
						}
						//
						//.'-'.$rows['title'],$rows['title']),ucfirst($u['username']),date('d M Y', $rows['datetime'])
						
					}
				}
				echo $this->table->generate();
			?>
		</div>

		<div class='ab-bot'>
			<div class='abb-left'>
				<?php echo $this->pagination->create_links(); ?>
			</div>
		</div>
	</div>
	
</div>