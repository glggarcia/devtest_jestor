<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700&display=swap" rel="stylesheet">
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/media.css" />

		<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
	</head>
	<body>
		<header>
			<?php if(!empty($_SESSION['user_name'])): ?>
				<nav class="navbar">
					<a href="<?php echo BASE_URL; ?>">Home</a>
					<p><i class="fa fa-user"></i><?php echo $_SESSION['user_name']; ?></p>
					<a href="<?php echo BASE_URL; ?>auth/logout">Logout</a>
				</nav>
			<?php endif; ?>
		</header>
		<main>
			<?php $this->loadViewInTemplate($viewName, $viewData); ?>
		</main>
	</body>
</html>