<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\JsonMappers\JsonMapperService;
use App\JsonMappers\Mappers\EmployeeMapper;

use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\Exception\TransferException;

class DataController extends Controller
{
    public function index()
    {
    	$client = new Client([
		    'base_uri' => env('API_URL'),
		    'timeout'  => 5.0,
		]);

		try {
		    $response = $client->get(env('API_METHOD'), [
			    'auth' => [
			        env('API_USER'),
			        env('API_PASSwORD')
			    ]
			]);
		}
		catch (ClientException $e) {
	    	
	    	$statusCode = $e->getCode();
	    	$message = 'Client error occured.';

	    	return view('errors', compact('statusCode', 'message'));
		}

		catch (RequestException $e) {
			
			$statusCode = $e->getCode();
			$message = 'Networking error occured';

	    	return view('errors', compact('statusCode', 'message'));
		}

		catch (ServerException $e) {

			$statusCode = $e->getCode();
			$message = 'Server error occured.';
			
	    	return view('errors', compact('statusCode', 'message'));
		}

		catch(TransferException $e) {

			$statusCode = $e->getCode();
			$message = 'An error occured';

	    	return view('errors', compact('statusCode', 'message'));
		}
		

		$code = $response->getStatusCode(); 

		if($code === 200) {			
			$body = $response->getBody()->getContents();
		}

		$service = app(JsonMapperService::class);

		$mapper = new EmployeeMapper();
		$map = $service->map($body, $mapper);

		return view('show', compact('map'));
    }

}
