<?php
    include __DIR__ . '/header.php';
?>

<?php
    if(!empty($_GET)) {
        if($_GET['login'] === "yes") {
            include __DIR__ . '/registration-form.php';
        }
    }
?>
<?php
include __DIR__ . '/footer.php';
?>