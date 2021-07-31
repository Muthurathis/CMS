<?php



include 'includes/db.php';
include 'includes/header.php';

?>




	<!-- Start main body Area -->
	<div class="main-body section-gap mt--30">
		<div class="container box_1170">
			<div class="row">
				<div class="col-lg-8 post-list">
					<!-- Start Post Area -->
					<section class="post-area">

					<?php
            if(isset($_GET['id'])){

                $category_id=$_GET['id'];
            }


					$posts_query="SELECT * FROM posts where post_category_id=$category_id";
					$post_result=mysqli_query($connection,$posts_query);

					while($row=mysqli_fetch_assoc($post_result)){
						// print_r($row);
						$post_title=$row['post_title'];
						$post_author=$row['post_author'];
						$post_date=$row['post_date'];
						$post_content=substr($row['post_content'],0,100);
						$post_image=$row['post_image'];
						$post_tags=$row['post_tags'];
						$post_category_id=$row['post_category_id'];
						$post_comment_count=$row['post_comment_count'];
						$post_status=$row['post_status'];
						$post_id=$row['post_id'];


					

					?>

						<div class="single-post-item">
							<figure>
								<img class="post-img img-fluid" src="img/posts/<?php echo $post_image ?>" alt="">
							</figure>
							<h3>
								<a href="blog-details.php"><?php echo $post_title ?></a>
							</h3>
							<p><?php echo $post_content?></p>
							<a href="blog-details.php?post=<?php echo $post_id?>" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box">
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="img/author/a1.png" alt="">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#"><?php echo $post_author ?></a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
														<?php echo $post_date ?>
													</a>
												</li>
												<li>
													<a href="#">
											
													<?php echo $post_tags ?>
													</a>
												</li>
											
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?Php
							}
						?>

						<!-- <div class="single-post-item">
							<figure>
								<img class="post-img img-fluid" src="img/posts/p2.jpg" alt="">
							</figure>
							<h3>
								<a href="blog-details.html">Global Resorts Network Grn Putting Timeshares To Shame</a>
							</h3>
							<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
							<a href="blog-details.html" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box">
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="img/author/a1.png" alt="">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#">Marvel Maison</a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
														13th Oct, 2018
													</a>
												</li>
												<li>
													<a href="#">
											
														By Ashwin
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- <div class="single-post-item">
							<figure>
								<img class="post-img img-fluid" src="img/posts/p3.jpg" alt="">
							</figure>
							<h3>
								<a href="blog-details.html">A Guide To Rocky Mountain Vacations</a>
							</h3>
							<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
							<a href="blog-details.html" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box">
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="img/author/a1.png" alt="">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#">Marvel Maison</a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
														13th Oct, 2018
													</a>
												</li>
												<li>
													<a href="#">
											
														By Ashwin
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- <div class="single-post-item">
							<figure>
								<img class="post-img img-fluid" src="img/posts/p4.jpg" alt="">
							</figure>
							<h3>
								<a href="blog-details.html">Big Savings On Gas While You Travel</a>
							</h3>
							<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
							<a href="blog-details.html" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box">
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="img/author/a1.png" alt="">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#">Marvel Maison</a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
														13th Oct, 2018
													</a>
												</li>
												<li>
													<a href="#">
											
														By Ashwin
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<!-- <div class="single-post-item">
							<figure>
								<img class="post-img img-fluid" src="img/posts/p5.jpg" alt="">
							</figure>
							<h3>
								<a href="blog-details.html">Tourism Is Back In Full Swing In Cancun Mexico</a>
							</h3>
							<p>orem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
								magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
							<a href="blog-details.html" class="primary-btn text-uppercase mt-15">continue Reading</a>
							<div class="post-box">
								<div class="d-flex">
									<div>
										<a href="#">
											<img src="img/author/a1.png" alt="">
										</a>
									</div>
									<div class="post-meta">
										<div class="meta-head">
											<a href="#">Marvel Maison</a>
										</div>
										<div class="meta-details">
											<ul>
												<li>
													<a href="#">
														<span class="lnr lnr-calendar-full"></span>
														13th Oct, 2018
													</a>
												</li>
												<li>
													<a href="#">
											
														By Ashwin
													</a>
												</li>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div> -->

						<nav class="blog-pagination justify-content-center d-flex">
							<ul class="pagination">
								<li class="page-item">
									<a href="#" class="page-link" aria-label="Previous">
										<span aria-hidden="true">
											<span class="lnr lnr-arrow-left"></span>
										</span>
									</a>
								</li>

								<li class="page-item">
									<a href="#" class="page-link" aria-label="Next">
										<span aria-hidden="true">
											<span class="lnr lnr-arrow-right"></span>
										</span>
									</a>
								</li>
							</ul>
						</nav>
					</section>
					<!-- Start Post Area -->
				</div>

	<!-- Start main body Area -->
<?php
include 'includes/sidebar.php';
?>


<?php

include 'includes/footer.php';
?>