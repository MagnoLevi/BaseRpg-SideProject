<?php

if (!function_exists('customErrorMessages')) {
    /**
     * Busca os erros detalhados de um validate
     *
     * @return array $customErrorMessages
     */
    function customErrorMessages()
    {
        $customErrorMessages = [
            'required' => 'The :attribute field is required.',
            'in' => 'The :attribute field should be :values',
            'string' => 'The :attribute must be a valid string.',
            'numeric' => 'The :attribute must be a valid number.',
            'integer' => 'The :attribute must be a valid integer.',
            'email' => 'The :attribute must be a valid email address.',
            'date' => 'The :attribute must be a valid date.',
            'date_format' => 'The :attribute does not match the format :format.',
            'boolean' => 'The :attribute field must be true or false.',
            'array' => 'The :attribute must be a valid array.',
            'confirmed' => 'The :attribute confirmation does not match.',
            'exists' => 'The selected :attribute does not exist.',
            'regex' => 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one symbol.',
            'unique' => 'The :attribute has already been taken.',
            'min' => [
                'string' => 'The :attribute must be at least :min characters.',
                'numeric' => 'The :attribute must be at least :min.',
            ],
            'max' => [
                'string' => 'The :attribute must not be more than :max characters.',
                'numeric' => 'The :attribute must not be more than :max.',
            ],
        ];

        return $customErrorMessages;
    }
}
