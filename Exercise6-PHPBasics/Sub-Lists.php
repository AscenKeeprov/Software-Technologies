<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Steps Into PHP</title>

</head>
<body>
    <form>
        N: <input type="text" name="num1"/>
        M: <input type="text" name="num2"/>
        <input type="submit"/>
    </form>
	<ul>
        <?php
            if (isset($_GET['num1'])) {
                $n1 = intval($_GET['num1']);
                for ($i = 1; $i <= $n1 ; $i++) { ?>
                    <li>List <?=$i?>
                        <?php
                            if (isset($_GET['num2'])) {
                                $n2 = intval($_GET['num2']); ?>
                                <ul>
                                    <?php
                                        for ($j = 1; $j <= $n2 ; $j++) { ?>
                                            <li>Element <?=$i?>.<?=$j?></li> <?php
                                        }
                                    ?>
                                </ul> <?php
                            }
                        ?>
                    </li> <?php
                }
            }
        ?>
	</ul>
</body>
</html>