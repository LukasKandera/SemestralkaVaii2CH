<?php

namespace App\Models;

use App\Core\Model;

class Map extends Model
{
    protected int $id = 0;
    protected string $nazov = "";
    protected int $kategoria = 0;
    protected ?string $image = null;
    protected int $autor = 1;

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
    public function getNazov(): string
    {
        return $this->nazov;
    }

    /**
     * @param string $nazov
     */
    public function setNazov(string $nazov): void
    {
        $this->nazov = $nazov;
    }

    /**
     * @return int
     */
    public function getKategoria(): int
    {
        return $this->kategoria;
    }

    /**
     * @param int $kategoria
     */
    public function setKategoria(int $kategoria): void
    {
        $this->kategoria = $kategoria;
    }

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param string|null $image
     */
    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getAutor(): int
    {
        return $this->autor;
    }

    /**
     * @param int $autor
     */
    public function setAutor(int $autor): void
    {
        $this->autor = $autor;
    }
    /**
     * @return void
     * @throws \Exception
     */
    public function delete()
    {
        Model::getConnection()->beginTransaction();
        parent::delete();
        Model::getConnection()->commit();
    }

}