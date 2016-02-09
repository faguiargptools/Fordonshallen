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

{!! Form::model($adbluetext, array('class' => 'form-horizontal', 'id' => 'form-with-validation', 'method' => 'PATCH', 'route' => array('admin.adbluetext.update', $adbluetext->id))) !!}

<div class="form-group">
    {!! Form::label('text', 'Text*', array('class'=>'col-md-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('text', old('text',$adbluetext->text), array('class'=>'form-control ckeditor')) !!}
        
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {!! Form::submit('Uppdatera', array('class' => 'btn btn-primary')) !!}
    </div>
</div>

{!! Form::close() !!}

@endsection