<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class XlsxUtil
{
    private static $LABEL_BG_COLOR = '#232323';

    private static $LABEL_FONT_COLOR = '#00ff9f';

    private static $LABEL_FONT_COLOR_TYPE_DARK = '#232323';

    private static $LABEL_FONT_COLOR_TYPE_LIGHT = '#ffffff';

    /**
     * @return array
     */
    public function create(
        string $name,
        array $header_labels,
        array $header_values,
        array $body_labels,
        array $body_values,
        array $options = [],
    ) {
        //Format options

        $creator                    = $options['creator']                     ?? null;
        $filename_without_extension = $options['filename'] ?? (str_replace(' ', '-', meanifyHelpers()->string()->removeAccentuation($name)));
        $directory                  = $options['directory']                 ?? base_path('storage/temp/xlsx/'.Str::uuid()->toString());
        $label_bg_color             = $options['label_bg_color']       ?? self::$LABEL_BG_COLOR;
        $label_font_color           = $options['label_font_color']   ?? self::$LABEL_FONT_COLOR;

        if ($label_font_color == 'dark')
        {
            $label_font_color = self::$LABEL_FONT_COLOR_TYPE_DARK;
        } elseif ($label_font_color == 'light')
        {
            $label_font_color = self::$LABEL_FONT_COLOR_TYPE_LIGHT;
        }

        //Init creation

        $spreadsheet = new Spreadsheet;
        $sheet       = $spreadsheet->getActiveSheet();
        $tab_colors  = [];
        $lines       = [];

        //------------------------------------------------------------------------------------------------------------//
        // Header - labels
        //------------------------------------------------------------------------------------------------------------//
        $index = 'A';

        foreach ($header_labels as $label)
        {
            $cell = $index.'1';
            $sheet->setCellValue($cell, $label);
            $tab_colors[$cell] = [
                'bg_color'   => meanifyHelpers()->mask()->removeMask($label_bg_color),
                'font_color' => meanifyHelpers()->mask()->removeMask($label_font_color),
            ];
            $index++;
        }

        //------------------------------------------------------------------------------------------------------------//
        // Header - values
        //------------------------------------------------------------------------------------------------------------//
        $index = 'A';

        foreach ($header_values as $item)
        {
            $item = meanifyHelpers()->array()->arrayToObject($item);

            $cell = $index.'2';
            $sheet->setCellValue($cell, $item->value);
            $lines[$cell] = [
                'value'  => $item->value,
                'format' => $item->format ?? null,
            ];
            $index++;
        }

        //------------------------------------------------------------------------------------------------------------//
        // Body - labels
        //------------------------------------------------------------------------------------------------------------//
        $index = 'A';

        foreach ($body_labels as $label)
        {
            $cell = $index.'4';
            $sheet->setCellValue($cell, $label);
            $tab_colors[$cell] = [
                'bg_color'   => meanifyHelpers()->mask()->removeMask($label_bg_color),
                'font_color' => meanifyHelpers()->mask()->removeMask($label_font_color),
            ];
            $index++;
        }

        //------------------------------------------------------------------------------------------------------------//
        // Body - values
        //------------------------------------------------------------------------------------------------------------//
        $number = 5;

        foreach ($body_values as $key => $items)
        {
            $index = 'A';

            foreach ($items as $item)
            {
                $item = meanifyHelpers()->array()->arrayToObject($item);

                $cell = $index."$number";
                $sheet->setCellValue($cell, $item->value);
                $lines[$cell] = [
                    'value'  => $item->value,
                    'format' => $item->format ?? null,
                ];
                $index++;
            }

            $number++;
        }

        //------------------------------------------------------------------------------------------------------------//
        // Set styles and refresh properties
        //------------------------------------------------------------------------------------------------------------//
        $result      = $this->setStylesForXlsxLines($spreadsheet, $sheet, $lines, $label_bg_color, $label_font_color, $tab_colors);
        $spreadsheet = $result['spreadsheet'];

        //------------------------------------------------------------------------------------------------------------//
        // Create dir
        //------------------------------------------------------------------------------------------------------------//
        if (! File::exists($directory))
        {
            File::makeDirectory($directory, 0777, true);
        }

        //------------------------------------------------------------------------------------------------------------//
        // Finish, close and save file
        //------------------------------------------------------------------------------------------------------------//
        $spreadsheet->getProperties()->setTitle(substr($name, 0, 31));

        if (! meanifyHelpers()->string()->checkStringIsNull($creator))
        {
            $spreadsheet->getProperties()->setTitle($creator);
        }

        $spreadsheet->getActiveSheet()->setTitle(substr($name, 0, 31));

        $filename = $filename_without_extension.'.xlsx';
        $path     = $directory.'/'.$filename;

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
        $writer->save($path);

        $response['filename'] = $filename;
        $response['path']     = $path;

        return $response;
    }

    /**
     * @return array
     */
    protected function setStylesForXlsxLines($spreadsheet, $sheet, $lines, $label_bg_color, $label_font_color, $tab_colors)
    {
        //------------------------------------------------------------------------------------------------------------//
        // Insert colors and customizes at cells
        //------------------------------------------------------------------------------------------------------------//
        foreach ($tab_colors as $cell => $items)
        {
            $spreadsheet->getActiveSheet()->
                getStyle($cell)->
                applyFromArray([
                    'font' => [
                        'bold'  => true,
                        'color' => ['rgb' => $items['font_color']],
                        'size'  => 10,
                        'name'  => 'Verdana',
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical'   => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => Border::BORDER_THIN,
                            'color'       => ['rgb' => '000000'],
                        ],
                    ],
                    'fill' => [
                        'fillType'   => Fill::FILL_SOLID,
                        'rotation'   => 90,
                        'startColor' => ['rgb' => $items['bg_color']],
                    ],
                ]);

            // Dimensions
            $column = str_replace(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], '', $cell);

            $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);
        }

        //------------------------------------------------------------------------------------------------------------//
        // Insert line break and autosize to the values' columns
        //------------------------------------------------------------------------------------------------------------//
        $rowsMaxLineBreak = [];

        foreach ($lines as $cell => $params)
        {
            $spreadsheet->getActiveSheet()->
                getStyle($cell)->
                applyFromArray([
                    'font' => [
                        'bold'  => false,
                        'color' => ['rgb' => meanifyHelpers()->mask()->removeMask($label_font_color)],
                        'size'  => 10,
                        'name'  => 'Verdana',
                    ],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical'   => Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allborders' => [
                            'style' => Border::BORDER_THIN,
                            'color' => ['rgb' => '808080'],
                        ],
                    ],
                    'fill' => [
                        'fillType'   => Fill::FILL_NONE,
                        'rotation'   => 90,
                        'startColor' => ['rgb' => meanifyHelpers()->mask()->removeMask($label_bg_color)],
                    ],
                ]);

            $spreadsheet->getActiveSheet()->
                getStyle($cell)->
                getAlignment()->
                setHorizontal(Alignment::HORIZONTAL_LEFT)->
                setVertical(Alignment::VERTICAL_CENTER)->
                setWrapText(true);

            // Format cell
            if ($params['format'] == 'currency')
            {
                $spreadsheet->getActiveSheet()->
                    getStyle($cell)->
                    getNumberFormat()->
                    setFormatCode('#,##0.00');
            } else
            {
                $spreadsheet->getActiveSheet()->
                    getStyle($cell)->
                    getNumberFormat()->
                    setFormatCode(NumberFormat::FORMAT_TEXT);
            }

            // Dimensions
            $column = str_replace(['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'], '', $cell);

            $spreadsheet->getActiveSheet()->getColumnDimension($column)->setAutoSize(true);

            // Height
            $row = meanifyHelpers()->string()->onlyNumbers($cell);

            $value = $sheet->getCell($cell)->getValue();

            $lineBreaks = count(explode("\n", $value));

            if (isset($rowsMaxLineBreak[$cell]))
            {
                $max = $rowsMaxLineBreak[$cell];
            } else
            {
                $max = 0;
            }

            if ($lineBreaks > $max)
            {
                $max = $lineBreaks;

                $rowsMaxLineBreak[$cell] = $max;
            }

            $sheet->getRowDimension($row)->setRowHeight($max * 15);
        }

        $response['spreadsheet'] = $spreadsheet;
        $response['sheet']       = $sheet;
        $response['lines']       = $lines;

        return $response;
    }
}
