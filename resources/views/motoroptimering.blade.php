@extends('layouts.master')

@section('bodyClass') body_motoroptimering @stop

@section('motoroptimering')
    active
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Motoroptimering</h2>
        <p>
            Vi kan nu erbjuda motoroptimering till person- och lastbilar av de flesta märken och modeller. Det kommer att dröja lite ytterligare innan Ni själva kan se direkt här på sidan om det är möjligt att motoroptimera Ert fordon och vilken effekt en eventuell motoroptimering skulle ha, men det går bra att höra av sig till oss med förfrågning på Ert specifika fordon.
        </p>
        <p>
            <img src="/img/phone.png" /> Ring oss redan idag 08 - 519 720 72 eller 070 - 41 66 100!
        </p>
        <p>
            Vår motoroptimering är modern med bra säkerhet och går till på så sätt att vi omprogramerar fordonets ECU via dess OBD-II-uttag. Det finns möjlighet att välja en utav tre sorters optimeringfiler:
            <br /><br />
            - En <strong class="green">grön</strong> Eco-optimeringsfil för Er som söker ett starkare fordon som är så bränslesnålt som möjligt.<br />
            - En <strong class="blue">blå</strong> effektoptimeringsfil för Er som önskar höja motoreffekten ytterligare utan att gå miste om den sänkta bränsleförbrukningen.<br />
            - En <strong class="red">röd</strong> effektoptimeringsfil för Er som vill maximera Ert fordons motoreffekt.<br />
        </p>
        <p>
            <a href="/villkor-garanti">Klicka här för att se våra fullständiga villkor och garanti!</a>
        </p>
    </div>
</div>

<!-- Motoroptimerare -->
<div class="row">
	<div class="col-md-12">
		<h2>Kolla vilken effekt ditt fordon får här!</h2>
		<br />
		<p class="alert alert-warning">
			<i class="fa fa-warning"></i> Vi utför även optimeringar på de flesta traktorer, kontakta oss för priser och mer information om detta.
		</p>
		<div class="col-md-12" style="color: #000;">
			<form id="form1">
				<select id="select1" class="input-sm">
					<option>Välj Fordonstyp</option>
					<option value="personbil">Personbil</option>
					<option value="lastbil">Lastbil</option>
				</select>
				<select id="select2" class="input-sm">
					<option>Märke</option>
				</select>
				<select id="select3" class="input-sm">
					<option>Modell</option>
				</select>
				<select id="select4" class="input-sm">
					<option>Motor</option>
				</select>
			</form>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="well">
			<table id="optimizationTable" class="table" style="display: none;">
				<thead>
					<tr>
						<td></td>
						<td>Original</td>
						<td>Efter Optimering</td>
					</tr>
				</thead>
				<tbody class="optimization">
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- /Motoroptimerare -->

<div class="row">
    <div class="col-md-6">
        <img class="img-responsive img-thumbnail" src="/img/55508384.jpg" />
    </div>
    <div class="col-md-6">
        <img class="img-responsive img-thumbnail" src="/img/55508860.jpg" />
    </div>
</div>

<script>

	$("#select1").change(function() {
		$("#select2").load("/getBrand/" + $("#select1").val());
		if($("#select1").val() == 'lastbil'){
			$("#form1").append("<select id=\"select5\" class=\"input-sm\"><option>HK Original</option></select>");
		} else {
			$("#form1").children("#select5").remove();
		}
	});

	$("#select2").change(function() {
		$("#select3").load("/getModell/" + $("#select2").val());
	});

	$("#select3").change(function(){
		$("#select4").load("/getEngine/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val());
		if($("#select1").val() == 'personbil'){
			$("#select4").change(function(){
				if($("#select4").val() != "Motor"){
					$(".optimization").load("/getOptimization/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val() + "/" + $("#select4").val());
					$("#optimizationTable").show();
				} else {
					$("#optimizationTable").hide();
				}
			});
		}
	});

	$("#select4").change(function(){
		if($("#select1").val() == 'lastbil'){
			$("#select5").load("/getHk/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val() + "/" + $("#select4").val());
			$("#select5").change(function(){
				if($("#select5").val() != "HK Original") {
					$(".optimization").load("/getOptimization2/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val() + "/" + $("#select4").val() + "/" + $("#select5").val());
					$("#optimizationTable").show();
				} else {
					$("#optimizationTable").hide();
				}
			});
		}
	});
</script>

<!--
<script>
$("#select1").change(function() {
  $("#select2").load("/getBrand/" + $("#select1").val());
  if($("#select1").val() == 'personbil'){
		$("#form1").append("<select id=\"select4\" class=\"input-sm\"><option>Motor</option></select>");
	} else {
		$("#form1").children("#select4").remove();
	}
});

$("#select2").change(function() {
	$("#select3").load("/getModell/" + $("#select2").val());
});

$("#select3").change(function(){
	if($("#select1").val() == 'personbil'){
		$("#select4").load("/getEngine/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val());
		$("#select4").change(function(){
			$(".optimization").load("/getOptimization2/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val() + "/" + $("#select4").val());
			$("#optimizationTable").show();
		});
	} else {
		$(".optimization").load("/getOptimization/" + $("#select1").val() + "/" + $("#select2").val() + "/" + $("#select3").val());
		$("#optimizationTable").show();
	}
});
</script>
	-->

@stop