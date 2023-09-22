<?php

namespace App\Http\Controllers\admin;

use App\Models\Brand;
use App\Models\Survey;
use App\Models\Customer;
use App\Constants\Messages;
use App\Models\DeviceModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyController extends Controller
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.survey.index', [
            'surveys' => Survey::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.survey.create', [
            'days' => $this->days,
            'brands' => Brand::all(),
            'customers' => Customer::all(),
            'models' => DeviceModel::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'day' => ['required'],
            'customer' => ['required'],
            'brand' => ['required'],
            'model' => ['required'],
            'signboard' => ['required'],
            'showcase' => ['required'],
            'ldu_table' => ['required'],
            'ldu_qty' => ['required'],
            'promoter' => ['required'],
            'cabinet' => ['required'],
            'promotion_stand' => ['required'],
            'foc_soh' => ['required'],
            'date_from' => ['required'],
            'date_till' => ['required'],
            'sell_through' => ['required'],
            'sell_out' => ['required'],
            'stock_on_hand' => ['required'],
            'feedback' => ['required'],
        ]);

        $data = [
            'customer_id' => $request->customer,
            'brand_id' => $request->brand,
            'device_model_id' => $request->model,
            'day' => $request->day,
            'signboard' => $request->signboard,
            'showcase' => $request->showcase,
            'ldu_table' => $request->ldu_table,
            'promoter' => $request->promoter,
            'cabinet' => $request->cabinet,
            'promotion_stand' => $request->promotion_stand,
            'ldu_qty' => $request->ldu_qty,
            'foc_soh' => $request->foc_soh,
            'date_till' => $request->date_till,
            'date_from' => $request->date_from,
            'sell_through' => $request->sell_through,
            'sell_out' => $request->sell_out,
            'stock_on_hand' => $request->stock_on_hand,
            'feedback' => $request->feedback,
        ];

        $is_created = Survey::create($data);

        $is_created ? $message = ['success' => 'Survey' . Messages::ADD_SUCCESS] : $message = ['failure' => 'Survey' . Messages::ADD_FAILURE];

        return back()->with($message);
    }

    /**
     * Display the specified resource.
     */
    public function show(Survey $survey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survey $survey)
    {
        return view('admin.survey.edit', [
            'days' => $this->days,
            'brands' => Brand::all(),
            'customers' => Customer::all(),
            'models' => DeviceModel::all(),
            'survey' => $survey,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Survey $survey)
    {
        $request->validate([
            'day' => ['required'],
            'customer' => ['required'],
            'brand' => ['required'],
            'model' => ['required'],
            'signboard' => ['required'],
            'showcase' => ['required'],
            'ldu_table' => ['required'],
            'ldu_qty' => ['required'],
            'promoter' => ['required'],
            'cabinet' => ['required'],
            'promotion_stand' => ['required'],
            'foc_soh' => ['required'],
            'date_from' => ['required'],
            'date_till' => ['required'],
            'sell_through' => ['required'],
            'sell_out' => ['required'],
            'stock_on_hand' => ['required'],
            'feedback' => ['required'],
        ]);

        $data = [
            'customer_id' => $request->customer,
            'brand_id' => $request->brand,
            'device_model_id' => $request->model,
            'day' => $request->day,
            'signboard' => $request->signboard,
            'showcase' => $request->showcase,
            'ldu_table' => $request->ldu_table,
            'promoter' => $request->promoter,
            'cabinet' => $request->cabinet,
            'promotion_stand' => $request->promotion_stand,
            'ldu_qty' => $request->ldu_qty,
            'foc_soh' => $request->foc_soh,
            'date_till' => $request->date_till,
            'date_from' => $request->date_from,
            'sell_through' => $request->sell_through,
            'sell_out' => $request->sell_out,
            'stock_on_hand' => $request->stock_on_hand,
            'feedback' => $request->feedback,
        ];

        $is_updated = $survey->update($data);

        $is_updated ? $message = ['success' => 'Survey' . Messages::EDIT_SUCCESS] : $message = ['failure' => 'Survey' . Messages::EDIT_FAILURE];

        return back()->with($message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survey $survey)
    {
        $is_deleted = $survey->delete();

        $is_deleted ? $message = ['success' => 'Survey' . Messages::DELETE_SUCCESS] : $message = ['failure' => 'Survey' . Messages::DELETE_FAILURE];

        return back()->with($message);
    }
}
