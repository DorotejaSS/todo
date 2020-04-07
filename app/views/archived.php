<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../app/views/css/main2.css">
        <title>Document</title>
        <style>
        .yellow + label {
            background-color: yellow;
            color: black;
            }
        .orange + label {
            background-color: orange;
            color:black;
            }
        .red + label {
            background-color: red;
            color:black;
            }
        </style>
    </head>
    <body>
        <?php $view_data = self::$view_data ?? []; ?>
        <form class="login100-form validate-form flex-sb flex-w" action="dashboard-update" method="post">
            <?php
            if (!empty($view_data)) : ?>
                <?php foreach ($view_data as $data) : ?>
                    <?php foreach ($data as $key => $value) : ?>
                        <?php if ($value['priority'] == 'low') {
                                $class = 'class="yellow"';
                            } elseif ($value['priority'] == 'medium') {
                                $class = 'class="orange"';
                            } elseif ($value['priority'] == 'high') {
                                $class = 'class="red"';
                            }
                            $class_d = "form-check-input";
                        ?>

                            <div class="form-check task">
                                <input <?=$class.$class_d?> type="checkbox" name="checkbox[]" value="<?=$value['id']?>" id="defaultCheck1">
                                <label class="form-check-label" for="<?=$value['id']?>">
                                    <?=($value['done'] == true) ? '<del>'.$value['task'].'</del>' : $value['task'] ?>
                                </label>
                            </div>


                    <?php endforeach; ?>
                <?php endforeach; ?>
            <?php endif; ?>
            <input class="btn btn-success" type="submit" name="restore" value="Restore">
            <input class="btn btn-danger" type="submit" name="delete" value="Delete permanently">
    </body>
</html>
