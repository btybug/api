@extends('btybug::layouts.admin')
@section('content')
    <div class="col-md-12">
        <h2>Requested</h2>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>API</th>
                <th>User</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="table_engine">
            @if(isset($fields))
                @foreach($fields as $count => $field)
                    <tr>
                        <td> </td>
                        <td>{!! Form::select('column[0][type]',$tbtypes,28,['class'=>'form-control']) !!}</td>
                        <td>
                            <span class='btn btn-warning'><i class='fa fa-trash' aria-hidden='true'></i></span>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3"> No result</td>
                </tr>
            @endif

            </tbody>
        </table>
    </div>
@stop
