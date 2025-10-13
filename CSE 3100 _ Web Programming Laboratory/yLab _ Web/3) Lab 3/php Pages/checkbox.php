<html>
<head><title>Personality</title></head>
<body>

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
Select your personality attributes:<br />
Perky <input type="checkbox" name="attributes[]" value="perky" /><br />
Morose <input type="checkbox" name="attributes[]" value="morose" /><br />
Thinking <input type="checkbox" name="attributes[]" value="thinking" /><br />
Feeling <input type="checkbox" name="attributes[]" value="feeling" /><br />
Spend-thrift <input type="checkbox" name="attributes[]" value="spend-thirty" /><br />
Shopper <input type="checkbox" name="attributes[]" value="shopper" /><br />
<br />
<input type="submit" name="s" value="Record My personality!" />
</form>

<?php

    // write your code here...

?>

</body>
</html>

