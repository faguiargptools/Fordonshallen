<?php use Jenssegers\Date\Date; Date::setLocale('sv'); ?>
@extends('layouts.master')

@section('nyheter')
    active
@stop

@section('content')
<ol class="breadcrumb">
    <li><a href="/nyheter">Nyheter</a></li>
    <li class="active">{{ ucfirst($news->title) }}</li>
</ol>
<!-- Nyhet -->
<div class="nyhet">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <h2>{{ ucfirst($news->title) }}</h2>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <span class="clearfix"></span>
            <span class="date">{{ ucwords(Date::createFromTimestamp(strtotime($news->created_at))->format('j F Y')) }}</span>
            <hr class="hr-lite" />
            <span class="clearfix"></span>
            {!! $news->content !!}
        </div>
        <div class="col-md-4">
            <img class="img-responsive img-thumbnail" src="/uploads/{{ $news->image }}" />
        </div>
    </div>
</div>
<!-- /Nyhet -->
@stop