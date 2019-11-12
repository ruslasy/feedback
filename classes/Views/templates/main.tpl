<!DOCTYPE html>
<html lang="ru">
    <head>
    </head>
    <body>
        <?php foreach($params as $val) ?>
        <div>
        <h1><?= $val['fio']; ?></h1>
        <h2><?= $val['email']; ?></h2>
        <h2><?= $val['message']; ?></h2>
        </div>
    </body>
</html>
