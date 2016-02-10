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

{!! Form::model($produkter, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin.produkter.update', $produkter->id))) !!}

<div class="form-group">
    {!! Form::label('name', 'Produktnamn*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('name', old('name',$produkter->name), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('short_desc', 'Kort Beskrivning*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('short_desc', old('short_desc',$produkter->short_desc), array('class'=>'form-control ckeditor')) !!}
        <p class="help-block">Visas på butikens förstasida</p>
    </div>
</div><div class="form-group">
    {!! Form::label('long_desc', 'Lång Beskrivning*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('long_desc', old('long_desc',$produkter->long_desc), array('class'=>'form-control ckeditor')) !!}
        <p class="help-block">Visas när man gått in på produkten</p>
    </div>
</div><div class="form-group">
    {!! Form::label('article_number', 'Artikelnummer*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('article_number', old('article_number',$produkter->article_number), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('type', 'Produkttyp*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('type', old('type',$produkter->type), array('class'=>'form-control')) !!}
        <p class="help-block">ex: AdBlue enhet inklusive montering</p>
    </div>
</div><div class="form-group">
    {!! Form::label('price', 'Pris*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('price', old('price',$produkter->price), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('variation', 'Alternativ', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('variation', old('variation',$produkter->variation), array('class'=>'form-control')) !!}
        <p class="help-block">Serparera alternativ med komma ex: Ford,Opel,Volvo</p>
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {!! Form::submit('Uppdatera', array('class' => 'btn btn-primary')) !!}
      {!! link_to_route('admin.produkter.index', 'Avbryt', $produkter->id, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection