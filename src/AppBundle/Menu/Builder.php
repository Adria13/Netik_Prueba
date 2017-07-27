<?php
// src/AppBundle/Menu/Builder.php
namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Inicio', array('route' => 'inicio'));

        // Accede a los servicios desde el contenedor:
        $em = $this->container->get('doctrine')->getManager();

        $centroMedico = $em->getRepository('AppBundle:CentroMedico')->findMostRecent();

        $menu->addChild('Centros Medicos', array(
            'route' => 'centro_medico_show',
            'routeParameters' => array('id' => $centroMedico->getId())
        ));

        $menu->addChild('Crear Centros Medicos', array(
            'route' => 'centro_medico_new',
            'routeParameters' => array('id' => $centroMedico->getId())
        ));
    }
}

?>
