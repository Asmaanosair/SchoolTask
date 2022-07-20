<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Interfaces\SchoolInterface;
use App\Models\School;
use App\Repositories\SchoolRepository;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
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
        return view('pages.school.index',['school'=>$school]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('pages.school.create',['school'=>$school]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request)
    {
         $this->schoolRepository->store($request);
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
       $school= $this->schoolRepository->getById($id);
        return view('pages.school.edit',['school'=>$school]);
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
        $this->schoolRepository->update($request,$id);
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
        $this->schoolRepository->destroy($id);
        return back()->with('success','deleted');

    }
}
