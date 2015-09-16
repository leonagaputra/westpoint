<section class="content-header">
    <h1>
        Paket Soalku
        <small>Detail Paket</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Paket Soalku</a></li>
        <!--<li class="active">Here</li>-->
    </ol>
</section>


<!-- Main content -->
<section class="content">
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> <?php echo $paket->VTITLE ?></h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <!-- small box -->
                    <div class="small-box <?php echo $paket->VCOLOR ?>">
                        <div class="inner">
                            <h3><?php echo $paket->VTITLESH ?></h3>
                            <p><?php echo $paket->VTITLE ?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios-people"></i>
                        </div>

                    </div>
                </div>
            </div>
            <div><?php echo $paket->VDESC ?></div>
        </div>          
    </div>
    
    <?php if(isset($result_ujian) && $result_ujian) { ?>
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> History Ujian Anda</h3>
        </div>
        <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Soal Ujian</th>
                        <th>Waktu Ujian</th>
                        <th>Hasil</th>                                    
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $echo = "";
                        foreach($result_ujian as $obj){
                            $echo .= "<tr>";
                                $echo .= "<td>".$obj->VDESC."</td>";
                                $echo .= "<td>".date("d M Y h:i", strtotime($obj->DCREA))."</td>";
                                $echo .= "<td>".$obj->ISKOR."</td>";
                            $echo .= "</tr>";
                        }
                        echo $echo;
                    ?>
                    <!--<tr>
                        <td>Finance Basic</td>
                        <td>15 Sep 2015 19:00</td>
                        <td>90</td>                                       
                    </tr>
                    <tr>
                        <td>Finance Basic</td>
                        <td>16 Sep 2015 19:00</td>
                        <td>80</td>                                             
                    </tr>
                    <tr>
                        <td>Finance Basic</td>
                        <td>17 Sep 2015 19:00</td>
                        <td>40</td>                                              
                    </tr>-->
                </tbody>
                <tfoot>
                  <tr>
                    <tr>
                        <th>Soal Ujian</th>
                        <th>Waktu Ujian</th>
                        <th>Hasil</th>                        
                    </tr>
                  </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <?php } ?>
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
                    <a href="#" type="button" id="btn-latihan" data-toggle="tooltip" title="Soal beserta jawaban" class="btn btn-default">Latihan</a>
                    <a href="#" type="button" id="btn-quis" data-toggle="tooltip" title="Latihan soal tanpa menyimpan skor" class="btn btn-default">Quis</a>
                    <a href="#" type="button" id="btn-ujian" data-toggle="tooltip" title="Uji belajarmu" class="btn btn-primary">Ujian</a>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->

<script type="text/javascript">
    window.onload = function(){
        $('#example1').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          'iDisplayLength': 10
        });
    };
</script>