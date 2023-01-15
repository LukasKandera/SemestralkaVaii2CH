<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Druhpredmets;
use App\Models\Jedinecnostpredmets;
use App\Models\Kategorymap;
use App\Models\Rasacharacter;
use App\Models\Typcharacter;

class KategoryController extends AControllerBase
{

    public function authorize(string $action)
    {
        return $this->app->getAuth()->isLogged();
    }
    /**
     * @return Response|\App\Core\Responses\ViewResponse
     */
    public function index(): Response
    {
        return $this->html([
            'data' => Kategorymap::getAll()
        ]);
    }
    //rasa
    public function storeKRasa()
    {
        $id = $this->request()->getValue('id');
        $rasacharacter = ($id ? Rasacharacter::getOne($id) : new Rasacharacter());
        $rasacharacter->setNazov($this->request()->getValue("nazov"));
        $rasacharacter->save();

        return $this->redirect("?c=kategory");
    }
    public function createKRasa()
    {
        return $this->html([
            'rasa' => new Rasacharacter()
        ],
            'rasa.form'
        );
    }

    public function editKRasa()
    {
        return $this->html([
            'rasa' => Rasacharacter::getOne($this->request()->getValue('id'))
        ],
            'rasa.form'
        );
    }

    public function deleteKRasa()
    {
        $rasacharacter = Rasacharacter::getOne($this->request()->getValue('id'));

        $rasacharacter->delete();

        return $this->redirect("?c=kategory");
    }
    //typ
    public function storeKTyp()
    {
        $id = $this->request()->getValue('id');
        $typ = ($id ? Typcharacter::getOne($id) : new Typcharacter());
        $typ->setNazov($this->request()->getValue("nazov"));
        $typ->save();

        return $this->redirect("?c=kategory");
    }
    public function createKTyp()
    {
        return $this->html([
            'typ' => new Typcharacter()
        ],
            'typ.form'
        );
    }

    public function editKTyp()
    {
        return $this->html([
            'typ' => Typcharacter::getOne($this->request()->getValue('id'))
        ],
            'typ.form'
        );
    }

    public function deleteKTyp()
    {
        $typ = Typcharacter::getOne($this->request()->getValue('id'));

        $typ->delete();

        return $this->redirect("?c=kategory");
    }
    //jedinecnost
    public function storeKJed()
    {
        $id = $this->request()->getValue('id');
        $jed = ($id ? Jedinecnostpredmets::getOne($id) : new Jedinecnostpredmets());
        $jed->setNazov($this->request()->getValue("nazov"));
        $jed->save();

        return $this->redirect("?c=kategory");
    }
    public function createKJed()
    {
        return $this->html([
            'jed' => new Jedinecnostpredmets()
        ],
            'jed.form'
        );
    }

    public function editKJed()
    {
        return $this->html([
            'jed' => Jedinecnostpredmets::getOne($this->request()->getValue('id'))
        ],
            'jed.form'
        );
    }

    public function deleteKJed()
    {
        $jed = Jedinecnostpredmets::getOne($this->request()->getValue('id'));

        $jed->delete();

        return $this->redirect("?c=kategory");
    }
    //druh
    public function storeKDruh()
    {
        $id = $this->request()->getValue('id');
        $druh = ($id ? Druhpredmets::getOne($id) : new Druhpredmets());
        $druh->setNazov($this->request()->getValue("nazov"));
        $druh->save();

        return $this->redirect("?c=kategory");
    }
    public function createKDruh()
    {
        return $this->html([
            'druh' => new Druhpredmets()
        ],
            'druh.form'
        );
    }

    public function editKDruh()
    {
        return $this->html([
            'druh' => Druhpredmets::getOne($this->request()->getValue('id'))
        ],
            'druh.form'
        );
    }

    public function deleteKDruh()
    {
        $druh = Druhpredmets::getOne($this->request()->getValue('id'));

        $druh->delete();

        return $this->redirect("?c=kategory");
    }
    //Kmap
    public function storeKMap()
    {
        $id = $this->request()->getValue('id');
        $kat = ($id ? Kategorymap::getOne($id) : new Kategorymap());
        $kat->setNazovKategorie($this->request()->getValue("nazov"));
        $kat->save();

        return $this->redirect("?c=kategory");
    }
    public function createKMap()
    {
        return $this->html([
            'kMap' => new Kategorymap()
        ],
            'kMap.form'
        );
    }

    public function editKMap()
    {
        return $this->html([
            'kMap' => Kategorymap::getOne($this->request()->getValue('id'))
        ],
            'kMap.form'
        );
    }

    public function deleteKMap()
    {
        $kat = Kategorymap::getOne($this->request()->getValue('id'));

        $kat->delete();

        return $this->redirect("?c=kategory");
    }
}