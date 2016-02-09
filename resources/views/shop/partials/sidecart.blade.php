<!-- Varukorg -->
<div class="col-md-3">
    <div class="text-center"><i class="fa fa-shopping-cart"></i> Varukorg</div>
    <hr class="hr-lite" />
    <div class="row">
        <div class="col-md-8 overflow">
            Produkt
        </div>
        <div class="col-md-4 text-center">
            Antal
        </div>
    </div>
    <hr class="hr-lite" />
    @if(\LukePOLO\LaraCart\Facades\LaraCart::count($withItemQty = true) > 0)
        @foreach(\LukePOLO\LaraCart\Facades\LaraCart::getItems() as $item)
            <div class="row">
                <div class="col-md-8 overflow">
                    <a href="/butik/{{ $item->id }}"> {{ $item->name }} </a>
                </div>
                <div class="col-md-4 overflow text-center">
                    {{ $item->qty }}
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

    <hr class="hr-lite" />
    <div class="row">
        <div class="col-md-6">
            Summa:
        </div>
        <div class="col-md-6 text-right">
            {{ \LukePOLO\LaraCart\Facades\LaraCart::count($withItemQty = true) > 0 ? \LukePOLO\LaraCart\Facades\LaraCart::total($formatted = false, $withDiscount = false) : '0.00' }}:-
        </div>
    </div>
    <hr />
    <div class="row">
        <div class="col-md-12 text-center">
            <a href="/checkout" class="btn btn-sm btn-primary">Gå till utcheckning</a> <a href="/emptyCart" class="btn btn-sm btn-danger emptyCart">Töm</a>
        </div>
    </div>
</div>

@section('javascript')
    <script type="text/javascript">
        $('.emptyCart').click(function(){
            return confirm("Är du säker på att du vill tömma kundvagnen?");
        })
    </script>
@stop
<!-- /Varukorg -->