<?php

declare(strict_types=1);

return [
    'auth' => [
        'sign_in' => [
            'title' => 'サインイン',
            'remember_me' => 'ブラウザに記憶する',
            'sign_in' => 'サインイン',
            'not_sign_up' => 'ユーザー登録していない方は',
            'sign_up' => 'サインアップ',
            'forgot_password' => 'パスワードを忘れた方は',
            'send_password_resets' => 'パスワードリセット',
        ],
    ],
    'components' => [
        'header' => [
            'app_name' => 'Todo App',
            'undone' => '未完了',
            'done' => '完了',
            'sign_in' => 'サインイン',
            'sign_up' => 'サインアップ',
            'sign_out' => 'サインアウト',
        ],
    ],
    'profile' => [
        'show' => [
            'title' => 'プロフィール編集',
            'name' => 'ユーザー名',
            'email' => 'メールアドレス',
            'update' => '更新する',
        ],
    ],
    'tasks' => [
        '_create_form' => [
            'title' => '新しいタスク',
            'due_date' => '期日',
            'store' => '登録する',
        ],
        'index' => [
            'title' => 'タスク一覧',
            'task_list' => [
                'task_name' => 'タスク名',
                'status' => 'ステータス',
                'due_date' => '期日',
                'postpone_count' => '延期回数',
                'actions' => '',
            ],
            'status' => [
                'undone' => '未完了',
                'done' => '完了',
            ],
            'actions' => [
                'add_task' => 'タスク追加',
                'postpone' => '延期',
                'complete' => '完了',
                'edit' => '編集',
            ],
            'enter_new_task' => '新しいタスクを入力してください',
            'empty' => 'タスクデータがありません。',
        ],
        'edit' => [
            'title' => 'タスク編集',
            'name' => 'タスク名',
            'update' => '更新する',
        ],
    ],
    'welcome' => [
        'title' => 'Task App',
        'message' => 'Welcome to Task App',
        'sign_in' => 'サインイン',
        'sign_up' => 'サインアップ',
    ],
];
