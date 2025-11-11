<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => [
                    'en' => 'What products does Alssad Steel offer?',
                    'ar' => 'ما هي المنتجات التي تقدمها شركة حديد السد؟',
                ],
                'answer' => [
                    'en' => 'We manufacture a diverse portfolio of steel products including rebars, pipes, and custom steel solutions tailored to major construction projects.',
                    'ar' => 'نقوم بتصنيع مجموعة متنوعة من منتجات الصلب تشمل حديد التسليح والمواسير والحلول الفولاذية المخصصة للمشاريع الإنشائية الكبرى.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'How can I request a quotation?',
                    'ar' => 'كيف يمكنني طلب عرض سعر؟',
                ],
                'answer' => [
                    'en' => 'You can request a quotation via the quote form on our website or by contacting our sales team at 920002267.',
                    'ar' => 'يمكنك طلب عرض سعر من خلال نموذج طلب عرض السعر على موقعنا أو عن طريق التواصل مع فريق المبيعات على الرقم 920002267.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'What certifications has the company obtained?',
                    'ar' => 'ما هي الشهادات التي حصلت عليها الشركة؟',
                ],
                'answer' => [
                    'en' => 'Alssad Steel holds ISO9001 and SASO certifications, ensuring the highest standards of quality across our operations.',
                    'ar' => 'تحمل شركة حديد السد شهادات ISO9001 وSASO مما يضمن أعلى معايير الجودة في جميع عملياتنا.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
            [
                'question' => [
                    'en' => 'Do you ship products outside Saudi Arabia?',
                    'ar' => 'هل تقومون بشحن المنتجات خارج المملكة العربية السعودية؟',
                ],
                'answer' => [
                    'en' => 'Yes, we support regional exports. Please contact us to coordinate logistics and shipping requirements.',
                    'ar' => 'نعم، ندعم التصدير الإقليمي. يُرجى التواصل معنا لتنسيق المتطلبات اللوجستية والشحن.',
                ],
                'status' => Faq::STATUS_ACTIVE,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(
                ['question->en' => $faq['question']['en']],
                $faq
            );
        }
    }
}
