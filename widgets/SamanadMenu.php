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
                'label' => 'پژوهش',
                'icon' => 'flask',
                'items' => [
                    [
                        'label' => 'شناسه مواد فرایندی و آزمایشگاهی',
                        'icon' => 'tag',
                        'url' => ['/material/type/manage/index'],
                        'visible' => $user->can('material.type')
                    ],
                    [
                        'label' => 'کارشناسان',
                        'icon' => 'graduation-cap',
                        'url' => ['/research/expert/manage/index'],
                        'visible' => $user->can('research.manage')
                    ],
                    [
                        'label' => 'منشا',
                        'icon' => 'file-word-o',
                        'url' => ['/research/source/manage/index'],
                        'visible' => $user->canAccessAny([
                            'expert',
                            'research.manage'
                        ])
                    ],
                    [
                        'label' => 'پروپوزال',
                        'icon' => 'file-word-o',
                        'url' => ['/research/proposal/manage/index'],
                        'visible' => $user->canAccessAny([
                            'expert',
                            'research.manage'
                        ])
                    ],
                    [
                        'label' => 'گزارش',
                        'icon' => 'file-word-o',
                        'url' => ['/research/project/manage/index'],
                        'visible' => $user->canAccessAny([
                            'expert',
                            'research.manage'
                        ])
                    ],
                    [
                        'label' => 'گزارش های مدیریتی',
                        'icon' => 'book',
                        'items' => [
                            [
                                'label' => 'پروپوزال',
                                'icon' => 'file-word-o',
                                'url' => ['/research/proposal/manage/manager-index'],
                                'visible' => $user->can('superuser')
                            ]
                        ]
                    ]
                ]
            ],
            [
                'label' => 'فنی',
                'icon' => 'wrench',
                'items' => [
                    [
                        'label' => 'شناسه تجهیزات',
                        'icon' => 'tag',
                        'url' => ['/equipment/type/manage/index'],
                        'visible' => $user->can('equipment.type')
                    ]
                ]
            ],
            [
                'label' => 'تجهیزات',
                'icon' => 'cogs',
                'items' => [
                    [
                        'label' => 'شناسه مواد سرویس ونگهداری',
                        'icon' => 'tag',
                        'url' => ['/equipment/type/manage/material'],
                        'visible' => $user->can('material.type')
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
                'label' => 'پشتیبانی',
                'icon' => 'wrench'
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
                'label' => 'مالی',
                'icon' => 'wrench'
            ],
            [
                'label' => 'اداری',
                'icon' => 'wrench'
            ],
            [
                'label' => 'بندر',
                'icon' => 'wrench'
            ],
            [
                'label' => 'کاربران',
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
