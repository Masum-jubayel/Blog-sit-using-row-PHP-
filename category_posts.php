<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

<?php 
		if (!isset($_GET['category']) || $_GET['category'] == NULL) {
			header("location: 404.php");
		}else{
			$category_id=$_GET['category'];
		}
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<?php 
				$query= "select * from tbl_post where cat=$category_id";
				$post= $db->select($query);
				if ($post) {
					while ($result= $post->fetch_assoc()) {
					
		?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $result ['id'] ?>"><?php echo $result ['title'] ?></a></h2>
				<h4><?php echo $fm->formatDate($result ['date']) ?>, By <a href="#"><?php echo $result ['authot'] ?></a></h4>
				 <a href="post.php?id=<?php echo $result ['id'] ?>"><img src="admin/<?php echo $result ['image']?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textshorten($result ['body']) ?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $result ['id'] ?>">Read More</a>
				</div>
			</div>
			<?php 
					}
					}else{

				?>
				<h3 style="font-size: 25px; text-align: center; margin-top: 60px; margin-bottom: 60px;">No post Available !! :( </h3>
				<?php } ?>
</div>

<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
