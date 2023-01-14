<?php

namespace App\Models;

use App\Core\Model;

class Textmap extends Model
{
    protected int $id = 0;
    protected string $nazov = "";
    protected string $text = "";
    protected int $parent = 0;

    protected int $autor = 0;

    public function __construct(string $nazov = "", string $text = "", int $parent = 0)
    {
        $this->nazov = $nazov;
        $this->text = $text;
        $this->parent = $parent;
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
     * @return int
     */
    public function getParent(): int
    {
        return $this->parent;
    }

    /**
     * @param int $parent
     */
    public function setParent(int $parent): void
    {
        $this->parent = $parent;
    }

    public function autorT()
    {
        $map = Map::getOne($this->parent);
        $this->autor =$map->getAutor();
    }

    public function delete()
    {
        Model::getConnection()->beginTransaction();
        parent::delete();
        Model::getConnection()->commit();
    }
}