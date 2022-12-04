<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\RedirectResponse;
use App\Core\Responses\Response;
use App\Models\Character;
use Exception as ExceptionAlias;

class CharacterController extends AControllerBase
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
            'data' => Character::getAll()
        ]);
    }
    /**
     * @return RedirectResponse
     * @throws ExceptionAlias
     */
    public function delete()
    {
        $character = Character::getOne($this->request()->getValue('id'));
        if ($character->getObrazok()) {
            unlink($character->getObrazok());
        }
        $character->delete();

        return $this->redirect("?c=character");
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     * @throws \Exception
     */
    public function edit()
    {
        return $this->html([
            'character' => Character::getOne($this->request()->getValue('id'))
        ],
            'character.form'
        );
    }
    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function create()
    {
        return $this->html([
            'character' => new Character()
        ],
            'character.form'
        );
    }

    /**
     * @return \App\Core\Responses\ViewResponse
     */
    public function open()
    {
        return $this->html([
            'character' => Character::getOne($this->request()->getValue('id'))
        ],
            'character.open'
        );
    }

    /**
     * @return \App\Core\Responses\RedirectResponse
     * @throws \Exception
     */
    public function store()
    {
        $id = $this->request()->getValue('id');
        $character = ($id ? Character::getOne($id) : new Character());
        $oldImage = $character->getObrazok();
        $character->setMeno($this->request()->getValue("meno"));
        $character->setRasa($this->request()->getValue("rasa"));
        $character->setTyp($this->request()->getValue("typ"));
        $character->setPopis($this->request()->getValue("popis"));
        $character->setPovaha($this->request()->getValue("povaha"));
        $character->setHlas($this->request()->getValue("hlas"));
        $character->setMotivacia($this->request()->getValue("motivacia"));
        $character->setIdealy($this->request()->getValue("idealy"));
        $character->setPovolanieCech($this->request()->getValue("povolanieCech"));
        $character->setHlas($this->request()->getValue("hlas"));
        $character->setAutor(0);

        $character->setObrazok($this->processUploadedFile($character));
        if (!is_null($oldImage) && is_null($character->getObrazok())) {
            $character->setObrazok($oldImage);
        }

        $character->save();

        return $this->redirect("?c=character");
    }

    /**
     * @param $predmet
     * @return string|null
     */
    private function processUploadedFile(Character  $character)
    {
        /*$image = $this->request()->getFiles();
        if (!is_null($image) && $image['error'] == UPLOAD_ERR_OK) {
            $targetFile = "D:". DIRECTORY_SEPARATOR ."škola". DIRECTORY_SEPARATOR ."sem 7". DIRECTORY_SEPARATOR ."php". DIRECTORY_SEPARATOR ."phpSemestralkaVAII". DIRECTORY_SEPARATOR ."php_mysql_home_2022". DIRECTORY_SEPARATOR ."php_mysql". DIRECTORY_SEPARATOR ."www". DIRECTORY_SEPARATOR ."public" . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR . time() . $image["image"]["name"];
            if (move_uploaded_file($image["image"]["tmp_name"], $targetFile)) {
                if ($predmet->getId() && $predmet->getImage()) {
                    unlink($predmet->getImage());
                }
                return $targetFile;
            }
        }
        return null;*/
    }

}