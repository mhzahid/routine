<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use DB;

class validateDropdown implements Rule
{
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
        if (!empty($value)) {
            $tables = DB::table('tb_routine_list')->select('tb_name')->orderBy('id','desc')->limit(3)->get();
            // dd($tables);
            foreach ($tables as $key => $tb) {

                if ($tb->tb_name == $value) {
                    return $value;
                }
                
            }

        }
        return false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Error! Dropdown value has been modified.';
    }
}
