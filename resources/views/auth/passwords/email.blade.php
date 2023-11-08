@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="mt-3 mb-3 pass-resetting align="center">パスワード再設定</h3>

            <p>
                登録時に使用したメールアドレスを入力してください。<br>
                パスワード再発行用のメールをお送りします。  
            </p>

            <hr>

            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif


            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="name@example.com">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>メールアドレスが正しくない可能性があります。</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="mt-3 btn submit-btn w-100">
                        送信
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection