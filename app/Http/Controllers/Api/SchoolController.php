<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SchoolRequest;
use App\Interfaces\SchoolInterface;
use App\Traits\AppResponse;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    use AppResponse;
    private SchoolInterface $schoolRepository;

    public function __construct(SchoolInterface $schoolRepository)
    {
        $this->schoolRepository=$schoolRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $school=$this->schoolRepository->paginate();
        return $this->successResponse($school,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
        $school=$this->schoolRepository->store($request);
        return $this->successResponse($school,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school= $this->schoolRepository->getById($id);
        return $this->successResponse($school,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, $id)
    {
        $school= $this->schoolRepository->update($request,$id);
        return $this->successResponse($school,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $school=$this->schoolRepository->destroy($id);
        return $this->successResponse($school,200);

    }
}
