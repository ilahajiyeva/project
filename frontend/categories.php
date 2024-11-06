<?php

require "../db.php";

//cover


require "../frontend/layouts/navbar.php";


//pagination
$limit = 2;
if(!isset($_GET['page'])) {
    $page = 2;
    $offset = 0;
}else {
    $page = $_GET['page'] + 1;
    $offset =  ($_GET['page'] -1) * $limit;
}

$category = $_GET['category_id'];

$sql = "SELECT posts.*, categories.name as category_name FROM posts 
LEFT JOIN categories ON categories.id=posts.category_id
WHERE posts.category_id = $category ORDER BY posts.id DESC LIMIT $limit OFFSET $offset";

$stmt = $conn->prepare($sql);
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

//cover
$title = $posts[0]['category_name'];
$image = "test";
$description = "";
require "../frontend/layouts/header.php";

$pageUrl = $_SERVER['REQUEST_SCHEME']. "://" . $_SERVER['HTTP_HOST'] . $_SERVER["SCRIPT_NAME"];


?>
        
<!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                     <?php foreach($posts as $post) {?>
                    <div class="post-preview">
                        <a href="./frontend/sample-post.php?id=<?= $post['id']?>">
                            <h2 class="post-title"><?= $post['title']?></h2>
                            <?php if (!empty($post['image'])): ?>
										<img src="<?= '/project' . $post['image'] ?>" 
										 width="80%" />
							<?php endif; ?>
                            <h3 class="post-subtitle"><?= $post['description']?></h3>
                        </a>
                        <p class="post-meta">
                            Category
                        <a href="<?= $baseUrl . "/project/frontend/categories.php?id=" . $post['category_id']?>">
                            <?= $post['category_name']?>
                        </a>
                        </p>
                    </div>
                    <?php }?>
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4 justify-content-between">
                    <?php
                     if(isset($_GET['page']) && $_GET['page']>1) {                    
                     ?>
                    <a class="btn btn-primary text-uppercase" href="<?=$pageUrl . "?page=".$page-2 . "&category_id=" . $category ?>">Previous</a>
                    <?php }?>
                    <a class="btn btn-primary text-uppercase ml-2" href="<?=$pageUrl . "?page=".$page. "&category_id=" . $category ?>">Next</a>
                </div>
            </div>
        </div>

        <?php

require "../frontend/layouts/footer.php";

?>
        
