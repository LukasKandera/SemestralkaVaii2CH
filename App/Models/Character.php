<?php

namespace App\Models;

use App\Core\Model;

class Character extends Model
{
    protected int $id = 0;
    protected string $meno= "";
    protected string $rasa = "";
    protected string $typ = "";
    protected string $popis = "";
    protected string $povaha = "";
    protected string $historia = "";
    protected string $motivacia = "";
    protected string $idealy = "";
    protected string $povolanieCech = "";
    protected string $hlas = "";
    protected ?string $obrazok = "";
    protected int $autor = 1;

    /**
     * @return string|null
     */
    public function getObrazok(): ?string
    {
        return $this->obrazok;
    }

    /**
     * @param string|null $obrazok
     */
    public function setObrazok(?string $obrazok): void
    {
        $this->obrazok = $obrazok;
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
    public function getMeno(): string
    {
        return $this->meno;
    }

    /**
     * @param string $meno
     */
    public function setMeno(string $meno): void
    {
        $this->meno = $meno;
    }

    /**
     * @return string
     */
    public function getRasa(): string
    {
        return $this->rasa;
    }

    /**
     * @param string $rasa
     */
    public function setRasa(string $rasa): void
    {
        $this->rasa = $rasa;
    }

    /**
     * @return string
     */
    public function getTyp(): string
    {
        return $this->typ;
    }

    /**
     * @param string $typ
     */
    public function setTyp(string $typ): void
    {
        $this->typ = $typ;
    }

    /**
     * @return string
     */
    public function getPopis(): string
    {
        return $this->popis;
    }

    /**
     * @param string $popis
     */
    public function setPopis(string $popis): void
    {
        $this->popis = $popis;
    }

    /**
     * @return string
     */
    public function getPovaha(): string
    {
        return $this->povaha;
    }

    /**
     * @param string $povaha
     */
    public function setPovaha(string $povaha): void
    {
        $this->povaha = $povaha;
    }

    /**
     * @return string
     */
    public function getHistoria(): string
    {
        return $this->historia;
    }

    /**
     * @param string $historia
     */
    public function setHistoria(string $historia): void
    {
        $this->historia = $historia;
    }

    /**
     * @return string
     */
    public function getMotivacia(): string
    {
        return $this->motivacia;
    }

    /**
     * @param string $motivacia
     */
    public function setMotivacia(string $motivacia): void
    {
        $this->motivacia = $motivacia;
    }

    /**
     * @return string
     */
    public function getIdealy(): string
    {
        return $this->idealy;
    }

    /**
     * @param string $idealy
     */
    public function setIdealy(string $idealy): void
    {
        $this->idealy = $idealy;
    }

    /**
     * @return string
     */
    public function getPovolanieCech(): string
    {
        return $this->povolanieCech;
    }

    /**
     * @param string $povolanieCech
     */
    public function setPovolanieCech(string $povolanieCech): void
    {
        $this->povolanieCech = $povolanieCech;
    }

    /**
     * @return string
     */
    public function getHlas(): string
    {
        return $this->hlas;
    }

    /**
     * @param string $hlas
     */
    public function setHlas(string $hlas): void
    {
        $this->hlas = $hlas;
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