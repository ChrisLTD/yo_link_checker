<?php
$test_array = array(
                      'https://apple.com',
                      'https://nytimes.com',
                      'https://github.com'
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

