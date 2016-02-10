@extends('../layouts.master')

@section('bodyClass') body_butik @stop

@section('butik')
    active
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-success">
                <h1>Tack för din beställning!</h1>
                <p>
                    Vi kommer höra av oss inom kort för att bekräfta din beställning!<br />
                    Mvh Fordonshallens Verkstadstjänster
                </p>
            </div>
        </div>
    </div>
@stop