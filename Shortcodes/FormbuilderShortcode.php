<?php

namespace Modules\Formbuilder\Shortcodes;

use Illuminate\View\View;
use Modules\Formbuilder\Entities\Forms;
use Pingpong\Shortcode\ShortcodeFacade as Shortcode;

class FormbuilderShortcode
{
    public static function registerSubmitShortcode($key, $value)
    {
        Shortcode::register($key, function ($attr, $content = null, $name = null) use ($value) {
            $text = Shortcode::parse($content);
            return $value;
        });
    }

    public static function form($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $idForm = (int) array_get($attr, 'id');
        $form = Forms::find($idForm);

        if ($form->id) {
            $templateForm = 'formbuilder::front.form';
            $content = view($templateForm, compact('form', 'attr'))->render();
        }

        return $content;
    }

    public static function textinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.textinput';
        return view($template, compact('attr'))->render();
    }

    public static function identityinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.identityinput';
        return view($template, compact('attr'))->render();
    }

    public static function passwordinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.passwordinput';
        return view($template, compact('attr'))->render();
    }

    public static function searchinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.searchinput';
        return view($template, compact('attr'))->render();
    }

    public static function prependedtext($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.prependedtext';
        return view($template, compact('attr'))->render();
    }

    public static function appendedtext($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.appendedtext';
        return view($template, compact('attr'))->render();
    }

    public static function prependedcheckbox($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.prependedcheckbox';
        return view($template, compact('attr'))->render();
    }

    public static function appendedcheckbox($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.appendedcheckbox';
        return view($template, compact('attr'))->render();
    }

    public static function buttondropdown($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.buttondropdown';
        return view($template, compact('attr'))->render();
    }

    public static function textarea($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.textarea';
        return view($template, compact('attr'))->render();
    }

    public static function multiplecheckboxes($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.multiplecheckboxes';
        return view($template, compact('attr'))->render();
    }

    public static function multiplecheckboxesinline($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.multiplecheckboxesinline';
        return view($template, compact('attr'))->render();
    }

    public static function multipleradios($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.multipleradios';
        return view($template, compact('attr'))->render();
    }

    public static function multipleradiosinline($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.multipleradiosinline';
        return view($template, compact('attr'))->render();
    }

    public static function selectbasic($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.selectbasic';
        return view($template, compact('attr'))->render();
    }

    public static function selectmultiple($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.selectmultiple';
        return view($template, compact('attr'))->render();
    }

    public static function filebutton($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.filebutton';
        return view($template, compact('attr'))->render();
    }

    public static function button($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.button';

        return view($template, compact('attr'))->render();
    }

    public static function buttondouble($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.buttondouble';
        return view($template, compact('attr'))->render();
    }

    public static function emailinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.emailinput';
        return view($template, compact('attr'))->render();
    }

    public static function urlinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.urlinput';
        return view($template, compact('attr'))->render();
    }

    public static function telinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.telinput';
        return view($template, compact('attr'))->render();
    }

    public static function dateinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.dateinput';
        return view($template, compact('attr'))->render();
    }

    public static function numberinput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.numberinput';
        return view($template, compact('attr'))->render();
    }

    public static function captchainput($attr, $content = null, $name = null)
    {
        $attr = $attr->getParameters();
        $template = 'formbuilder::front.form.captchainput';
        return view($template, compact('attr'))->render();
    }
}
