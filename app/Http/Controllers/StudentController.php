<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Interfaces\SchoolInterface;
use App\Interfaces\StudentInterface;
use App\Repositories\SchoolRepository;

class StudentController extends Controller
{
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
        return view('pages.student.index',['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school=$this->school->getAll();
        return view('pages.student.create',['school'=>$school]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $this->studentRepository->store($request);
        return back()->with('success','created');
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
        $school=$this->school->getAll();
        return view('pages.student.edit',['student'=>$student,'school'=>$school]);
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
        $this->studentRepository->update($request,$id);
        return back()->with('success','updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentRepository->destroy($id);
        return back()->with('success','deleted');
    }
}
