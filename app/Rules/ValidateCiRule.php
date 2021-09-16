<?php

namespace App\Rules;

use App\CustomValidation\ValidadorEc;
use Illuminate\Contracts\Validation\Rule;

class ValidateCiRule implements Rule
{
    protected $identification;

    protected $validadorEc;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($identification)
    {
        $this->identification = $identification;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $this->validadorEc = new ValidadorEc();
        if(!$this->validadorEc->validarCedula($value))
            return false;

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->validadorEc->getError();
    }
}
