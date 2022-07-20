<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Traits\AppResponse;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    use AppResponse;
    private StudentInterface $studentRepository;
    private SchoolInterface $school;

    public function __construct(StudentInterface $studentRepository,SchoolInterface $school)
    {
        $this->studentRepository=$studentRepository;
        $this->school=$school;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student=$this->studentRepository->paginate();
        return $this->successResponse($student,200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $student= $this->studentRepository->store($request);
        return $this->successResponse($student,200);
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
        $student= $this->studentRepository->getById($id);
        return $this->successResponse($student,200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $student= $this->studentRepository->update($request,$id);
        return $this->successResponse($student,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student=$this->studentRepository->destroy($id);
        return $this->successResponse($student,200);
    }
}
