<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
    <!--<![endif]-->
    <head>        
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $transaksi->VIDKUITANSI;?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
    </head>
    <body><!--[if lt IE 7]><p class=chromeframe>Your browser is <em>ancient!</em> <a href="http://browsehappy.com/" target="_blank">Upgrade to a different browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">install Google Chrome Frame</a> to experience this site.</p><![endif]-->
        <table cellspacing="0" cellpadding="5" border="0" width="600" bgcolor="#FAF9F9" style="font-family: sans-serif; color:#444; margin:10px 0 0;-webkit-text-size-adjust: none;border: 1px solid #EEE;">
            <tbody>
                <tr>
                    <td>
                        <table class="header-container">
                            <tbody>
                                <tr>
                                    <td>
                                        <h1 style="font-size: 1.6em;width: 355px;float:left;margin:0.3em 0 0 0;padding:0;">BelajarUjian</h1>
                                    </td>                                       
                                    <td>&nbsp;</td>
                                </tr>
                                <tr class="invoice-separator">
                                    <td colspan="2">
                                        <div style="margin: 15px 0 5px;border: 0;border-top: 1px solid #EEE;border-bottom: 1px solid white;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 300px">
                                        <h5 style="padding:0; margin:0.5em 0;"><strong>Nomor Invoice:</strong><span style="clear:both;display:block;font-weight:normal;"><?php echo $transaksi->VIDKUITANSI;?></span></h5>
                                        <h5 style="padding:0; margin:0.5em 0;"><strong>Tanggal Invoice:</strong><span style="clear:both;display:block;font-weight:normal;"><?php echo date("d-m-Y",strtotime($transaksi->DTRANS));?></span></h5>
                                    </td>                                    
                                </tr>
                            </tbody>
                        </table>
                        <table class="detail-container" style="width:600px">
                            <tbody>
                                <tr class="invoice-separator">
                                    <td>
                                        <div style="margin: 18px 0;border: 0;border-top: 1px solid #EEE;border-bottom: 1px solid white;"></div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h3 style="font-size: 1.3em;margin:0; padding:0;">Hai, <?php echo $transaksi->VNAMA;?>,</h3>
                                        <p style="font-size: .83em;">Terima kasih, Anda telah melakukan pembelian sebagai berikut:</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table style="width: 100%;font-size: 95%;">
                                            <thead style="background: #233140;color: white;font-size: 12px;">
                                                <tr colspan="6">
                                                    <th colspan="3" style="padding:5px 0;">Nama Paket</th>                                                    
                                                    <th colspan="2">Harga</th>                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan="3" style="padding: 3px;line-height: 20px;vertical-align: top;font-weight:bold;word-break:break-word"><?php echo $transaksi->VTITLE.", expired on: ".$expired;?></td>                                                    
                                                    <td colspan="2" style="padding: 3px;line-height: 20px;vertical-align: top;">Rp <?php echo $transaksi->IAMOUNT;?></td>                                                    
                                                </tr>
                                            </tbody>
                                            <tfoot style="background: #FBFCF0;font-size: 14px;font-weight: bold;">
                                                
                                                <tr>
                                                    <td colspan="1" style="padding: 3px;line-height: 20px;vertical-align: top;border-bottom: 1px solid #DDD;"><strong>Total Pembayaran</strong></td>
                                                    <td style="padding: 3px;line-height: 20px;vertical-align: top;border-bottom: 1px solid #DDD;"></td>
                                                    <td style="padding: 3px;line-height: 20px;vertical-align: top;border-bottom: 1px solid #DDD;"></td>
                                                    <td style="padding: 3px;line-height: 20px;vertical-align: top;border-bottom: 1px solid #DDD;"></td>
                                                    <td style="padding: 3px;line-height: 20px;vertical-align: top;border-bottom: 1px solid #DDD;">Rp <?php echo $transaksi->IAMOUNT;?></td>
                                                </tr>
                                            </tfoot>
                                        </table>                                            
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="margin: 18px 0;border-top: 1px solid #EEE;border-bottom: 1px solid white;"></div>
                    </td>
                </tr>
            </tbody>
        </table>
    </body>
</html>