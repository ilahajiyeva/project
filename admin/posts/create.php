 <?php

require "../layouts/header.php";
require "../layouts/sidebar.php";
require "../layouts/topbar.php";
require "../../db.php";

$stmt = $conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $conn->prepare("SELECT * FROM tags");
$stmt->execute();
$tags = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<main class="content">
	<div class="container-fluid">
		<div class="header">
			<h1 class="header-title">
				Create New Post
			</h1>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
					<form action="./store.php" method="post" enctype="multipart/form-data">
					    <div class="mb-3 col-md-8">
							<label class="form-label"> Title</label>
							<input type="text" class="form-control" placeholder="Title" name="title">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Category</label>
								<select class="form-control" name="category_id">
										<option selected="">Choose Category</option>
										<?php foreach($categories as $category) {?>
											<option value="<?= $category['id']?>"><?= $category['name']?></option>
										<?php }?>
								</select>
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Description</label>
							<input type="text" class="form-control" placeholder="Description" name="description">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Image</label>
							<input type="file" class="form-control"  name="image">
					    </div>
						<div class="mb-3 col-md-8">
							<label class="form-label"> Tags</label>
								<select class="form-control" name="tags[]" multiple>
										<option selected="">Choose Tags</option>
										<?php foreach($tags as $tag) {?>
											<option value="<?= $tag['id']?>"><?= $tag['name']?></option>
										<?php }?>
								</select>
					    </div>
					<button type="submit" class="btn btn-primary">Submit</button>
					</form>
					<div class="card-body">
						<div class="my-5">&nbsp;</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</main>

<?php

require "../layouts/footer.php";

?>