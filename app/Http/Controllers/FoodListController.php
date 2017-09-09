<?php

namespace App\Http\Controllers;

use App\GroupList;
use App\UserGroup;
use Illuminate\Http\Request;

class FoodListController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('bindings');
        $this->middleware('can:view,group');
    } 

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, UserGroup $group)
    {
        return $group->lists()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(UserGroup $group)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, UserGroup $group)
    {
        //
        $list = $group->lists()->create([
            'name' => 'A new list!'
            ]);

        return $list;
/*
$comment = $post->comments()->create([
    'message' => 'A new comment.',
]);
*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroup $group, GroupList $list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function edit(UserGroup $group, GroupList $list)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserGroup $group, GroupList $list)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\List  $list
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserGroup $group, GroupList $list)
    {
        //
    }
}
