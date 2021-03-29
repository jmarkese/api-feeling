<?php

namespace App\Http\Requests;

use App\Models\Feeling;
use Carbon\Carbon;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeelingShowRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $userId = auth()->user()->id;
        $id = $request->route('feeling');
        if (0 == Feeling::where(['user_id' => $userId, 'id' => $id])->count()) {
            throw new HttpResponseException(response()->json([
                'errors' => 'Forbidden.'
            ], Response::HTTP_FORBIDDEN));
        }
        return true;
    }

    public function rules()
    {
        return [];
    }

}
