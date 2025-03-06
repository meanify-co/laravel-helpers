<?php

namespace Meanify\LaravelHelpers\Utils;

class ZipUtil
{
    public function createFromFiles(string $zip_pathname, array $files = []): bool
    {
        $zip = new \ZipArchive;

        if ($zip->open($zip_pathname, \ZipArchive::CREATE) === true)
        {
            foreach ($files as $file)
            {
                $zip->addFile($file, basename($file));
            }

            $zip->close();

            return true;
        } else
        {
            return false;
        }
    }
}
