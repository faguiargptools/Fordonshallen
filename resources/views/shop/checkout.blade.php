@extends('../layouts.master')

@section('bodyClass') body_butik @stop

@section('butik')
    active
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li><a href="/butik">Butik</a></li>
                <li class="active">Utcheckning</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            Varukorg
            <hr class="hr-lite" />
            <div class="row">
                <div class="col-md-3">
                    Produkt
                </div>
                <div class="col-md-3 text-center">
                    Antal
                </div>
                <div class="col-md-3 text-center">
                    Pris
                </div>
                <div class="col-md-3 text-right">
                    Ta bort
                </div>
            </div>
            @if(\LukePOLO\LaraCart\Facades\LaraCart::count($withItemQty = true) > 0)
                @foreach(\LukePOLO\LaraCart\Facades\LaraCart::getItems() as $item)
                    <div class="row">
                        <div class="col-md-3 overflow">
                            <a href="/butik/{{ $item->id }}"> {{ $item->name }} </a>
                        </div>
                        <div class="col-md-3 overflow text-center">
                            {{ $item->qty }}
                        </div>
                        <div class="col-md-3 overflow text-center">
                            {{ $item->price }}
                        </div>
                        <div class="col-md-3 overflow text-right">
                            {{ $item->price }}
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <div class="col-md-8 overflow">
                        Inga produkter
                    </div>
                    <div class="col-md-4 overflow text-center">
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="label label-primary" style="display: block;">Alla priser i vår webbutik visas exklusive moms!</div>
        </div>
    </div>
@stop
@section('javascript')
    <script type="text/javascript">
        $('.emptyCart').click(function(){
            return confirm("Är du säker på att du vill tömma kundvagnen?");
        })
    </script>
@stop