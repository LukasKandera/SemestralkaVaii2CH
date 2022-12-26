<?php

namespace App\Models;

use App\Core\Model;

class Kategorymap extends Model
{
    protected int $id = 0;
    protected string $nazovKategorie = "";

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNazovKategorie(): string
    {
        return $this->nazovKategorie;
    }

    /**
     * @param string $nazovKategorie
     */
    public function setNazovKategorie(string $nazovKategorie): void
    {
        $this->nazovKategorie = $nazovKategorie;
    }


}