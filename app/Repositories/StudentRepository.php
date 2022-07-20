<?php

namespace App\Repositories;
use App\Http\Requests\StudentRequest;
use App\Interfaces\StudentInterface;
use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements StudentInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll():Collection
    {
        return Student::all();
        // TODO: Implement getAll() method.
    }

    /**
     * @return mixed
     */
    public function paginate():mixed
    {
        return Student::with('school')->paginate(10);
        // TODO: Implement paginate() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id):mixed
    {
        return Student::find($id);
        // TODO: Implement getById() method.
    }

    /**
     * @param StudentRequest $request
     * @return mixed
     */
   public function store(StudentRequest $request): mixed
   {
      $count= Student::where('school_id',$request->school_id)->count();
      $input=$request->all();
      $input['order']=$count+1;
    return Student::Create($input);
       // TODO: Implement store() method.
   }

    /**
     * @param StudentRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StudentRequest $request, $id):mixed
    {
        return $this->getById($id)->update($request->all());
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return mixed
     */
     public function destroy($id): mixed
     {
         return $this->getById($id)->delete();
         // TODO: Implement destroy() method.
     }
}
