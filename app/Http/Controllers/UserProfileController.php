<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use stdClass;
use App\Services\SendEmailService;

class UserProfileController extends Controller
{
    private $userInfo;

    private $sendEmailService;

    public function __construct(SendEmailService $sendEmailService)
    {
        $this->sendEmailService = $sendEmailService;
    }

    public function index(Request $request)
    {
        $nombre = $request->input('nombre') ?: "No Especificado";
        $apellidos = $request->input('apellidos') ?: "No Especificado";
        $telefono = $request->input('telefono') ?: "No Especificado";
        $correo = $request->input('correo') ?: "No Especificado";
        $imagen = $request->input('imagen') ?: "No Especificado";
        $this->userInfo = new stdClass;
        $this->userInfo->nombre = $nombre;
        $this->userInfo->apellidos = $apellidos;
        $this->userInfo->telefono = $telefono;
        $this->userInfo->correo = $correo;
        $this->userInfo->imagen = $imagen;
        $userInfo = $this->userInfo;
        $this->validateValues();
        return view('user-profile', compact(['user'=>'userInfo']));
    }

    public function save(Request $request){
        $url = $this->generateUrl($request);
        return back()->with('url', $url);
        // return redirect($url)->with(['url','url']);
        
    }
    public function create(){
        return view('create-user-profile');
    }

    public function validateValues()
    {
        $profile = UserProfile::firstOrNew([
            'image'=>$this->userInfo->nombre,
            'name'=>$this->userInfo->apellidos,
            'last_name'=>$this->userInfo->telefono,
            'phone'=>$this->userInfo->correo,
            'email'=>$this->userInfo->imagen
        ]);
        if(!$profile->exists){
            $profile->save();
        }
        $this->userInfo->id = $profile->id;
    }

    public function generateUrl($data)
    {
        // $validator = Validator::make($data->all(), [
        //     'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);
        // if ($validator->fails()) {
        //     return back()
        //         ->with("Error", "invalid File");
        // }
        $nombreImagen = '';
        $imagen = $data->file('imagen');
        if($imagen){
            $nombreImagen = time() . '.' . $imagen->getClientOriginalExtension();
            $imagen->move(public_path('uploads'), $nombreImagen);
            $nombreImagen = 'uploads/'.$nombreImagen;
        }
        $url = route('index', [
            'nombre' => $data->nombre,
            'apellidos' => $data->apellidos,
            'telefono' => $data->telefono,
            'correo' => $data->correo,
            'imagen' => $nombreImagen
        ]);
        return $url;
    }

    public function sendEmail(Request $request)
    {
        $this->sendEmailService->sendEmail($request->correo);
        return back()->with('success', 'Correo enviado con éxito');
    }
}
