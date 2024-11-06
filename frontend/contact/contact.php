<?php

require "../../db.php";

//cover
$stmt = $conn->prepare("SELECT * FROM pages WHERE id = 4");
$stmt->execute();
$page = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $page['title'];
$description = $page['description'];
$image = $page['image'];

require "../../frontend/layouts/navbar.php";
require "../../frontend/layouts/header.php";


?>
        
<!-- Main Content-->
<main class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                         <!--success message-->
                          <?php 
                            if(isset($_SESSION['scssmsg'])) {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>Success!</strong> ' . $_SESSION['scssmsg'] . '
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                unset($_SESSION['scssmsg']);
                            } 
                          ?>
                        <p>Fill out the form below to send me a message and We will get back to you as soon as possible!</p>
                        <div class="my-5">
                            <form action="./store.php"  method="post">
                                <div class="form-floating">
                                    <input class="form-control" id="name" type="text" name="name"
                                    placeholder="Enter your name..." >
                                    <label for="name">Name</label>
                                    </div>
                                <div class="form-floating">
                                    <input class="form-control" id="email" type="email" name="email"
                                     placeholder="Enter your email...">
                                    <label for="email">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input class="form-control" id="phone" type="tel" name="phone"
                                     placeholder="Enter your phone number..." >
                                    <label for="phone">Phone Number</label>
                                    </div>
                                <div class="form-floating">
                                    <textarea class="form-control" id="message" name="message"
                                    placeholder="Enter your message here..." style="height: 5rem" ></textarea>
                                    <label for="message">Message</label>
                                    </div>
                                <br>

                                <button class="btn btn-primary text-uppercase" id="submitButton" type="submit">Send</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>

<?php

require "../../frontend/layouts/footer.php";

?>
        