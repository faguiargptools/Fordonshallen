@extends('admin.layouts.master')

@section('content')

<p>{!! link_to_route('admin.news.create', 'Skapa nyhet', null, array('class' => 'btn btn-success')) !!}</p>

@if ($news->count())
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
                        <th>Titel</th>
<th>Bild</th>

                        <th>&nbsp;</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($news as $row)
                        <tr>
                            <td>
                                {!! Form::checkbox('del-'.$row->id,1,false,['class' => 'single','data-id'=> $row->id]) !!}
                            </td>
                            <td>{{ $row->title }}</td>
<td>{{ $row->image }}</td>

                            <td>
                                {!! link_to_route('admin.news.edit', 'Ändra', array($row->id), array('class' => 'btn btn-xs btn-info')) !!}
                                {!! Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'onsubmit' => 'return confirm(\'Bekräfta radering\');',  'route' => array('admin.news.destroy', $row->id))) !!}
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
            {!! Form::open(['route' => 'admin.news.massDelete', 'method' => 'post', 'id' => 'massDelete']) !!}
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