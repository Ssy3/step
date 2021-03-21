<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Teams
    Route::apiResource('teams', 'TeamApiController');

    // Strategic Plans
    Route::post('strategic-plans/media', 'StrategicPlansApiController@storeMedia')->name('strategic-plans.storeMedia');
    Route::apiResource('strategic-plans', 'StrategicPlansApiController');

    // Goals
    Route::post('goals/media', 'GoalsApiController@storeMedia')->name('goals.storeMedia');
    Route::apiResource('goals', 'GoalsApiController');

    // Projects
    Route::post('projects/media', 'ProjectsApiController@storeMedia')->name('projects.storeMedia');
    Route::apiResource('projects', 'ProjectsApiController');

    // Initiatives
    Route::post('initiatives/media', 'InitiativesApiController@storeMedia')->name('initiatives.storeMedia');
    Route::apiResource('initiatives', 'InitiativesApiController');

    // Action Plans
    Route::post('action-plans/media', 'ActionPlansApiController@storeMedia')->name('action-plans.storeMedia');
    Route::apiResource('action-plans', 'ActionPlansApiController');

    // Risks
    Route::post('risks/media', 'RisksApiController@storeMedia')->name('risks.storeMedia');
    Route::apiResource('risks', 'RisksApiController');
});
