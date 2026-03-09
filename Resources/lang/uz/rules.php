<?php

return [
    'meta' => [
        'title' => 'Qoidalar',
        'description' => 'Server qoidalari va nizomlar',
    ],
    'page_title' => 'Qoidalar',
    'page_description' => 'Server qoidalari va nizomlarini o\'qing',
    'back_to_rules' => 'Qoidalarga qaytish',
    'no_categories' => 'Qoidalar kategoriyalari topilmadi',
    'category_not_found' => 'Qoidalar kategoriyasi topilmadi',
    'no_content' => 'Mavjud tarkib yo\'q',
    'content_changed' => 'Oxirgi yangilanish: :date',

    'admin' => [
        'menu' => [
            'rules' => 'Qoidalar',
        ],
        'title' => [
            'categories' => 'Qoidalar kategoriyalari',
            'categories_description' => 'Qoidalar kategoriyalarini boshqarish',
            'add_category' => 'Kategoriya qo\'shish',
            'edit_category' => ':category kategoriyasini tahrirlash',
        ],
        'fields' => [
            'name' => 'Nomi',
            'content' => 'Tarkib',
            'active' => 'Faol',
            'parent_category' => 'Asosiy kategoriya',
            'no_parent' => 'Asosiysiz (yuqori daraja)',
        ],
        'placeholders' => [
            'category_name' => 'Kategoriya nomini kiriting',
            'content' => 'Kategoriya tarkibi',
            'parent_category' => 'Asosiy kategoriyani tanlang',
        ],
        'helps' => [
            'content' => 'Ushbu kategoriya uchun boy matnli tarkib',
            'parent_category' => 'Yuqori darajali kategoriya uchun bo\'sh qoldiring',
        ],
        'messages' => [
            'no_categories' => 'Qoidalar kategoriyalari topilmadi',
            'add_first_category' => 'Birinchi qoidalar kategoriyangizni qo\'shing',
            'category_not_found' => 'Qoidalar kategoriyasi topilmadi',
            'error' => 'Xato',
            'name_required' => 'Kategoriya nomi majburiy',
            'category_created' => 'Qoidalar kategoriyasi muvaffaqiyatli yaratildi',
            'category_updated' => 'Qoidalar kategoriyasi muvaffaqiyatli yangilandi',
            'category_deleted' => ':category qoidalar kategoriyasi muvaffaqiyatli o\'chirildi',
            'delete_error' => 'Kategoriyani o\'chirishda xatolik',
            'confirm_delete' => 'Ushbu qoidalar kategoriyasini o\'chirishni xohlaysizmi?',
            'invalid_sort_data' => 'Noto\'g\'ri tartiblash ma\'lumotlari',
            'categories_reordered' => 'Kategoriyalar tartibi yangilandi',
            'cannot_set_self_as_parent' => 'Kategoriyani o\'zining asosiysi qilib belgilab bo\'lmaydi',
            'category_has_children' => 'Pastki kategoriyalari bor kategoriyani o\'chirib bo\'lmaydi',
        ],
        'status' => [
            'active' => 'Faol',
            'inactive' => 'Nofaol',
        ],
    ],
];
