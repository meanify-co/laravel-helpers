<?php

namespace Meanify\LaravelHelpers;

use Meanify\LaravelHelpers\Utils\CookieUtil;
use Meanify\LaravelHelpers\Utils\ArrayUtil;
use Meanify\LaravelHelpers\Utils\BladeUtil;
use Meanify\LaravelHelpers\Utils\ConsoleUtil;
use Meanify\LaravelHelpers\Utils\CountryUtil;
use Meanify\LaravelHelpers\Utils\DateTimeUtil;
use Meanify\LaravelHelpers\Utils\EncryptionUtil;
use Meanify\LaravelHelpers\Utils\FileAndDirectoryUtil;
use Meanify\LaravelHelpers\Utils\FloatUtil;
use Meanify\LaravelHelpers\Utils\FormatterUtil;
use Meanify\LaravelHelpers\Utils\GitUtil;
use Meanify\LaravelHelpers\Utils\HtmlUtil;
use Meanify\LaravelHelpers\Utils\ImageUtil;
use Meanify\LaravelHelpers\Utils\JobUtil;
use Meanify\LaravelHelpers\Utils\LogUtil;
use Meanify\LaravelHelpers\Utils\MaskUtil;
use Meanify\LaravelHelpers\Utils\ModelUtil;
use Meanify\LaravelHelpers\Utils\ObjectUtil;
use Meanify\LaravelHelpers\Utils\ParseUtil;
use Meanify\LaravelHelpers\Utils\PdfUtil;
use Meanify\LaravelHelpers\Utils\PhoneNumberUtil;
use Meanify\LaravelHelpers\Utils\RequestUtil;
use Meanify\LaravelHelpers\Utils\RuleUtil;
use Meanify\LaravelHelpers\Utils\SqlUtil;
use Meanify\LaravelHelpers\Utils\StringUtil;
use Meanify\LaravelHelpers\Utils\TimezoneUtil;
use Meanify\LaravelHelpers\Utils\TranslationUtil;
use Meanify\LaravelHelpers\Utils\ValidationUtil;
use Meanify\LaravelHelpers\Utils\XlsxUtil;
use Meanify\LaravelHelpers\Utils\ZipUtil;

class Kernel
{
    public function array()
    {
        return new ArrayUtil;
    }

    public function blade()
    {
        return new BladeUtil;
    }

    public function console()
    {
        return new ConsoleUtil;
    }

    public function cookie()
    {
        return new CookieUtil();
    }
    
    public function country()
    {
        return new CountryUtil;
    }

    public function datetime()
    {
        return new DateTimeUtil;
    }

    public function decimal()
    {
        return new FloatUtil;
    }

    public function encryption()
    {
        return new EncryptionUtil;
    }

    public function directory()
    {
        return new FileAndDirectoryUtil;
    }

    public function files()
    {
        return new FileAndDirectoryUtil;
    }

    public function float()
    {
        return new FloatUtil;
    }

    public function formatter()
    {
        return new FormatterUtil;
    }

    public function git()
    {
        return new GitUtil;
    }

    public function html()
    {
        return new HtmlUtil;
    }

    public function image()
    {
        return new ImageUtil;
    }

    public function jobsAndQueues()
    {
        return new JobUtil;
    }

    public function log()
    {
        return new LogUtil;
    }

    public function mask()
    {
        return new MaskUtil;
    }

    public function model()
    {
        return new ModelUtil;
    }

    public function object()
    {
        return new ObjectUtil;
    }

    public function parse()
    {
        return new ParseUtil;
    }

    public function pdf()
    {
        return new PdfUtil();
    }

    public function phone()
    {
        return new PhoneNumberUtil;
    }

    public function request()
    {
        return new RequestUtil;
    }

    public function sql()
    {
        return new SqlUtil;
    }

    public function rules()
    {
        return new RuleUtil;
    }

    public function string()
    {
        return new StringUtil;
    }

    public function timezone()
    {
        return new TimezoneUtil;
    }

    public function translate()
    {
        return new TranslationUtil();
    }

    public function translation()
    {
        return new TranslationUtil();
    }

    public function validation()
    {
        return new ValidationUtil();
    }

    public function xlsx()
    {
        return new XlsxUtil;
    }

    public function zip()
    {
        return new ZipUtil;
    }
}
