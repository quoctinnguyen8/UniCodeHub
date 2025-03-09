<?php
namespace App\Services;

use App\Common\Enums\LanguageEnum;
use Illuminate\Support\Facades\Http;
class PistonApiService
{
    const EXECUTE_ENDPOINT = '/execute';
    protected $baseUrl;

    public function __construct()
    {
        // lấy thông tin api url từ file .env
        $this->baseUrl = env('PISTON_API_BASE_URL');
    }

    function execute($sourceCode, $language)
    {
        // chuyển ngôn ngữ về dạng chuẩn
        $language = LanguageEnum::from($language)->getLanguage();
        // tạo json để gửi lên api
        $data = [
            'language' => $language,
            'version' => '*',
            'files' => [
                [
                    'name' => 'main.' . $language,
                    'content' => $sourceCode
                ]
            ]
        ];
        // nhận response từ api
        $response = Http::post($this->baseUrl . self::EXECUTE_ENDPOINT, $data);
        // trả về 1 mảng từ json response
        return $response->json();
    }
}