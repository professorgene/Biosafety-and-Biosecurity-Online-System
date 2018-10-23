<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Announcements Edit</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>bootstrap/css/bootstrap.min.css">
</head>
<body>
<!-- Navigation -->
    <?php include_once 'template/navbar.php' ?>
    <!-- Page Content -->

<div class="container">
	
	<div>
		<div>
			<h3>Edit Form
				<span class="pull-right"><a href="<?php echo base_url(); ?>" class="btn btn-primary"><span class="glyphicon glyphicon-arrow-left"></span> Back</a></span>
			</h3>
			<hr>
			<?php extract($list); ?>
			
			<form method="POST" action="<?php echo base_url(); ?>index.php/editannouncement/update/<?php echo $announcement_id; ?>
				<div class="card my-10">
					<h5 class="card-header">Announcements Edit</h5>
						<div class="card-body">
							<div class="form-group"><textarea class="form-control" name="announcement_description" rows="20"> <?php echo $announcement_description; ?> </textarea></div>
						</div>	
		</div>
						
				<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</button>
			</form>
		</div>
	</div>
</div>
</body>
</html>