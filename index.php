<?php include 'inc/header.php';?>
<?php include 'inc/slider.php';?>

	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

		<!-- pagination -->
		<?php
			$par_page = 3;
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			}else{
				$page=1;
			}
			$start_form = ($page-1) * $par_page;
		?>
		<!-- pagination -->


		<?php 
			$query= "select * from tbl_post limit $start_form, $par_page";
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

		<?php }?><!--end While -->
		
		<!-- pagination -->
		<?php

			$query = "select * from tbl_post";
			$page_result = $db->select($query);
			$total_rows = mysqli_num_rows($page_result);
			$total_pages = ceil($total_rows/$par_page);


			echo "<span class='pagination'><a href='index.php?page=1'>First Page</a>";

			for ($i=1; $i <= $total_pages; $i++) { 
				echo "<a href='index.php?page=".$i."'>".$i."</a>";
			}


			echo "<a href='index.php?page=$total_pages'>Last Page</a></span>" 
		?>	
		<!--end pagination -->

		<?php 
			}else{
				header("location:404.php");
			}
		?>
			
		</div>

<?php include 'inc/sidebar.php';?>
<?php include 'inc/footer.php';?>
	