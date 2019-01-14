<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use App\Http\Requests\UsuariosRequest;
use App\Http\Requests\comprobanteRequest;
use App\Pagos;
use App\User;
use App\Usuarios;
use Carbon\Carbon;


class usuariosController extends Controller
{
	public function index(){

		$client = new Client([
		    'base_uri' => 'https://www.geomarvaldez.com'
		]);

		try {

			$response = $client->request('GET', '?json=get_nonce&controller=user&method=register');

			$usuarios = json_decode($response->getBody()->getContents() );

			$response2 = $client->request('GET', "api/user/register/?username=john&email=gmocha_est@utmachala.edu.ec&nonce=" . $usuarios->nonce . "&display_name=John&ify=both&user_pass=12345&first_name=Geovanny&last_name=Mocha", ['http_errors' => false]);
			
			
    		if ($response2->getStatusCode() === 200) {
    			return $response2->getBody()->getContents();
       		} else {
    			$auxiliar = json_decode($response2->getBody()->getContents());
    			return $auxiliar->error;
    		}

    	} catch (ClientException $e) {
    		//echo Psr7\str($e->getRequest());
    		echo Psr7\str($e->getResponse());
    	}

	}

	public function inicio_sesion ()
	{
		return view('auth.inicio_sesion');		
	}


	public function store_api(usuariosRequest $request){

		$client = new Client([
		    'base_uri' => 'https://www.geomarvaldez.com'
		]);

		try {

			$response = $client->request('GET', '?json=get_nonce&controller=user&method=register');

			$usuarios = json_decode($response->getBody()->getContents() );

			$response2 = $client->request('GET', "api/user/register/?username=" . $request->nombre_usuario . "&email=" . $request->email_user . "&nonce=" . $usuarios->nonce . "&display_name=" . $request->nombre_usuario . "&ify=both&user_pass=" . $request->password . "&first_name=" . $request->nombres . "&last_name=" . $request->apellidos . "", ['http_errors' => false]);
			
			if ($response2->getStatusCode() === 200) {
    			Session::flash('flash_message', 'Registrado exitosamente');
				return Redirect('registro');
    		} else {
    			if ($response2->getStatusCode() === 400) {
    					Session::flash('flash_message', 'Problemas al registrar');
						return Redirect('registro');
	    			}else{
	    				$auxiliar = json_decode($response2->getBody()->getContents());
	    			if($auxiliar->error == "Username already exists."){
	    				Session::flash('flash_message', 'Nombre de usuario ya registrado');
	    			}
	    			if($auxiliar->error == "Username is invalid."){
	    				Session::flash('flash_message', 'Nombre de usuario invalido');
	    			}
	    			if($auxiliar->error == "E-mail address is already in use."){
	    				Session::flash('flash_message', 'E-mail ya esta es uso');
	    			}
    			}

				return Redirect('registro');
    		}

    	} catch (ClientException $e) {
    		//echo Psr7\str($e->getRequest());
    		echo Psr7\str($e->getResponse());
    	}
	}

	public function registrar_comprobante()
	{
		return view('registro_comprobante');		
	}

	public function store_comprobante(comprobanteRequest $request)
	{

		$client = Usuarios::where('nicename', $request->nombre_usuario)->get();
		$comprobante_validar = Pagos::where('num_comp_pago', $request->comprobante)->get();

        if($client->count() == 0){
        	Session::flash('flash_message', 'Usuario no registrado' );
	        return Redirect('registrar/comprobante');
        }else{
        	if ($comprobante_validar->count() == 0){
        		$date = Carbon::now();
		        $fecha_actual = $date->toDateTimeString();

	        	$pagos = new Pagos();
		        $pagos->num_comp_pago = $request->comprobante;
		        $pagos->monto_pago = $request->monto;
		        $pagos->usuario_pago = $request->nombre_usuario;
		        $pagos->fecha_pago = $fecha_actual;

		        if($pagos->save()){
		            Session::flash('flash_message', 'Tus datos han sido registrados' );
		            return Redirect('registrar/comprobante');
		        }else{
		            Session::flash('flash_message', 'Problemas al registrar');
		            return Redirect('registrar/comprobante');
		        }
        	}else{
        		Session::flash('flash_message', 'Comprobante invalido');
		        return Redirect('registrar/comprobante');
        	}
        }

		return Redirect('registrar/comprobante');
	}


}
