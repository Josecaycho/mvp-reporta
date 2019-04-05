<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\Mail;
use App\User;
use App\User_companie;
use App\Template;
use App\Action;
use App\Company;
use App\Country;
use App\Rol;
use App\Inspection;
use App\Question;
use App\Advance;
use App\Type_question;
use App\Question_detail;
use App\Comment;
use App\Report;
use App\Respuest;

//rol_id = 1 ->admin
//rol_id = 2 ->admin_empresa
//rol_id = 3 ->inspector
//rol_id = 4 ->coordinador


//state_inspeccion = 1 -> inicio
//state_inspeccion = 2 -> finalizado

//prioridad = 1 ->alta
//prioridad = 2 ->baja
//prioridad = 3 ->media

//shared(compartido) = 1 -> si
//shared(compartido) = 2 -> no

//state_premiun = 1 ->si
//state_premiun = 2 ->no

//state respuestas = 1 ->correcta
//state respuestas = 2 ->incorrecta

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $request->id = 1;
        $request->email = 'inspector@inspector.com';
        $request->password = '123456789';
        $request->rol_id = 3; 
        $users = User_companie::where('id',$request->id)
                                ->where('rol_id',$request->rol_id)
                                ->where('email',$request->email)
                                ->where('password',$request->password)
                                ->get();

        foreach($users as $user){
            $user->rolObj = Rol::where('id',$user->rol_id)->get();
            $user->userCompaniObj = User::where('id',$user->user_id)->get();            
                foreach($user->userCompaniObj as $data1){
                    $data1->companieObj = Company::where('id',$data1->companies_id)->get();
                    $data1->countryObj = Country::where('id',$data1->countrie_id)->get();                
                    $data1->rolObj = Rol::where('id',$data1->rol_id)->get();
                }
            $user->inspecciones = Inspection::where('user_companie_id',1)->get();
                foreach($user->inspecciones as $data2){
                    $data2->preguntas = Question::where('template_id',$data2->template_id)->get();
                        foreach($data2->preguntas as $data3){
                            $data3->tipopregunta = Type_question::where('id',$data3->type_question_id)->get();
                            $data3->options = Question_detail::where('question_id',$data3->id)->get();
                            $data3->respuesta = Respuest::where('question_id',$data3->id)->get();
                                foreach($data3->respuesta as $data5){
                                    $data5->action = Action::where('id',$data->action_id)->get();
                                    $data5->avance = Advance::where('question_id',$data3->id)->get();
                                }
                        }
                    $data2->plantilla = Template::where('id',$data2->template_id)->get();
                    $data2->country = Country::where('id',$data2->countrie_id)->get();
                        foreach($data2->country as $data4){
                            $data4->comentarios = Comment::where('user_companie_id',$user->id)->where('countrie_id',$data4->id)->get();           
                        }
                }
        }
        
        return Response::json($users);
    }

    public function forgotPassword(Request $request)
    {
        // aca es cuando no sabe su contraseña

        $user = User_companie::where('email', $request->mail)->get();

        $to_name = $user->name;
        $to_email = $user->email;
        $to_password = $user->passwrod;
        $data = array('name'=> $user->name, "email" => $user->lastname ,"password" => $user->password);         
        Mail::send('api.mail.forgot', $data, function($message) use ($to_name, $to_email, $to_password) {
            $message->to($to_email, $to_name,$to_password)
                    ->subject('Pruena de envio de correo');
        });
    }

    public function plantillas()
    {
        // aca le mando las plantillas
        $plantillas = Template::get();
        return Response::json($plantillas);
    }

    public function actions()
    {
        // aca el mando las acciones si las necesita
        $actions = Action::get();
        return Response::json($actions);
    }


    public function respuests(Request $request)
    {
        // aca debera mandarme el id de la pregunta , la respuesta , y la accion si existe
        $respuesta = new Respuest;
        if($request->imgs){
            foreach($request->imgs as $img){
                $respuesta->question_id = $request->get('question_id');
                $respuesta->action_id = $request->get('action_id');
                $respuesta->respuest = $img;
                $requesta->save();
            }
        }else{
            $respuesta->question_id = $request->get('question_id');
            $respuesta->action_id = $request->get('action_id');
            $respuesta->respuest = $request->get('respuest');
            $respuesta->save();
        }
    }

    public function template_groups()
    {
        $group_templates = \DB::table('group_templates')->get();
        foreach($group_templates as $data){
            $data->templates = \DB::table('template_group_template')->where('group_template_id',$data->id)->get();
        }
        return Response::json($group_templates);       
    }

}
