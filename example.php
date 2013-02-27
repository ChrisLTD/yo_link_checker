<?php
$test_array = array(
                      'http://apple.com',
                      'http://nytimes.com',
                      'http://github.com'
                      );
?>
<html>
<head>
  <title>Test</title>
</head>
<body>

<form action="yo_link_checker.php" method="post">
  <textarea name="links_array" rows="5" cols="40"><?php echo htmlentities(serialize($test_array)); ?></textarea>
  <br>
  <input type="submit">
</form>  

</body>
</html>

