<?php

namespace App\Http\Controllers;

use App\Models\StudentQuery;
use App\Http\Requests\StoreStudentQueryRequest;
use App\Http\Requests\UpdateStudentQueryRequest;

class StudentQueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentQueryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentQueryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function show(StudentQuery $studentQuery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentQuery $studentQuery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentQueryRequest  $request
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentQueryRequest $request, StudentQuery $studentQuery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentQuery  $studentQuery
     * @return \Illuminate\Http\Response
     */
    public function destroy(StudentQuery $studentQuery)
    {
        //
    }
}
