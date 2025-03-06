<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class ImageUtil
{
    /**
     * @notes Check if string is an encoded image with base64 and return image extension and encoded part of image
     *
     * @param  array  $valid_extensions
     * @return array|false
     */
    public function checkBase64Image($data, $valid_extensions = [])
    {
        try
        {
            if (empty($valid_extensions))
            {
                $valid_extensions = ['png', 'jpg', 'jpeg', 'gif'];
            }

            [$type, $data] = explode(';', $data);
            [, $data]      = explode(',', $data);
            $data          = base64_decode($data);

            //validate extension
            [$prefix, $type]    = explode(':', $type);
            [$type, $extension] = explode('/', $type);

            if (! in_array($extension, $valid_extensions))
            {
                return false;
            }

            return [
                'extension' => $extension,
                'encoded'   => $data,
            ];
        } catch (\Throwable $e)
        {
            return false;
        }
    }

    /**
     * @notes Convert base64 image to temp file
     *
     * @return array
     */
    public function convertBase64ImageToFile($base64)
    {
        $base64image = self::checkBase64Image($base64);

        $base64   = str_replace('data:image/'.$base64image['extension'].';base64,', '', $base64);
        $base64   = str_replace(' ', '+', $base64);
        $filename = Str::random(30) . 'Context' .$base64image['extension'];

        $directory = storage_path().'/app/public/temp/'.Str::random(30);

        utils()->directory()->initDirectory($directory);

        $path = $directory.'/'.$filename;

        \File::put($path, base64_decode($base64));

        return [
            'directory' => $directory,
            'path'      => $path,
        ];
    }

    /**
     * @notes Resize image before upload to file manager
     *
     * @return string|null
     */
    public function resizeImage($file, $name, $extension, $width, $height)
    {
        try
        {
            $folder = storage_path('temp');

            utils()->directory()->initDirectory($folder);

            $name = $name.'-'.time().'.'.$extension;
            $path = $folder.'/'.$name;

            ImageManager::imagick()->
                read($file)->
                resize($width, $height)->
                save($path);
        } catch (\Throwable $exception)
        {
            if (env('APP_DD') == true)
            {
                dd($exception);
            }
        }

        return $path;
    }
}
