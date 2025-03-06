<?php

namespace Meanify\LaravelHelpers\Utils;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class PdfUtil
{
    /**
     * @param $data
     * @return array|mixed
     */
    protected static function formatDataToDomPDF($data)
    {
        if(is_null($data))
        {
            $data = [];
        }
        else if(is_object($data))
        {
            $data = (array) $data;
        }

        return $data;
    }

    /**
     * @param string $pdf_name
     * @param string $blade
     * @param array|object|null $data
     * @return \Illuminate\Http\Response
     */
    public function stream(string $pdf_name, string $blade, array|object|null $data = null)
    {
        $pdf = Pdf::loadView($blade, self::formatDataToDomPDF($data));

        return $pdf->stream($pdf_name);
    }

    /**
     * @param string $pdf_name
     * @param string $blade
     * @param array|object|null $data
     * @return string
     */
    public function save(string $pdf_name, string $blade, array|object|null $data = null)
    {
        $pdf = Pdf::loadView($blade, self::formatDataToDomPDF($data));

        $absolute_path = storage_path('temp/pdf-'.uniqid(now()->toDateTimeString()));

        File::makeDirectory($absolute_path);

        $file_path = $absolute_path.'/'.$pdf_name;

        $pdf->save($file_path);

        return $file_path;
    }
}
