@extends('../layouts.master')

@section('bodyClass') body_butik @stop

@section('butik')
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
            <ol class="breadcrumb">
                <li><a href="/butik">Butik</a></li>
                <li class="active">{{ $produkt->name }}</li>
            </ol>
        </div>
    </div>
    <div class="row">

        @include('shop.partials.sidecart')

        <div class="col-md-9">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop article">
                        {{ $produkt->name }}
                        <hr class="hr-lite" />
                        <div class="row">
                            <div class="col-md-6">
                                <p>
                                    Art. Nr: {{ $produkt->article_number }}<br />
                                    Typ: {{ $produkt->type }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                {{ Form::open(['action' => 'ShopController@addToCart', 'class' => 'form-horizontal']) }}
                                    <input type="hidden" name="id" value="{{ $produkt->id }}" />
                                    <input type="hidden" name="article_number" value="{{ $produkt->article_number }}" />
                                    <div class="form-group">
                                        <label for="quantity" class="col-sm-4 control-label">Antal</label>
                                        <div class="col-sm-8">
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" data-value="decrease" data-target="#spinner" data-toggle="spinner">
                                                        <span class="glyphicon glyphicon-minus"></span>
                                                    </button>
                                                </span>
                                                        <input name="quantity" type="text" data-ride="spinner" id="spinner" class="form-control input-number text-center" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-default" data-value="increase" data-target="#spinner" data-toggle="spinner">
                                                        <span class="glyphicon glyphicon-plus"></span>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="brand" class="col-sm-4 control-label">Märke, Modell och Reg.nummer</label>
                                        <div class="col-sm-8">
                                            <textarea name="specs" class="form-control" rows="8" placeholder="ex: Volvo FE 320 ABC123">{{ old('specs') }}</textarea>
                                            <span class="help-block">Ett fordon per rad.</span>
                                        </div>
                                    </div>
                                    @if($produkt->variation != null)
                                    <div class="form-group">
                                        <label for="variation" class="col-sm-4 control-label">Variant</label>
                                        <div class="col-sm-8">
                                            <select id="variation" class="form-control" name="variation">
                                                <option value="0">Välj Produktvariant</option>
                                            <?php $varianter = explode(',', $produkt->variation); ?>
                                            @foreach($varianter as $variant)
                                                @if(old('variation') == $variant)
                                                    <option value="{{ $variant }}" selected>{{ $variant }}</option>
                                                @else
                                                    <option value="{{ $variant }}">{{ $variant }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                        <script type="text/javascript">

                                            var price = '<?php echo $produkt->price; ?>';

                                            $("#variation").change(function(){
                                                if($("#variation").val().indexOf('1500') > -1){
                                                    $("#productPrice").text('7500.00:-');
                                                    $("#productPrice2").val('7500.00');
                                                } else {
                                                    $("#productPrice").text(price + ':-');
                                                    $("#productPrice2").val(price);
                                                }
                                            });
                                        </script>
                                    @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" id="productPrice2" name="price" value="{{ $produkt->price }}" />
                                <span id="productPrice" class="priceTag">{{ $produkt->price }}:-</span>
                                <input type="submit" class="btn btn-primary" value="Lägg i Kundvagn" />
                                </form>
                            </div>
                        </div>
                        <hr />
                        <div class="row">
                            <div class="col-md-12">
                                {!! $produkt->long_desc !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="label label-primary" style="display: block;">Alla priser i vår webbutik visas exklusive moms!</div>
        </div>
    </div>
    <script src="/js/bootstrap-spinner.js"></script>
@stop