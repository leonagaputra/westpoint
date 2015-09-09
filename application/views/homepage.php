<section class="content-header">
    <h1>
        Beranda
        <small>Progress Belajarku</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <!--<li class="active">Here</li>-->
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Paket Soalku</h3>
        </div>
        <div class="box-body">
            <?php
                if($classes){
                    $i=0;
                    $print = "";
                    
                    foreach($classes as $class){
                        $row = FALSE;
                        $start = FALSE;
                        if(($i%4) == 0){
                            $row = TRUE;
                            $start = TRUE;
                        }
                        //print row
                        if($row){
                            $print .= '<div class="row">';
                        }
                        $print .= '<div class="col-lg-3 col-xs-6">';
                            $print .= '<div id="paket_class_'.$class->ID.'" class="small-box '.$class->VCOLOR.'">';
                                $print .= '<div class="inner">';
                                    $print .= '<h3 id="paket_titlesh_'.$class->ID.'">'.$class->VTITLESH.'</h3>';
                                    $print .= '<p id="paket_title_'.$class->ID.'">'.$class->VTITLE.'</p>';
                                    $print .= '<div style="display:none;" id="paket_desc_'.$class->ID.'">'.$class->VDESC.'</div>';
                                $print .= '</div>';
                                $print .= '<div class="icon">';
                                    $print .= '<i class="ion ion-ios-people"></i>';
                                $print .= '</div>';
                                //$print .= '<a href="#" data-toggle="modal" data-target="#detail_modal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>';
                                $print .= '<a href="#" class="small-box-footer" onclick="paket_dialog(\''.$class->ID.'\', \''.$class->SOAL_ID.'\')">More info <i class="fa fa-arrow-circle-right"></i></a>';
                            $print .= '</div>';
                        $print .= '</div>';
                        if($row && !$start){
                            $print .= '</div>';
                        }
                        $i++;
                    }
                    echo $print;
                }
            ?>
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- Your Page Content Here -->

</section>

<div class="example-modal" >
    <div class="modal" id="detail_modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal_title">Basic Finance</h4>
                </div>
                <div class="modal-body">
                    <div>                            
                        <div id="modal_class" class="small-box bg-light-blue">
                            <div class="inner">
                                <h3 id="modal_titlesh">Bc</h3>
                                <p id="modal_title2">Basic Finance</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-people"></i>
                            </div>                            
                        </div>   
                    </div>    
                    <div id="modal_desc">
                        Lorem ipsum blaasius repum normandis apsun.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                    <a href="#" type="button" id="btn-latihan" class="btn btn-default">Latihan</a>
                    <a href="#" type="button" id="btn-quis" class="btn btn-default">Quis</a>
                    <a href="#" type="button" id="btn-ujian" class="btn btn-primary">Ujian</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->