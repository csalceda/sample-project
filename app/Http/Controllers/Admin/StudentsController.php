<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TuitionFee;
use App\User;

class StudentsController extends Controller
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
        $data['students'] = User::all();

        return view('Admin.student.index', $data);
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
        //
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
        $data['student'] = User::firstWhere('id', '=', $id);
        $grade = $data['student']->grade_level;
        $data['grade'] = TuitionFee::find($grade);
        $data['credentials'] = json_decode($data['student']->requirements);

        // dd(date("F j, Y", strtotime($data['student']->birthday)));

        return view('Admin.student.show', $data);
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
        $data['student'] = User::find($id)->first();
        $data['tuition_fees'] = TuitionFee::all();

        return view('Admin.student.edit', $data);
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
        $student = User::find($id);

        $data['student_type'] = empty($request->input('student_type')) ? $student->student_type : $request->input('student_type');
        $data['grade_level'] = empty($request->input('grade_level')) ? $student->grade_level : $request->input('grade_level');
        $data['lrn'] = empty($request->input('lrn')) ? $student->lrn : $request->input('lrn');
        $data['firstname'] = empty($request->input('firstname')) ? $student->firstname : $request->input('firstname');
        $data['middlename'] = empty($request->input('middlename')) ? $student->middlename : $request->input('middlename');
        $data['lastname'] = empty($request->input('lastname')) ? $student->lastname : $request->input('lastname');
        $data['street_address'] = empty($request->input('street_address')) ? $student->street_address : $request->input('street_address');
        $data['barangay'] = empty($request->input('barangay')) ? $student->barangay : $request->input('barangay');
        $data['city'] = empty($request->input('city')) ? $student->city : $request->input('city');
        $data['birthplace'] = empty($request->input('birthplace')) ? $student->birthplace : $request->input('birthplace');
        $data['birthday'] = empty($request->input('birthday')) ? $student->birthday : $request->input('birthday');
        $data['gender'] = empty($request->input('gender')) ? $student->gender : $request->input('gender');
        $data['nationality'] = empty($request->input('nationality')) ? $student->nationality : $request->input('nationality');
        $data['religion'] = empty($request->input('religion')) ? $student->religion : $request->input('religion');
        $data['previous_school'] = empty($request->input('prev_school')) ? $student->previous_school : $request->input('prev_school');
        $data['previous_grade_level'] = empty($request->input('prev_grade_level')) ? $student->previous_grade_level : $request->input('prev_grade_level');
        $data['previous_school_year'] = empty($request->input('prev_school_yr')) ? $student->previous_school_year : $request->input('prev_school_yr');
        $data['previous_school_address'] = empty($request->input('prev_school_add')) ? $student->previous_school_address : $request->input('prev_school_add');
        $data['father'] = empty($request->input('father')) ? $student->father : $request->input('father');
        $data['father_occupation'] = empty($request->input('father_occupation')) ? $student->father_occupation : $request->input('father_occupation');
        $data['father_tel'] = empty($request->input('father_tel')) ? $student->father_tel : $request->input('father_tel');
        $data['father_cellphone'] = empty($request->input('father_cp')) ? $student->father_cellphone : $request->input('father_cp');
        $data['father_tel'] = empty($request->input('father_tel')) ? $student->father_tel : $request->input('father_tel');
        $data['father_email'] = empty($request->input('father_email')) ? $student->father_email : $request->input('father_email');
        $data['father_occupation_address'] = empty($request->input('father_busadd')) ? $student->father_occupation_address : $request->input('father_busadd');
        $data['mother'] = empty($request->input('mother')) ? $student->mother : $request->input('mother');
        $data['mother_occupation'] = empty($request->input('mother_occupation')) ? $student->mother_occupation : $request->input('mother_occupation');
        $data['mother_tel'] = empty($request->input('mother_tel')) ? $student->mother_tel : $request->input('mother_tel');
        $data['mother_cellphone'] = empty($request->input('mother_cp')) ? $student->mother_cellphone : $request->input('mother_cp');
        $data['mother_tel'] = empty($request->input('mother_tel')) ? $student->mother_tel : $request->input('mother_tel');
        $data['mother_email'] = empty($request->input('mother_email')) ? $student->mother_email : $request->input('mother_email');
        $data['mother_occupation_address'] = empty($request->input('mother_busadd')) ? $student->mother_occupation_address : $request->input('mother_busadd');
        $data['guardian'] = empty($request->input('guardian')) ? $student->guardian : $request->input('guardian');
        $data['guardian_occupation'] = empty($request->input('guardian_occupation')) ? $student->guardian_occupation : $request->input('guardian_occupation');
        $data['guardian_tel'] = empty($request->input('guardian_tel')) ? $student->guardian_tel : $request->input('guardian_tel');
        $data['guardian_cellphone'] = empty($request->input('guardian_cp')) ? $student->guardian_cellphone : $request->input('guardian_cp');
        $data['guardian_tel'] = empty($request->input('guardian_tel')) ? $student->guardian_tel : $request->input('guardian_tel');
        $data['guardian_email'] = empty($request->input('guardian_email')) ? $student->guardian_email : $request->input('guardian_email');
        $data['guardian_occupation_address'] = empty($request->input('guardian_busadd')) ? $student->guardian_occupation_address : $request->input('guardian_busadd');

        $student->update($data);

        return redirect('/admin-students')->with('status', 'Student information successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = User::findOrFail($id);
        $student->delete();

        return redirect('/admin-students')->with('status', 'Student information successfully deleted!');
    }
}
