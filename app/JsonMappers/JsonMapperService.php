<?php 

namespace App\JsonMappers;

use App\JsonMappers\Mappers\MapperInterface;

class JsonMapperService
{

	public function map($jsonString, MapperInterface $mapper)
	{
		$requiredFields = $mapper->getRequiredFields();
		$decodedData = json_decode($jsonString, true);

		$results = [];
		
		foreach($decodedData as $item) {

			$fieldNames = array_keys($item);

			if(count(array_intersect($fieldNames, $requiredFields)) == count($requiredFields)) {
				$results[] = $mapper->mapResult($item);
			}
			else {
				$message = 'The filed names do not match with the required field names.';
				die(view('exceptions', compact('message')));
				
			}
		}

		return $results;
	}
}