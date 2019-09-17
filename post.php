<?php include 'inc/header.php';?>

	<?php 
		if (!isset($_GET['id']) || $_GET['id']== NULL) {
			header("location: 404.php");
		}else{
			$id=$_GET['id'];
		}
	?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php 
					$query= "select * from tbl_post where id=$id";
					$post= $db->select($query);
					if ($post) {
						while ($post_result= $post->fetch_assoc()) {
							
				?>
				<h2><?php echo $post_result ['title'] ?></a></h2>

				<h4><?php echo $fm->formatDate($post_result ['date']) ?>, By <a href="#"><?php echo $post_result ['authot'] ?></a></h4>

				<img src="admin/<?php echo $post_result ['image']?>" alt="post image"/>

				<p><?php echo $post_result ['body'] ?></p>

				

				<div class="relatedpost clear">
					<h2>Related articles</h2>
					<?php 
						$catid=$post_result['cat'];
						$related_query= "select * from tbl_post where cat='$catid' order by rand() limit 6";
						$related_post= $db->select($related_query);
						if ($related_post) {
							while ($related_result= $related_post->fetch_assoc()) {
							
					?>

					<a href="post.php?id=<?php echo $related_result ['id'] ?>">
						<img src="admin/<?php echo $related_result ['image']?>" alt="Related post image"/>
					</a>

					<?php 
						}
						}else{
								header("location:404.php");
							}
					?>	
				</div>

				<?php 
					}
					}else{
							header("location:404.php");
						}
				?>
			</div>
		</div>
<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>


				