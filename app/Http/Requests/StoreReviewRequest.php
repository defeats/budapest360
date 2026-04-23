<?php

namespace App\Http\Requests;

use App\Models\Review;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('create', Review::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'place_id' => ['required', 'exists:places,id'],
            'user_id' => ['required', 'exists:users,id'],
            'comment' => ['nullable', 'string', 'max:1000'],
            'star' => ['required', 'integer', 'min:1', 'max:5']
        ];
    }

    public function messages()
    {
        return [
            'comment.max' => 'A megjegyzés nem lehet hosszabb 1000 karakternél.',
            'star.required' => 'A csillag értéke kötelező.',
            'star.min' => 'A csillag értékének legalább 1-nek kell lennie.',
            'star.max' => 'A csillag értékének legfeljebb 5-nek kell lennie.'
        ];
    }
}
