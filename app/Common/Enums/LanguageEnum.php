<?php

namespace App\Common\Enums;

enum LanguageEnum: string {
    case C = 'c';
    case Cpp = 'c++';
    case Php = 'php';
    case Javascript = 'javascript';
    case Python = 'python';
    case Java = 'java';
    case CSharp = 'c#';

    public function getLanguage(): string {
        return match ($this) {
            self::C => 'c',
            self::Cpp => 'cpp',
            self::Php => 'php',
            self::Javascript => 'js',
            self::Python => 'py',
            self::Java => 'java',
            self::CSharp => 'cs',
        };
    }
}
