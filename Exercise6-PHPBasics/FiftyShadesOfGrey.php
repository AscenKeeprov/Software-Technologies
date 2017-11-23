<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Steps Into PHP</title>
    <style>
        div {
            display: inline-block;
            margin: 5px;
            width: 20px;
            height: 20px;
        }
    </style> 
</head>
<body>
    <?php
        for ($r = 0; $r <= 4 ; $r++) {
            $grey = $r * 51;
            for ($c = 0; $c <= 9 ; $c++) { 
                $shade = $c * 5; ?>
                <div style="background-color:
                rgb(<?= $grey + $shade?>,
                    <?= $grey + $shade ?>,
                    <?= $grey + $shade ?>)">
                </div> <?php
            } ?>
            <br> <?php
        }
    ?>
</body>
</html>