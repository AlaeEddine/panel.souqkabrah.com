<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role as Roles;
use Spatie\Permission\Models\Permission;



class RoleController extends Controller{

    public function roles(Role $role){
        if(Roles::where('id',1)->count()>0){ $UserCount = User::role('User')->where('removed',0)->count(); }else{ $UserCount = 0; }
        if(Roles::where('id',2)->count()>0){ $AdminCount = User::role('Admin')->where('removed',0)->count(); }else{ $AdminCount = 0; }
        if(Roles::where('id',3)->count()>0){ $SuperAdminCount = User::role('SuperAdmin')->where('removed',0)->count(); }else{ $SuperAdminCount = 0; }
        if(Roles::where('id',4)->count()>0){ $CustomerCount = User::role('Customer')->where('removed',0)->count(); }else{ $CustomerCount = 0; }
        if(Roles::where('id',5)->count()>0){ $SellerCount = User::role('Seller')->where('removed',0)->count(); }else{ $SellerCount = 0; }
       return view('pages.roles.roles',[
            'Roles' => Role::get(),
            'SuperAdminsCount' => $SuperAdminCount,
            'UsersCount' => $UserCount,
            'AdminsCount' => $AdminCount,
            'SellersCount' => $SellerCount,
            'CustomersCount' => $CustomerCount,
        ]);
    }

    public function edit(Request $request){
        if(Roles::where([['id', '=',e($request->id)]])->count() > 0){
            $role = Roles::findByName(Roles::where('id',e($request->id))->first()->name);
            $ALL_ROLES = Roles::findByName('SuperAdmin');
            $PERMISSION = [];
            foreach($ALL_ROLES->permissions->pluck('name') as $PermissionsNames):
                if(strstr($PermissionsNames,'view-')){
                    $PERMISSION[str_replace('view-','',$PermissionsNames)]['view'] = $PermissionsNames;
                }
                if(strstr($PermissionsNames,'create-')){
                    $PERMISSION[str_replace('create-','',$PermissionsNames)]['create'] = $PermissionsNames;
                }
                if(strstr($PermissionsNames,'update-')){
                    $PERMISSION[str_replace('update-','',$PermissionsNames)]['update'] = $PermissionsNames;
                }
                if(strstr($PermissionsNames,'delete-')){
                    $PERMISSION[str_replace('delete-','',$PermissionsNames)]['delete'] = $PermissionsNames;
                }
            endforeach;
            return view('pages.roles.edit',[
                'Role' => Roles::where([
                    ['id', '=',e($request->id)],
                ])->first(),
                'PermissionsLists' => $ALL_ROLES->permissions->pluck('name'),
                'PERMISSION' => $PERMISSION,
                'Role2' => $role,
            ]);
        }else{
            abort(404);
        }
    }
    public function editsubmit(Request $request){
        if($request->id != null): $request->id = e($request->id); else: $request->id = 0; endif;
        //dd($request->formPermissionsList);
        $RolesQuery = Roles::where([
            ['id', '=',e($request->id)],
        ]);
        if($RolesQuery->count() > 0){
            $Role = $RolesQuery->first();
            $Role->syncPermissions($request->formPermissionsList);
            return redirect(route('roles'))->with('success', __('تم التعديل بنجاح'));
        }else{
            return redirect(route('roles'))->with('success', __('تم التعديل بنجاح'));

        }
    }
    public function delete(Request $request){
        if($request->id == 2){
            return redirect(route('roles'))->with('error', __('لا يمكن حذف مجموعة المدراء Admin'));
        }elseif($request->id == 3){
            return redirect(route('roles'))->with('error', __('لا يمكن حذف مجموعة المدراء SuperAdmin'));
        }else{
            $role = Role::findOrFail($request->id); $role->delete();
            return redirect(route('roles'))->with('success', __('تم الحذف بنجاح'));
        }
    }

}
