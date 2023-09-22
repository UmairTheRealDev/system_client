<?php

namespace App\Http\Controllers\admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DeviceModel;
use Illuminate\Support\Facades\Auth;

class DynamicController extends Controller
{
    public function fetch_customers()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        if (Auth::user()->type == "Admin") {
            $customers = Customer::where('day', '=', $data['day'])->get();
        } else {
            $id = Auth::user()->id;
            $customers = Customer::where([
                ['day', '=', $data['day']],
                ['user_id', '=', Auth::user()->id]
            ])->get();
        }

        if (count($customers) > 0) {
            $output = '<option value="" selected>Select a customer!</option>';
            foreach ($customers as $customer) {
                $output .= '<option value="' . $customer->id . '">' . $customer->store_name . '</option>';
            }
        } else {
            $output = '<option value="" selected>No customer found!</option>';
        }

        return json_encode($output);
    }

    public function fetch_models()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $models = DeviceModel::where('brand_id', '=', $data['brand'])->get();
        if (count($models) > 0) {
            $output = '<option value="" selected>Select a model!</option>';
            foreach ($models as $model) {
                $output .= '<option value="' . $model->id . '">' . $model->name . '</option>';
            }
        } else {
            $output = '<option value="" selected>No model found!</option>';
        }

        return json_encode($output);
    }
}
