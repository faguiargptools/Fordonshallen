@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route('admin.motoroptimering.create', 'Lägg till ny optimering', null, array('class' => 'btn btn-success')) !!}</p>

@if ($motoroptimering->count())
    <div class="portlet box green">
        <div class="portlet-title">
            <div class="caption">Lista</div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-hover table-responsive datatable">
                <thead>
                    <tr>
                        <th>
                            {!! Form::checkbox('delete_all',1,false,['class' => 'mass']) !!}
                        </th>
                        <th>Fordonstyp</th>
<th>Märke</th>
<th>Modell</th>
<th>Motor</th>
<th>Bränsle</th>
<th>Effekt (hk)</th>
<th>Effekt Optimerad (hk)</th>
<th>Vridmoment (Nm)</th>
<th>Vridmoment Optimerad (Nm)</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($motoroptimering as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ $row->type }}</td>
<td>{{ $row->brand }}</td>
<td>{{ $row->model }}</td>
<td>{{ $row->engine }}</td>
<td>{{ $row->fuel }}</td>
<td>{{ $row->prefx }}</td>
<td>{{ $row->postfx }}</td>
<td>{{ $row->prenm }}</td>
<td>{{ $row->postnm }}</td>

                            <td>
                                {!! link_to_route('admin.motoroptimering.edit', 'Ändra', array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'Bekräfta radering\');',  'route' => array('admin.motoroptimering.destroy', $row->id))) !!}
                                    {!! Form::submit('Radera', array('class' => 'btn btn-xs btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    <button class="btn btn-danger" id="delete">
                        Radera markerade
                    </button>
                </div>
            </div>
            {!! Form::open(['route' => 'admin.motoroptimering.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
                <input type="hidden" id="send" name="toDelete">
            {!! Form::close() !!}
        </div>
	</div>
@else
    No entries found.
@endif

@endsection

@section('javascript')
    <script>
        $(document).ready(function () {
            $('#delete').click(function () {
                if (window.confirm("Är du säker?")) {
                    var send = $('#send');
                    var mass = $('.mass').is(":checked");
                    if (mass == true) {
                        send.val('mass');
                    } else {
                        var toDelete = [];
                        $('.single').each(function () {
                            if ($(this).is(":checked")) {
                                toDelete.push($(this).data('id'));
                            }
                        });
                        send.val(JSON.stringify(toDelete));
                    }
                    $('#massDelete').submit();
                }
            });
        });
    </script>
@stop