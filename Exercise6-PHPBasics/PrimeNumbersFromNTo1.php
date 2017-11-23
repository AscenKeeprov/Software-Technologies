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
            for ($number = $n; $number >= 2 ; $number--) {
                $isPrime = true;
                for ($divisor = 2; $divisor <= sqrt($number); $divisor++) {
                    if ($number % $divisor == 0) {
                        $isPrime = false;
                        break;
                    }
                }
                if ($isPrime) echo $number . PHP_EOL;
            }
        }
    ?>
</body>
</html>