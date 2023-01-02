<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\{RedirectResponse, Response};
use App\Models\Map;
use Exception as ExceptionAlias;

class MapController extends AControllerBase
{
    public function authorize(string $action)
    {
        return true;
    }

    /**
     * @return Response|\App\Core\Responses\ViewResponse
     * @throws ExceptionAlias|\Exception
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Map::getAll()
        ]);
    }
    /**
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function delete()
    {
        $map = Map::getOne($this->request()->getValue('id'));
        if ($map->getImage()) {
            unlink($map->getImage());
        }
        $map->delete();

        return $this->redirect("?c=map");
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function edit()
    {
        return $this->html([
            'map' => Map::getOne($this->request()->getValue('id'))
        ],
            'map.form'
        );
    }
    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function create()
    {
        return $this->html([
            'map' => new Map()
        ],
            'map.form'
        );
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function open()
    {
        return $this->html([
            'map' => Map::getOne($this->request()->getValue('id'))
        ],
            'map.open'
        );
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $id = $this->request()->getValue('id');
        $map = ($id ? Map::getOne($id) : new Map());
        $oldImage = $map->getImage();
        $map->setNazov($this->request()->getValue("nazov"));
        $map->setKategoria($this->request()->getValue("kategoria"));
        $map->setImage($this->processUploadedFile($map));
        $map->setAutor(1);
        if (!is_null($oldImage) && is_null($map->getImage())) {
            $map->setImage($oldImage);
        }

        $map->save();

        return $this->redirect("?c=map");
    }

    /**
     * @param $map
     * @return string|null
     */
    private function processUploadedFile(Map $map)
    {
        $image = $this->request()->getFiles()["image"];
        if (!is_null($image) && $image['error'] == UPLOAD_ERR_OK) {
            $name = time() . $image["name"];
            $targetFile = "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . $name;
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                if ($map->getId() && $map->getImage()) {
                    unlink($map->getImage());
                }
                return $targetFile;
            }
        }
        return null;
    }
}