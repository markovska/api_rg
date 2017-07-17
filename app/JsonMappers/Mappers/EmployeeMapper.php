<?php

namespace App\JsonMappers\Mappers;

use App\JsonMappers\Mappers\MapperInterface;
use App\JsonMappers\Documents\Employee;

class EmployeeMapper implements MapperInterface {

	public function getRequiredFields()
	{
		return [
			'uuid',
			'company',
			'bio',
			'name',
			'title',
			'avatar'
		];
	}

	public function mapResult(array $data)
	{
		$employee = new Employee();

		foreach ($data as $key => $value) {
			
			$methodName = 'set' . ucfirst($key);
			$employee->$methodName($value);
		}
		return $employee;
	}
}