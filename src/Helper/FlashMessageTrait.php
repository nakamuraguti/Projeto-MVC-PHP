<?php
    namespace Alura\Cursos\Helper;

    trait FlashMessageTrait {
        public function defineMessage(string $alertType, string $message) : void {
            $_SESSION['alertType'] = $alertType;
            $_SESSION['message'] = $message;
        }
    }
?>