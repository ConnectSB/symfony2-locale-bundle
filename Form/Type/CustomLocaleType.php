<?php

namespace ConnectSB\LocaleBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\View\ChoiceView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CustomLocaleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars = array_replace($view->vars, array(
            'excluded_locales' => $options['excluded_locales']
        ));

        $preferredChoices = $view->vars['preferred_choices'];
        $choices = $view->vars['choices'];

        /** @var ChoiceView $choice */
        foreach ($view->vars['excluded_locales'] as $exludedLocale) {
            foreach ($preferredChoices as $key => $preferredChoice) {
                if ($preferredChoice->value == $exludedLocale) {
                    unset($preferredChoices[$key]);
                }
            }

            foreach ($choices as $key => $choice) {
                if ($choice->value == $exludedLocale) {
                    unset($choices[$key]);
                }
            }
        }

        $view->vars = array_replace($view->vars, array(
            'choices' => $choices,
            'preferred_choices' => $preferredChoices
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'excluded_locales' => array()
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getParent()
    {
        return 'locale';
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'custom_locale';
    }
}