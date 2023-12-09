<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= pathCommon('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= pathCommon('assets/css/custom.css?ver=' . rand()) ?>">
    <title>Expires Error</title>
</head>

<body style="height: 100vh;">
    <section class="container d-flex align-items-center flex-column gap-5 justify-content-center h-25">
        <img width="150" src="<?= pathCommon('images/database-icon.png') ?>" alt="database-icon">
        <h1 class="text-danger text-uppercase">Liên kết đã hết hạn</h1>
        <p class="fs-5 text-secondary text-wrap"><?= $message ?></p>

        <a href="<?= route() ?>" class="btn btn-danger px-4 py-2">
            Quay về trang chủ</a>
    </section>
</body>
<script src="<?= pathCommon('assets/vendor/bootstrap/js/bootstrap.bundle.min.js?ver=' . rand()) ?>"></script>
<script src="<?= pathCommon('assets/js/custom.js?ver=' . rand()) ?>"></script>

</html>