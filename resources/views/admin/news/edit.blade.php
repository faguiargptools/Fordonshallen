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

{!! Form::model($news, array('files' => true, 'class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin.news.update', $news->id))) !!}

<div class="form-group">
    {!! Form::label('title', 'Titel*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title', old('title',$news->title), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('content', 'Innehåll*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('content', old('content',$news->content), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('image', 'Bild', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('image') !!}
        
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {!! Form::submit('Uppdatera', array('class' => 'btn btn-primary')) !!}
      {!! link_to_route('admin.news.index', 'Avbryt', $news->id, array('class' => 'btn btn-default')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection