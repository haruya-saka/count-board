@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mt-3 mb-3 login-title" align="center">新規登録</h3>

            <hr>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">ユーザー名</label>
                    <input type="name" id="name" name="name" class="form-control user-name-input" autofocus required>
                </div>
                <div class="form-group">
                    <label for="mail">メールアドレス</label>
                    <input type="email" id="email" name="email" class="form-control register-input" autocomplete="email" required>
                </div>

                <div class="form-group">
                    <label for="password" class="mt-3">パスワード</label>
                    <input type="password" id="password" name="password"class="form-control register-input" required>
                </div>

                <div class="form-group">
                    <label for="password-confirm" class="mt-3">パスワード（確認用）</label>
                    <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password') is-invalid @enderror register-input" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="mt-3 btn register-btn w-100">
                        {{ __('Register') }}
                    </button>
                </div>

                <hr>

                <div class="form-group">
                    <button type="button" class="mt-3 btn login-btn w-100" onclick="location.href='{{ route('login') }}'">
                        ログイン
                    </button>
                </div>
            </form>



        </div>
    </div>
</div>
@endsection
