<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Articles;


class AuthController extends Controller
{
    // Без обработки ошибок !
    public function authLogin(Request $reauest){
        $tmp_data = [];
        $status = 0;
        $news ='';

        $user_data = json_decode($reauest->getContent(),true);

        $user = Users::where('email',$user_data['email'])->get()->toArray();

        if($user){
            // Для быстрой реаоизаций  и наглядного примера и понимания данного вопроса
            //  на бою выбралбы OAuth2
            if($user[0]['password'] == crypt($user_data['password'],crypt($user[0]['name'],'test'))){
                $news = Articles::take(2)->select('name','text','created_at')->get();
                $status = 1;
            }
        }
        $tmp_data['status'] = $status;
        $tmp_data['news'] = $news;
        return json_encode($tmp_data);
    }


}
