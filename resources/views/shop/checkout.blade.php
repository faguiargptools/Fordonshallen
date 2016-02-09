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
                <div class="col-md-5">
                    Produkt
                </div>
                <div class="col-md-3 text-center">
                    Antal
                </div>
                <div class="col-md-3 text-center">
                    Pris
                </div>
                <div class="col-md-1 text-right">
                </div>
            </div>
            <hr class="hr-lite" />
            @if(\LukePOLO\LaraCart\Facades\LaraCart::count($withItemQty = true) > 0)
                @foreach(\LukePOLO\LaraCart\Facades\LaraCart::getItems() as $item)
                    <div class="row">
                        <div class="col-md-5 overflow">
                            <a href="/butik/{{ $item->id }}"> {{ $item->name }} </a>
                        </div>
                        <div class="col-md-3 overflow text-center">
                            {{ $item->qty }}
                        </div>
                        <div class="col-md-3 overflow text-center">
                            {{ $item->price }}.00:-
                        </div>
                        <div class="col-md-1 overflow text-right">
                            {{ link_to_action('ShopController@removeItem', 'Ta bort', array('item' => $item->getHash()), array('class' => 'btn btn-xs btn-danger removeItem')) }}
                        </div>
                    </div>
                @endforeach
            <hr class="hr-lite" />
            <div class="row">
                <div class="col-md-5">
                    Totalt: {{ \LukePOLO\LaraCart\Facades\LaraCart::total($formatted = false, $withDiscounts = false) }}:-
                </div>
            </div>
            @else
                <div class="row">
                    <div class="col-md-8 overflow">
                        Inga produkter
                    </div>
                    <div class="col-md-4 overflow text-center">
                    </div>
                </div>
            @endif
            <hr class="hr-lite" />
        </div>
    </div>

    <form class="form-horizontal">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="well">
                        <h1>Välj betalsätt</h1>
                        <label class="radio-container" for="radio01">
                            <div>
                                <input type="radio" id="radio01" name="radio" />
                                <span class="radio-button"></span>Faktura
                            </div>
                            <hr class="hr-lite" />
                            <span class="radio-info">För företag, fakturan levereras med produkten till företagets adress.</span>
                        </label>

                        <label class="radio-container" for="radio02">
                            <div>
                                <input type="radio" id="radio02" name="radio" />
                                <span class="radio-button"></span>Bank-giro
                            </div>
                            <hr class="hr-lite" />
                            <span class="radio-info">För privatperson, du får ett mail med betalinformation och produkten levereras till angiven adress.</span>
                        </label>
                    </div>
                    <div class="alert alert-warning">Vid faktura måste Företagsnamn och Organisationsnummer anges!</div>
                </div>
                <div class="col-md-6">
                    <div class="well">
                        <h1>Kontaktinformation</h1>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Förnamn:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Efternamn:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Adress:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Postnummer:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Ort:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Telefonnummer:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">E-postadress:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4">Företagsnamn:</label>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-6">Organisationsnummer:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-right">
                <input type="submit" class="btn btn-primary" value="Skicka beställning" style="margin-right: 20px;"/>
            </div>
        </div>
    </form>
    <hr />
    <div class="row">
        <div class="col-md-12">
            <div class="label label-primary" style="display: block;">Alla priser i vår webbutik visas exklusive moms!</div>
        </div>
    </div>
@stop
@section('javascript')
    <script type="text/javascript">
        $('.removeItem').click(function(){
            return confirm("Är du säker på att du vill ta bort produkten?");
        })
    </script>
@stop