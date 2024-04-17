<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'review.title' => 'required|string|max:100',
            'review.body' => 'required|string|max:4000',
            'review.artist' => 'required|string|max:100',
        ];
    }
    
    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => 'タイトルは100文字以内で入力してください',
            'body.requored' => '本文を入力してください',
            'body.max' => '本文は4000文字以内で入力してください',
            'artist.required' => 'お目当てのアーティストを入力してください',
            'artist.max' => 'お目当てのアーティストは100文字以内で入力してください',
        ];
    }
}
