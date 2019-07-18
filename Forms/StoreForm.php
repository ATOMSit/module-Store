<?php

namespace Modules\Store\Forms;

use Kris\LaravelFormBuilder\Field;
use Kris\LaravelFormBuilder\Form;
use Upload\File;

class StoreForm extends Form
{
    public function buildForm()
    {
        $this
            ->add('name', Field::TEXT, [
                'template' => 'application.layouts.fields.text',
                'description' => ""
            ])
            ->add('domain', Field::TEXT, [
                'template' => 'application.layouts.fields.text',
                'description' => ""
            ])
            ->add('description', Field::TEXTAREA)
            ->add('web_site', Field::TEXT, [
                'template' => 'application.layouts.fields.text',
                'description' => ""
            ])
            ->add('address', 'form', [
                'class' => $this->formBuilder->create(AddressForm::class)
            ])
            ->add('submit', Field::BUTTON_SUBMIT);
    }
}
