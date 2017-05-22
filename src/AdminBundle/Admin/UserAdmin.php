<?php

namespace AdminBundle\Admin;

use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;


class UserAdmin extends BaseUserAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper->with('General')->add('username')->add('email')->end();
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->with('General')
            ->add('username')
            ->add('email')
            ->add('plainPassword', 'text', ['required' => false])
            ->end();

        if (!$this->getSubject()->hasRole('ROLE_ADMIN'))
        {
            $formMapper->with('Management')
                ->add('roles', 'sonata_security_roles', [
                    'expanded' => true,
                    'multiple' => true,
                    'required' => false
                ])
                ->add('locked', null, ['required' => false])
                ->add('expired', null, ['required' => false])
                ->add('enabled', null, ['required' => false])
                ->add('credentialsExpired', null, ['required' => false])
                ->end();
        }
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $filterMapper)
    {
        $filterMapper->add('id')->add('username')->add('locked')->add('email');
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('username', null, ['label' => 'Nazwa konta'])
            ->add('email', null, ['label' => 'E-mail'])
            ->add('enabled', null, ['label' => 'Aktywne'])
            ->add('createdAt', null, ['label' => 'Utworzone'])
            ->add('updatedAt', null, ['label' => 'Ostatnia aktualizacja']);
    }
}