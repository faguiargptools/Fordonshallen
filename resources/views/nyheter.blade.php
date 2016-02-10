<?php use Jenssegers\Date\Date; Date::setLocale('sv'); ?>
@extends('layouts.master')

@section('bodyClass') body_nyheter @stop

@section('nyheter')
    active
@stop

@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Senaste nytt från Fordonshallen.</h1>
    </div>
</div>

@foreach($news as $nyhet)
<!-- Nyhet -->
<div class="nyhet">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <h2>{{ ucfirst($nyhet->title) }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <span class="clearfix"></span>
            <span class="date">{{ ucwords(Date::createFromTimestamp(strtotime($nyhet->created_at))->format('j F Y')) }}</span>
            <hr class="hr-lite" />
            <span class="clearfix"></span>
            {!! \Illuminate\Support\Str::limit($nyhet->content, 300) !!}
        </div>
        <div class="col-md-4">
            <img class="img-responsive img-thumbnail" src="/uploads/{{ $nyhet->image }}" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 no-padding">
            <div class="col-md-8">
                <a href="/nyheter/{{ $nyhet->id }}" class="btn btn-default">Läs hela nyheten här</a>
            </div>
        </div>
    </div>
</div>
<!-- /Nyhet -->
@endforeach

@stop