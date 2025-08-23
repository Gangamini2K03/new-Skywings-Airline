@auth
  @if(auth()->user()->is_admin)
    <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
  @endif
@endauth
