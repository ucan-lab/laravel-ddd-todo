@extends('layouts.email')

@section('main')

    下記のURLからパスワードリセット


Reset Password Notification
You are receiving this email because we received a password reset request for your account.
Reset Password
This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.'.config('auth.defaults.passwords').'.expire')]))
If you did not request a password reset, no further action is required.

@endsection
