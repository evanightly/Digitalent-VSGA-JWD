<?php include_once 'partials/header.php' ?>
<div class="container pt-3">
    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addBook">
        Add Book
    </button>

    <div class="modal fade" id="addBook" tabindex="-1" aria-labelledby="addBookLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBookLabel">Add new book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" action="controllers/book.php" method="post" novalidate>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title" class="form-label">Title</label>
                            <input name="title" id="title" type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                Please provide a book title.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="author" class="form-label">Author</label>
                            <input name="author" id="author" type="text" class="form-control" required>
                            <div class="invalid-feedback">
                                Please provide a author name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Price</label>
                            <input name="price" id="price" type="number" class="form-control" required>
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
                        <button name="create" type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once "./controllers/book.php" ?>

</div>
<?php include_once 'partials/footer.php' ?>