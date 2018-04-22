<?php

namespace app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    public function authorize()
    {
        /* By default it returns false, change it to
         * something likethis if u are checking
         * authentication
         */
        return Auth::check();

        /* Or something more granular like this:
         * return auth()->user()->can('udpate-profile')
         * if you are using the Laratrust package.
         */
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
