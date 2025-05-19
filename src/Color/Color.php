<?php
namespace VehiclePark\Color;

use Exception;
//napravio sam posebnu klasu koja ce instancirati boje vozila
class Color
{
    protected int $id;
    protected string $colorName;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @throws Exception
     */
    public function setId(int $id): void
    {
        if (!is_numeric($id)){
            throw new Exception("id must be numeric");
        }
        $this->id = $id;
    }

    public function getColorName(): string
    {
        return $this->colorName;
    }

    /**
     * @throws Exception
     */
    public function setColorName(string $colorName): void
    {
        //izvrsio sam validaciju koje boje se mogu uzeti u obzir kao vrednost
        $avaliableColor = ['red', 'green', 'blue', 'yellow', 'black', 'white', 'aqua'];
        if (!in_array($colorName, $avaliableColor)) {
            throw new Exception('Color '.$colorName.' is not avaliable');
        }
        $this->colorName = $colorName;
    }

    /**
     * @throws Exception
     */
    public function __construct(array $dataColor = [])
    {
        if (isset($dataColor['id'])) {
            $this->setId($dataColor['id']);
        }
        if (isset($dataColor['colorName'])) {
            $this->setColorName($dataColor['colorName']);
        }
    }

}