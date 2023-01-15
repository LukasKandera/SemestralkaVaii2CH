<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return \App\Core\Responses\RedirectResponse|\App\Core\Responses\ViewResponse
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;

        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect('?c=admin');
            }
        }

        $data = ($logged === false ? ['message' => 'Zlý login alebo heslo!'] : []);
        return $this->html($data);
    }

    /**
     * Logout a user
     * @return \App\Core\Responses\ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->html();
    }

    public function register(): Response
    {
        return $this->html([
            'user' => new User()
        ],
            'register'
        );
    }
    public function storeUser()
    {
        $id = $this->request()->getValue('id');
        $user = ($id ? User::getOne($id) : new User());
        $user->setLogin($this->request()->getValue("login"));
        $heslo = password_hash($this->request()->getValue("password"), PASSWORD_DEFAULT);
        $user->setPassword($heslo);
        if ($this->app->getAuth()->kontLogin($this->request()->getValue("login")) === false) {
            $user->save();
            return $this->redirect("?c=home");
        } else {
            return $this->html([
                'user' => new User(),
                'message' => 'Zlý login tento login uz existuje!'
            ],
                'register'
            );
        }

    }
}