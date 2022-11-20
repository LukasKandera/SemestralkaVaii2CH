<?php

namespace App\Controllers;

use App\Core\AControllerBase;
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

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $id = $this->request()->getValue('id');
        $predmet = ($id ? Predmet::getOne($id) : new Predmet());
        $oldImage = $predmet->getImage();
        $predmet->setNadpis($this->request()->getValue("nadpis"));
        $predmet->setDruh($this->request()->getValue("druh"));
        $predmet->setText($this->request()->getValue("text"));
        $predmet->setImage($this->processUploadedFile($predmet));
        if (!is_null($oldImage) && is_null($predmet->getImage())) {
            unlink($oldImage);
        }
        $predmet->save();

        return $this->redirect("?c=predmet");
    }

    /**
     * @param $predmet
     * @return string|null
     */
    private function processUploadedFile(Predmet $predmet)
    {
        $image = $this->request()->getFiles()['image'];
        if (!is_null($image) && $image['error'] == UPLOAD_ERR_OK) {
            $targetFile = "public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . time() . $image['name'];
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