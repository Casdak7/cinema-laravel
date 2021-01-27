<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Exception;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $movies = Movie::all();
        } catch(Exception $e){
            return response($e, 500);
        }

        return response(json_encode($movies), 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $movie = Movie::find($id);
        } catch(Exception $e){
            return response($e, 500);
        }

        return response(json_encode($movie), 200);
    }
}
