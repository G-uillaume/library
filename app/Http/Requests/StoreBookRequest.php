<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Http\Request ;

class StoreBookRequest extends FormRequest
{
    protected $errorBag = 'bookCreation';
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if ($request->user()->role == 'admin') {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'author' => 'max:255',
            'genre' => 'max:255',
            'page_number' => 'required|integer|min:1',
            'quantity' => 'required|integer|min:0',
            'description' => 'required',
        ];
    }
}
