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

		    //get only not empty values
            $items = array_filter($item);
            $fieldNames = array_keys($items);

			if(count(array_intersect($fieldNames, $requiredFields)) == count($requiredFields)) {

				$results[] = $mapper->mapResult($items);
			}
			else {
			    throw new \Exception('The filed names do not match with the required field names. ');
			}
		}

		return $results;
	}
}