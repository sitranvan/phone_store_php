<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= pathCommon('assets/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= pathCommon('assets/css/custom.css?ver=' . rand()) ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title><?= $title ?? 'STV News' ?></title>
</head>

<body>
    <?= App\Core\Session::flash('toast') ?? '' ?>

    <main id="main">
        <?php isset($forward) ? loadView($view, $forward) : loadView($view) ?>
    </main>
    <script src="<?= pathCommon('assets/vendor/bootstrap/js/bootstrap.bundle.min.js?ver=' . rand()) ?>"></script>
    <script src="<?= pathCommon('assets/js/custom.js?ver=' . rand()) ?>"></script>
</body>


</html>