# Yo Link Checker
## Version .01
Yo Link Checker is a PHP script that accepts a serialized array of urls via POST, checks each link for a 404, and displays a table of working and invalid links.

## Usage Example
```html
<?php
$test_array = array(
                      'http://apple.com',
                      'http://nytimes.com',
                      'http://github.com'
                      );
?>

<form action="yo_link_checker.php" method="post">
  <textarea name="links_array" rows="5" cols="40"><?php echo htmlentities(serialize($test_array)); ?></textarea>
  <br>
  <input type="submit">
</form>  
```