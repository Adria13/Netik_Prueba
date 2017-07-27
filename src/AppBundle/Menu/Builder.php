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

        $menu->addChild('Ultimas entradas del blog', array(
            'route' => 'blog_mostrar',
            'routeParameters' => array('id' => $blog->getId())
        ));

        // Creando otro apartado del menú:
        $menu->addChild('Sobre mí', array('route' => 'sobremi'));
        // Puedes también añadir subniveles a tus menús:
        $menu['Sobre mi']->addChild('Editar perfil', array('route' => 'editar_perfil'));

        // ... puedes añadir más subniveles...
        return $menu;
    }
}

?>
