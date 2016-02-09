@extends('admin.layouts.master')

@section('content')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1Add new</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => 'admin.produkter.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('name', 'Produktnamn*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('short_desc', 'Kort Beskrivning*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('short_desc', old('short_desc'), array('class'=>'form-control ckeditor')) !!}
        <p class="help-block">Visas på butikens förstasida</p>
    </div>
</div><div class="form-group">
    {!! Form::label('long_desc', 'Lång Beskrivning*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('long_desc', old('long_desc'), array('class'=>'form-control ckeditor')) !!}
        <p class="help-block">Visas när man gått in på produkten</p>
    </div>
</div><div class="form-group">
    {!! Form::label('article_number', 'Artikelnummer*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('article_number', old('article_number'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('type', 'Produkttyp*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('type', old('type'), array('class'=>'form-control')) !!}
        <p class="help-block">ex: AdBlue enhet inklusive montering</p>
    </div>
</div><div class="form-group">
    {!! Form::label('price', 'Pris*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('price', old('price'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('variation', 'Alternativ', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('variation', old('variation'), array('class'=>'form-control')) !!}
        <p class="help-block">Serparera alternativ med komma ex: Ford,Opel,Volvo</p>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {!! Form::submit('Create', array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection