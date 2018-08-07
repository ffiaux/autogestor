<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\User;

class ManterController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function manterProdutos()
    {
    	if ($this->isUserCommon())
    	{
			return view('manter.produtos', compact('userRole'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function manterCategorias()
    {
    	if ($this->isUserCommon())
    	{
			return view('manter.categorias', compact('userRole'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function manterMarcas()
    {
    	if ($this->isUserCommon())
    	{
			return view('manter.marcas', compact('userRole'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function manterPermissoes()
    {
    	if ($this->isUserAdmin())
    	{
    		$roles = Role::all();
			return view('manter.permissoes', compact('roles'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function showPermissao(Role $role)
    {
    	if ($this->isUserAdmin())
    	{
			return view('manter.permissao', compact('role'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }  

    public function createPermissao()
    {
    	if ($this->isUserAdmin())
    	{
    		$role = new Role();
    		
			return view('manter.permissao', compact('role'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }     

    public function storePermissao(Request $request)
    {
    	if ($this->isUserAdmin())
    	{
    		$roleId = $request['id'];
    		$role;
    		if ($roleId)
    		{
    			$role = Role::find($roleId);
    		}
    		else
    		{
    			$role = new Role();
    		}

    		$role->name = $request['name'];
    		$role->description = $request['description'];
    		$role->save();

			return redirect()->action('ManterController@manterPermissoes');
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function deletePermissao(Role $role)
    {
    	$role->delete();

    	return redirect()->action('ManterController@manterPermissoes');
    }

    public function manterUsuarios()
    {
    	if ($this->isUserAdmin())
    	{
    		$users = User::all();
			return view('manter.usuarios', compact('users'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function showUsuario(User $user)
    {
    	if ($this->isUserAdmin())
    	{
			return view('manter.usuario', compact('user'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    } 

    public function createUsuario()
    {
    	if ($this->isUserAdmin())
    	{
    		$user = new User();

			return view('manter.usuario', compact('user'));
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }     

    public function storeUsuario(Request $request)
    {
    	if ($this->isUserAdmin())
    	{
    		$userId = $request['id'];
    		$user;
    		if ($userId)
    		{
    			$user = User::find($userId);
    		}
    		else
    		{
    			$user = new User();
    			$user->password = bcrypt('user');
    			$role_regular_user = Role::where('name', 'common')->first();
    		}

    		$user->name = $request['name'];
    		$user->email = $request['email'];
    		$user->save();

    		if (!$userId)
    		{
				$user->roles()->attach($role_regular_user);
    		}

			return redirect()->action('ManterController@manterUsuarios');
    	}
        else
        {
            return $this->notPermitted();
        }    	
    }

    public function deleteUsuario(User $user)
    {
    	$user->delete();

    	return redirect()->action('ManterController@manterUsuarios');
    }
}
