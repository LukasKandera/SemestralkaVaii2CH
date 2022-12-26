<?php

namespace App\Models;

use App\Core\Model;

class Predmet extends Model
{
    protected int $id = 0;
    protected string $nadpis = "";
    protected string $druh = "";
    protected string $text = "";
    protected ?string $image = null;
    protected int $autor = 1;
    protected int $cena = 0;
    protected string $jedinecnost = "";
    protected bool $sladeni = false;

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
     * @return string
     */
    public function getJedinecnost(): string
    {
        return $this->jedinecnost;
    }

    /**
     * @param string $jedinecnost
     */
    public function setJedinecnost(string $jedinecnost): void
    {
        $this->jedinecnost = $jedinecnost;
    }

    /**
     * @return bool
     */
    public function isSladeni(): bool
    {
        return $this->sladeni;
    }

    /**
     * @param bool $sladeni
     */
    public function setSladeni(bool $sladeni): void
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
     * @return string
     */
    public function getDruh(): string
    {
        return $this->druh;
    }

    /**
     * @param string $druh
     */
    public function setDruh(string $druh): void
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