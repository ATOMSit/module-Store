<?php

namespace Modules\Store\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Upload\File;

class AddressForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('country_code', Field::HIDDEN)
            ->add('street', Field::TEXT)
            ->add('state', Field::HIDDEN)
            ->add('city', Field::TEXT)
            ->add('postal_code', Field::TEXT)
            ->add('latitude', Field::TEXT)
            ->add('longitude', Field::TEXT);
    }
}
