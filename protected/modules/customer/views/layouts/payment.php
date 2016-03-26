<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Bootstrap CSS and bootstrap datepicker CSS used for styling the demo pages-->
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootflat/css/bootflat.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/css/gaya.css">
    
    <!-- Load jQuery and bootstrap datepicker scripts -->
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/js/jquery-1.11.0.js"></script>
    <style type="text/css">
    #gambar img{
        float: right;
    }
    section{
        width: 49%;
        float: left;
        padding: 15px;
        margin: 5px;
    }
    .kode{
        float: left;
        margin: 0px auto;
    }
    .kiri{
        margin-right: 875px;
    }
    .green{
        width: 50px;
    }
    </style>


    <script type="text/javascript">
    $(document).ready(function(){
            document.getElementById("myDate").value = "1995-09-18";
            document.getElementById("myDate").readOnly = true;
            document.getElementById("myDate2").value = "1995-09-20";
            document.getElementById("myDate2").readOnly = true;
        });
    </script>
</head>
<body>
    <div class="container">
        <?php 
            echo $content;
        ?>
    </div> 
</body>
</html>