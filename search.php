<?php include 'inc/header.php';?>

<?php 
		if (!isset($_GET['search']) || $_GET['search']== NULL) {
			header("location: index.php");
		}else{
			$search=$_GET['search'];
		}
	?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			
			<?php 
			$query= "SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
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
				}else{ ?>
						<h2 style="color:red; text-align: center;font-size: 100px;margin-top: 50px;padding: 20px;"><b><i> OPP !! </i></b></h2>
						<p style="text-align: center;font-size: 50px;margin-top: 50px;padding: 20px;margin-bottom: 100px;">Your <b><mark>Search</mark></b> is Not found </p>
				<?php } ?>
		
		</div>

<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
