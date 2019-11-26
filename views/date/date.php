<?php

use app\controllers\SiteController;
?>

<?= SiteController::setVisitedPageTracking(); ?>
<h1>День: <?= $model->date; ?></h1>
<h2><?= $model->type; ?></h2>