<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuitionFee;

class TuitionFeeController extends Controller
{
    /**
     *
     * 
     *  Admin Restriction
     */
    // public function __construct()
    // {
    //     $this->middleware('guest:admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [];
        $data['tuition_details'] = TuitionFee::all();

        return view('Admin.tuition.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.tuition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [];

        $data['grade_level'] = $request->input('grade');
        $data['total_due'] = number_format($request->input('total_fee'), 2);
        $data['tuition_fee'] = number_format($request->input('tuition_fee'), 2);
        $data['misc_fee'] = number_format($request->input('misc_fee'), 2);
        $data['others_fee'] = number_format($request->input('others_fee'), 2);
        $data['semestral_1'] = number_format($request->input('semestral_1'), 2);
        $data['semestral_2'] = number_format($request->input('semestral_2'), 2);
        $data['quarterly_1'] = number_format($request->input('quarterly_1'), 2);
        $data['quarterly_2'] = number_format($request->input('quarterly_2'), 2);
        $data['quarterly_3'] = number_format($request->input('quarterly_3'), 2);
        $data['quarterly_4'] = number_format($request->input('quarterly_4'), 2);
        $data['monthly_1'] = number_format($request->input('monthly_1'), 2);
        $data['monthly_2'] = number_format($request->input('monthly_2'), 2);
        $data['monthly_3'] = number_format($request->input('monthly_3'), 2);
        $data['monthly_4'] = number_format($request->input('monthly_4'), 2);


        TuitionFee::create($data);

        return redirect('/admin-tuition/create')->with('status', 'Tuition details successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        $data['tuition_detail'] = TuitionFee::find($id);

        return view('Admin.tuition.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tuition_details = TuitionFee::find($id);

        $data['grade_level'] = empty($request->input('grade')) ? $tuition_details->grade_level : $request->input('grade');
        $data['total_due'] = empty($request->input('total_fee')) ? $tuition_details->total_due : number_format($request->input('total_fee'), 2);
        $data['tuition_fee'] = empty($request->input('tuition_fee')) ? $tuition_details->tuition_fee : number_format($request->input('tuition_fee'), 2);
        $data['misc_fee'] = empty($request->input('misc_fee')) ? $tuition_details->misc_fee : number_format($request->input('misc_fee'), 2);
        $data['others_fee'] = empty($request->input('others_fee')) ? $tuition_details->others_fee : number_format($request->input('others_fee'), 2);

        // Payment Options
        $data['semestral_1'] = empty($request->input('semestral_1')) ? $tuition_details->semestral_1 : number_format($request->input('semestral_1'), 2);
        $data['semestral_2'] = empty($request->input('semestral_2')) ? $tuition_details->semestral_2 : number_format($request->input('semestral_2'), 2);
        // Quarterly
        $data['quarterly_1'] = empty($request->input('quarterly_1')) ? $tuition_details->quarterly_1 : number_format($request->input('quarterly_1'), 2);
        $data['quarterly_2'] = empty($request->input('quarterly_2')) ? $tuition_details->quarterly_2 : number_format($request->input('quarterly_2'), 2);
        $data['quarterly_3'] = empty($request->input('quarterly_3')) ? $tuition_details->quarterly_3 : number_format($request->input('quarterly_3'), 2);
        $data['quarterly_4'] = empty($request->input('quarterly_4')) ? $tuition_details->quarterly_2 : number_format($request->input('quarterly_4'), 2);
        // Monthly
        $data['monthly_1'] = empty($request->input('monthly_1')) ? $tuition_details->monthly_1 : number_format($request->input('monthly_1'), 2);
        $data['monthly_2'] = empty($request->input('monthly_2')) ? $tuition_details->monthly_2 : number_format($request->input('monthly_2'), 2);
        $data['monthly_3'] = empty($request->input('monthly_3')) ? $tuition_details->monthly_3 : number_format($request->input('monthly_3'), 2);
        $data['monthly_4'] = empty($request->input('monthly_4')) ? $tuition_details->monthly_2 : number_format($request->input('monthly_4'), 2);

        $tuition_details->update($data);

        return redirect('/admin-tuition')->with('status', 'Tuition fee details successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tuition = TuitionFee::findOrFail($id);
        $tuition->delete();

        return redirect('/admin-tuition')->with('status', 'Tuition detail successfully deleted!');
    }
}
