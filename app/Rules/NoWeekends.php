<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class NoWeekends implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  Closure(string, ?string=): PotentiallyTranslatedString  $fail
     */


    // Custom Validation
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $date = Carbon::parse($value);
        if ($date->isweekend()) {
            $fail('Das gewählte Datum für :attribute liegt auf einem Wochenend. wir schulen nur Mo-Fr.');
        }
    }
}
