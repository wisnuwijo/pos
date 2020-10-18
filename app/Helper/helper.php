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


function formatDate($date) {
    if ($date != '') {
        $explode1 = explode(' ', $date);

        if (count($explode1) > 1) {
            // time included
            $explode2 = explode('-', $explode1[0]);
            $year = $explode2[0];
            $month = $explode2[1];
            $day = $explode2[2];

            $explode3 = explode(':', $explode1[1]);
            $hour = $explode3[0];
            $minute = $explode3[1];

            $final = $day.'-'.$month.'-'.$year.' '.$hour.':'.$minute;

            return $final;
        } else {
            // only date
            $explode2 = explode('-', $explode1[0]);
            $year = $explode2[0];
            $month = $explode2[1];
            $day = $explode2[2];

            $final = $day.'-'.$month.'-'.$year;

            return $final;
        }
    }
}

function formatNumber($number) {
    if ($number != '') {
        $format = number_format($number,2,',','.');
	    return $format;
    }

    return 0;
}
