@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.actionPlan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.action-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.id') }}
                        </th>
                        <td>
                            {{ $actionPlan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.title') }}
                        </th>
                        <td>
                            {{ $actionPlan->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.updates') }}
                        </th>
                        <td>
                            {!! $actionPlan->updates !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.initiative') }}
                        </th>
                        <td>
                            {{ $actionPlan->initiative->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.created_at') }}
                        </th>
                        <td>
                            {{ $actionPlan->created_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.risks') }}
                        </th>
                        <td>
                            {{ $actionPlan->risks }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.resources') }}
                        </th>
                        <td>
                            {{ $actionPlan->resources }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.start') }}
                        </th>
                        <td>
                            {{ $actionPlan->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.end') }}
                        </th>
                        <td>
                            {{ $actionPlan->end }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.approval') }}
                        </th>
                        <td>
                            {{ App\Models\ActionPlan::APPROVAL_SELECT[$actionPlan->approval] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.attachments') }}
                        </th>
                        <td>
                            @foreach($actionPlan->attachments as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.user') }}
                        </th>
                        <td>
                            @foreach($actionPlan->users as $key => $user)
                                <span class="label label-info">{{ $user->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.actionPlan.fields.updated_at') }}
                        </th>
                        <td>
                            {{ $actionPlan->updated_at }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.action-plans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection