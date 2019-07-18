<?php

use App\Setting;

function hasRole( ... $permissions ) {
	if( empty($permissions) ) {
		$roles = ['admin'];
	}else {
		$separetors = [',','|','.'];
		if(is_array( $permissions )) {
			$roles = [];
			foreach ($permissions as $permission) {
				foreach ( $separetors as $separetor ) {
					if(strpos( $permission, $separetor ) !== false) {
						$explode = explode($separetor, $permission);
						$roles = array_merge($roles, $explode);
						break 2;
					}
				}

				$roles[] = $permission;
			}
		}
	}

	foreach($roles as $role) {
         if(\Auth::user()->hasRole($role)) {
            return true;
         } 
    }

	return false;
	
}

function hasPrivilege( ... $permissions ) {
	if( empty($permissions) ) {
		$previleges = ['admin'];
	}else {
		$separetors = [',','|','.'];
		if(is_array( $permissions )) {
			$previleges = [];
			foreach ($permissions as $permission) {
				foreach ( $separetors as $separetor ) {
					if(strpos( $permission, $separetor ) !== false) {
						$explode = explode($separetor, $permission);
						$previleges = array_merge($previleges, $explode);
						break 2;
					}
				}

				$previleges[] = $permission;
			}
		}
	}

	foreach($previleges as $previlege) {
         if(\Auth::user()->hasPermission($previlege)) {
            return true;
         } 
    }

	return false;
}

function isAdmin(){
	$user = Auth::check() ? Auth::user() : null;

	if($user){
		foreach($user->roles as $role){
			if($role->slug == 'admin'){
				return true;
			}
		}
	}
	return false;
}

function isLoggedIn(){
	return Auth::check() ? true : false;
}

function breadcrumbs(){
	$breadcrumbs = '<ol class="breadcrumb mb-0 justify-content-end p-0">';
	$segments = Request::segments();
	$totalSegment = count($segments);
	$breadcrumbLink = "";

	if($totalSegment > 0) {
		$breadcrumbs .= '<li class="breadcrumb-item"><a href="'.DIRECTORY_SEPARATOR.'admin">Home</a></li>';
		$i = 1;
		foreach($segments as $segment) {
			$breadcrumbLink .= DIRECTORY_SEPARATOR.$segment;
			if($i == $totalSegment){
				$breadcrumbs .='<li class="breadcrumb-item active" aria-current="page">'.$segment.'</li>';
			}else {
				$breadcrumbs .='<li class="breadcrumb-item"><a href="'.$breadcrumbLink.'">'.$segment.'</a></li>';
			}
			$i++;
		}
	}

	$breadcrumbs .= '</ol>';

	echo $breadcrumbs;
}

function getSetting($key){
        $option= Setting::where(["key"=>$key])->orderBy('id', 'desc')->first();
        return isset($option->key) ? $option->value : "";

    }

/*
 * String
 */
function slug($string) {
	return str_slug($string);
}