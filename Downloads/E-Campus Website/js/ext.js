$(document).ready(function() {
	$.noConflict();
	$('#inst_name').hide();	
	$('#inst_id').hide();
	$('#inst_pass').hide();
		
	$('#b1').click(function(){
		$('#inst_name').show();		
	});
	$('#b2').click(function(){
		$('#inst_id').show();		
	});
	$('#b3').click(function(){
		$('#inst_pass').show();		
	});
});