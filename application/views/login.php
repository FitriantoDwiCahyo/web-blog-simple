<?php $this->load->view('Partials/headerlogin');?>

<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url();?>asset/img/home-bg.jpg')">
	<div class="overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-10 mx-auto">
				<div class="site-heading">
					<h1>Login</h1>
				</div>
			</div>
		</div>
	</div>
</header>

<!-- main content -->

<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto">
			<?php echo $this->session->flashdata('message');?>
			<?php echo form_open_multipart();?>
			<div class="form-group">
				<label for="username">Username</label>
				<?php echo form_input('username',null,'class="form-control"');?>
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<?php echo form_password('password',null,'class="form-control"');?>
			</div>

			<button class="btn btn-success">Login</button>
			</form>
		</div>
	</div>
</div>

<!-- footer -->

<?php $this->load->view('Partials/footer');?>
