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

		@include('shop.partials.sidecart')

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