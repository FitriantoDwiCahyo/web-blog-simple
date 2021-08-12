<?php $this->load->view('Partials/header.php');?>
<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url();?>asset/img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Kumpulan Artikel</h1>
					<span class="subheading">If Your Read Article, You Want To Have Be Success In Life</span>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- Main Content -->
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto">
			<?php echo $this->session->flashdata('message');?>
			<?php foreach ($blog as $key => $blogs): ?>
			<div class="post-preview">
				<a href="<?php echo site_url('blog/detail'. $blogs['url']);?>">
					<h2 class="post-title">
						<a href="<?php echo site_url('blog/detail/'.$blogs['url']); ?>">
							<?php echo $blogs['title']; ?>
						</a>
					</h2>
				</a>


				<p class="post-meta">Posted On :
					<?php echo $blogs['date'];?>
					<?php if(isset($_SESSION['username'])):?>
					<a href="<?php echo site_url('blog/edit/'.$blogs['id']);?>">Update</a>
					<a href="<?php echo site_url('blog/delete/'.$blogs['id']);?> "
						onclick="return confirm('Apakah anda yakin untuk menghapus artikel ini?')">Delete</a><br />
					<?php endif;?>
				</p>
				<?php echo $blogs['content'];?>
			</div>
			<hr>
			<?php endforeach;?>

			<?php echo $this->pagination->create_links();?>



			<!-- Pager -->
			<div class="clearfix">
				<a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
			</div>
		</div>
	</div>
</div>

<hr>

<?php $this->load->view('Partials/footer.php');?>
