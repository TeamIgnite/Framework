<?php

class MarkdownController extends Framework\Controller\Markdown {

    public function index() {
        $markdown = "## Hello";

        return $markdown;
    }

}
