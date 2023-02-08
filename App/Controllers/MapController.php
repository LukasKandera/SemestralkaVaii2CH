<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Models\Textmap;
use App\Core\Responses\{JsonResponse, RedirectResponse, Response};
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
    public function deleteText()
    {
        $map = Textmap::getOne($this->request()->getValue('id'));
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

    public function editText()
    {
        return $this->html([
            'text' => Textmap::getOne($this->request()->getValue('id'))
        ],
            'text.form'
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
     * Vráti zoznam textov
     * @return JsonResponse
     */
    public function texts() : JsonResponse
    {
        $textmap = Textmap::getAll('', [], 'id');
        array_map(function ($text) {
            $text->autorT();
        }, $textmap);
        return $this->json($textmap);
    }

    public function storeText() : JsonResponse
    {
        $data = json_decode(file_get_contents('php://input'));

        $textMap = new Textmap($data->nazov, $data->text, $data->parent);
        $textMap->save();

        return $this->json('ok');
    }

    public function store()
    {
        $id = $this->request()->getValue('id');
        $map = ($id ? Map::getOne($id) : new Map());
        $oldImage = $map->getImage();
        $map->setNazov($this->request()->getValue("nazov"));
        $map->setKategoria($this->request()->getValue("kategoria"));
        $map->setImage($this->processUploadedFile($map));
        $map->setAutor($this->request()->getValue("autor"));
        if (!is_null($oldImage) && is_null($map->getImage())) {
            $map->setImage($oldImage);
        }
        if ($this->request()->getValue("kategoria") == "0") {
            return $this->html([
                'map' => $map,
                'messageK' => 'Vyber Kategoriu!'
            ],
                'map.form'
            );
        } else {
            $map->save();

            return $this->redirect("?c=map");
        }
    }
    public function storeTextP()
    {
        $id = $this->request()->getValue('id');
        $map = ($id ? Textmap::getOne($id) : new Textmap());
        $map->setNazov($this->request()->getValue("nazov"));
        $map->setText($this->request()->getValue("text"));
        $map->setParent($this->request()->getValue("parent"));
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
            $targetFile = "public/img/" . $name;
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