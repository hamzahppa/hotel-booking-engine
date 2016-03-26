<?php  
    $now=date_create(date('Y-m-d'));
    $add=date_add($now,date_interval_create_from_date_string('90 days'));
    $maxDate=date_format($add,'Y-m-d');
?>
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
        </style>
        
        <script type="text/javascript">
        // $(document).ready(function(){
        //         document.getElementById("myDate").value = "1995-09-18";
        //         document.getElementById("myDate").readOnly = true;
        //         document.getElementById("myDate2").value = "1995-09-20";
        //         document.getElementById("myDate2").readOnly = true;
        //     });
        // </script>

   
    </head>

    <body>
        
        <div class="container">

            <aside>
                <br>
                <br><br>
             <div class="panel panel-primary">
                        
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="<?php echo Yii::app()->createUrl('customer/hotel/hasil'); ?>">

                            
                                <div class="form-group">
                                    <label class='col-md-4 control-label'>Check in</label>
                                    <div class='col-md-8'>
                                       <!-- <input type='date'  class="form-control" /> -->
                                       <?php 
                                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                            'name'=>'checkin',
                                            'language'=>'id',
                                            // 'themeUrl'=>Yii::app()->baseUrl.'/assets/theme/js',
                                            // 'cssFile'=>'jquery-1.11.0.js',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',
                                                'minDate'=>date('Y-m-d'),
                                                'maxDate'=>$maxDate,
                                                ),
                                            'htmlOptions'=>array(
                                                'style'=>'auto;',
                                                'class'=>'form-control',
                                                'placeholder'=>$_SESSION['checkin'],
                                                'required'=>'true',
                                                ),
                                            ));
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class='col-md-4 control-label'>Check out</label>
                                    <div class='col-md-8'>
                                        <!-- <input type='date'  class="form-control" /> -->
                                        <?php 
                                        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
                                            'name'=>'checkout',
                                            'language'=>'id',
                                            // 'themeUrl'=>Yii::app()->baseUrl.'/assets/theme/js',
                                            // 'cssFile'=>'jquery-1.11.0.js',
                                            'options'=>array(
                                                'dateFormat'=>'yy-mm-dd',                    
                                                'minDate'=>date('Y-m-d'),
                                                'maxDate'=>$maxDate,
                                                ),
                                            'htmlOptions'=>array(
                                                'style'=>'auto;',
                                                'class'=>'form-control',
                                                'placeholder'=>$_SESSION['checkout'],
                                                'required'=>'true',
                                                ),
                                            ));
                                        ?>
                                    </div>

                                </div>                          
                        
                            <div class="form-group">
                                <label class="col-sm-4 control-label" for="jumlah-kamar">Jumlah Kamar</label>
                                <div class="col-sm-8">
                                  <input type="number" min="1" max="99"  class="form-control" name="jumlah" id="jumlah-kamar" placeholder="<?php echo $_SESSION['jumlah']; ?>" required>
                                </div>
                              </div>
                              
                              <div class="form-group">
                                
                                    <div class="col-md-4 col-sm-offset-8">

                                    <a href="hasil.php"><button class="btn btn-primary btn-block"> Cari </button></a>

                                    </div>
                              </div>
                              </form>
                        </div>


                    </div>   
                
            </aside>

            <section>
                <?php echo $content; ?>
            </section>
        </div> 
    </body>
</html>