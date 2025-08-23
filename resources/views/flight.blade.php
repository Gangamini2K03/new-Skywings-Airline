@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-4">Book a Flight</h1>

  @if(session('success'))
    <div class="p-3 mb-4 bg-green-100 border border-green-300 rounded">
      {{ session('success') }}
    </div>
  @endif

  {{-- Your flight form goes here --}}
  <p>Flight page is ready. Add your form or content here.</p>
</div>
@endsection
