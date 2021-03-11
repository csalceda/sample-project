<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TuitionFee extends Model
{
    protected $fillable = [
        'grade_level', 'tuition_fee', 'misc_fee', 'others_fee', 'total_due', 'semestral_1', 'semestral_2',
        'quarterly_1', 'quarterly_2', 'quarterly_3', 'quarterly_4', 'monthly_1', 'monthly_2', 'monthly_3',
        'monthly_4',
    ];

    // FUNCTIONS //

    // full payment tuition discount
    public function getTuitionDiscount()
    {

        $tuition_fee = floatval(str_replace(',', '', $this->tuition_fee));
        $discount = $tuition_fee * .05;
        $discounted_fee = $tuition_fee - $discount;

        return $discounted_fee;
    }

    // compute semestral balance
    public function getSemestralBal($option)
    {
        $total = floatval(str_replace(',', '', $this->total_due));
        $downpayment = floatval(str_replace(',', '', $this->$option));

        $rem = ($total - $downpayment);
        return $rem;
    }

    // compute remaining quarterly balance
    public function getQuarterlyBal($option)
    {
        $total = floatval(str_replace(',', '', $this->total_due));
        $downpayment = floatval(str_replace(',', '', $this->$option));

        $rem = ($total - $downpayment) / 4;
        return $rem;
    }

    // compute remaining monthly balance
    public function getMonthlyBal($option)
    {
        $total = floatval(str_replace(',', '', $this->total_due));
        $downpayment = floatval(str_replace(',', '', $this->$option));

        $rem = ($total - $downpayment) / 9;
        return $rem;
    }

    // convert string to float
    public function getConvertToFloat($type)
    {
        return floatval(str_replace(',', '', $this->$type));
    }

    // get grade level
    public function getGradeLevel()
    {
        return $this->grade_level;
    }
}
