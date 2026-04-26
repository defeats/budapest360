<?php

namespace App\Http\Requests;

use App\Models\Place;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $place = $this->route('place');
        return $this->user()->can('update', $place);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $place = $this->route('place');
        
        return [
            'name' => 'required|string|min:3|max:255',
            'slug' => 'nullable|string|max:255|unique:places,slug,' . $place->id,
            'category_id' => 'required|exists:categories,id',
            'post_code' => 'required|integer|min:1007|max:1239',
            'address' => 'required|string|max:50|regex:/^[a-zA-ZáéíóöőúüűÁÉÍÓÖŐÚÜŰ\s]+[0-9]+\.$/',
            'phone' => 'required|string|max:20|regex:/^\+?[0-9]{10,15}$/',
            'email' => 'required|string|email|max:255',
            'website' => 'nullable|string|max:255|regex:/^(https?:\/\/)?([\w\d-]+\.)+[\w-]{2,}(\/.*)*$/i',
            'description' => 'required|string|max:1000',
            'outdoor_seating' => 'boolean',
            'wifi' => 'boolean',
            'pet_friendly' => 'boolean',
            'family_friendly' => 'boolean',
            'card_payment' => 'boolean',
            'free_parking' => 'boolean',
            'free_entry' => 'boolean',
            'photo_spot' => 'boolean',
            'accessible' => 'boolean',
            'student_discount' => 'boolean',
            'place_images'   => 'nullable|array',
            'place_images.*' => 'image|mimes:jpeg,png,jpg|max:5096'
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "A hely neve megadása kötelező.",
            "name.max" => "A hely neve nem lehet hosszabb 255 karakternél.",
            "name.min" => "A hely neve nem lehet rövidebb 3 karakternél.",
            "category_id.required" => "A kategória megadása kötelező.",
            "post_code.required" => "Az irányítószám megadása kötelező.",
            "post_code.integer" => "Az irányítószámnak egész számnak kell lennie.",
            "post_code.min" => "Az irányítószám nem lehet kisebb, mint 1007.",
            "post_code.max" => "Az irányítószám nem lehet nagyobb, mint 1239.",
            "address.required" => "A cím megadása kötelező.",
            "address.max" => "A cím nem lehet hosszabb 50 karakternél.",
            "address.regex" => "Érvénytelen cím formátum. Kérjük, használja az alábbi formátumot: 'Utca neve házszám.' ",
            "phone.required" => "A telefonszám megadása kötelező.",
            "phone.max" => "A telefonszám nem lehet hosszabb 20 karakternél.",
            "phone.regex" => "Érvénytelen telefonszám formátum. Kérjük, használja az alábbi formátumot: '+36123456789'.",
            "email.required" => "Az email cím megadása kötelező.",
            "email.email" => "Érvénytelen email formátum. Kérjük, adjon meg egy érvényes email címet.",
            "email.max" => "Az email cím nem lehet hosszabb 255 karakternél.",
            "website.regex" => "Érvénytelen URL formátum. Kérjük, adjon meg egy érvényes weboldal címet.",
            "website.max" => "Az weboldal cím nem lehet hosszabb 255 karakternél.",
            "description.required" => "A leírás megadása kötelező.",
            "description.max" => "A leírás nem lehet hosszabb 1000 karakternél.",
            "place_images.*.mimes" => "Helytelen fájltípus! Csak JPEG, PNG és JPG képek engedélyezettek.",
            "place_images.*.max" => "A fájl mérete nem haladhatja meg az 5 MB-ot.",
            "place_images.min" => "Legalább 1 képet fel kell tölteni.",
        ];
    }

    protected function prepareForValidation()
    {
        $booleanFields = [
            'outdoor_seating', 'wifi', 'pet_friendly', 'family_friendly', 'card_payment', 
            'free_parking', 'free_entry', 'photo_spot', 'accessible', 'student_discount'
        ];

        $updates = [];
        foreach ($booleanFields as $field) {
            $updates[$field] = $this->boolean($field);
        }

        $this->merge($updates);
    }
}
