<?php

namespace Infrastructure\Http;

use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    public function success($data = [])
    {
        return response()->json($data);
    }

    public function error($errors = [], $status = 400)
    {
        return response()->json($errors, $status);
    }
}
