<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\Http;

class GoogleUtil
{
    protected $api_key;
    
    public function __construct(string|null $api_key = null)
    {
        $this->api_key = $api_key;
    }

    /**
     * @param string $text
     * @param string $source_locale
     * @param string $target_locale
     * @return string
     */
    public function translate(string $text, string $target_locale, ?string $source_locale = null): string
    {
        try
        {
            if ($this->api_key)
            {
                $response = Http::post("https://translation.googleapis.com/language/translate/v2", [
                    'q' => $text,
                    'source' => $source_locale ?: 'auto',
                    'target' => $target_locale,
                    'format' => 'text',
                    'key' => $this->api_key,
                ]);

                return $response->json('data.translations.0.translatedText') ?? $text;
            }
            else
            {

                $response = Http::get("https://translate.googleapis.com/translate_a/single", [
                    'client' => 'gtx',
                    'sl' => $source_locale ?: 'auto',
                    'tl' => $target_locale,
                    'dt' => 't',
                    'q' => $text,
                ]);

                $data = $response->json();
                return collect($data[0])->pluck(0)->implode(' ');
            }
        }
        catch (\Exception $e)
        {
            return $text;
        }
    }

    /**
     * @param string $text
     * @return string|null
     */
    public function detectLanguage(string $text): ?string
    {
        try {
            if ($this->api_key)
            {
                $response = Http::post("https://translation.googleapis.com/language/translate/v2/detect", [
                    'q' => $text,
                    'key' => $this->api_key,
                ]);
                return $response->json('data.detections.0.0.language');
            }
            else
            {
                $response = Http::get("https://translate.googleapis.com/translate_a/single", [
                    'client' => 'gtx',
                    'sl' => 'auto',
                    'tl' => 'en',
                    'dt' => 't',
                    'q' => $text,
                ]);
                return $response->json()[2]; //
            }
        }
        catch (\Exception $e)
        {
            return null;
        }
    }
}
