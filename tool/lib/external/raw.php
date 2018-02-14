<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class ExternalRaw extends View {
    public function run($id) {
        $args = $this->args($id);

        return $this->response($args);
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'components' . DS . '--raw' . DS . 'component.php';

        $Render = new Render(kirby());
        $html = $Render->snippet($path, $args);

        return new Response(trim($html), 'html', 200);
    }
}