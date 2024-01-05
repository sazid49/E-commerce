<?php
    if(!function_exists('isActive')){
    function isActive($path, $active = 'active menu-open')
    {
        return call_user_func_array('Request::is', (array)$path) ? $active : '';
    }
    }

    if(!function_exists('fileUpload')){
        function fileUpload($file,$folder){
            if($file){
               $image_name = Rand().'.'.$file->getClientOriginalExtension();
               return $file->storeAs($folder, $image_name);
            }
            return null;
        }
    }



