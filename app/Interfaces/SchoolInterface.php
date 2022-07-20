<?php

namespace App\Interfaces;

use App\Http\Requests\SchoolRequest;

interface SchoolInterface
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
     * @param SchoolRequest $request
     * @return mixed
     */
    public function store(SchoolRequest $request):mixed;
    /**
     * @param SchoolRequest $request
     * @param $id
     * @return mixed
     */
    public function update(SchoolRequest $request ,$id):mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id):mixed;
}
