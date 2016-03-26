<!doctype html>
<html>
    
    
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootstrap/bootstrap.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootflat/css/bootflat.css">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/css/gaya.css">
        <!-- Load jQuery and bootstrap datepicker scripts -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/bootstrap/bootstrap.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/assets/theme/js/jquery-1.11.0.js"></script>

        <style type="text/css">
        #gambar img{
            float: right;
        }
        </style>
        <script type="text/javascript">
        $(document).ready(function(){
                $(".alert").alert()
                /*document.getElementById("myDate").value = "1995-09-18";
                document.getElementById("myDate").readOnly = true;
                document.getElementById("myDate2").value = "1995-09-20";
                document.getElementById("myDate2").readOnly = true;

                $('.badan1').hide();
                $('.badan2').hide();

                $('.head1').click(function(){
                    $('.badan1').slideToggle();
                });

                $('.head2').click(function(){
                    $('.badan2').slideToggle();
                });*/
                

            });

                

                
        </script>

   
    </head>

    <body>
        
        
      <div class="container">
      <?php echo $content; ?>
        <!-- <div class="alert alert-danger fade in" role="alert">
          <h4>Maaf! Error - <?php echo $code; ?></h4>
            <div class="error">
            <?php echo CHtml::encode($message); ?>
            </div>
          <p>Halaman tidak dapat diakses... Silahkan kembali ke Home.</p>
          <p>
            
            <button type="button" class="btn btn-default">Home</button>
          </p>
        </div> -->

      </div>
    </body>
</html>