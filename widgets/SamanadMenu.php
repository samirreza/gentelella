<?php

namespace theme\widgets;

use Yii;

class SamanadMenu extends Menu
{
    protected function getMenuItems()
    {
        $user = Yii::$app->user;
        return [
            [
                'label' => 'فنی مهندسی',
                'icon' => 'wrench',
                'items' => [
                    [
                        'label' => 'شناسه مواد',
                        'icon' => 'tag',
                        'url' => ['/material/type/manage/index'],
                        'visible' => $user->can('material.type')
                    ],
                ]
            ],
            [
                'label' => 'تجهیزات',
                'icon' => 'cogs',
                'items' => [
                    [
                        'label' => 'شناسه تجهیزات',
                        'icon' => 'tag',
                        'url' => ['/equipment/type/manage/index'],
                        'visible' => $user->can('equipment.type')
                    ],
                ]
            ],
            [
                'label' => 'بازرگانی',
                'icon' => 'briefcase',
                'items' => [
                    [
                        'label' => 'داده گاه تامین کنندگان',
                        'icon' => 'database',
                        'url' => ['/supplier/manage/index'],
                        'visible' => $user->canAccessAny(['supplier.create', 'supplier.delete', 'supplier.update'])
                    ]
                ]
            ],
            [
                'label' => 'آی تی',
                'icon' => 'laptop',
                'items' => [
                    [
                        'label' => 'شناسه تجهیزات',
                        'icon' => 'tag',
                        'url' => ['/it/equipment/type/manage/index'],
                        'visible' => $user->can('it.equipment-type'),
                    ]
                ]
            ],
            [
                'label' => 'پژوهش',
                'icon' => 'flask',
                'items' => [
                    [
                        'label' => 'مدیریت کارشناسان',
                        'icon' => 'graduation-cap',
                        'url' => ['/research/expert/manage/index'],
                        'visible' => $user->can('research.manageExperts')
                    ],
                    [
                        'label' => 'مدیریت منشاها',
                        'icon' => 'file-word-o',
                        'url' => ['/research/source/manage/index'],
                        'visible' => $user->canAccessAny([
                            'expert',
                            'research.createSource',
                            'research.manageSource'
                        ])
                    ],
                    [
                        'label' => 'مدیریت پروپوزال ها',
                        'icon' => 'file-word-o',
                        'url' => ['/research/proposal/manage/index'],
                        'visible' => $user->canAccessAny([
                            'expert',
                            'research.manageProposal'
                        ])
                    ],
                    [
                        'label' => 'مدیریت پروژه ها',
                        'icon' => 'file-word-o',
                        'url' => ['/research/project/manage/index'],
                        'visible' => $user->canAccessAny([
                            'expert',
                            'research.manageProject'
                        ])
                    ]
                ]
            ],
            [
                'label' => 'مدیریت کاربران',
                'url' => ['/user/manage/index'],
                'icon' => 'user',
                'visible' => $user->can('superuser')
            ],
            [
                'label' => 'تنظیمات سیستم',
                'url' => ['/setting/manage/index'],
                'icon' => 'cog',
                'visible' =>  $user->can('superuser')
            ],
            [
                'label' => 'تاریخچه تغییرات',
                'url' => ['/changelog/manage/list'],
                'icon' => 'calendar',
                'visible' => $user->can('superuser')
            ]
        ];
    }
}
