<?php
session_start();

echo "<h2>COOKIES:</h2>";
echo "<pre>";
print_r($_COOKIE);
echo "</pre>";

echo "<h2>SESSION:</h2>";
echo "<pre>";
print_r($_SESSION);
echo "</pre>";

echo "<h2>Cookie test - setting a cookie now...</h2>";
setcookie("test_cookie", "hello", time() + 86400, '/');
echo "Cookie set! Refresh the page and you should see it above.";
?>