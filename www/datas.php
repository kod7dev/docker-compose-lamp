<?php

require  __DIR__ . '/helpers/helpers.php';

session_start();
if (!sessionControl($_SESSION)) {
    header('Location:login.php');
    exit;
}

require __DIR__ . '/components/header.php';
?>

<main>
    <div class="container px-4">
        <h1 class="mt-4">Veriler</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Veri Listesi</li>
        </ol>

        <?php
        // dosya yüklemede hata olursa ekrana oluşan hatayı batırır
        if (isset($_SESSION["error_file_upload"])) {
        ?>
            <div class="alert alert-danger">
                <?php foreach ($_SESSION["error_file_upload"] as $msg) {
                    echo $msg . "<br>";
                } ?>
            </div>
        <?php
            unset($_SESSION["error_file_upload"]);
        }

        //// dosya yüklemenin başarılı olduğu zaman ekrana alert basar
        if (isset($_SESSION["succuess_file_upload"])) {
        ?>
            <div class="alert alert-success">
                <?php foreach ($_SESSION["succuess_file_upload"] as $msg) {
                    echo $msg . "<br>";
                } ?>
            </div>
        <?php
            unset($_SESSION["succuess_file_upload"]);
        }
        ?>

        <div class="my-3">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-upload"></i> Yükle</button>
            <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Dosya Yükle</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="uploadForm" action="/controllers/file_upload.php" method="post" enctype="multipart/form-data">
                                <div>
                                    <label for="formFileLg" class="form-label">Yüklenecek dosyayı seçin:</label>
                                    <input class="form-control form-control-lg" id="formFileLg" type="file" name="file">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Vazgeç</button>
                            <button type="submit" form="uploadForm" name="submit" class="btn btn-primary">Yükle</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">

                <div class="card">
                    <div class="card-header bg-dark text-white">Dosyalar</div>
                    <ul class="list-group list-group-flush">
                        <?php foreach (dirScan() as $file) { ?>
                            <a href="#" class="list-group-item list-group-item-action"><?php echo $file; ?></a>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


<?php
require __DIR__ . '/components/footer.php'
?>