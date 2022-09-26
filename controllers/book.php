<?php

define('PROJECT_NAME', 'Digitalent-VSGA-JWD');
define('BASEPATH', $_SERVER['DOCUMENT_ROOT'] . "/" . PROJECT_NAME);
include_once BASEPATH . "/connect.php";

function imageHandler($image)
{
    if (!$image) return print 'Image Unavailable'; ?>
    <img class="img-fluid w-25" src="https://images.unsplash.com/photo-1664142121289-1327a449784e?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
    <?php
}

if (isset($_POST['create'])) {
    extract($_POST);
    $q = "insert into book (title, author, price) values('$title', '$author', $price)";
    $mysqli->query($q);
    header('Location: http://localhost/' . PROJECT_NAME);
} else if (isset($_POST['update'])) {
    extract($_POST);
    $q = "update book set title = '$title', author = '$author', price = $price where id = $update";
    $mysqli->query($q);
    header('Location: http://localhost/' . PROJECT_NAME);
} else if (isset($_POST['delete'])) {

    $q = "delete from book where id = " . $_POST['delete'];
    $mysqli->query($q);
    header('Location: http://localhost/' . PROJECT_NAME);
} else {

    $q = "select * from book";
    $books = $mysqli->query($q) or die(mysqli_error($mysqli));
    if (mysqli_num_rows($books) > 0) {
        $books->fetch_assoc();
    ?>
        <table class="table table-hover">
            <thead>
                <tr class="table-warning ">
                    <th scope="row">Title</th>
                    <th>Author</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <?php
            foreach ($books as $book) {
            ?>
                <tbody>
                    <tr>
                        <td><?= $book['title'] ?></td>
                        <td><?= $book['author'] ?></td>
                        <td><?= $book['price'] ?></td>
                        <td><?php imageHandler($book['image']) ?></td>
                        <td class="d-flex justify-content-end">
                            <form class="d-inline me-3" action="controllers/book.php" method="post"><button name="delete" value="<?= $book['id'] ?>" type="submit" class="btn btn-danger">Delete</button></form>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editBook<?= $book['id'] ?>">
                                Edit Book
                            </button>
                            <div class="modal fade" id="editBook<?= $book['id'] ?>" tabindex="-1" aria-labelledby="editBookLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editBookLabel">Update book</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form class="needs-validation" action="controllers/book.php" method="post" novalidate>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input name="title" id="title" type="text" class="form-control" value="<?= $book['title'] ?>" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a book title.
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="author" class="form-label">Author</label>
                                                    <input name="author" id="author" type="text" class="form-control" value="<?= $book['author'] ?>" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a author name.
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price" class="form-label">Price</label>
                                                    <input name="price" id="price" type="number" class="form-control" value="<?= $book['price'] ?>" required>
                                                    <div class="invalid-feedback">
                                                        Please provide a price.
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input name="image" id="image" type="file" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button name="update" value="<?= $book['id'] ?>" type="submit" class="btn btn-primary">Update Book</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table><?php }
        } ?>