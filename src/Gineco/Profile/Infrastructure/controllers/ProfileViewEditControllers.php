<?php

declare(strict_types=1);


namespace SysGineco\Gineco\Profile\Infrastructure\controllers;


use App\Http\Controllers\Controller;
use Inertia\Inertia;

final class ProfileViewEditControllers extends Controller
{
    public function execute()
    {
        return Inertia::render('Profile/View/Edit', [
            'breadcrumb' => $this->getBreadcrumb(),
        ]);
    }

    private function getBreadcrumb(): array
    {
        return [
            [
                'name' => 'Profile',
                'link' => false,
                'route' => ''
            ],
            [
                'name' => 'Editar',
                'link' => false,
                'route' => ''
            ],
        ];
    }
}
