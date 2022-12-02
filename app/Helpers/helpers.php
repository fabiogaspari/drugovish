<?php
  
  /**
   * Write code on Method
   *
   * @return response()
   */

use App\Models\Manager;

if (! function_exists('apiAuth')) {

    function apiAuth($request, array $neededGroup)
    {
        $token = $request->header('X-API-Key');

        if ( $token == '' || $token == null ) {
            abort(response()->json([
                'message' => 'Unauthenticated',
            ], 401));
        } 

        $auth = Manager::where('api_token', $token)->first();

        if ( !$auth || !in_array($auth->level, $neededGroup)) {
            abort(response()->json([
                'message' => 'Unauthenticated',
            ], 401));
        }
    }
}
