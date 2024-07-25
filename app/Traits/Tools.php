<?php

namespace App\Traits;

trait Tools
{
    function convertNumberToWord($number)
    {
        $arabicOnes = [
            "", "واحد", "اثنان", "ثلاثة", "أربعة", "خمسة", "ستة", "سبعة", "ثمانية", "تسعة",
            "عشرة", "أحد عشر", "اثنا عشر", "ثلاثة عشر", "أربعة عشر", "خمسة عشر", "ستة عشر", "سبعة عشر", "ثمانية عشر", "تسعة عشر"
        ];
        $arabicTens = ["", "", "عشرون", "ثلاثون", "أربعون", "خمسون", "ستون", "سبعون", "ثمانون", "تسعون"];
        $arabicHundreds = ["", "مائة", "مائتان", "ثلاثمائة", "أربعمائة", "خمسمائة", "ستمائة", "سبعمائة", "ثمانمائة", "تسعمائة"];
        $arabicThousands = ["", "ألف", "ألفان", "آلاف", "آلاف"];
        $arabicMillions = ["", "مليون", "مليونان", "ملايين", "ملايين"];
        $arabicBillions = ["", "مليار", "ملياران", "مليارات", "مليارات"];

        if ($number == 0) {
            return "صفر";
        }

        if ($number < 20) {
            return $arabicOnes[$number];
        } elseif ($number < 100) {
            return $arabicTens[intval($number / 10)] . " و " . $arabicOnes[$number % 10];
        } elseif ($number < 1000) {
            return $arabicHundreds[intval($number / 100)] . " و " . $this->convertNumberToWord($number % 100);
        } elseif ($number < 1000000) {
            return $this->convertNumberToWord(intval($number / 1000)) . " " . $arabicThousands[3] . " و " . $this->convertNumberToWord($number % 1000);
        } elseif ($number < 1000000000) {
            return $this->convertNumberToWord(intval($number / 1000000)) . " " . $arabicMillions[3] . " و " . $this->convertNumberToWord($number % 1000000);
        } else {
            return $this->convertNumberToWord(intval($number / 1000000000)) . " " . $arabicBillions[3] . " و " . $this->convertNumberToWord($number % 1000000000);
        }
    }

    public function numberToOrdinal($number)
    {
        if (!is_numeric($number) || $number <= 0) {
            return "غير صالح"; // Handle invalid input
        }

        $ordinalSuffixes = [
            1 => 'الأول',
            2 => 'الثاني',
            3 => 'الثالث',
            4 => 'الرابع',
            5 => 'الخامس',
            6 => 'السادس',
            7 => 'السابع',
            8 => 'الثامن',
            9 => 'التاسع',
            10 => 'العاشر'
        ];

        // Support for larger numbers
        if ($number <= 10) {
            return $ordinalSuffixes[$number];
        } else {
            $units = $number % 10;
            $tens = floor($number / 10);

            // Determine the appropriate suffix for numbers greater than 10
            $suffix = '';

            if ($tens == 1) {
                $suffix = 'عشر';
            } else {
                $suffix = $this->numberToOrdinal($tens) . ' عشر';
            }

            if ($units > 0) {
                $suffix = $this->numberToOrdinal($units) . ' ' . $suffix;
            }

            return $suffix;
        }
    }

}
