<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Session\Session;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

use Jumbojett\OpenIDConnectClient;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'staff_management';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }


    public function getLoginAkdemic(Request $request)
    {
        $oidc = $this->oidc();
        $oidc->authenticate();
    }

    public function getSigninAkdemic(Request $request)
    {
        $oidc = $this->oidc();
        $oidc->authenticate();

        $userInfo = $oidc->requestUserInfo();
        $user = User::where('email', '=', $userInfo->email)->first();

        if ($user != null) {
            $request->session()->push('oidc.access_token', $oidc->getAccessToken());
            $request->session()->push('oidc.refresh_token', $oidc->getRefreshToken());
            Auth::login($user);
        }

        return redirect('/');
    }

    public function getSignoutAkdemic(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    public function logout(Request $request)
    {
        $oidcSession = $request->session()->get('oidc', null);

        if ($oidcSession != null)
        {
            $post_logout_redirect_uri = config('constants.AKDEMIC.POST_LOGOUT_REDIRECT_URI');
            $oidc = $this->oidc();

            $this->guard()->logout();

            $request->session()->invalidate();
            $oidc->signOut($oidcSession['access_token'], url($post_logout_redirect_uri));
            dd($oidc);
        }
        else
        {
            $this->guard()->logout();

            $request->session()->invalidate();

            return redirect('/');
        }
    }

    private function oidc()
    {
        $debug = config('constants.AKDEMIC.DEBUG');
        $provider_url = config('constants.AKDEMIC.PROVIDER_URL');
        $client_id = config('constants.AKDEMIC.CLIENT_ID');
        $client_secret = config('constants.AKDEMIC.CLIENT_SECRET');
        $oidc = new OpenIDConnectClient($provider_url, $client_id, $client_secret);

        $oidc->setVerifyHost(!$debug);
        $oidc->setVerifyPeer(!$debug);

        $configParams = config('constants.AKDEMIC.CONFIG_PARAM');
        $configParams = array_change_key_case($configParams, CASE_LOWER);

        $oidc->providerConfigParam($configParams);

        $client_name = config('constants.AKDEMIC.CLIENT_NAME');
        $redirect_url = config('constants.AKDEMIC.REDIRECT_URL');

        $oidc->setClientName($client_name);
        $oidc->setRedirectURL(url($redirect_url));

        $scopes = config('constants.AKDEMIC.SCOPE');

        foreach ($scopes as $scope)
        {
            $oidc->addScope($scope);
        }

        return $oidc;
    }
}
