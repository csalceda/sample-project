<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Enrollee extends Model
{
    protected $fillable = [
        'student_id', 'school_year', 'terms_of_payment', 'payment_option', 'tuition_total', 'paid_upon_enrollment',
        'remaining_balance', 'installment_amount',
    ];

    // functions
    public function getLastName($id)
    {
        $student = User::firstWhere('id', '=', $id);
        $lname = $student->lastname;

        return $lname;
    }
    public function getFirstName($id)
    {
        $student = User::firstWhere('id', '=', $id);
        $fname = $student->firstname;

        return $fname;
    }
    public function getMiddleName($id)
    {
        $student = User::firstWhere('id', '=', $id);
        $mname = $student->middlename;

        return $mname;
    }
}
