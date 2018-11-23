<?php
// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class UserController {
    
    public function getListUser() {
        $array = [1,2,3,4];
        $li = '';
        
        foreach($array as $key => $value) {
            $text = '
                <li>
                    <a href="../get_data_user/'.$value.'">
                        User number '.$value.'
                    </a>
                </li>';
            $li = $li.$text;
        }
        
        $list = '<ul>'.$li.'</ul>';
        
        return new Response(
            '<html>
                <body>
                    List user: <br>'.$list.'
                </body>
            </html>'
        );
    }
    
    public function getDataUser($id) {
        return new Response(
            '<html>
                <body>
                    User Number: '.$id.'
                    <a href="../list_user/">return list</a>
                </body>
            </html>'
        );
    }
}