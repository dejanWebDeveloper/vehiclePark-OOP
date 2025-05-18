<?php
namespace VehiclePark\Color;

class Color
{
    protected int $id;
    protected string $colorName;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getColorName(): string
    {
        return $this->colorName;
    }

    public function setColorName(string $colorName): void
    {
        $this->colorName = $colorName;
    }
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