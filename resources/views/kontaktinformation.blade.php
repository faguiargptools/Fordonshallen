@extends('layouts.master')

@section('bodyClass') body_omoss @stop

@section('om-oss')
    active
@stop

@section('content')
@if (count($errors) > 0)
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div id="map" style="width:100%; height:300px;"></div>
        <script>
          var map;
          function initMap() {

            var styles = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];

            var myLatLng = {lat: 59.559566, lng: 17.537921};

            map = new google.maps.Map(document.getElementById('map'), {
              center: myLatLng,
              zoom: 15,
              disableDefaultUI: true
            });

            map.setOptions({styles: styles});

            var marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                title: 'Fordonshallen'
              });
          }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMPKP1EPrn7ZzPbb9qvPmthG0ZzPeamHI&callback=initMap"
        async defer></script>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <h3>Skicka meddelande</h3>
        {{ Form::open(['route' => 'contactmail', 'class' => 'form-horizontal', 'method' => 'POST']) }}
        {{ Form::token() }}

        {{ Form::label('name', 'Ditt namn:') }}
        {{ Form::text('name') }}

        {{ Form::label('email', 'Din e-postadress:') }}
        {{ Form::text('email') }}

        {{ Form::label('message', 'Ditt meddelande:') }}
        {{ Form::textarea('message', null, array('size' => '25x5')) }}

        {{ Form::submit('Skicka meddelande', array('class' => 'btn btn-default')) }}

        {{ Form::close() }}
    </div>
    <div class="col-md-4">
        <h3>Ring oss</h3>
        <p>
           Vill du ha kontakt med Fordonshallen eller boka tid?<br />
           Ring: 08-51972072 eller 070-4166100.<br />
           <br />
           Telefontider:<br />
           må–fr: 09.00–19.00<br />
           lö-sö:  10.00–19.00 <br />
        </p>
        <h3>Adress</h3>
        <p>
            <strong>Fordonshallen</strong><br />
            Kalmarvägen 3<br />
            746 31 Bålsta
        </p>
    </div>
    <div class="col-md-4">
        <h3>Öppettider</h3>
        <p>
            Må-Fr: 09.00 - 17.00<br />
            Lö: Stängt<br />
            Sö: Stängt
        </p>
    </div>
</div>
@stop