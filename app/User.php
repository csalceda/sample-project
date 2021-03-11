<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_type', 'grade_level', 'lrn', 'lastname', 'firstname', 'middlename',
        'street_address', 'barangay', 'city', 'birthday', 'age', 'birthplace', 'gender',
        'nationality', 'religion', 'previous_school', 'previous_grade_level', 'previous_school_year',
        'previous_school_address', 'father', 'father_occupation', 'father_tel', 'father_cellphone', 'father_email',
        'father_occupation_address', 'mother', 'mother_occupation', 'mother_tel', 'mother_cellphone', 'mother_email',
        'mother_occupation_address', 'guardian', 'guardian_occupation', 'guardian_tel', 'guardian_cellphone', 'guardian_email',
        'guardian_occupation_address', 'email', 'password', 'requirements',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
