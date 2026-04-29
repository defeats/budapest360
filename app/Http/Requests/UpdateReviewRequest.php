<?php

namespace App\Http\Requests;

use App\Models\Review;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $review = $this->route('review');
        return auth()->user()->can('update', $review);
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
            'star' => ['nullable', 'integer', 'min:1', 'max:5']
        ];
    }

    public function messages()
    {
        return [
            'comment.max' => 'A megjegyzés nem lehet hosszabb 1000 karakternél.',
            'star.integer' => 'Az értékelésnek számnak kell lennie.',
            'star.min' => 'A csillag értékének legalább 1-nek kell lennie.',
            'star.max' => 'A csillag értékének legfeljebb 5-nek kell lennie.'
        ];
    }
}
