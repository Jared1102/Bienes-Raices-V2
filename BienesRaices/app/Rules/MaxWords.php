<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class MaxWords implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    protected $maxWords;

    public function __construct($maxWords)
    {
        $this->maxWords=$maxWords;
    }

    public function passes($attribute,$value){
        $wordCount=str_word_count($value);
        return $wordCount<=$this->maxWords;
    }

    public function message(){
        return 'El campo :attribute no puede tener más de '.$this->maxWords.' palabras.';
    }

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
