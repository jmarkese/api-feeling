<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeelingShowRequest;
use App\Http\Requests\FeelingStoreRequest;
use App\Http\Resources\FeelingCollection;
use App\Http\Resources\FeelingResource;
use App\Models\Feeling;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FeelingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $feelings = Feeling::where('user_id', $userId)->orderByDesc('created_at')->paginate(10);
        return new FeelingCollection($feelings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeelingStoreRequest $request)
    {
        $userId = auth()->user()->id;
        $data = $request->all();
        $data['user_id'] = $userId;
        return new FeelingResource(Feeling::create($data));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, FeelingShowRequest $request)
    {
        return new FeelingResource(Feeling::findOrFail($id));
    }

}
