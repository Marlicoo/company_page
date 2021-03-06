<?php

namespace AdminBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;

/**
 * {@inheritDoc}
 */
class SecurityController extends BaseController
{
    /**
     * {@inheritDoc}
     */
    public function renderLogin(array $data)
    {
        $requestAttributes = $this->container->get('request')->attributes;

        if ('admin_login' === $requestAttributes->get('_route'))
        {
            $template = sprintf('admin/security:login.html.twig');
        }
        else
        {
            $template = sprintf('FOSUserBundle:Security:login.html.twig');
        }

        return $this->container->get('templating')->renderResponse($template, $data);
    }
}
