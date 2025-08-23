<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class BillController extends Controller
{
    public function index()
    {
        $q = DB::table('payments');

        if (Schema::hasColumn('payments', 'booking_id')) {
            $q->leftJoin('bookings', 'bookings.id', '=', 'payments.booking_id')
              ->leftJoin('users', 'users.id', '=', 'bookings.user_id')
              ->select([
                  'payments.id as payment_id',
                  'users.name as customer_name',
                  'users.email',
                  'bookings.id as booking_id',
                  'payments.amount',
                  'payments.status',
                  'payments.created_at',
              ]);
        } elseif (Schema::hasColumn('payments', 'user_id')) {
            $q->leftJoin('users', 'users.id', '=', 'payments.user_id')
              ->select([
                  'payments.id as payment_id',
                  'users.name as customer_name',
                  'users.email',
                  DB::raw('NULL::bigint as booking_id'),
                  'payments.amount',
                  'payments.status',
                  'payments.created_at',
              ]);
        } else {
            $q->select([
                'payments.id as payment_id',
                DB::raw('NULL::text as customer_name'),
                DB::raw('NULL::text as email'),
                DB::raw('NULL::bigint as booking_id'),
                'payments.amount',
                'payments.status',
                'payments.created_at',
            ]);
        }

        $rows = $q->orderByDesc('payments.created_at')->paginate(20);

        return view('admin.bills.index', ['rows' => $rows]);
    }
}
