<?php

namespace App\Models;

use App\Core\Model;

class Predmet extends Model
{
    protected int $id = 0;
    protected string $nadpis = "";
    protected int $druh = 0;
    protected string $text = "";
    protected ?string $image = null;
    protected int $autor = 1;
    protected int $cena = 0;
    protected int $jedinecnost = 0;
    protected int $sladeni = 0;

    /**
     * @return int
     */
    public function getCena(): int
    {
        return $this->cena;
    }

    /**
     * @param int $cena
     */
    public function setCena(int $cena): void
    {
        $this->cena = $cena;
    }

    /**
     * @return int
     */
    public function getJedinecnost(): int
    {
        return $this->jedinecnost;
    }

    /**
     * @param int $jedinecnost
     */
    public function setJedinecnost(int $jedinecnost): void
    {
        $this->jedinecnost = $jedinecnost;
    }

    /**
     * @return int
     */
    public function isSladeni(): int
    {
        return $this->sladeni;
    }

    /**
     * @param int $sladeni
     */
    public function setSladeni(int $sladeni): void
    {
        $this->sladeni = $sladeni;
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
    public function getNadpis(): string
    {
        return $this->nadpis;
    }

    /**
     * @param string $nadpis
     */
    public function setNadpis(string $nadpis): void
    {
        $this->nadpis = $nadpis;
    }

    /**
     * @return int
     */
    public function getDruh(): int
    {
        return $this->druh;
    }

    /**
     * @param int $druh
     */
    public function setDruh(int $druh): void
    {
        $this->druh = $druh;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
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

}