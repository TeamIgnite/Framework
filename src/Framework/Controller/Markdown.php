<?php

namespace Framework\Controller;

use dflydev\markdown\MarkdownParser;

/**
 * Class Markdown
 * A controller that automatically renders markdown.
 *
 * @package Framework\Controller
 */
class Markdown extends Base {

    public function _render($class, $method, $args) {
        $out = parent::_render($class, $method, $args);

        $parser = new MarkdownParser();
        $html = $parser->transformMarkdown($out);

        $this->response->header('Content-Type', 'text/html; charset=' . $this->charset);
        $this->response->body($html);

        $this->response->send();
    }

}
