<?php
return[
    'general' => [
        'tema' => 1
    ],
    'temas' => [
        1 => 'unap',
        2 => 'uncp',
        3 => 'akdemic',
        4 => 'unica',
        5 => 'undac',
        6 => 'unheval',
        7 => 'unfv',
        8 => 'upal'
    ],
    'AKDEMIC' => [
        'CLIENT_ID' => 'escalafon.285beb57-d5e0-4268-a757-2b8f9fcd98de',
        'CLIENT_NAME' => 'escalafon',
        'CLIENT_SECRET' => '82f3af39-99f0-4339-8247-c90827cc834bg',
        'CONFIG_PARAM' => [
            'AUTHORIZATION_ENDPOINT' => 'https://www.akdemic.com/connect/authorize',
            'END_SESSION_ENDPOINT' => 'https://www.akdemic.com/connect/logout',
            'JWKS_URI' => 'https://www.akdemic.com/.well-known/jwks',
            'TOKEN_ENDPOINT' => 'https://www.akdemic.com/connect/token',
            'TOKEN_ENDPOINT_AUTH_METHODS_SUPPORTED' => [
                'client_secret_post',
                'client_secret_basic',
                'client_secret_jwt',
                'private_key_jwt',
            ],
            'USERINFO_ENDPOINT' => 'https://www.akdemic.com/api/v1/userinfo',
        ],
        'DEBUG' => false,
        'ENABLED' => true,
        'POST_LOGOUT_REDIRECT_URI' => 'akdemic/signout-callback-oidc',
        'PROVIDER_URL' => 'https://www.akdemic.com/',
        'REDIRECT_URL' => 'akdemic/signin-oidc',
        'SCOPE' => [
            1 => 'email',
            2 => 'offline_access',
            3 => 'openid',
            4 => 'profile',
            5 => 'roles',
        ],
    ],
    'state_validation' => [
        0 => 'No Presenta',
        1 => 'Pendiente',
        2 => 'Validado',
        3 => 'Denegado'
    ],
    'pension_regime' => [
        1 => 'Público',
        2 => 'Privado',
        3 => 'Pension Regimen 3'
    ],
    'employment_regime' => [
        1 => 'Sector Público',
        2 => 'Sector Privado',
        3 => 'Employment Regimen 3'
    ],
    'pension_system' => [
        1 => 'AFP',
        2 => 'ONP'
    ],
    'vacation_memorandum_type' => [
        1 => 'Del presente periodo',
        2 => 'De periodos anteriores'
    ],
    'vacation_license_resolution_type' => [
        1 => 'Por matrimonio',
        2 => 'Por enfermedad grave de cónyuge, padres o hijos',
        3 => 'Por vacaciones'
    ],
    'vacation_suspension_document_type' => [
        1 => 'Documento autoritativo de programacion de vacaciones',
        2 => 'Documento autoritativo de vacaciones'
    ],
    'vacation_suspension_document_type_B' => [
        1 => 'Por ocupar cargo directivos y otros',
        2 => 'Cuando la insititucion requiere sus servicios'
    ],
    'license_license_resolution_type' => [
        1 => 'Por enfermedad',
        2 => 'Por maternidad, paternidad, adopci&oacute;n',
        3 => 'Por fallecimiento de c&oacute;nyuge, padres, hijos o hermanos',
        4 => 'Por capacitaci&oacute;n oficializada',
        5 => 'Por enfermedad grave de familiar directo - Ley 30012',
        6 => 'Otros',
        7 => 'Por motivos particulares',
        8 => 'Por capactitaci&oacute;n no oficializada',
        9 => 'Por desempeño de funciones en otras instituciones o universidades nacionales y extranjeros'
    ],
    'license_license_resolution_type_A' => [
        1 => 'Por enfermedad',
        2 => 'Por maternidad, paternidad, adopci&oacute;n',
        3 => 'Por fallecimiento de c&oacute;nyuge, padres, hijos o hermanos',
        4 => 'Por capacitaci&oacute;n oficializada',
        5 => 'Por enfermedad grave de familiar directo - Ley 30012',
        6 => 'Otros'
    ],
    'license_license_resolution_type_B' => [
        7 => 'Por motivos particulares',
        8 => 'Por capactitaci&oacute;n no oficializada',
        9 => 'Por desempeño de funciones en otras instituciones o universidades nacionales y extranjeros'
    ],
    'permit_license_resolution_type' => [
        1 => 'Por enfermedad',
        2 => 'Por gravidez',
        3 => 'Por capacitaci&oacute;n oficializada',
        4 => 'Por citaci&oacute;n expresa',
        5 => 'Por funci&oacute;n edil',
        6 => 'Por docencia o estudios universitarios',
        7 => 'Por representatividad sindical',
        8 => 'Por lactancia',
        9 => 'Por refrigerio',
        10 => 'Descanso por onom&aacute;stico',
        11 => 'A cuenta de vacaciones',
        12 => 'Otros',
        13 => 'Por motivos particulares',
        14 => 'Por capactitaci&oacute;n no oficializada',
        15 => 'Otros'
    ],
    'permit_license_resolution_type_A' => [
        1 => 'Por enfermedad',
        2 => 'Por gravidez',
        3 => 'Por capacitaci&oacute;n oficializada',
        4 => 'Por citaci&oacute;n expresa',
        5 => 'Por funci&oacute;n edil',
        6 => 'Por docencia o estudios universitarios',
        7 => 'Por representatividad sindical',
        8 => 'Por lactancia',
        9 => 'Por refrigerio',
        10 => 'Descanso por onom&aacute;stico',
        11 => 'A cuenta de vacaciones',
        12 => 'Otros'
    ],
    'permit_license_resolution_type_B' => [
        13 => 'Por motivos particulares',
        14 => 'Por capactitaci&oacute;n no oficializada',
        15 => 'Otros'
    ],
    'month_name' => [
        1 => 'enero',
        2 => 'febrero',
        3 => 'marzo',
        4 => 'abril',
        5 => 'mayo',
        6 => 'junio',
        7 => 'julio',
        8 => 'agosto',
        9 => 'setiembre',
        10 => 'octubre',
        11 => 'noviembre',
        12 => 'diciembre'
    ],
    'sections' => [
        'trayectoria_laboral' => 2,
        'sanciones' => 6
    ],
    'memorando' => [
        1 => 'Memorando',
        2 => 'Memorando Multiple',
        3 => 'Oficio',
        4 => 'Oficio Mulplite'
    ],

];