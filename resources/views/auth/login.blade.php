@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mt-3 mb-3 login-title" text-align="center">ログイン</h3>

            <hr>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">メールアドレス</label>
                    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" autocomplete="email" required autofocus placeholder="name@example.com">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password" class="mt-3">パスワード</label>
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror login-input" name="password" required autocomplete="current-password" placeholder="password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>パスワードが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="form-check mt-1">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label check-label w-100" for="remember">
                            次回から自動的にログインする
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="mt-3 btn submit-btn w-100">
                        ログイン
                    </button>

                    <a class="btn btn-link mt-3 d-flex forgot-pass" href="{{ route('password.request') }}">
                        パスワードを忘れたら
                    </a>
                </div>
            </form>

            <hr>

            <div class="form-group">
                <button type="button"  class="mt-3 w-100 btn justify-content-center register-btn" onclick="location.href='{{ route('register') }}'">
                    新規登録
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
