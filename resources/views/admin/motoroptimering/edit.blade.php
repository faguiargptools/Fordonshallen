@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Ändra</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::model($motoroptimering, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin.motoroptimering.update', $motoroptimering->id))) !!}

<div class="form-group">
    {!! Form::label('type', 'Fordonstyp*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('type', old('type',$motoroptimering->type), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('brand', 'Märke*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('brand', old('brand',$motoroptimering->brand), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('model', 'Modell*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('model', old('model',$motoroptimering->model), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('engine', 'Motor', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('engine', old('engine',$motoroptimering->engine), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('fuel', 'Bränsle', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('fuel', old('fuel',$motoroptimering->fuel), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('prefx', 'Effekt (hk)', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('prefx', old('prefx',$motoroptimering->prefx), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('postfx', 'Effekt Optimerad (hk)', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('postfx', old('postfx',$motoroptimering->postfk), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('prenm', 'Vridmoment (Nm)', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('prenm', old('prenm',$motoroptimering->prenm), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('postnm', 'Vridmoment Optimerad (Nm)', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('postnm', old('postnm',$motoroptimering->postnm), array('class'=>'form-control')) !!}
        
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {!! Form::submit('Uppdatera', array('class' => 'btn btn-primary')) !!}
      {!! link_to_route('admin.motoroptimering.index', 'Avbryt', $motoroptimering->id, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection