<html>
<head>
	<link rel="stylesheet" href="thinkbox/thickbox.css" type="text/css" media="screen"/>
	<script type="text/javascript" src="thinkbox/jquery-1.3.2.min.js"></script>
	<script type="text/javascript" src="thinkbox/thickbox.js"></script>

	<script type="text/javascript">
			var m_pInterval = null;
			
			// When open UniBox in ThickBox, you must define "registerUniBoxDialog()" function that in turn call "window.addEventListener()".
			// When open UniBox in Iframe, you must call "window.addEventListener()" upon page loaded.
			// When open UniBox in browser popup, you must call "window.addEventListener()" upon page loaded.
			
			
			// Call "window.addEventListener()" if UniBox is opened using Iframe or browser popup
			window.addEventListener("message", function(e) { postMessageHandler(e); }, false);
			
			
			// This function is only needed if UniBox is opened using ThickBox
			function registerUniBoxDialog()
			{
				window.addEventListener("message", function(e) { postMessageHandler(e); }, false);
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
				
				document.getElementById("lblStatus").innerHTML		= _unipinResult.status;
				document.getElementById("lblType").innerHTML		= _unipinResult.type;
				document.getElementById("lblAmount").innerHTML		= _unipinResult.amount;
				document.getElementById("lblTrxNo").innerHTML		= _unipinResult.trxNo;
				document.getElementById("lblReference").innerHTML	= _unipinResult.reference;
				document.getElementById("lblDescription").innerHTML = _unipinResult.message;
				
				m_pInterval = setInterval(timeOut, 10000);	// Timout in 10 seconds
			}
			
			function timeOut()
			{
                            console.log('timeout');
				clearInterval(m_pInterval);
				
				var pDlg = document.getElementById("TB_closeWindowButton");
				if (pDlg)
					pDlg.click();
								
				eleDiv = document.getElementById("divUniPinCallback");
				eleDiv.style.display = "block";
			}
		</script>

</head>
<body style="background:#eee;">
							

<br /><br /><br /><br /><br />
<table width="60%" border="1px" cellspacing="0px" cellpadding="2px" align="center">
<tr>
	<td width="30%" align="center" style="background:lightblue;padding:5px;"><b>Payment Channels</b></td>
	<td width="70%" align="center" style="background:lightblue;padding:5px;"><b>Denominations</b></td>
</tr>
<tr>	
	<td align="center" style="background:#fff;">
	<br />
<a href="initial_pages/unipin.php?TB_iframe=true&height=550&width=600" title="UniBox" class="thickbox style1"><img src="images/UniPin_logo.svg" width="100px" /></a><br /><br />
<a href="initial_pages/upoint.php?TB_iframe=true&height=550&width=600" title="UniBox" class="thickbox style1"><img src="images/upoint.png" width="100px" /></a><br /><br />
<a href="initial_pages/upvoucher.php?TB_iframe=true&height=550&width=600" title="UniBox" class="thickbox style1"><img src="images/telkomsel_voucher.png" width="100px" /></a><br /><br />
<a href="initial_pages/xl.php?TB_iframe=true&height=550&width=600" title="UniBox" class="thickbox style1"><img src="images/zingmobile_XL.png" width="100px" /></a><br /><br />
<a href="initial_pages/xlvoucher.php?TB_iframe=true&height=550&width=600" title="UniBox" class="thickbox style1"><img src="images/zingmobile_XLVOUCHER.png" width="100px" /></a><br /><br />
<a href="initial_pages/indosat.php?TB_iframe=true&height=550&width=600" title="UniBox" class="thickbox style1"><img src="images/zingmobile_INDOSAT.png" width="100px" /></a><br /><br />

	</td>
	<td valign="middle" align="center" style="background:#fff;">
		
	<h3>Welcome to game.com</h3>
	<div id="divUniPinCallback" style="display:none;">
		<b><u>Reload Info</u></b> 
		<table width="80%" align="center">
			<tr>
				<td>Status:</td>
				<td><label id="lblStatus"></label></td>
			</tr>
			<tr>
				<td>Type:</td>
				<td><label id="lblType"></label></td>
			</tr>
			<tr>
				<td>Amount:</td>
				<td><label id="lblAmount"></label></td>
			</tr>
			<tr>
				<td>Transaction No:</td>
				<td><label id="lblTrxNo"></label></td>
			</tr>
			<tr>
				<td>Reference:</td>
				<td><label id="lblReference"></label></td>
			</tr>
			<tr>
				<td>Description:</td>
				<td><label id="lblDescription"></label></td>
			</tr>
		</table>
		</div>
	</td>
</tr>



</table>
</body>
</html>