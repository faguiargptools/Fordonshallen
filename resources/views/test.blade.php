<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<form>
	<select id="select1">
		<option>Välj Fordonstyp</option>
		<option value="personbil">Personbil</option>
		<option>Lastbil</option>
		<option>Traktor</option>
	</select>
	<select id="select2">
		<option>Märke</option>
	</select>
	<select id="select3">
		<option>Modell</option>
	</select>
</form>

<div id="testDiv" style="display: none;">
test
</div>

<script>
$("#select1").change(function() {
  $("#select2").load("/getBrand/" + $("#select1").val());
});

$("#select2").change(function() {
  $("#select3").load("/getModell/" + $("#select2").val());
});

$("#select3").change(function(){
	$("#testDiv").load("/getOptimization/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val());
	$("#testDiv").show();
});
</script>