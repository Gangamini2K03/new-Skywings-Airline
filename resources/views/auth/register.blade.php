@extends('layouts.app')

@section('content')
<div class="auth-wrapper" style="max-width:800px;margin:3rem auto;padding:0 1rem">
  <div class="auth-card" style="background:#fff;border-radius:18px;box-shadow:0 10px 30px rgba(0,0,0,.08);padding:2rem">
    <h2 style="font-size:1.4rem;font-weight:800;margin:0 0 1rem">Create an account</h2>

    @if ($errors->any())
      <div style="background:#fff4f4;border:1px solid #fbcaca;color:#b91c1c;border-radius:12px;padding:.75rem 1rem;margin-bottom:1rem">
        <ul style="margin:0;padding-left:1rem">
          @foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
      </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
      @csrf
      <div class="form-row"><label class="label">Name</label>
        <input class="input" name="name" value="{{ old('name') }}" required>
      </div>
      <div class="form-row"><label class="label">Email</label>
        <input class="input" type="email" name="email" value="{{ old('email') }}" required>
      </div>
      <div class="form-row"><label class="label">Password</label>
        <input class="input" type="password" name="password" required>
      </div>
      <div class="form-row"><label class="label">Confirm Password</label>
        <input class="input" type="password" name="password_confirmation" required>
      </div>
      <button class="btn-primary" style="background:#ff7a00;border:none;color:#fff;padding:.9rem 1.2rem;border-radius:12px;font-weight:700;width:100%">
        Create Account
      </button>
    </form>
  </div>
</div>
@endsection
