<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\File;

class TranslationUtil
{
    public function getDefaultLanguage(): mixed
    {
        return env('APP_DEFAULT_LANG', 'pt-BR');
    }

    /**
     * @param string $message_key
     * @param string $file
     * @param string|null $language
     * @return string|null
     */
    public function getTextFromLanguageResourceFile(string $message_key, string $file, string|null $language = null)
    {
        if(is_null($language))
        {
            $language = $this->getDefaultLanguage();
        }

        $path = resource_path('lang/'.$language.'/'.$file.'.php');

        if (! File::exists($path))
        {
            return null;
        }

        $translations = require $path;

        $translated = '';

        $message_parts = explode("\n", $message_key);

        foreach ($message_parts as $index => $part)
        {
            $translated .= array_key_exists($part, $translations) ? $translations[$part] : $part;

            if ($index < count($message_parts) - 1)
            {
                $translated .= "\n";
            }
        }


        return $translated;
    }
}
