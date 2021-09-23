<?php

namespace App\Filters;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Services;
use Firebase\JWT\JWT;
use Exception;

class JWTAuth implements FilterInterface
{
    use ResponseTrait;

    public function __construct()
    {
        // initialize
        helper('jwt');
    }
    /**
     * Do whatever processing this filter needs to do. By default it should not return anything during normal 
     * execution. However, when an abnormal state is found, it should return an instance of CodeIgniterHTTPResponse. 
     * If it does, script execution will end and that Response will be sent back to the client, allowing for 
     * error pages, redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $authenticationHeader = $request->getServer('HTTP_AUTHORIZATION');
        try {
            $encodedToken = getJWTFromRequest($authenticationHeader);
            validateJWTFromRequest($encodedToken);
            return $request;
        } 
        catch (Exception $ex) {
            return Services::response()
                ->setJSON(
                    [
                        'error' => $ex->getMessage()
                    ]
                )
                ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Allows After filters to inspect and modify the response object as needed. This method does not allow 
     * any way to stop execution of other after filters, short of throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // 
    }
}