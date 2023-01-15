<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\JsonResponse;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Predmet;
use Exception as ExceptionAlias;

class PredmetController extends AControllerBase
{
    public function authorize(string $action)
    {
        return true;
    }
    /**
     * @return Response|\App\Core\Responses\ViewResponse
     * @throws ExceptionAlias
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Predmet::getAll()
        ]);
    }
    /**
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function delete()
    {
        $predmet = Predmet::getOne($this->request()->getValue('id'));
        if ($predmet->getImage()) {
            unlink($predmet->getImage());
        }
        $predmet->delete();

        return $this->redirect("?c=predmet");
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function edit()
    {
        return $this->html([
            'predmet' => Predmet::getOne($this->request()->getValue('id'))
        ],
            'predmet.form'
        );
    }
    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function create()
    {
        return $this->html([
            'predmet' => new Predmet()
        ],
            'predmet.form'
        );
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function open()
    {
        return $this->html([
            'predmet' => Predmet::getOne($this->request()->getValue('id'))
        ],
            'predmet.open'
        );
    }

    public function predmets() :JsonResponse
    {
        $predmets = Predmet::getAll('', [], 'id DESC');
        return $this->json($predmets);
    }


    public function store()
    {
        $id = $this->request()->getValue('id');
        $predmet = ($id ? Predmet::getOne($id) : new Predmet());
        $oldImage = $predmet->getImage();
        $predmet->setNadpis($this->request()->getValue("nadpis"));
        $predmet->setDruh($this->request()->getValue("druh"));
        $predmet->setJedinecnost($this->request()->getValue("jedinecnost"));
        if ($this->request()->getValue("sladeni") == "1") {
            $predmet->setSladeni(1);
        } else {
            $predmet->setSladeni(0);
        }
        $predmet->setCena($this->request()->getValue("cena"));
        $predmet->setText($this->request()->getValue("text"));
        $predmet->setImage($this->processUploadedFile($predmet));
        $predmet->setAutor($this->request()->getValue("autor"));
        if (!is_null($oldImage) && is_null($predmet->getImage())) {
            $predmet->setImage($oldImage);
        }

        if ($this->request()->getValue("druh") == "0") {
            return $this->html([
                'predmet' => $predmet,
                'messageD' => 'Vyber Druh!'
            ],
                'predmet.form'
            );
        } elseif ($this->request()->getValue("jedinecnost") == "0") {
            return $this->html([
                'predmet' => $predmet,
                'messageJ' => 'Vyber Jedinecnost!'
            ],
                'predmet.form'
            );
        } else {
            $predmet->save();

            return $this->redirect("?c=predmet");
        }
    }

    /**
     * @param $predmet
     * @return string|null
     */
    private function processUploadedFile(Predmet $predmet)
    {
        $image = $this->request()->getFiles()["image"];
        if (!is_null($image) && $image['error'] == UPLOAD_ERR_OK) {
            $name = time() . $image["name"];
            $targetFile = "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . $name;
            if (move_uploaded_file($image["tmp_name"], $targetFile)) {
                if ($predmet->getId() && $predmet->getImage()) {
                    unlink($predmet->getImage());
                }
                return $targetFile;
            }
        }
        return null;
    }
}