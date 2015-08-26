<?php

namespace tests\web\admin\ngrest\plugins;

class ImageTest extends \tests\web\BasePlugin
{
    public function testPlugin()
    {
        $text = new \admin\ngrest\plugins\Image();
        $this->assertEquals("<span>{{item.}}</span>", $this->renderListHtml($text));
        $this->assertEquals('<zaa-image-upload fieldid="" fieldname="" model="" label="" grid="" options=\'{"no_filter":false}\'></zaa-image-upload>', $this->renderCreateHtml($text));
        $this->assertEquals('<zaa-image-upload fieldid="" fieldname="" model="" label="" grid="" options=\'{"no_filter":false}\'></zaa-image-upload>', $this->renderUpdateHtml($text));
        
        /* @todo: test against real config values 
        $text->setConfig('id', 'foo', 'bar', 'baz', 12);
        $this->assertEquals("<span>{{item.}}</span>", $this->renderListHtml($text));
        $this->assertEquals('<zaa-text fieldid="" fieldname="" model="" label="" grid="" placeholder=""></zaa-text>', $this->renderCreateHtml($text));
        $this->assertEquals('<zaa-text fieldid="" fieldname="" model="" label="" grid="" placeholder=""></zaa-text>', $this->renderUpdateHtml($text));
        */
    }
}