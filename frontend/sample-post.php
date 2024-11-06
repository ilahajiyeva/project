<?php

require "../db.php";

//cover
$stmt = $conn->prepare("SELECT * FROM pages WHERE id = 3");
$stmt->execute();
$page = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $page['title'];
$description = $page['description'];
$image = $page['image'];

require "../frontend/layouts/navbar.php";
require "../frontend/layouts/header.php";


$sql = "SELECT posts.*, categories.id as category_id, categories.name as category_name FROM posts 
LEFT JOIN categories ON categories.id=posts.category_id WHERE posts.id = ? ORDER BY posts.id DESC";
$stmt = $conn->prepare($sql);
$stmt->execute([$_GET['id']]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>
        
<!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                     <?php foreach($posts as $post) {?>
                    <div class="post-preview">
                        <a href="./frontend/sample-post.php?id=<?= $post['id']?>a">
                            <h2 class="post-title"><?= $post['title']?></h2>
                            <?php if (!empty($post['image'])): ?>
										<img src="<?= '/project' . $post['image'] ?>" 
										 width="80%" />
							<?php endif; ?>
                            <h3 class="post-subtitle"><?= $post['description']?></h3>
                        </a>
                        <p class="post-meta">
                            Category
                        <a href="<?= $baseUrl . "/project/frontend/categories.php?category_id=" . $post['category_id']?>">
                            <?= $post['category_name']?>
                        </a>
                        </p>
                    </div>
                    <?php }?>
                
                <div class="d-flex justify-content-end mb-4">
                    <a class="btn btn-primary text-uppercase" href="<?=$baseUrl . "/project/index.php"?>">Go Back</a>
                </div>
            </div>
        </div>

        <?php

require "../frontend/layouts/footer.php";

?>
        
