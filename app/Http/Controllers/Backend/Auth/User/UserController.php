<?php

namespace App\Http\Controllers\Backend\Auth\User;

use App\Models\Auth\User;
use App\Http\Controllers\Controller;
use App\Events\Backend\Auth\User\UserDeleted;
use App\Repositories\Backend\Auth\RoleRepository;
use App\Repositories\Backend\Auth\UserRepository;
use App\Repositories\Backend\Auth\PermissionRepository;
use App\Http\Requests\Backend\Auth\User\StoreUserRequest;
use App\Http\Requests\Backend\Auth\User\ManageUserRequest;
use App\Http\Requests\Backend\Auth\User\UpdateUserRequest;
use App\Customer;
use DataTables;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class UserController.
 */
class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageUserRequest $request)
    {
        return view('backend.auth.user.index')
            ->withUsers($this->userRepository->getActivePaginated(25, 'id', 'asc'));
    }



    /**
     * @param ManageUserRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexCustomer(Request $request)
    {
        // return view('backend.customer.index')
            // ->withUsers($this->userRepository->getActivePaginatedCustomerSec(25, 'id', 'asc'));

        if ($request->ajax()) {
            // select('id', 'name', 'address', 'created_at', 'updated_at')
            $data = User::query()->whereHas('roles', function($q){ $q->where("name", "user"); })->with('customer')->select('users.*')->active();
            return Datatables::eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('name', function ($dat){
                        return $dat->full_name;
                    })
                    ->addColumn('phone', function (User $customer) {
                            return !empty($customer->customer->phone) ? $customer->customer->phone  : '<span class="badge badge-pill badge-secondary"> <em>No definido</em></span>';

                    })
                    ->editColumn('updated_at', function ($dat) {
                        return $dat->updated_at ? with(new Carbon($dat->updated_at))->format('d-m-Y H:i:s') : '';
                    })
                    ->addColumn('action', function($row){
                           $btn = '
                            <div class="btn-group" role="group" aria-label="'.__('labels.backend.access.users.user_actions').'">

                               <a href="'.route('admin.customer.show', $row->id).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.view').'" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                ';
                                $btn = $btn.'
                                <a href="'.route('admin.customer.edit', $row->id).'" data-toggle="tooltip" data-placement="top" title="'.__('buttons.general.crud.edit').'" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                            </div>
                            ';
                            return $btn;
                    })
                    ->rawColumns(['action', 'phone'])
                    ->toJson();
        }
      
        return view('backend.customer.index');


    }

    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function create(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.auth.user.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }




    /**
     * @param Request    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     *
     * @return mixed
     */
    public function createCustomer(Request $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        return view('backend.customer.create')
            ->withRoles($roleRepository->with('permissions')->get(['id', 'name']))
            ->withPermissions($permissionRepository->get(['id', 'name']));
    }

    /**
     * @param StoreUserRequest $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function store(StoreUserRequest $request)
    {
        $this->userRepository->create($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'phone',
            'rfc',
            'address',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param Request $request
     *
     * @throws \Throwable
     * @return mixed
     */
    public function storeCustomer(Request $request)
    {
        $this->userRepository->createCustomer($request->only(
            'first_name',
            'last_name',
            'email',
            'password',
            'phone',
            'rfc',
            'address',
            'active',
            'confirmed',
            'confirmation_email',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.users.created'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function show(ManageUserRequest $request, User $user)
    {
        return view('backend.auth.user.show')
            ->withUser($user);
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @return mixed
     */
    public function showCustomer(Request $request, User $user)
    {
        return view('backend.customer.show')
            ->withUser($user);
    }


    /**
     * @param ManageUserRequest    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function edit(ManageUserRequest $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, User $user)
    {
        return view('backend.auth.user.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }


    /**
     * @param Request    $request
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     * @param User                 $user
     *
     * @return mixed
     */
    public function editCustomer(Request $request, RoleRepository $roleRepository, PermissionRepository $permissionRepository, User $user)
    {
        return view('backend.customer.edit')
            ->withUser($user)
            ->withRoles($roleRepository->get())
            ->withUserRoles($user->roles->pluck('name')->all())
            ->withPermissions($permissionRepository->get(['id', 'name']))
            ->withUserPermissions($user->permissions->pluck('name')->all());
    }

    /**
     * @param UpdateUserRequest $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $this->userRepository->update($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'phone',
            'rfc',
            'address',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.auth.user.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }


    /**
     * @param Request $request
     * @param User              $user
     *
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     * @return mixed
     */
    public function updateCustomer(Request $request, User $user)
    {
        $this->userRepository->updateCustomer($user, $request->only(
            'first_name',
            'last_name',
            'email',
            'phone',
            'rfc',
            'address',
            'roles',
            'permissions'
        ));

        return redirect()->route('admin.customer.index')->withFlashSuccess(__('alerts.backend.users.updated'));
    }

    /**
     * @param ManageUserRequest $request
     * @param User              $user
     *
     * @throws \Exception
     * @return mixed
     */
    public function destroy(ManageUserRequest $request, User $user)
    {
        $this->userRepository->deleteById($user->id);

        event(new UserDeleted($user));

        return redirect()->route('admin.auth.user.deleted')->withFlashSuccess(__('alerts.backend.users.deleted'));
    }

    public function select2LoadMore(Request $request)
    {
        $search = $request->get('search');
        $data = User::select(['id', 'first_name', 'last_name', 'created_at'])->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }

    public function selectDifferentCustomer(Request $request)
    {
        $search = $request->get('search');
        $data = User::select(['id', 'first_name', 'last_name', 'created_at'])->whereDoesntHave('roles', function($q){ $q->where("name", "user"); })->where(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $search . '%')->orderBy('created_at', 'desc')->paginate(5);
        return response()->json(['items' => $data->toArray()['data'], 'pagination' => $data->nextPageUrl() ? true : false]);
    }


    public function search(Request $request){
        $searching = $request->input('search');

        //now get all user and services in one go without looping using eager loading
            //In your foreach() loop, if you have 1000 users you will make 1000 queries
          $users = User::Where('email','like','%'.$searching.'%')->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $searching . '%')->orderBy('id')->paginate(6);
            return view('backend.auth.user.index', compact('users'));
    }

    public function searchCustomer(Request $request){
        $searching = $request->input('search');

        //now get all user and services in one go without looping using eager loading
            //In your foreach() loop, if you have 1000 users you will make 1000 queries
          $users = User::Where('email','like','%'.$searching.'%')->orWhere(DB::raw("CONCAT(`first_name`, ' ', `last_name`)"), 'LIKE', '%' . $searching . '%')->orderBy('id')->paginate(6);
            return view('backend.customer.index', compact('users'));
    }


}
