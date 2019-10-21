<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImagesRule implements Rule
{
    private $nameAttribute;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        //
        $this->nameAttribute=$attribute;
       $result=true;
       foreach($value as $key => $item){
         if(!in_array($item->getMimeType(),['image/png','image/jpg','image/jpeg'])){
            $result=false;
            break;
         }
       }
       return $result;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El campo '.$this->nameAttribute.' solo acepta imagenes PNG / JPEG';
    }
}
