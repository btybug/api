<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 12.04.2018
 * Time: 22:44
 */

namespace BtyBugHook\Api\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Passport\Bridge\RefreshToken;
use Laravel\Passport\Bridge\AccessToken;
use Laravel\Passport\Bridge\RefreshTokenRepository;
use Laravel\Passport\Bridge\AccessTokenRepository;
class OauthController extends Controller
{
    public function authenticated()
    {
        $user=\Auth::user();
        $token = $user->createToken('Token Name');
        dd($token);
        $expired_at=time($token->token->expires_at);
        $access_token=$token->accessToken;

        $query = http_build_query([
            'userData' => $user->toArray(),
            'access_token' =>$access_token ,
            'expired_in' => $expired_at,
        ]);

        return redirect('/bty-api/redirect?'.$query);

    }

    public function redirect(Request $request)
    {
        dd($request->all());
    }

    public function authorized(Request $request)
    {
       $code=$request->code;
       echo '<script type="javascript">
    if (window.opener != null && !window.opener.closed) {
        window.opener.cms.callback("'.$code.'");
    }
        window.close();

</script>';die;
    }
}