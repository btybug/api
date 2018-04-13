<?php
/**
 * Created by PhpStorm.
 * User: menq
 * Date: 13.04.2018
 * Time: 15:26
 */

namespace BtyBugHook\Api\Http\Controllers;


use Illuminate\Http\Request;
use Zend\Diactoros\Response as Psr7Response;

class ApproveAuthorizationController extends \Laravel\Passport\Http\Controllers\ApproveAuthorizationController
{
    public function approve(Request $request)
    {
        return $this->withErrorHandling(function () use ($request) {
            $authRequest = $this->getAuthRequestFromSession($request);

            return $this->convertResponse(
                $this->server->completeAuthorizationRequest($authRequest, new Psr7Response)
            );
        });
    }
}