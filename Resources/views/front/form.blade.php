<?php $currentLocale    = LaravelLocalization::getCurrentLocale(); ?>
<?php $formContent        = $form->getFormContent($currentLocale)->content ?>
{!! Form::open(['route' => ['front.formbuilder.formbuilder.send'], 'method' => 'post', 'files' => true, 'class' => 'form-horizontal']) !!}
	{!! Form::hidden("formbuilder_id", $form->id) !!}
	{!! Form::hidden("formbuilder_locale", $currentLocale) !!}
	{!! Shortcode::parse($formContent) !!}
{!! Form::close() !!}
