function propis($amount)
    {
        $ones = ['', 'bir', 'iki', 'üç', 'dört', 'bäş', 'alty', 'ýedi', 'sekiz', 'dokuz'];
        $tens = ['', 'on', 'ýigrimi', 'otuz', 'kyrk', 'elli', 'altmyş', 'ýetmiş', 'segsen', 'togsan'];
        $hundreds = ['', 'bir ýüz', 'iki ýüz', 'üç ýüz', 'dört ýüz', 'bäş ýüz', 'alty ýüz', 'ýedi ýüz', 'sekiz ýüz', 'dokuz ýüz'];

        // Преобразуем сумму в строку и разбиваем на части
        $parts = explode('.', $amount);
        $integerPart = $parts[0];
        $decimalPart = isset($parts[1]) ? $parts[1] : '';

        // Преобразуем целую часть в текст
        $integerText = '';
        if ($integerPart == 0) {
            $integerText = 'sıfır';
        } else {
            $integerPart = str_pad($integerPart, ceil(strlen($integerPart) / 3) * 3, '0', STR_PAD_LEFT); // Дополняем нулями до кратного трём
            $chunks = str_split($integerPart, 3); // Разбиваем на группы по три цифры

            foreach ($chunks as $index => $chunk) {
                $chunkText = '';
                $hundred = intval($chunk[0]);
                $ten = intval($chunk[1]);
                $one = intval($chunk[2]);

                if ($hundred > 0) {
                    $chunkText .= $hundreds[$hundred] . ' ';
                }

                if ($ten == 1) {
                    $chunkText .= 'on ';
                } elseif ($ten > 1) {
                    $chunkText .= $tens[$ten] . ' ';
                }

                if ($one > 0) {
                    $chunkText .= $ones[$one] . ' ';
                }

                if ($index > 0) {
                    // Добавляем название разряда (тысячи, миллионы и т.д.)
                    $chunkText .= ' ';
                }

                if ($index == 2){
                    $integerText = $integerText . ' million ' . $chunkText;
                } elseif($index == 1) {
                    $integerText = $integerText . ' müň ' . $chunkText;
                } else {
                    $integerText = $integerText . $chunkText;
                }


                //
            }
        }
        $decimalPart = substr($decimalPart, 0, 2);

        // Возвращаем текстовое представление суммы
        return $integerText . 'manat ' . $decimalPart .  ' teňňe';
    }
