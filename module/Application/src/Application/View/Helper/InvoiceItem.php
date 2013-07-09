<?php

namespace Application\View\Helper;

use Zend\View\Helper\AbstractHelper;

class InvoiceItem extends AbstractHelper
{

	public function __invoke()
    {
       return 'InvoiceItem aus ApplicationModule';
    }

}