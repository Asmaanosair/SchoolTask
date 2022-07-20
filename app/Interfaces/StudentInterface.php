<?php

namespace App\Interfaces;

use App\Http\Requests\StudentRequest;

interface StudentInterface
{
    /**
     * @return mixed
     */
    public function getAll():mixed;

    /**
     * @return mixed
     */
    public function paginate():mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id):mixed;
    /**
     * @param StudentRequest $request
     * @return mixed
     */
    public function store(StudentRequest $request):mixed;
    /**
     * @param StudentRequest $request
     * @param $id
     * @return mixed
     */
    public function update(StudentRequest $request ,$id):mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id):mixed;
}
