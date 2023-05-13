<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Traits\ApiResponser; 
Class UserController extends Controller {
    use ApiResponser;
private $request;
public function __construct(Request $request){
$this->request = $request;
}
// GET
    public function getAllUsers(){
        $users = User::all();
        return response()->json($users, 200);
    }
// GET (ID)
public function showUserWithID($id)
{ 
    $user = User::findOrFail($id);
return $this->successResponse($user);


}

// ADD
public function addUser(Request $request)
{
    
    $rules = [
    'firstname' => 'required|max:20',
    'lastname' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::create($request->all());

    return $this->successResponse($user, Response::HTTP_CREATED);
}

// UPDATE
public function updateUserInfo(Request $request, $id)
{
    $rules = [
      'firstname' => 'required|max:20',
      'lastname' => 'required|max:20',
    ];
    $this->validate($request, $rules);
    $user = User::findOrFail($id);
    $user->fill($request->all());

    $user->save();

    return $user;
}

// DELETE

public function deleteUser($id)
{
    $user = User::findOrFail($id);
    $user->delete();
}

    // Index

public function index()
    {
        $users = User::all();

        return $this->successResponse($users);
    }

}