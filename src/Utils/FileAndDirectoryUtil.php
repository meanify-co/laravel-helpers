<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\File;

class FileAndDirectoryUtil
{
    /**
     * @return string
     */
    public function classBasename($class)
    {
        return class_basename($class);
    }

    /**
     * @return array
     */
    public function getRecursiveDirectoriesFromPath($path)
    {
        $directories = File::directories($path); // Get the directories in the current path

        // Iterate over each directory and recursively fetch subdirectories
        foreach ($directories as $directory)
        {
            $subdirectories = $this->getRecursiveDirectoriesFromPath($directory);
            $directories    = array_merge($directories, $subdirectories); // Merge subdirectories with the parent
        }

        return $directories;
    }

    /**
     * @notes Initialize directories with blank index.html
     *
     * @return string|null
     */
    public function initDirectory($directory, $with_index = false)
    {
        $path = null;

        if (! File::exists($directory))
        {
            File::makeDirectory($directory, 0775, true, true);

            $path = $directory;

            if ($with_index)
            {
                $path = $directory.'/index.html';

                $content = '';

                $content .= '<!DOCTYPE html><html><head>';
                $content .= '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
                $content .= '<title></title>';
                $content .= '</head>';
                $content .= '<body></body>';
                $content .= '</html>';

                $file = fopen($path, 'w+');
                fwrite($file, $content);
                fclose($file);
            }
        }

        return $path;
    }

    /**
     * @notes delete file or directory
     *
     * @return bool
     */
    public function deleteFile($path)
    {
        $success = false;

        try
        {
            $path = FileAndDirectoryUtil . phpbase_path() . $path;

            if (! File::exists($path))
            {
                File::delete($path);
            }
        } catch (\Exception $e)
        {
            $success = false;
        }

        return $success;
    }

    /**
     * @notes Remove non-accept chars at filename to save a file
     *
     * @return string|string[]
     */
    public function removeSpecialCharsFromFilename($string)
    {
        return str_replace(['.', '/', '(', ')', ' ', '\\', '>', '<', '?', '!'], '', $string);
    }
}
