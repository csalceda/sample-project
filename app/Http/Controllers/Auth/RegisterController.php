<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ENROLL;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'student_type' => 'required',
            'grade' => 'required',
            'lrn' => 'nullable | max:12',
            'lastname' => 'required | string | max:255',
            'firstname' => 'required | string | max:255',
            'middlename' => 'required | string | max:255',
            'street_address' => 'required | string | max:255',
            'barangay' => 'required | string | max:255',
            'city' => 'required | string | max:255',
            'birthday' => 'required | string | max:255',
            'birthplace' => 'string | max:255',
            'gender' => 'required',
            'nationality' => 'nullable | string | max:255',
            'religion' => 'nullable | string | max:255',
            'prev_school' => 'nullable | string | max:255',
            'prev_grade_level' => 'nullable | string | max:255',
            'prev_school_yr' => 'nullable | string | max:255',
            'prev_school_add' => 'nullable | string | max:255',
            'father' => 'nullable | string | max:255',
            'father_occupation' => 'nullable | string | max:255',
            'father_tel' => 'nullable | string | max:255',
            'father_cp' => 'nullable | string | max:255| required_with:father',
            'father_email' => 'nullable | string | email | max:255 | unique:users| required_with:father',
            'father_busadd' => 'nullable | string | max:255',
            'mother' => 'nullable | string | max:255',
            'mother_occupation' => 'nullable | string | max:255',
            'mother_tel' => 'nullable | string | max:255',
            'mother_cp' => 'nullable | string | max:255| required_with:mother',
            'mother_email' => 'nullable | string | email | max:255 | unique:users| required_with:mother',
            'mother_busadd' => 'nullable | string | max:255',
            'guardian' => 'nullable | string | max:255',
            'guardian_occupation' => 'nullable | string | max:255',
            'guardian_tel' => 'nullable | string | max:255',
            'guardian_cp' => 'nullable | string | max:255| required_with:guardian',
            'guardian_email' => 'nullable | string | email | max:255 | unique:users| required_with:guardian',
            'guardian_busadd' => 'nullable | string | max:255',
            // 'name' => ['required', 'string', 'max:255'],
            'email' => 'nullable | string | email | max:255 | unique:users',
            'password' => 'nullable | string | min:8 | confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['birth_cert'] = empty($data['birth_cert']) ? null : $data['birth_cert'];
        $data['form_138'] = empty($data['form_138']) ? null : $data['form_138'];
        $data['form_137'] = empty($data['form_137']) ? null : $data['form_137'];
        $data['good_moral'] = empty($data['good_moral']) ? null : $data['good_moral'];
        $data['id_pic'] = empty($data['id_pic']) ? null : $data['id_pic'];
        $data['other_req'] = empty($data['other_req']) ? null : $data['other_req'];;

        $requirements = json_encode(['birth_cert' => $data['birth_cert'], 'form_138' => $data['form_138'], 'form_137' => $data['form_137'], 'good_moral' => $data['good_moral'], 'id_pic' => $data['id_pic'], 'others' => $data['other_req']]);

        return User::create([
            'student_type' => $data['student_type'],
            'grade_level' => $data['grade'],
            'lrn' => $data['lrn'],
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'middlename' => $data['middlename'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'requirements' => $requirements,
            'street_address' => $data['street_address'],
            'barangay' => $data['barangay'],
            'city' => $data['city'],
            'birthday' => $data['birthday'],
            // 'age' => $data['age'],
            'birthplace' => $data['birthplace'],
            'gender' => $data['gender'],
            'nationality' => $data['nationality'],
            'religion' => $data['religion'],
            'previous_school' => $data['prev_school'],
            'previous_grade_level' => $data['prev_grade_level'],
            'previous_school_year' => $data['prev_school_yr'],
            'previous_school_address' => $data['prev_school_add'],
            'father' => $data['father'],
            'father_occupation' => $data['father_occupation'],
            'father_tel' => $data['father_tel'],
            'father_cellphone' => $data['father_cp'],
            'father_email' => $data['father_email'],
            'father_occupation_address' => $data['father_busadd'],
            'mother' => $data['mother'],
            'mother_occupation' => $data['mother_occupation'],
            'mother_tel' => $data['mother_tel'],
            'mother_cellphone' => $data['mother_cp'],
            'mother_email' => $data['mother_email'],
            'mother_occupation_address' => $data['mother_busadd'],
            'guardian' => $data['guardian'],
            'guardian_occupation' => $data['guardian_occupation'],
            'guardian_tel' => $data['guardian_tel'],
            'guardian_cellphone' => $data['guardian_cp'],
            'guardian_email' => $data['guardian_email'],
            'guardian_occupation_address' => $data['guardian_busadd'],
        ]);
    }
}
