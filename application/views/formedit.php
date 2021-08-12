<html>
<?php $this->load->view("Partials/header");?>
<body>
	<header class="masthead" style="background-image: url('<?php echo base_url();?>asset/img/home-bg.jpg')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-10 mx-auto">
					<div class="site-heading">
						<h1>Tambah Artikel</h1>

					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<h1>Update Artikel</h1>

				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Wahh!!</strong> <?php echo validation_errors();?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				
				<?php echo form_open_multipart(); ?>

					<div class="form-group">
						<label>Judul</label>
						<?php echo form_input('title',set_value('title',$blog['title']),'class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Url</label>
						<?php echo form_input('url',set_value('url',$blog['url']),'class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Content</label>
						<?php echo form_textarea('content',set_value('content',$blog['content']),'class="form-control"');?>
					</div>

					<div class="form-group">
						<label>Cover</label>
						<?php echo form_upload('cover',set_value('cover',$blog['cover']),'class="form-control"');?>
					</div>
					<div>
						<button class="btn btn-success" type="submit">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>
<?php $this->load->view("Partials/footer");?>
</html>
