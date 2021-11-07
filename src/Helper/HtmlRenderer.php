<?php
    namespace Alura\Cursos\Helper;

    trait HtmlRenderer {
        public function renderHTML(string $templatePath, array $data) {
            extract($data);
            ob_start();
            require __DIR__ . '/../../views/' . $templatePath;
            $html = ob_get_clean();

            return $html;
        }
    }
?>