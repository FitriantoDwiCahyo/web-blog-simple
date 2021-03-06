<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>KumPulArtic</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url();?>asset/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<!-- Custom fonts for this template -->
	<link href="<?php echo base_url();?>asset//vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
		type="text/css">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet'
		type='text/css'>
	<link
		href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
		rel='stylesheet' type='text/css'>

	<!-- Custom styles for this template -->
	<link href="<?php echo base_url();?>asset/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
		<div class="container">
			<a class="navbar-brand" href="<?php echo site_url('');?>">KumPulArtic</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
				aria-label="Toggle navigation">
				Menu
				<i class="fas fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<!-- <form action="">
                                <input type="text" name="find">
                                <button type="submit">cari</button>
                            </form> -->
						<form class="form-inline my-2 mr-sm-5">
							<input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search"
								name="find">
							<button class="btn btn-outline-success btn-xs" type="submit">Search</button>
						</form>
					</li>
					<li class="nav-item">
						<a class="nav-link my-3 mr-sm-0" href="<?php echo site_url('');?>">Home</a>
					</li>

					<?php if(isset($_SESSION['username'])):?>
					<li class="nav-item">
						<a class="nav-link my-3 mr-sm-0" href="<?php echo site_url('blog/add');?>"> + Tambah Artikel</a>
					</li>

					<li class="nav-item">
						<a class="nav-link my-3 mr-sm-0" href="<?php echo site_url('blog/logout');?>">Logout</a>
					</li>

					<?php else:?>
					<li class="nav-item">
						<a class="nav-link my-3 mr-sm-0" href="<?php echo site_url('blog/login');?>">Login</a>
					</li>
					<?php endif; ?>

                    <!-- Kode di atas melakukan pengecekan apakah session username tidak kosong? 
                    apabila tidak kosong artinya user tersebut sudah berhasil login, 
                    maka aplikasi akan menampilkan link untuk tambah artikel dan juga link untuk logout,
                    namun apabila kosong atau user belum melakukan login, maka aplikasi tidak akan menampilkan link tambah artikel,
                    namun akan menampilkan link Login. -->
                    
				</ul>
			</div>
		</div>
	</nav>

</body>

</html>
