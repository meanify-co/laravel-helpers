<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\File;

class GitUtil
{
    /**
     * @return false|string
     */
    public function getCurrentGitCommit()
    {
        $head = '';

        $gitDir   = base_path().'/.git';
        $headPath = $gitDir.'/HEAD';

        if (File::exists($headPath))
        {
            $head = trim(File::get($headPath));

            if (substr($head, 0, 5) == 'ref: ')
            {
                $ref     = substr($head, 5);
                $refPath = $gitDir.'/'.$ref;

                if (File::exists($refPath))
                {
                    $head = trim(File::get($refPath));
                }
            }
        }

        return $head;
    }
}
