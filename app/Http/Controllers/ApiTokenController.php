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
            return [
                'status' => 'error',
                'message' => 'Unauthorized.'
            ];
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
        $auth = Manager::where('api_token', $token)->first();
        $auth->api_key = null;
        $auth->save();

        return [
            'status' => 'success',
            'message' => 'Disconnected.'
        ];
    }

    
}