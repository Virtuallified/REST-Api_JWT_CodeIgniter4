<?php

namespace App\Controllers\API;

use App\Models\UserModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use Exception;

class Token extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        helper('jwt');
    }
    public function reGenToken()
    {
        try {
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
            ];
    
            $input = $this->getRequestInput($this->request);
    
            if (!$this->validateRequest($input, $rules)) {
                return $this->getResponse(
                        $this->validator->getErrors(),
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
            }
            
            $model = new UserModel();
            $user = $model->findUserByEmailAddress($input['email']);
            unset($user['password']);

            return $this->respondCreated(
                    [
                        'message' => 'Token Regenerated',
                        'user' => $user,
                        'access_token' => getSignedJWTForUser($input['email'])
                    ]
                );
        } catch (Exception $ex) {
            return $this->getResponse(
                    [
                        'error' => $ex->getMessage(),
                    ],
                    ResponseInterface::HTTP_BAD_REQUEST
                );
        }
    }
}
