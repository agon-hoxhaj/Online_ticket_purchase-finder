<?php /*temp
include_once __DIR__ . '/../Components/auth.php';
echo "<pre>";
echo "SESSION: "; print_r($_SESSION);
echo "COOKIES: "; print_r($_COOKIE);
echo "</pre>";
die();*/
?>


<?php 
include_once __DIR__ . '/../Components/auth.php';
if (!isset($_SESSION["user-id"])) {
    header("Location: ../Pages/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
    #events_link{
        display: none;
    }
</style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    
<?php
include_once __DIR__ . '/../Components/nav.php';
include_once __DIR__ . '/../Components/Profile_component.php';
include_once __DIR__ . '/../Components/footer.php';
?>

</body>
</html>