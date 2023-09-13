<?php

class VehicleTypeDTO
{

    private int $id;
    private string $name;
    private int $userId;

    public function __construct() {
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    private function setId($id) {
        $this->id = $id;
    }

    private function setName($name)
    {
        $this->name = $name;
    }

    private function setUserId($userId)
    {
        $this->userId = $userId;
    }

//    build dto
    public function fromRequest($request): VehicleTypeDTO
    {
        $dto = new self();
        if(isset($request['id'])) {
            $dto->setId($request['id']);
        }
        $dto->setName($request['name']);
        $dto->setUserId($request['userId']);
        return $dto;
    }

}
