<?php

namespace App\Http\Controllers\SRA;

use App\Http\Controllers\Controller;
use App\Models\Enrollee;
use Illuminate\Http\Request;
use App\Models\TuitionFee;
use App\User;
use Auth;
use PDF;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [];
        $data['student'] = Auth::user();
        $grade_level = $data['student']->grade_level;
        $data['grade_level'] = TuitionFee::firstWhere('id', '=', $grade_level);

        // var_dump($data['grade_level']->getTuitionDiscount());

        // convert string to int
        $data['convert_tuition'] = floatval(str_replace(',', '', $data['grade_level']->tuition_fee));
        $data['convert_misc'] = floatval(str_replace(',', '', $data['grade_level']->misc_fee));
        $data['convert_others'] = floatval(str_replace(',', '', $data['grade_level']->others_fee));
        $data['convert_total'] = floatval(str_replace(',', '', $data['grade_level']->total_due));

        // var_dump($data['convert_total']);

        // get school year
        $curr_year = date('Y');
        $next_year = date('Y') + 1;
        $data['school_year'] = $curr_year . ' - ' . $next_year;

        return view('SRA.enrollment.enroll', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $student = Auth::user();
        $data['student_id'] = $student->id;
        $grade = $student->grade_level;
        $tuition = TuitionFee::firstWhere('id', '=', $grade);

        // get school year
        $curr_year = date('Y');
        $next_year = date('Y') + 1;
        $data['school_year'] = $curr_year . ' - ' . $next_year;

        $data['terms_of_payment'] = $request->input('mode_of_payment');
        $data['payment_option'] = $request->input('installment_opt');
        $data['tuition_total'] = $tuition->total_due;

        $opt = $request->input('installment_opt');
        $data['paid_upon_enrollment'] = $tuition->$opt;
        $data['remaining_balance'] = floatval(str_replace(',', '', $tuition->total_due)) - floatval(str_replace(',', '', $data['paid_upon_enrollment']));

        // compute for installment balance
        if ($data['terms_of_payment'] == "full") {
            $data['installment_amount'] = $tuition->getTuitionDiscount();
        } else if ($data['terms_of_payment'] == "semestral") {
            $data['installment_amount'] = $tuition->getSemestralBal($request->input('installment_opt'));
        } else if ($data['terms_of_payment'] == "quarterly") {
            $data['installment_amount'] = $tuition->getQuarterlyBal($request->input('installment_opt'));
        } else if ($data['terms_of_payment'] == "monthly") {
            $data['installment_amount'] = $tuition->getMonthlyBal($request->input('installment_opt'));
        }

        // agree to terms and agreement
        $data['agree_to_terms'] = $request->input('agree_terms');

        Enrollee::create($data);

        return redirect()->route('enroll.show', ['enroll' => $data['student_id']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data = [];
        $data['student'] = Auth::user();
        $s_id = Auth::user()->id;
        $grade = $data['student']->grade_level;
        $data['grade_info'] = TuitionFee::firstWhere('id', '=', $grade);

        // Enroll Details
        $data['enrollment_info'] = Enrollee::firstWhere('student_id', '=', $s_id);
        $data['mode_of_payment'] = $data['enrollment_info']->terms_of_payment;

        // convert string to int
        $data['convert_tuition'] = floatval(str_replace(',', '', $data['grade_info']->tuition_fee));
        $data['convert_misc'] = floatval(str_replace(',', '', $data['grade_info']->misc_fee));
        $data['convert_others'] = floatval(str_replace(',', '', $data['grade_info']->others_fee));
        $data['convert_total'] = floatval(str_replace(',', '', $data['grade_info']->total_due));

        // get school year
        $curr_year = date('Y');
        $next_year = date('Y') + 1;
        $data['school_year'] = $curr_year . ' - ' . $next_year;

        return view('SRA.enrollment.show', $data);
    }

    /**
     *  Generate enrollment information pdf
     * 
     * 
     */

    public function generatePdf()
    {
        // get school year
        $curr_year = date('Y');
        $next_year = date('Y') + 1;
        $data['school_year'] = $curr_year . ' - ' . $next_year;
        $data['today'] = date("Y-m-d");

        // get student info
        $data['student'] = Auth::user();
        $s_id = Auth::user()->id;
        $grade = $data['student']->grade_level;
        $data['grade_info'] = TuitionFee::firstWhere('id', '=', $grade);
        $data['enrollment'] = Enrollee::firstWhere('student_id', '=', $s_id);

        $data['convert_tuition'] = floatval(str_replace(',', '', $data['grade_info']->tuition_fee));
        $data['convert_misc'] = floatval(str_replace(',', '', $data['grade_info']->misc_fee));
        $data['convert_others'] = floatval(str_replace(',', '', $data['grade_info']->others_fee));
        $data['convert_total'] = floatval(str_replace(',', '', $data['grade_info']->total_due));
        $data['upon_enrollment'] = floatval(str_replace(',', '', $data['enrollment']->paid_upon_enrollment));
        $data['installment_amt'] = floatval(str_replace(',', '', $data['enrollment']->installment_amount));

        $pdf = PDF::loadView('SRA.enrollment.enroll_pdf', $data);

        return $pdf->stream('invoice.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
