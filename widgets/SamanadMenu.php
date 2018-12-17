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
                        'label' => 'آزمایشگاه و فرایند',
                        'items' => [
                            [
                                'label' => 'تجهیزات آزمایشگاه',
                                'url' => ['/research/lab/manage/index'],
                                'visible' => $user->can('material.type')
                            ],
                            [
                                'label' => 'مواد و کالای آزمایشگاه',
                                'url' => '#',
                            ],
                            [
                                'label' => 'مواد و کالای فرایندی',
                                'url' => ['/research/material/manage/index'],
                                'visible' => $user->can('research.material')
                            ],
                            [
                                'label' => 'آزمایشات',
                                'url' => '#'
                            ],
                            [
                                'label' => 'دستور العمل ها',
                                'url' => '#'
                            ],
                            [
                                'label' => 'گزارش تجربی',
                                'url' => '#'
                            ],
                            [
                                'label' => 'بهره برداری',
                                'url' => '#'
                            ],
                            [
                                'label' => 'منابع',
                                'url' => '#'
                            ]
                        ]
                    ],
                    [
                        'label' => 'مطالعات و پژوهش',
                        'items' => [
                            [
                                'label' => 'کارشناسان',
                                'url' => ['/research/expert/manage/index'],
                                'visible' => $user->can('research.manage')
                            ],
                            [
                                'label' => 'گزارشات',
                                'url' => ['/research/project/manage/index'],
                                'visible' => $user->canAccessAny([
                                    'expert',
                                    'research.manage'
                                ])
                            ],
                            [
                                'label' => 'منشا',
                                'url' => ['/research/source/manage/index'],
                                'visible' => $user->canAccessAny([
                                    'expert',
                                    'research.manage'
                                ])
                            ],
                            [
                                'label' => 'پروپوزال',
                                'url' => ['/research/proposal/manage/index'],
                                'visible' => $user->canAccessAny([
                                    'expert',
                                    'research.manage'
                                ])
                            ],
                            [
                                'label' => 'منابع',
                                'url' => ['/research/resource/manage/index'],
                                'visible' => $user->canAccessAny([
                                    'expert',
                                    'research.manage'
                                ])
                            ]
                        ]
                    ],
                    [
                        'label' => 'گزارش های مدیریتی',
                        'items' => [
                            [
                                'label' => 'پروپوزال',
                                'url' => ['/research/proposal/manage/report'],
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
                    ],
                    [
                        'label' => 'گزارش های مدیریتی',
                        'items' => [
                            [
                                'label' => 'شناسه تجهیزات',
                                'url' => ['/it/equipment/type/manage/report'],
                                'visible' => $user->can('superuser')
                            ]
                        ]
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
