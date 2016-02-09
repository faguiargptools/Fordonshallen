@extends('../layouts.master')

@section('bodyClass') body_butik @stop

@section('butik')
    active
@stop

@section('content')
	<div class="row">
		<div class="col-md-12">
			<ol class="breadcrumb">
				<li class="active">Butik</li>
			</ol>
		</div>
	</div>
	<div class="row">
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
					<a href="#" class="btn btn-sm btn-primary">Gå till utcheckning</a> <a href="/emptyCart" class="btn btn-sm btn-danger emptyCart">Töm</a>
				</div>
			</div>
		</div>
		<!-- /Varukorg -->
		<div class="col-md-9">

			@foreach($produkter->chunk(2) as $chunk)
				<div class="row">
					@foreach($chunk as $produkt)
						<!-- artikel -->
							<div class="col-md-6">
								<div class="shop article">
									{!! $produkt->name !!}
									<hr class="hr-lite" />
									<div class="block-with-text">
										{!! $produkt->short_desc !!}
									</div>
									<hr />
									<div style="width: 100% !important;">
										<span class="priceTag">{!! $produkt->price !!}:-</span>
										<a href="/butik/{{ $produkt->id }}" class="btn btn-primary pull-right">Läs mer</a>
									</div>
								</div>
							</div>
						<!-- /artikel -->
					@endforeach
				</div>
			@endforeach
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