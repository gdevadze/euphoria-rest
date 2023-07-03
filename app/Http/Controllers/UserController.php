<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Sold;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Arr;

class UserController extends Controller
{

    public function __construct()
    {
//        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index', 'store']]);
//        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
//        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
//        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('pages.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function getUsersForAjax()
    {
        return Datatables()->of(User::query())
            ->addIndexColumn()
            ->addColumn('active_status', function ($data) {
                $html = '';
                if ($data->status == 1) {
                    $html = "<span class='badge badge-success'>აქტიური</span>";
                } else {
                    $html = "<span class='badge badge-danger'>არა აქტიური</span>";
                }
                return $html;
            })
            ->addColumn('action', function ($data) {
                $html = '';
                $html .= $btn = ' <a class="btn btn-primary shadow btn-xs sharp mr-1" href="' . route("users.edit",$data->id) . '"><i class="fa fa-edit"></i></a>';
                if (currentUser()->can('user-delete')) {
                    $html = $btn . ' <a class="btn btn-danger shadow btn-xs sharp mr-1" href="javascript:void(0)" onclick="deleteUser(' . $data->id . ')"><i class="fa fa-trash"></i></a>';
                }
                return $html;
            })
            ->rawColumns(['role', 'action', 'active_status'])
            ->make(true);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRender()
    {
        return jsonResponse(['html' => view('general.users.create')->render(),'status' => 0]);
    }

    public function store(StoreUserRequest $request, UserService $userService)
    {
        $input = $request->all();
        $input['password'] = Hash::make('password');
        $input['working_schedule_id'] = 1;
        $input['card_number'] = $userService->generateNumber();
        $input['tel'] = str_replace(' ','',$request->tel);
        $user = User::create($input);
        $user->assignRole(1);

        return jsonResponse(['status' => 0,'msg' => 'თანამშრომელი წარმატებით დაემატა, კოდი: '.$input['card_number']]);
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('pages.staff_info.blade.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('pages.users.edit', compact('user', 'roles', 'userRole'));
    }

    public function getUserById($id)
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function update(UpdateUserRequest $request,$id)
    {
        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $input['tel'] = str_replace(' ','',$request->tel);
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->to(route('users.index'))->with('success','ინფორმაცია წარმატებით განახლდა!');
    }

    public function statusAction(Request $request)
    {
//        return $request->all();
        try {
            User::findOrFail($request->id)->update(['status' => $request->status]);
            return jsonResponse(['status' => 1]);
        } catch (\Exception $exception) {
            return jsonResponse(['status' => 0]);
        }
    }

    public function deleteUser(Request $request)
    {
        try {
            User::findOrFail($request->id)->delete();
            return jsonResponse(['status' => 1]);
        } catch (\Exception $exception) {
            return jsonResponse(['status' => 0]);
        }
    }
}
