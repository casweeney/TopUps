<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
</head>
<body>
	<div id="dist">
		
	</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			type: "GET",
			url: "practice.php",
			cache: false,
			success: function(response){
				console.log(response);
				// data = JSON.parse(response);
				// var count = data.length-1;
				// for(i=0;i<=count;i++){
				// 	show+="<ul><li>"+ data.data_price +"</li></ul>";
				// }
				// $("#dist").html(show);
			}
		});
	});
</script>