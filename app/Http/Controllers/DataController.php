<?php

namespace App\Http\Controllers;

use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Client;
use App\JsonMappers\JsonMapperService;
use App\JsonMappers\Mappers\EmployeeMapper;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\TransferException;

class DataController extends Controller
{
    public function index()
    {
    	$client = new Client([
		    'base_uri' => env('API_URL'),
		    'timeout'  => 5.0,
		]);
    	$errorMessage = null;

		try {
		    $response = $client->get(env('API_METHOD'), [
			    'auth' => [
			        env('API_USER'),
			        env('API_PASSWORD')
			    ]
			]);
		}
		catch (ConnectException $requestException) {
		    $message ='Sorry we could not connect to the RG api';

            return view('errors', compact( 'message'));

        } catch (ClientException $clientException) {

		    switch ($clientException->getCode()) {
                case  401:
                    $message ='Sorry we could not authorize the request';
                    break;
                case 403:
                    $message = 'You are not allowed for this action';
                    break;
                case 404:
                    $message = 'Results were not found';
                    break;
                default :
                    $message = 'Something went wrong please try again later';
                    break;
            }

            return view('errors', compact('message'));
        } catch(TransferException $e) {

            $message ='Sorry an error occurred please try again later';

	    	return view('errors', compact('message'));
		}

		$body = $response->getBody()->getContents();
		$service = app(JsonMapperService::class);
		$mapper = new EmployeeMapper();
		
		try{
            $map = $service->map($body, $mapper);

        } catch (\Exception $exception){
		    $message = $exception->getMessage();
            return view('errors', compact('message'));
        }

		return view('show', compact('map'));
    }

}
