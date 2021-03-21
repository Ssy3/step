@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.risk.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.risks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.id') }}
                        </th>
                        <td>
                            {{ $risk->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.title') }}
                        </th>
                        <td>
                            {{ $risk->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.probability') }}
                        </th>
                        <td>
                            {{ $risk->probability }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.impact') }}
                        </th>
                        <td>
                            {{ $risk->impact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.gross') }}
                        </th>
                        <td>
                            {{ $risk->gross }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.action') }}
                        </th>
                        <td>
                            {{ App\Models\Risk::ACTION_SELECT[$risk->action] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.action_details') }}
                        </th>
                        <td>
                            {!! $risk->action_details !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.risk.fields.initiative') }}
                        </th>
                        <td>
                            {{ $risk->initiative->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.risks.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection