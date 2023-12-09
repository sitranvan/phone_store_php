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
    <title>Lỗi cơ sở dữ liệu</title>
</head>

<body style="height: 100vh;">
    <section class="container d-flex align-items-center flex-column gap-5 justify-content-center h-25">
        <img width="150" src="<?= pathCommon('images/database-icon.png') ?>" alt="database-icon">
        <h1 class="text-danger text-uppercase">Lỗi cơ sở dữ liệu</h1>
        <p class="fs-5 text-secondary text-wrap"><?= $message ?></p>
    </section>
</body>
<script src="<?= pathCommon('assets/vendor/bootstrap/js/bootstrap.bundle.min.js?ver=' . rand()) ?>"></script>
<script src="<?= pathCommon('assets/js/custom.js?ver=' . rand()) ?>"></script>

</html>