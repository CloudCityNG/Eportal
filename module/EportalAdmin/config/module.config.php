<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'EportalAdmin\Controller\EportalAdmin' => 'EportalAdmin\Controller\EportalAdminController',
        ),
        'factories' => array(
            'EportalAdmin\Controller\School' => \EportalAdmin\Factory\Controller\SchoolControllerFactory::class,
            'EportalAdmin\Controller\PropertyValue' => \EportalAdmin\Factory\Controller\PropertyValueControllerFactory::class,
        )
    ),
    'router' => array(
        'routes' => array(
            'zfcadmin' => array(
                'options' => array(
                    'defaults' => array(
                        '__NAMESPACE__' => 'EportalAdmin\Controller',
                        'controller'    => 'EportalAdmin',
                        'action'        => 'index',
                    ),
                ),
                'child_routes' => array(
//                    'school-add' => array(
//                        'type'    => 'Literal',
//                        'options' => array(
//                            'route'    => '/school/add',
//                            'defaults' => array(
//                                'controller' => 'EportalAdmin\Controller\School',
//                                'action' => 'add'
//                            ),
//                        ),
//                    ),
//                    'school' => array(
//                        'type'    => 'Segment',
//                        'options' => array(
//                            'route'    => '/school[/:id[/:action]]',
//                            'constraints' => array(
//                                'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
//                            ),
//                            'defaults' => array(
//                                'controller' => 'EportalAdmin\Controller\School',
//                                'action' => 'index'
//                            ),
//                        ),
//                    ),
                    'school' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/school[/:action]',
                            'constraints' => array(
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'EportalAdmin\Controller\School',
                                'action' => 'index'
                            ),
                        ),
                    ),
                    'section' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/section[:id[/:action]]',
                            'constraints' => array(
                                'id' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                                'controller' => 'EportalAdmin\Controller\Section',
                                'action' => 'index'
                            ),
                        ),
                    )
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'EportalAdmin' => __DIR__ . '/../view',
        ),
    ),
);
