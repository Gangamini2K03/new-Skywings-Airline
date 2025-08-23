<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->input('q', ''));

        $users = User::query()
            ->when($q, function ($query) use ($q) {
                $query->where(function ($qq) use ($q) {
                    $qq->where('name', 'ilike', "%{$q}%")
                       ->orWhere('email', 'ilike', "%{$q}%");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(15)
            ->withQueryString();

        return view('admin.users.index', compact('users', 'q'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        $bookingsOrderCol = Schema::hasColumn('bookings', 'booked_at') ? 'booked_at' : 'created_at';
        $bookings = DB::table('bookings')
            ->where('user_id', $user->id)
            ->orderByDesc($bookingsOrderCol)
            ->paginate(10, ['*'], 'bookings');

        // payments view can be blank for now; focus is the route existing
        $payments = DB::table('payments')->orderByDesc('created_at')->paginate(10, ['*'], 'payments');

        return view('admin.users.show', compact('user', 'bookings', 'payments'));
    }
}
