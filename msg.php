<script src="js/vanilla-toast.js" type="text/javascript"></script>
<?php
if (isset($_SESSION["error"])) {
    ?>
    <script>
        vt.error('<?= $_SESSION["error"] ?>', {
            title: "Error",
            position: "top-right",
            callback: function () {
                vt.error()
            }
        });
    </script>
    <?php
    unset($_SESSION["error"]);
}
if (isset($_SESSION["msg"])) {
    ?>    
    <script>
        vt.success('<?= $_SESSION["msg"] ?>', {
            title: "Success",
            position: "top-right",
            callback: function () {
                vt.success()
            }
        });
    </script>
    <?php
    unset($_SESSION["msg"]);
}
?>
