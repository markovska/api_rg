<?php 

namespace App\JsonMappers\Mappers;

interface MapperInterface
{
	public function getRequiredFields();
	public function mapResult(array $data);
}