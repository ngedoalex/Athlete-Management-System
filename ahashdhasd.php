    <?php
$filename = 'configuration.php';

if (file_exists($filename)) {
    
} else {
    header('location:step1.php');
}
?>