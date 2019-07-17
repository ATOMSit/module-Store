<?php

namespace Modules\Store\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        switch ($this->method()) {
            case 'DELETE':
                {
                    return true;
                }
            case 'POST':
                {
                    return true;
                }
            case 'PUT':
                {
                    if (Auth::user()->hasPermissionTo('post_update', 'blog')) {
                        return true;
                    } else {
                        return true;
                    }
                }
            default:
                break;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch ($this->method()) {
            case 'DELETE':
                {
                    return [
                        'validation' => [
                            'accepted'
                        ]
                    ];
                }
            case 'POST':
                {
                    return [
                        'country_code' => [
                            'required',
                            'string',
                            'min:2',
                            'max:2'
                        ],
                        'street' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'state' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'city' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'postal_code' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'latitude' => [
                            'required',
                            'decimal'
                        ],
                        'longitude' => [
                            'required',
                            'decimal'
                        ]
                    ];
                }
            case 'PUT':
                {
                    return [
                        'country_code' => [
                            'required',
                            'string',
                            'min:2',
                            'max:2'
                        ],
                        'street' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'state' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'city' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'postal_code' => [
                            'required',
                            'string',
                            'min:1',
                            'max:255'
                        ],
                        'latitude' => [
                            'required',
                            'decimal'
                        ],
                        'longitude' => [
                            'required',
                            'decimal'
                        ]
                    ];
                }
            default:
                break;
        }
    }

    /**
     * Transformation of input fields
     *
     * @return array
     */
    public function filters()
    {
        return [
            'country_code' => 'trim|strip_tags|uppercase|cast("string")',
            'street' => 'trim|strip_tags|uppercase|cast("string")',
            'state' => 'trim|strip_tags|uppercase|cast("string")',
            'city' => 'trim|strip_tags|uppercase|cast("string")',
            'postal_code' => 'trim|strip_tags|uppercase|cast("string")',
            'latitude' => 'trim|strip_tags|cast("float")',
            'longitude' => 'trim|strip_tags|cast("float")'
        ];
    }
}
