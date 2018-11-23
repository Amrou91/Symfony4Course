<?php
// src/ControllerApiController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ApiController {
    
    public function getMethod(Request $request) {
        
        $message = 'METHOD_GET used';
        $id = $request->get('id');
        
        $response = [
            'message' => $message,
            'id' => $id,
        ];
        
        return new JsonResponse(['result' => $response]);
    }
    
    public function postMethod(Request $request) {
        
        $message = 'METHOD_POST used';
        $params = json_decode($request->getContent(), true);
        $username = $params['username'];
        $id = $request->get('id');
        
        $response = [
            'message' => $message,
            'params' => $params,
            'username' => $username,
            'id' => $id,
        ];
        
        return new JsonResponse(['result' => $response]);
    }
}