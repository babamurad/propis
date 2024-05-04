# php Функция сумма прописью на туркменском языке - propis()
## Можете доработать/изменить под свои нужды. Пользуйтесь на здоровье!

## Описание
Функция `propis()` преобразует сумму в текстовое представление на туркменском языке.

## Параметры
- `float $amount`: Сумма для преобразования в текст.

## Возвращаемое значение
- `string`: Строковое представление суммы на туркменском языке.

## Пример использования

```php
$amount = 1234567.89;
echo propis($amount); // выводит "bir millyon iki ýüz otuz dört müň bäş ýüz altmyş ýedi manat 89 teňňe"
