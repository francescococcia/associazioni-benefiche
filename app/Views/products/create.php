<!DOCTYPE html>
<html>
<head>
	<title>Create Product</title>
</head>
<body>
	<h2>Create Product</h2>
	<?= \Config\Services::validation()->listErrors() ?>
	<form method="post" action="<?= site_url('products/store') ?>">
		<label for="name">Name</label>
		<input type="text" name="name" id="name"><br>

		<label for="description">Description</label>
		<textarea name="description" id="description"></textarea><br>

		<label for="price">Price</label>
		<input type="text" name="price" id="price"><br>

		<input type="submit" value="Create">
	</form>
</body>
</html>