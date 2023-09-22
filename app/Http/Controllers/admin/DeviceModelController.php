<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Constants\Messages;
use App\Models\DeviceModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeviceModelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.device_model.index', [
            'device_models' => DeviceModel::with('brand')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.device_model.create', [
            'brands' => Brand::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => ['required'],
            'name' => ['required', 'unique:device_models,name'],
        ]);

        $data = [
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ];

        $is_created = DeviceModel::create($data);

        $is_created ? $message = ['success' => 'Model' . Messages::ADD_SUCCESS] : $message = ['failure' => 'Model' . Messages::ADD_FAILURE];

        return back()->with($message);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeviceModel $device_model)
    {
        return view('admin.device_model.edit', [
            'brands' => Brand::all(),
            'device_model' => $device_model,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeviceModel $device_model)
    {
        $request->validate([
            'brand_id' => ['required'],
            'name' => ['required', 'unique:device_models,name,' . $device_model->id . ',id'],
        ]);

        $data = [
            'brand_id' => $request->brand_id,
            'name' => $request->name,
        ];

        $is_updated = $device_model->update($data);

        $is_updated ? $message = ['success' => 'Model' . Messages::EDIT_SUCCESS] : $message = ['failure' => 'Model' . Messages::EDIT_FAILURE];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeviceModel $device_model)
    {
        $is_deleted = $device_model->delete();

        $is_deleted ? $message = ['success' => 'Model' . Messages::DELETE_SUCCESS] : $message = ['failure' => 'Model' . Messages::DELETE_FAILURE];

        return back()->with($message);
    }
}
