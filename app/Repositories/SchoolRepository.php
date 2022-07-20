<?php

namespace App\Repositories;
use App\Http\Requests\SchoolRequest;
use App\Interfaces\SchoolInterface;
use App\Models\School;
use Illuminate\Database\Eloquent\Collection;

class SchoolRepository implements SchoolInterface
{
    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll():Collection
    {
        return School::all();
        // TODO: Implement getAll() method.
    }

    /**
     * @return mixed
     */
    public function paginate():mixed
    {
        return School::paginate(10);
        // TODO: Implement paginate() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id):mixed
    {
        return School::find($id);
        // TODO: Implement getById() method.
    }

    /**
     * @param SchoolRequest $request
     * @return mixed
     */
   public function store(SchoolRequest $request): mixed
   {
    return School::Create($request->all());
       // TODO: Implement store() method.
   }

    /**
     * @param SchoolRequest $request
     * @param $id
     * @return mixed
     */
    public function update(SchoolRequest $request, $id):mixed
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
