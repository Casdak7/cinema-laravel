<?php

namespace App\Http\Controllers;

use App\Review;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $reviews = Review::all();
        } catch(Exception $e){
            return response($e, 500);
        }

        return response(json_encode($reviews), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'message' => 'required',
            'rating' => 'numeric|between:0,10',
            'movie_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response(json_encode($validator->errors()), 400);
        }

        try{
            $review = Review::create($request->all());
        } catch(Exception $e){
            return response(json_encode($e), 500);
        }


        return response(json_encode($review), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {       
        try{
            $review = Review::find($id);
        } catch(Exception $e){
            return response($e, 500);
        }

        return response(json_encode($review), 200);
    }
}
