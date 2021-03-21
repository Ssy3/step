<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => ' ',
            'name'                     => 'Name',
            'name_helper'              => ' ',
            'email'                    => 'Email',
            'email_helper'             => ' ',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => ' ',
            'password'                 => 'Password',
            'password_helper'          => ' ',
            'roles'                    => 'Roles',
            'roles_helper'             => ' ',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => ' ',
            'created_at'               => 'Created at',
            'created_at_helper'        => ' ',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => ' ',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => ' ',
            'team'                     => 'Team',
            'team_helper'              => ' ',
        ],
    ],
    'team'           => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated At',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted At',
            'deleted_at_helper' => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'owner'             => 'Owner',
            'owner_helper'      => ' ',
        ],
    ],
    'auditLog'       => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'tracking'       => [
        'title'          => 'Tracking',
        'title_singular' => 'Tracking',
    ],
    'strategicPlan'  => [
        'title'          => 'Strategic Plans',
        'title_singular' => 'Strategic Plan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'team'               => 'Team',
            'team_helper'        => ' ',
        ],
    ],
    'goal'           => [
        'title'          => 'Goals',
        'title_singular' => 'Goal',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'description'           => 'Description',
            'description_helper'    => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'team'                  => 'Team',
            'team_helper'           => ' ',
            'user'                  => 'Assigned To',
            'user_helper'           => ' ',
            'strategic_plan'        => 'Strategic Plan',
            'strategic_plan_helper' => ' ',
        ],
    ],
    'project'        => [
        'title'          => 'Projects',
        'title_singular' => 'Project',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'goal'               => 'Belongs to Goal',
            'goal_helper'        => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'team'               => 'Team',
            'team_helper'        => ' ',
            'user'               => 'Assigned To',
            'user_helper'        => ' ',
        ],
    ],
    'initiative'     => [
        'title'          => 'Initiatives',
        'title_singular' => 'Initiative',
        'fields'         => [
            'id'                             => 'ID',
            'id_helper'                      => ' ',
            'title'                          => 'Title',
            'title_helper'                   => ' ',
            'description'                    => 'Description',
            'description_helper'             => ' ',
            'project'                        => 'Belongs to Project',
            'project_helper'                 => ' ',
            'created_at'                     => 'Created at',
            'created_at_helper'              => ' ',
            'kpi_description'                => 'KPI Description',
            'kpi_description_helper'         => ' ',
            'kpi_previous'                   => 'KPI Previous',
            'kpi_previous_helper'            => ' ',
            'kpi_previous_date'              => 'KPI Previous Date',
            'kpi_previous_date_helper'       => ' ',
            'kpi_current'                    => 'KPI Current',
            'kpi_current_helper'             => ' ',
            'kpi_current_date'               => 'KPI Current Date',
            'kpi_current_date_helper'        => ' ',
            'kpi_target'                     => 'KPI Target',
            'kpi_target_helper'              => ' ',
            'kpi_target_date'                => 'KPI Target Date',
            'kpi_target_date_helper'         => ' ',
            'status'                         => 'Status',
            'status_helper'                  => ' ',
            'why_if_not_accomplished'        => 'Why If Not Accomplished',
            'why_if_not_accomplished_helper' => ' ',
            'dod_comment'                    => 'DOD Comment',
            'dod_comment_helper'             => ' ',
            'attachments'                    => 'Attachments',
            'attachments_helper'             => ' ',
            'updated_at'                     => 'Updated at',
            'updated_at_helper'              => ' ',
            'deleted_at'                     => 'Deleted at',
            'deleted_at_helper'              => ' ',
            'team'                           => 'Team',
            'team_helper'                    => ' ',
            'user'                           => 'Assigned To',
            'user_helper'                    => ' ',
        ],
    ],
    'actionPlan'     => [
        'title'          => 'Action Plans',
        'title_singular' => 'Action Plan',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'updates'            => 'Updates',
            'updates_helper'     => ' ',
            'initiative'         => 'Belongs to Initiative',
            'initiative_helper'  => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'risks'              => 'Risks',
            'risks_helper'       => ' ',
            'resources'          => 'Resources',
            'resources_helper'   => ' ',
            'start'              => 'Start',
            'start_helper'       => ' ',
            'end'                => 'End',
            'end_helper'         => ' ',
            'approval'           => 'Approval',
            'approval_helper'    => ' ',
            'attachments'        => 'Attachments',
            'attachments_helper' => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'team'               => 'Team',
            'team_helper'        => ' ',
            'user'               => 'Assigned To',
            'user_helper'        => ' ',
        ],
    ],
    'risk'           => [
        'title'          => 'Risks',
        'title_singular' => 'Risk',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'probability'           => 'Probability',
            'probability_helper'    => '(1,3,5) Where 1 is the lowest and 5 is the highest',
            'impact'                => 'Impact',
            'impact_helper'         => '(1,3,5) Where 1 is the lowest and 5 is the highest',
            'gross'                 => 'Gross',
            'gross_helper'          => '(Risk probability * risk impact )',
            'action'                => 'Action',
            'action_helper'         => ' ',
            'action_details'        => 'Action Details',
            'action_details_helper' => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'team'                  => 'Team',
            'team_helper'           => ' ',
            'initiative'            => 'Initiative',
            'initiative_helper'     => ' ',
        ],
    ],
];
