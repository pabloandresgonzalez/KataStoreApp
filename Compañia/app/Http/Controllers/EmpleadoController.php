<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\empleado;

class EmpleadoController extends Controller
{
    public function index(Request $request)
    {
      $empleados = empleado::all();

      return view('indexEmpleados', [
      'empleados' => $empleados
      ]); 
    }

    public function create()
    {
      return view('create');
    }

    public function store(Request $request)
    {
      $empleado = new empleados();
      $empleado->name = $request->input('name');
      $empleado->email = $request->input('email');
      $empleado->sexo = $request->input('sexo');
      $empleado->area = $request->input('area');
      $empleado->descripcion = $request->input('descripcion');

      if ($request->input('boletin') === 'si') {
        $empleado->boletin = 'si';
      } else {
        $empleado->boletin = 'no';
      }

      if ($request->input('rol') === '1') {
        $empleado->boletin = 'Profesional de proyectos desarrollador';
      } elseif($request->input('rol') === '2')
        $empleado->boletin = 'Gerente estratégico';
      {
        $empleado->boletin = 'Auxiliar administrativo';
      }
   
      $empleado->save();

      return redirect('welcome')->with([
                'message' => 'El usuario '.$user->name.' fue creado correctamente!'
        ]);
    }
      
}
