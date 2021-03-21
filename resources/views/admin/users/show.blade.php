@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email_verified_at') }}
                        </th>
                        <td>
                            {{ $user->email_verified_at }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.roles') }}
                        </th>
                        <td>
                            @foreach($user->roles as $key => $roles)
                                <span class="label label-info">{{ $roles->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.users.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#user_goals" role="tab" data-toggle="tab">
                {{ trans('cruds.goal.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_projects" role="tab" data-toggle="tab">
                {{ trans('cruds.project.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_initiatives" role="tab" data-toggle="tab">
                {{ trans('cruds.initiative.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#user_action_plans" role="tab" data-toggle="tab">
                {{ trans('cruds.actionPlan.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="user_goals">
            @includeIf('admin.users.relationships.userGoals', ['goals' => $user->userGoals])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_projects">
            @includeIf('admin.users.relationships.userProjects', ['projects' => $user->userProjects])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_initiatives">
            @includeIf('admin.users.relationships.userInitiatives', ['initiatives' => $user->userInitiatives])
        </div>
        <div class="tab-pane" role="tabpanel" id="user_action_plans">
            @includeIf('admin.users.relationships.userActionPlans', ['actionPlans' => $user->userActionPlans])
        </div>
    </div>
</div>

@endsection