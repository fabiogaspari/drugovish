<?php
 
namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiTokenController extends Controller
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(60);

        $manager = Manager::where('code', $request->code)->first();

        if ( !$manager ) {
            return [
                'status' => 'error',
                'message' => 'User not found.'
            ];
        }

        if ( !Hash::check($request->password, $manager->password) ) {
            abort(response()->json([
                'message' => 'Unauthenticated',
            ], 401));
        }

        $manager->api_token = hash('sha256', $token);
        $manager->save();
 
        return [
            'status' => 'success',
            'token' => $manager->api_token
        ];
    }

    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function logout(Request $request)
    {
        $token = $request->header('X-API-Key');
        
        if ( $token == '' || $token == null ) {
            abort(response()->json([
                'message' => 'Unauthenticated',
            ], 401));
        } 

        $auth = Manager::where('api_token', $token)->first();
        
        if ( !$auth ) {
            return [
                'status' => 'error',
                'message' => 'User not found.'
            ];
        }
        
        $auth->api_token = null;
        $auth->save();

        return [
            'status' => 'success',
            'message' => 'Disconnected.'
        ];
    }

    
}