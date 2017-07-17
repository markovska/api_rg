<?php

namespace App\JsonMappers\Documents;

class Employee {

	private $uuid; 
	private $company;
	private $bio;
	private $name;
	private $title;
	private $avatar;

	public function __construct()
    {
        $this->avatar = url('/').'/img/avatar.png';
    }

	public function setUuid($uuid)
	{
		$this->uuid = $uuid;
	}

	public function setCompany($company)
	{
		$this->company = $company;
	}

	public function setBio($bio)
	{
		$this->bio = $bio;
	}

	public function setName($name)
	{
		$this->name = $name;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function setAvatar($avatar)
	{
		$this->avatar = $avatar;
	}

	public function getUuid() {
		return $this->uuid;
	}

	public function getCompany() {
		return $this->company;
	}

	public function getBio() {
		return $this->bio;
	}

	public function getName() {
		return $this->name;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getAvatar() {
		return $this->avatar;
	}
	
}