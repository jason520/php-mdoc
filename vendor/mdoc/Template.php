<?php
/**
 * @file Template.php
 * @brief A simple template class.
 * @author JonChou <ilorn.mc@gmail.com>
 * @date 2012-11-26
 */

namespace mdoc;

class Template {

    private $template, $data;

    public function __construct($template, $data)
    {
        $this->template = $template;
        $this->data = $data;
    }

    public function render()
    {
        extract($this->data, EXTR_OVERWRITE);

        ob_start();
        include $this->template;

        return ob_get_clean();
    }
}
