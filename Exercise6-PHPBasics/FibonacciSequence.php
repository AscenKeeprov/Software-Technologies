<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Steps Into PHP</title>

</head>
<body>
    <form>
        N: <input type="text" name="num" />
        <input type="submit" />
    </form>
	<?php
        if (isset($_GET['num'])) {
            $n = intval($_GET['num']);
            if ($n >= 1) echo 1 . PHP_EOL;
            $buffer = -1;
            $oldNum = 0;
            $newNum = 1;
            for ($i = 1; $i < $n ; $i++) {
                $buffer = $newNum;
                $newNum += $oldNum;
                $oldNum = $buffer;
                echo $newNum . PHP_EOL;
            }
        }
    ?>
</body>
</html>