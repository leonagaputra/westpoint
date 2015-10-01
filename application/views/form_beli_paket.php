<section class="content-header">
    <h1>
        Pembelian Paket
        <!--<small>Detail Paket</small>-->
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Pembelian Paket</a></li>
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
                        <form id="form_beli_paket" method="post" action="<?php echo $base_url;?>index.php/backend/payment_status">
                            <input type="hidden" name="paket_id" value="<?php echo $paket->ID; ?>">
                        </form>
                    </div>
                </div>
            </div>
            <div><?php echo $paket->VDESC ?></div>
        </div>          
    </div>

    <div class="box box-default color-palette-box">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-tag"></i> Pilih Tipe Pembayaran</h3>
        </div>
        <div class="box-body">
            <div >

<!--<a href="#" ><img src="<?php echo $base_url ?>img/unipin/UniPin_logo.svg" width="100px" /></a><br /><br />
<a href="#" ><img src="<?php echo $base_url ?>img/unipin//upoint.png" width="100px" /></a><br /><br />
<a href="#" ><img src="<?php echo $base_url ?>img/unipin//telkomsel_voucher.png" width="100px" /></a><br /><br />
<a href="#" ><img src="<?php echo $base_url ?>img/unipin//zingmobile_XL.png" width="100px" /></a><br /><br />
<a href="#" ><img src="<?php echo $base_url ?>img/unipin//zingmobile_XLVOUCHER.png" width="100px" /></a><br /><br />
<a href="#" ><img src="<?php echo $base_url ?>img/unipin//zingmobile_INDOSAT.png" width="100px" /></a><br /><br />
                -->

                <div class="form-group">
                    <div class="radio">
                        <label>
                            <input type="radio" name="tipe_pembayaran" id="tipe_pembayaran1" value="unipin" checked>
                            Unipin
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tipe_pembayaran" id="tipe_pembayaran2" value="telkomsel">
                            Telkomsel
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tipe_pembayaran" id="tipe_pembayaran3" value="xl" >
                            XL
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="tipe_pembayaran" id="tipe_pembayaran3" value="indosat" >
                            Indosat
                        </label>
                    </div>
                    <div >                                          
                        <button class="btn btn-primary" onclick="open_payment(<?php echo $paket->ID; ?>)">Next</button>
                    </div>
                </div>
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
                </div>
                <div class="modal-body">
                    <iframe src="" id="iframe_payment" style="zoom:0.60" frameborder="0" height="550" width="99.6%"></iframe>                    
                </div>  
                <!--<div class="modal-footer">
                    <button class="btn" data-dismiss="modal">Close</button>
                </div>-->
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div><!-- /.example-modal -->

<script type="text/javascript">
    var m_pInterval = null;

    // When open UniBox in ThickBox, you must define "registerUniBoxDialog()" function that in turn call "window.addEventListener()".
    // When open UniBox in Iframe, you must call "window.addEventListener()" upon page loaded.
    // When open UniBox in browser popup, you must call "window.addEventListener()" upon page loaded.


    // Call "window.addEventListener()" if UniBox is opened using Iframe or browser popup
    window.addEventListener("message", function (e) {
        postMessageHandler(e);
    }, false);


    // This function is only needed if UniBox is opened using ThickBox
    function registerUniBoxDialog()
    {
        window.addEventListener("message", function (e) {
            postMessageHandler(e);
        }, false);
    }


    function postMessageHandler(e)
    {
        console.log('postMessageHandler');
        if (e.origin != "https://payment.unipin.co.id")
            //if (e.origin != "http://payment.unipin")
            return;

        unipinCallback(e.data);
    }

    function unipinCallback(_unipinResult)
    {
        console.log('unipinCallback');
        console.log(_unipinResult.status);
        console.log(_unipinResult.type);
        console.log(_unipinResult.amount);
        console.log(_unipinResult.trxNo);
        console.log(_unipinResult.reference);
        console.log(_unipinResult.message);

        /*
        document.getElementById("lblStatus").innerHTML = _unipinResult.status;
        document.getElementById("lblType").innerHTML = _unipinResult.type;
        document.getElementById("lblAmount").innerHTML = _unipinResult.amount;
        document.getElementById("lblTrxNo").innerHTML = _unipinResult.trxNo;
        document.getElementById("lblReference").innerHTML = _unipinResult.reference;
        document.getElementById("lblDescription").innerHTML = _unipinResult.message;
        */
        m_pInterval = setInterval(timeOut, 5000);	// Timout in 5 seconds
    }

    function timeOut()
    {
        console.log('timeout');
        clearInterval(m_pInterval);

        /*var pDlg = document.getElementById("TB_closeWindowButton");
        if (pDlg)
            pDlg.click();

        eleDiv = document.getElementById("divUniPinCallback");
        eleDiv.style.display = "block";*/
        $('#detail_modal').modal('hide');        
        $("#form_beli_paket").submit();
    }
</script>