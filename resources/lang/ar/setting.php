<?php

return [
    'login'           => [
        'label'        => 'حقل الدخول',
        'instructions' => 'ما هو الحقل الذي تريد استخدامه لتسجيل الدخول?',
        'option'       => [
            'email'    => 'البريد الالكتروني',
            'username' => 'اسم المستخدم',
        ],
    ],
    'activation_mode' => [
        'label'        => 'وضع التفعيل',
        'instructions' => 'كيف يمكن للمستخدمين تنشيط حسابهم بعد التسجيل?',
        'option'       => [
            'email'     => 'ارسال رمز التفعيل على البريد الاللكتروني للمستخدمين.',
            'manual'    => 'يتطلب من المدير تنشيط حساب المستخدم بشكل يدوي.',
            'automatic' => 'تنشيط حساب المستخدم بشكل تلقائي بعد التسجيل.',
        ],
    ],
];