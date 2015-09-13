<section class="content-header">
    <h1>
        Quis
        <small>Asah kemampuanmu dengan quis</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-book"></i> Quis </a></li>
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
                <form id="form_quis" method="post" action="<?php echo $base_url; ?>index.php/backend/quis_summary">
                    <input type="hidden" name="soal_id" value="<?php echo $soal_desc->ID; ?>" />                    
                    <input type="hidden" name="questions_id" value="<?php echo $questions_id; ?>" />
                    <input type="hidden" name="jumlah_soal" value="<?php echo $jumlah_soal; ?>" />
                    <table style="width:100%;" id="form_soal">
                        <?php 
                            $echo = "";
                            $nomor_soal = 1;
                            foreach ($questions as $question){
                                $echo .= "<tr id='divSoal_".$question->ID."'>";
                                    $echo .= '<td valign="top" style="padding: 5px; width:25px;">'.$nomor_soal.'</td>';
                                    $echo .= '<td style="padding: 5px;">';
                                        $echo .= '<input type="hidden" name="soal_'.$nomor_soal.'" value="0" />';
                                        $echo .= '<div style="padding: 0px 0px 5px;">'.$question->VSOAL.'</div>';
                                        $echo .= '<div style="padding: 5px 0px;"><table><tr><td><span class="rad_but"><input type="radio" name="soal_'.$nomor_soal.'" value="A" /></span></td><td><span class="pilgan_a" >A.</span> </td><td><span id="opsi_A_'.$question->ID.'" class="">'.$question->VOPSIA.'</span></td></tr></table></div>';
                                        $echo .= '<div style="padding: 5px 0px;"><table><tr><td><span class="rad_but"><input type="radio" name="soal_'.$nomor_soal.'" value="B" /></span></td><td><span class="pilgan_b" >B.</span> </td><td><span id="opsi_B_'.$question->ID.'" class="">'.$question->VOPSIB.'</span></td></tr></table></div>';
                                        $echo .= '<div style="padding: 5px 0px;"><table><tr><td><span class="rad_but"><input type="radio" name="soal_'.$nomor_soal.'" value="C" /></span></td><td><span class="pilgan_c" >C.</span> </td><td><span id="opsi_C_'.$question->ID.'" class="">'.$question->VOPSIC.'</span></td></tr></table></div>';
                                        $echo .= '<div style="padding: 5px 0px;"><table><tr><td><span class="rad_but"><input type="radio" name="soal_'.$nomor_soal.'" value="D" /></span></td><td><span class="pilgan_d" >D.</span> </td><td><span id="opsi_D_'.$question->ID.'" class="">'.$question->VOPSID.'</span></td></tr></table></div>';                                                                   
                                    $echo .= '</td>';
                                $echo .= "</tr>";
                                $echo .= '<tr><td colspan="2"><hr></td></tr>';
                                $nomor_soal++;
                            }
                            echo $echo;
                        ?>
                        <tr>
                            <td colspan="2">
                                <a class="btn btn-primary" onclick="submit_quis()">Submit</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- Your Page Content Here -->

</section>
<script type="text/javascript">
    window.onload = function () {
        var timelength = 60 * 60,
            display = document.querySelector('title');
        startTimer(timelength, display);
    };
</script>