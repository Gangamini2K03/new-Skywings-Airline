<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BillingController extends Controller
{
    /**
     * Main "My Bills" page for the signed-in user.
     */
    public function index()
    {
        $user = auth()->user();
        if (! $user) {
            return redirect()->route('login');
        }

        // Use correct NULL cast per database driver
        $nullBooking = DB::connection()->getDriverName() === 'pgsql'
            ? DB::raw('NULL::bigint as booking_id')
            : DB::raw('NULL as booking_id');

        // Base query
        $q = DB::table('payments');

        // Build a query that adapts to your schema
        if (
            Schema::hasColumn('payments', 'booking_id')
            && Schema::hasTable('bookings')
            && Schema::hasColumn('bookings', 'user_id')
        ) {
            // payments -> bookings -> users(user_id)
            $q->leftJoin('bookings', 'bookings.id', '=', 'payments.booking_id')
              ->where('bookings.user_id', $user->id)
              ->select('payments.*', 'bookings.id as booking_id');
        } elseif (Schema::hasColumn('payments', 'user_id')) {
            // payments has user_id directly
            $q->where('payments.user_id', $user->id)
              ->select('payments.*', $nullBooking);
        } else {
            // Fallback: show payments without linking to a booking
            $q->select('payments.*', $nullBooking);
        }

        $rows = $q->orderByDesc('payments.created_at')->paginate(15);

        return view('billing.index', compact('rows'));
    }

    /**
     * Backwards-compatible alias some routes/views might call.
     * (So /billing mapped to myBilling() won’t crash.)
     */
    public function myBilling()
    {
        return $this->index();
    }
}
