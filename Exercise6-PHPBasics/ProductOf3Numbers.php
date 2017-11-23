<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>First Steps Into PHP</title>

</head>
<body>
    <form>
        X: <input type="text" name="num1" />
		Y: <input type="text" name="num2" />
        Z: <input type="text" name="num3" />
		<input type="submit" />
    </form>
	<?php
        $negativeCount = 0;
		if (isset($_GET['num1']) && isset($_GET['num2'])) {
            $n1 = floatval($_GET['num1']);
            $n2 = floatval($_GET['num2']);
            $n3 = floatval($_GET['num3']);
            if ($n1 < 0) $negativeCount ++;
            if ($n2 < 0) $negativeCount ++;
            if ($n3 < 0) $negativeCount ++;
            if ($n1 == 0 || $n2 == 0 || $n3 == 0 || $negativeCount % 2 == 0)
                echo "Positive";
            else echo "Negative";
		}
	?>
</body>
</html>