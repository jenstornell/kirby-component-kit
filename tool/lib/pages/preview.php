<?php
namespace JensTornell\ComponentKit;
use response;
use tpl;

class Preview extends View {
    public function run($uid) {
        $args = $this->args($uid);

        $args['title'] = $uid . ' - Component Kit';

        return $this->response($args);
    }

    protected function response($args) {
        $basepath = kirby()->roots()->plugins() . DS . 'kirby-component-kit';
        $path = $basepath . DS . 'tool' . DS . 'templates' . DS . 'home.php';

        return new Response(tpl::load($path, ['data' => $args]), 'html', 200);
    }
}