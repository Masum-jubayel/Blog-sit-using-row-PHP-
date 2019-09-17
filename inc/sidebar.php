<div class="sidebar clear">
	<div class="samesidebar clear">
		<h2>Categories</h2>
			<ul>
				<?php 
					$query= "select * from tbl_category";
					$post= $db->select($query);
					if ($post) {
						while ($category_result= $post->fetch_assoc()) {
							
				?>
				<li>
					<a href="category_posts.php?category=<?php echo $category_result ['id'] ?>"><?php echo $category_result ['name'] ?></a>
				</li>
				
				<?php 
						}
						}else{ ?>
								<li> NO Category Created</li>
							}
				<?php }	?>					
			</ul>
	</div>
	

	<div class="samesidebar clear">
		<h2>Latest articles</h2>
		<?php 
			$query= "select * from tbl_post limit 3";
			$post= $db->select($query);
			if ($post) {
				while ($result= $post->fetch_assoc()) {
					
		?>

			<div class="popular clear">

				<h3>
					<a href="post.php?id=<?php echo $result ['id']; ?>"><?php echo $result ['title']; ?></a>
				</h3>

				<a href="post.php?id=<?php echo $result ['id']; ?>">
					<img src="admin/<?php echo $result ['image'];?>" alt="post image"/>
				</a>

				<p>
					<?php echo $fm->textshorten($result ['body'],125); ?>
				</p>
			</div>
			
			
		<?php 
			}
			}else{
					header("location:404.php");
				}
		?>
					
	</div>
</div>