<!doctype html>
<html>
    <head>
        <title>Booking Engine</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Bootstrap CSS and bootstrap datepicker CSS used for styling the demo pages-->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootflat/css/bootflat.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/css/gaya.css">
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/js/jquery-1.11.0.js"></script>
        <style type="text/css">
            .panel{
                width: 520px;
                margin: 0px auto;
            }
        </style>
    </head>
    <body>
      <?php echo $content; ?>
    </body>	
</html>
