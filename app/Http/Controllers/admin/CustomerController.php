<?php

namespace App\Http\Controllers\admin;

use App\Models\Customer;
use App\Constants\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class CustomerController extends Controller
{
    private $days = [
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday',
        'Sunday',
    ];
    private $channels = [
        'IR',
        'OR',
        'WS',
        
    ];
    private $program = [
        'ST',
        'SO',
        'ST+SO',
        'ST+SO+VBA',
        'ST+MKT',
        'SO+MKT',
        'ST+SO+MKT',
        'ST+SO+MKT+VBA',
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.customer.index', [
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create', [
            'days' => $this->days,
            'channels' => $this->channels,
            'program' => $this->program,
            'users' => User::where('type', '!=', 'Admin')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => ['required'],
            'store_name' => ['required'],
            'program' => ['required'],
            'channel' => ['required'],
            'region' => ['required'],
            'city' => ['required'],
            'cluster' => ['required'],
            'store_code' => ['required'],
            'day' => ['required'],
        ]);

        $data = [
            'user_id' => $request->user,
            'store_name' => $request->store_name,
            'program' => $request->program,
            'channel' => $request->channel,
            'region' => $request->region,
            'city' => $request->city,
            'cluster' => $request->cluster,
            'store_code' => $request->store_code,
            'day' => $request->day,
        ];

        $is_created = Customer::create($data);
        $is_created ? $message = ['success' => 'Customer' . Messages::ADD_SUCCESS] : $message = ['failure' => 'Customer' . Messages::ADD_FAILURE];
        return back()->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('admin.customer.edit', [
            'days' => $this->days,
            'channels' => $this->channels,
            'program' => $this->program,
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'store_name' => ['required'],
            'store_code' => ['required'],
            'channel' => ['required'],
            'region' => ['required'],
            'city' => ['required'],
            'cluster' => ['required'],
            'program' => ['required'],
            'day' => ['required'],
        ]);

        $data = [
            'store_name' => $request->store_name,
            'store_code' => $request->store_code,
            'channel' => $request->channel,           
            'region' => $request->region,
            'city' => $request->city,
            'cluster' => $request->cluster,
            'program' => $request->program,
            'day' => $request->day,
        ];

        $is_updated = $customer->update($data);

        $is_updated ? $message = ['success' => 'Customer' . Messages::EDIT_SUCCESS] : $message = ['failure' => 'Customer' . Messages::EDIT_FAILURE];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $is_deleted = $customer->delete();

        $is_deleted ? $message = ['success' => 'Customer' . Messages::DELETE_SUCCESS] : $message = ['failure' => 'Customer' . Messages::DELETE_FAILURE];

        return back()->with($message);
    }
}
