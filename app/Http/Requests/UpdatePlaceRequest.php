<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->role === 'owner' || $this->user()->role === 'admin') {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:places,slug',
            'category_id' => 'required|exists:categories,id',
            'post_code' => 'required|integer',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|string|email|max:255',
            'website' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:1000',
            'longitude' => 'nullable|string|max:255',
            'latitude' => 'nullable|string|max:255',
            'outdoor_seating' => 'boolean',
            'wifi' => 'boolean',
            'pet_friendly' => 'boolean',
            'family_friendly' => 'boolean',
            'card_payment' => 'boolean',
            'free_parking' => 'boolean',
            'free_entry' => 'boolean',
            'photo_spot' => 'boolean',
            'accessible' => 'boolean',
            'student_discount' => 'boolean'
        ];
    }
}
