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
        <h1 class="mt-4">Ana Sayfa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Genel İşlemler</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-header">En Son Eklenen Agentlar</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="
                  card-body
                  d-flex
                  align-items-center
                  justify-content-between
                ">
                        <a class="small text-white stretched-link" href="/agents.php">Hepsini Göster</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-header">En Son Eklenen Dosyalar</div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <div class="
                  card-body
                  d-flex
                  align-items-center
                  justify-content-between
                ">
                        <a class="small text-white stretched-link" href="/datas.php">Hepsini Göster</a>
                        <div class="small text-white">
                            <i class="fas fa-angle-right"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Haftalık Agent Sayısı
                    </div>
                    <div class="card-body">
                        <canvas id="myAreaChart" width="100%" height="40"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php
require __DIR__ . '/components/footer.php'
?>