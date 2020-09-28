<?php

function sidebar() {
    $getModule = DB::table('access')
                ->select([
                    'module.url',
                    'module.icon',
                    'module.name as moduleName',
                    'access.*'
                ])
                ->where('role_id', Auth::user()->role_id)
                ->join('module','access.module_id','module.id')
                ->get();

    $sidebar = '';
    if (count($getModule) > 0) {
        if (url()->current() == url('/')) {
            $moduleUrl = '/';
        } else {
            $parseAddress = str_replace(url('').'/','',url()->current());
            $explodeAddress = explode('/',$parseAddress);
            $moduleUrl = $explodeAddress[0];
        }

        foreach ($getModule as $gmdl) {
            $active = '';
            if ($moduleUrl == $gmdl->url) {
                $active = 'active';
            }

            $sidebar .= '<li class="'.$active.'">';
            $sidebar .= '<a href="'.url($gmdl->url).'">';
            $sidebar .= '<i class="menu-icon fa fa-fw fa-tachometer"></i>';
            $sidebar .= '<span class="mm-text ">'.$gmdl->moduleName.'</span>';
            $sidebar .= '</a>';
            $sidebar .= '</li>';
        }
    }

    echo $sidebar;
}

function activeModule()
{
    $module = DB::table('module')->get();

    $active = '';
    if (count($module) > 0) {
        if (url()->current() == url('/')) {
            $moduleUrl = '/';
        } else {
            $parseAddress = str_replace(url('').'/','',url()->current());
            $explodeAddress = explode('/',$parseAddress);
            $moduleUrl = $explodeAddress[0];
        }

        foreach ($module as $mdl) {
            if ($mdl->url == $moduleUrl) {
                $active = $mdl->name;
            }
        }
    }

    return $active;
}

function checkAccess($roleId, $moduleId)
{
    $checkAccess = DB::table('access')
                   ->where([
                       ['role_id', $roleId],
                       ['module_id', $moduleId]
                   ])
                   ->first();

    return isset($checkAccess);
}
