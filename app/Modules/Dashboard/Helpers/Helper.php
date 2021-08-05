<?php

namespace App\Modules\Dashboard\Helpers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illiminate\Http\Response;

class Helper extends Controller
{
    public static function get_patch($item = 1)
    {
        $url = explode("/", $_SERVER['REQUEST_URI']);
        $url = explode("?", $url[$item]);
        return $url[0];
    }
    public static function recursive_category_select($data = null, $parent_id = 0, $char = '', $id = 0)
    {
        foreach ($data as $key => $item) {
            if ((int) $item->parent_id == (int) $parent_id) {
?>
                <option <?php echo ($id == $item->id) ? 'selected' : ''; ?> value="<?php echo $item->id; ?>"><?php echo $char . $item->title; ?></option>;
<?php
                unset($data[$key]);
                Helper::recursive_category_select($data, $item->id, $char . '--- ', $id);
            }
        }
    }
    public static function base64ToImage($base64_string, $output_file)
    {
        $image_parts = explode(";base64,", $base64_string);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode(str_replace(' ', '+', $image_parts[1]));
        $file_name = uniqid() . "." . $image_type;
        $file = $output_file . $file_name;
        file_put_contents($file, $image_base64);
        return $file_name;
    }
}
