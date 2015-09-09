<section class="content-header">
    <h1>
        Latihan Soal
        <small>Belajarlah dengan latihan soal ini</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Latihan Soal </a></li>
        <!--<li class="active">Here</li>-->
    </ol>
</section>


<!-- Main content -->
<section class="content">    
    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-pencil"></i> <?php echo $soal_desc->VDESC; ?></h3>
        </div>
        <div class="box-body">
            <div id="question">
                <table style="width:100%;">
                    <?php 
                        $echo = "";
                        $nomor_soal = 1;
                        foreach ($questions as $question){
                            $echo .= "<tr id='divSoal_".$question->ID."'>";
                                $echo .= '<td valign="top" style="padding: 5px; width:25px;">'.$nomor_soal.'</td>';
                                $echo .= '<td style="padding: 5px;">';
                                    $echo .= '<div style="padding: 0px 0px 5px;">'.$question->VSOAL.'</div>';
                                    $echo .= '<div style="padding: 5px 0px;"><span class="soal pilgan pilgan_a" onclick="cek_jawaban_latihan(this, '.$question->ID.', \'A\')">A.</span> <span id="opsi_A_'.$question->ID.'" class="soal pilgandes">'.$question->VOPSIA.'</span></div>';
                                    $echo .= '<div style="padding: 5px 0px;"><span class="soal pilgan pilgan_b" onclick="cek_jawaban_latihan(this, '.$question->ID.', \'B\')">B.</span> <span id="opsi_B_'.$question->ID.'" class="soal pilgandes">'.$question->VOPSIB.'</span></div>';
                                    $echo .= '<div style="padding: 5px 0px;"><span class="soal pilgan pilgan_c" onclick="cek_jawaban_latihan(this, '.$question->ID.', \'C\')">C.</span> <span id="opsi_C_'.$question->ID.'" class="soal pilgandes">'.$question->VOPSIC.'</span></div>';
                                    $echo .= '<div style="padding: 5px 0px;"><span class="soal pilgan pilgan_d" onclick="cek_jawaban_latihan(this, '.$question->ID.', \'D\')">D.</span> <span id="opsi_D_'.$question->ID.'" class="soal pilgandes">'.$question->VOPSID.'</span></div>';
                                    $echo .= '<div id="divAnswer_'.$question->ID.'" style="display: none;" class="bix-div-answer">';
                                        $echo .= '<div class="title-bar"><a onclick="$(\'#divAnswer_'.$question->ID.'\').slideToggle(\'slow\');" href="javascript: void 0;">Lembar Jawab</a></div>';
                                        $echo .= '<div class="div-spacer">';
                                            $echo .= '<p><span class="ib-green"><b>Answer:</b></span> Option <b class="jq-hdnakqb">' . $question->VJAWAB . '</b></p>';
                                        $echo .= '</div>';
                                    $echo .= '</div>';
                                    $echo .= '<div>';
                                        $echo .= '<table style="font-size: 13px;">';
                                            $echo .= '<td style="padding: 5px; color: #269bc6"><i class="fa fa-edit"></i> <a onclick="$(\'#divAnswer_'.$question->ID.'\').slideToggle(\'slow\');">Lihat Jawaban</a></td>';
                                        $echo .= '</table>';
                                    $echo .= '</div>';                                    
                                $echo .= '</td>';
                            $echo .= "</tr>";
                            $echo .= '<tr><td colspan="2"><hr></td></tr>';
                            $nomor_soal++;
                        }
                        echo $echo;
                    ?>
                    
                </table>
            </div>
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
                    <button type="button" class="btn btn-default">Test</button>
                    <button type="button" class="btn btn-primary">Beli Paket</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->