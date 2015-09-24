<section class="content-header">
    <h1>
        Paket Soal
        <small>Pilih paket soal yang Anda butuhkan</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Paket Soal</a></li>
        <!--<li class="active">Here</li>-->
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <?php if(isset($beli_paket)  && !$beli_paket["error"]) { ?>
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i> Sukses!</h4>
            Paket telah ditambahkan pada library Anda.  Kunjungi <a href="<?php echo $base_url ?>index.php/backend/home">beranda</a> untuk melihat paket Anda.
        </div>
    <?php } else if (isset($beli_paket)  && $beli_paket["error"]) { ?>    
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4>	<i class="icon fa fa-check"></i> Error!</h4>
            <?php echo $beli_paket["err_message"]; ?>  Kunjungi <a href="<?php echo $base_url ?>index.php/backend/home">beranda</a> untuk melihat paket Anda.
        </div>
    <?php } ?>
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Paket Soal</h3>
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
                                $print .= '<a href="#" class="small-box-footer" onclick="paket_dialog(\''.$class->ID.'\')">More info <i class="fa fa-arrow-circle-right"></i></a>';
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
            <!--<div class="row">
                <div class="col-lg-3 col-xs-6">                    
                    <div class="small-box bg-light-blue">
                        <div class="inner">
                            <h3>Bc</h3>
                            <p>Basic Finance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>
                        <a href="#" data-toggle="modal" data-target="#detail_modal" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">                    
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>Mgr</h3>
                            <p>Managerial Finance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people-outline"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                   
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>Cn</h3>
                            <p>Collection Finance</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>-->
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
                    <form id="form_paket" method="post" action="<?php echo $base_url;?>index.php/backend/beli_paket">
                        <input type="hidden" name="paket_id" id="paket_id" value="0"/>
                        <input type="hidden" name="freetrial" id="freetrial" value="F"/>
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>                    
                        <!--<input type="submit" class="btn btn-primary" value="Beli Paket" />-->
                        <button type="button" class="btn btn-default" onclick="buy_paket(1)">Free Trial</button>  
                        <button type="button" class="btn btn-primary" onclick="buy_paket()">Beli Paket</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->