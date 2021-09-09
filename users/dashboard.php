<?php
    require_once('../admin/config.php');
    require_once(SITE_ROOT.DS.'admin'.DS.'functions.php');
    // if(!isset($data->email)){
    //     header("Location: ../index.php");
    //     exit;
    // }       

    require_once('../inc/header.php');
    
?>
    <div class="container-fluid">
        <div class="row">
            <!-- <div id="top-bar" class="shadow">

            </div> -->
            <div class="col-md-3 col-sm-1" style="min-height: 100vh; background-color:#333;color:white">
                <ul class="sn-cust-menu">
                    <?php
                        $menu_data = simplexml_load_file(SITE_ROOT.'admin'.DS.'sidebar'.DS.'menu.xml') or die("Failed to load");
                        $sub=false;
                        foreach($menu_data->item as $key => $rec){
                            $sub = isset($rec->sub)
                    ?>
                        <li>
                            <a class="ava" href="<?php echo $rec->link; ?>">
                                <?php 
                                    echo '<i class="'.$rec->image.'"></i>'. $rec->caption; 
                                    echo $sub ? '<i class="fas fa-angle-right sn-rotation"></i>' : null;
                                ?>
                            </a>
                    <?php 
                        if(isset($rec->sub)){
                            echo '<ul class="sn-cust-sub collapse">';
                            foreach($rec->sub->item as $key => $res){
                                echo '<li><a href="'.$res->link.'"><i class="float-left '.$res->image.'"></i> &nbsp;&nbsp;'.$res->caption.'</a></li>';
                            }
                            echo '</ul>';
                        }
                    ?>
                    </li> 
                    <?php
                    }
                    ?>
                </ul>

                <style>
                    .sn-rotation {
                        -webkit-transition-duration: 0.5s;
                        -moz-transition-duration: 0.5s;
                        -o-transition-duration: 0.5s;
                        transition-duration: 0.5s;
                        -webkit-transition-property: -webkit-transform;
                        -moz-transition-property: -moz-transform;
                        -o-transition-property: -o-transform;
                        transition-property: transform;
                    }
                </style>
                <script>
                    // $('.ava').click(function(){
                    // $(this).parent().children(':nth-child(2)').toggle('slow');
                    // });
                    $('.ava').click(function(){
                        $(this).next('ul').toggle('slow');
                        if($(this).children('i').next().css( "transform" ) == 'none' ){
                            $(this).children('i').next().css("transform","rotate(90deg)");
                        } else {
                            $(this).children('i').next().css("transform","" );
                        }
                    });
                </script>
            </div>
            <div class="col-md-9 col-sm-11">
                <div class="container-fluid p-0">
                    <div class="row">
                        <div class="info-bar">
                            <h2>Bismillahir Rahmanir Rahim</h2>
                        </div>
                        <div class="col-12">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    require_once('../inc/footer.php');
?>