<html>

<head>
	<title>Get Barcode</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script>
		$(function(){
			
			var size = 75;
			var width = 400;
			var codeType = 'code128';
			
			function genImage(){
				$('#code').attr('height', size);
				$('#code').attr('width', width);
				if( codeType == 'qrcode'){
					$('#code').attr("src", 'getQRcode.php?text=' + $('#bc').val() + '&size=' + size + '&orientation=horizontal&codetype=' + codeType);
				}else if( codeType == "TCPDF417"){
					$('#code').attr("src", '/getTCPDF.php?text=' + $('#bc').val() + '&size=' + size + '&orientation=horizontal&codetype=' + codeType);
				}else{
					$('#code').attr("src", 'getBarcode.php?text=' + $('#bc').val() + '&size=' + size + '&orientation=horizontal&codetype=' + codeType);	
				}
			}
		
			$('#bc').on("change input",function(e) {
				genImage();
			});

			$('#slider').slider({
			  range: "max",
			  min: 20,
			  max: 100,
			  value: 75,
			  step: 5,
			  slide: function( event, ui ) {
				$( "#size" ).html( ui.value );
				size = ui.value;
				$('#code').attr('height', ui.value);
			  }
			});
			
			$('#slider-width').slider({
			  range: "max",
			  min: 100,
			  max: 500,
			  value: 400,
			  step: 50,
			  slide: function( event, ui ) {
				$( "#width" ).html( ui.value );
				width = ui.value;
				$('#code').attr('width', ui.value);
				if( codeType == 'qrcode'){
					$('#code').attr('height', ui.value);
				}
			  }
			});
			
			$( "#codeType" ).change(function () {
	  
				$( "#codeType option:selected" ).each(function() {
				  codeType = $( this ).val();
				});
				
				if( codeType != 'qrcode'){
					$('.height').show();
				}else{
					$('.height').hide();
					size = width;
				}
				genImage();
			});
			
			genImage();
		});
	</script>	
</head>

<body>
	<p>Generate a Barcode with the following:
		<input id="bc" type="text" value="thisisatest" />
	</p>
	
	<style>
		.ui-slider{ margin: 20px 0px; }
	</style>
	
	<img id="code" src="" />
	<div style="width: 400px; padding: 20px;">
	<select name="codeType" id="codeType">
		<option value="code128" selected="selected">code128</option>
		<option value="code39">code39</option>
		<option value="code25">code25</option>
		<option value="codabar">codabar</option>
		<option value="qrcode">qrcode</option>
		<option value="TCPDF417">TCPDF417</option>
	</select>
	
	<hr />
	<div class="height">
		Height (px): 
		<div id="slider"></div><span id="size">20</span>px
		<br />
	</div>
	<div class="width">
		Width (px): 
		<div id="slider-width"></div><span id="width">20</span>px
	</div>
	</div>
	
	
</body>

</html>