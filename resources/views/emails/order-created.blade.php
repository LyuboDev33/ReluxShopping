<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        Потвърждение на поръчка {{ $order->order_number }}
    </title>
</head>

<body
    style="
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        font-family: Arial, Helvetica, sans-serif;
        color: #333333;
    ">
    <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
        style="background-color: #f4f4f4;">
        <tr>
            <td align="center" style="padding: 30px 15px;">
                <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                    style="
                        width: 100%;
                        max-width: 760px;
                        background-color: #ffffff;
                        border-radius: 12px;
                        overflow: hidden;
                    ">
                    {{-- Header --}}
                    <tr>
                        <td align="center"
                            style="
                                padding: 35px 25px 20px;
                                background-color: #ffffff;
                            ">
                            <img src="{{ url('/assets/images/resources/order-success.png') }}" alt="Успешна поръчка"
                                width="100"
                                style="
                                    display: block;
                                    width: 100px;
                                    max-width: 100px;
                                    height: auto;
                                    border: 0;
                                    margin: 0 auto 20px;
                                ">

                            <h1
                                style="
                                    margin: 0 0 12px;
                                    font-size: 26px;
                                    line-height: 34px;
                                    color: #222222;
                                ">
                                Благодарим Ви за поръчката!
                            </h1>

                            <p
                                style="
                                    margin: 0 0 8px;
                                    font-size: 16px;
                                    line-height: 25px;
                                    color: #666666;
                                ">
                                Получихме Вашата поръчка и ще се свържем с Вас при необходимост.
                            </p>

                            <p
                                style="
                                    margin: 0;
                                    font-size: 16px;
                                    line-height: 25px;
                                    color: #333333;
                                ">
                                Номер на поръчка:
                                <strong>{{ $order->order_number }}</strong>
                            </p>
                        </td>
                    </tr>

                    {{-- Customer information --}}
                    <tr>
                        <td style="padding: 15px 30px 5px;">
                            <h2
                                style="
                                    margin: 0 0 15px;
                                    font-size: 20px;
                                    line-height: 28px;
                                    color: #222222;
                                ">
                                Данни за клиента
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                                style="
                                    border: 1px solid #e8e8e8;
                                    border-radius: 8px;
                                ">
                                <tr>
                                    <td
                                        style="
                                            padding: 18px;
                                            font-size: 14px;
                                            line-height: 23px;
                                            color: #555555;
                                        ">
                                        <strong>Име:</strong>
                                        {{ $order->first_name }}
                                        {{ $order->last_name }}

                                        <br>

                                        <strong>Имейл:</strong>
                                        {{ $order->email }}

                                        <br>

                                        <strong>Телефон:</strong>
                                        {{ $order->phone }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Products --}}
                    <tr>
                        <td style="padding: 25px 30px 5px;">
                            <h2
                                style="
                                    margin: 0 0 15px;
                                    font-size: 20px;
                                    line-height: 28px;
                                    color: #222222;
                                ">
                                Продукти
                            </h2>

                            @foreach ($orderProducts as $product)
                                <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                                    style="
                                        margin-bottom: 16px;
                                        border: 1px solid #e8e8e8;
                                        border-radius: 8px;
                                    ">
                                    <tr>
                                        <td width="110" valign="top" style="padding: 16px;">
                                            <a href="{{ url('/shop/product/' . $product->product_slug) }}"
                                                target="_blank" style="text-decoration: none;">
                                                <img src="{{ url('/assets/images/products/' . $product->product_image) }}"
                                                    alt="{{ $product->product_name }}" width="90"
                                                    style="
                                                        display: block;
                                                        width: 90px;
                                                        height: 90px;
                                                        object-fit: cover;
                                                        border: 0;
                                                        border-radius: 8px;
                                                    ">
                                            </a>
                                        </td>

                                        <td valign="top"
                                            style="
                                                padding: 16px 16px 16px 0;
                                                font-size: 14px;
                                                line-height: 22px;
                                                color: #555555;
                                            ">
                                            <a href="{{ url('/shop/product/' . $product->product_slug) }}"
                                                target="_blank"
                                                style="
                                                    display: inline-block;
                                                    margin-bottom: 8px;
                                                    color: #222222;
                                                    font-size: 17px;
                                                    line-height: 24px;
                                                    font-weight: 700;
                                                    text-decoration: none;
                                                ">
                                                {{ $product->product_name }}
                                            </a>

                                            <br>

                                            <strong>Количество:</strong>
                                            {{ $product->quantity }}

                                            @if (!empty($product->lens_index))
                                                <br>

                                                <strong>Индекс на стъклото:</strong>

                                                {{ data_get($product->lens_index, 'name', data_get($product->lens_index, 'value', '—')) }}

                                                @if (data_get($product->lens_index, 'price'))
                                                    —
                                                    {{ number_format((float) data_get($product->lens_index, 'price'), 2) }}
                                                    EUR
                                                @endif
                                            @endif

                                            @if (!empty($product->glass_value))
                                                <br>

                                                <strong>Избрано стъкло:</strong>

                                                {{ data_get($product->glass_value, 'name', data_get($product->glass_value, 'value', '—')) }}

                                                @if (data_get($product->glass_value, 'price'))
                                                    —
                                                    {{ number_format((float) data_get($product->glass_value, 'price'), 2) }}
                                                    EUR
                                                @endif
                                            @endif

                                            <br>

                                            <strong>Единична цена:</strong>
                                            {{ number_format((float) $product->price, 2) }}
                                            EUR

                                            @if ($product->discount)
                                                <br>

                                                <strong>Продуктова отстъпка:</strong>

                                                <span style="color: #c0392b;">
                                                    -{{ $product->discount }}%
                                                </span>
                                            @endif
                                        </td>

                                        <td width="145" valign="middle" align="right"
                                            style="
                                                padding: 16px;
                                                border-left: 1px solid #eeeeee;
                                            ">
                                            <span
                                                style="
                                                    display: block;
                                                    margin-bottom: 5px;
                                                    font-size: 13px;
                                                    color: #777777;
                                                ">
                                                Общо
                                            </span>

                                            @if ($product->discount)
                                                <strong
                                                    style="
                                                        font-size: 17px;
                                                        line-height: 24px;
                                                        color: #222222;
                                                    ">
                                                    {{ number_format(($product->price - ($product->price * $product->discount) / 100) * $product->quantity, 2) }}
                                                    EUR
                                                </strong>
                                            @else
                                                <strong
                                                    style="
                                                        font-size: 17px;
                                                        line-height: 24px;
                                                        color: #222222;
                                                    ">
                                                    {{ number_format($product->price * $product->quantity, 2) }}
                                                    EUR
                                                </strong>
                                            @endif
                                        </td>
                                    </tr>

                                    @if ($product->prescription_image || !empty($product->right_eye) || !empty($product->left_eye) || $product->pd)
                                        <tr>
                                            <td colspan="3"
                                                style="
                                                    padding: 0 16px 16px;
                                                ">
                                                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                                    role="presentation"
                                                    style="
                                                        background-color: #f8f8f8;
                                                        border-radius: 8px;
                                                    ">
                                                    <tr>
                                                        <td
                                                            style="
                                                                padding: 15px;
                                                                font-size: 14px;
                                                                line-height: 22px;
                                                                color: #555555;
                                                            ">
                                                            <strong
                                                                style="
                                                                    display: block;
                                                                    margin-bottom: 10px;
                                                                    color: #222222;
                                                                ">
                                                                Данни за диоптър
                                                            </strong>

                                                            @if ($product->prescription_image)
                                                                <strong>Рецепта:</strong>

                                                                <a href="{{ url('/assets/images/prescriptions/' . $product->prescription_image) }}"
                                                                    target="_blank" style="color: #333333;">
                                                                    Преглед на рецептата
                                                                </a>

                                                                <br>
                                                            @endif

                                                            @if (!empty($product->right_eye))
                                                                <strong>Дясно око (OD):</strong>

                                                                SPH:
                                                                {{ data_get($product->right_eye, 'sph', '—') }},

                                                                CYL:
                                                                {{ data_get($product->right_eye, 'cyl', '—') }},

                                                                AXIS:
                                                                {{ data_get($product->right_eye, 'axis', '—') }},

                                                                ADD:
                                                                {{ data_get($product->right_eye, 'add', '—') }}

                                                                <br>
                                                            @endif

                                                            @if (!empty($product->left_eye))
                                                                <strong>Ляво око (OS):</strong>

                                                                SPH:
                                                                {{ data_get($product->left_eye, 'sph', '—') }},

                                                                CYL:
                                                                {{ data_get($product->left_eye, 'cyl', '—') }},

                                                                AXIS:
                                                                {{ data_get($product->left_eye, 'axis', '—') }},

                                                                ADD:
                                                                {{ data_get($product->left_eye, 'add', '—') }}

                                                                <br>
                                                            @endif

                                                            @if ($product->pd)
                                                                <strong>PD:</strong>
                                                                {{ $product->pd }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    @endif
                                </table>
                            @endforeach
                        </td>
                    </tr>

                    {{-- Payment summary --}}
                    <tr>
                        <td style="padding: 25px 30px 5px;">
                            <h2
                                style="
                                    margin: 0 0 15px;
                                    font-size: 20px;
                                    line-height: 28px;
                                    color: #222222;
                                ">
                                Информация за плащане
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0" role="presentation"
                                style="
                                    border: 1px solid #e8e8e8;
                                    border-radius: 8px;
                                ">
                                <tr>
                                    <td
                                        style="
                                            padding: 15px 18px;
                                            font-size: 14px;
                                            color: #555555;
                                            border-bottom: 1px solid #eeeeee;
                                        ">
                                        Сума на продуктите:
                                    </td>

                                    <td align="right"
                                        style="
                                            padding: 15px 18px;
                                            font-size: 14px;
                                            color: #222222;
                                            border-bottom: 1px solid #eeeeee;
                                        ">
                                        <strong>
                                            {{ number_format(
                                                $orderProducts->sum(
                                                    fn($product) => ($product->discount
                                                        ? $product->price - ($product->price * $product->discount) / 100
                                                        : $product->price) * $product->quantity,
                                                ),
                                                2,
                                            ) }}
                                            EUR
                                        </strong>
                                    </td>
                                </tr>

                                @if ($promoCode)
                                    <tr>
                                        <td
                                            style="
                                                padding: 15px 18px;
                                                font-size: 14px;
                                                color: #555555;
                                                border-bottom: 1px solid #eeeeee;
                                            ">
                                            Промо код:

                                            <strong>
                                                {{ $promoCode->promo_code_name }}
                                            </strong>
                                        </td>

                                        <td align="right"
                                            style="
                                                padding: 15px 18px;
                                                font-size: 14px;
                                                color: #c0392b;
                                                border-bottom: 1px solid #eeeeee;
                                            ">
                                            <strong>
                                                -{{ $promoCode->percentage_promo_code }}%
                                            </strong>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td
                                            style="
                                                padding: 15px 18px;
                                                font-size: 14px;
                                                color: #555555;
                                                border-bottom: 1px solid #eeeeee;
                                            ">
                                            Стойност на промо отстъпката:
                                        </td>

                                        <td align="right"
                                            style="
                                                padding: 15px 18px;
                                                font-size: 14px;
                                                color: #c0392b;
                                                border-bottom: 1px solid #eeeeee;
                                            ">
                                            <strong>
                                                -
                                                {{ number_format(
                                                    $orderProducts->sum(
                                                        fn($product) => ($product->discount
                                                            ? $product->price - ($product->price * $product->discount) / 100
                                                            : $product->price) * $product->quantity,
                                                    ) *
                                                        ($promoCode->percentage_promo_code / 100),
                                                    2,
                                                ) }}
                                                EUR
                                            </strong>
                                        </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td
                                        style="
                                            padding: 18px;
                                            font-size: 17px;
                                            color: #222222;
                                        ">
                                        <strong>Обща сума:</strong>
                                    </td>

                                    <td align="right"
                                        style="
                                            padding: 18px;
                                            font-size: 20px;
                                            color: #222222;
                                        ">
                                        @if ($promoCode)
                                            <strong>
                                                {{ number_format(
                                                    $orderProducts->sum(
                                                        fn($product) => ($product->discount
                                                            ? $product->price - ($product->price * $product->discount) / 100
                                                            : $product->price) * $product->quantity,
                                                    ) *
                                                        (1 - $promoCode->percentage_promo_code / 100),
                                                    2,
                                                ) }}
                                                EUR
                                            </strong>
                                        @else
                                            <strong>
                                                {{ number_format(
                                                    $orderProducts->sum(
                                                        fn($product) => ($product->discount
                                                            ? $product->price - ($product->price * $product->discount) / 100
                                                            : $product->price) * $product->quantity,
                                                    ),
                                                    2,
                                                ) }}
                                                EUR
                                            </strong>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Delivery information --}}
                    <tr>
                        <td style="padding: 25px 30px 5px;">
                            <h2
                                style="
                                    margin: 0 0 15px;
                                    font-size: 20px;
                                    line-height: 28px;
                                    color: #222222;
                                ">
                                Информация за доставка
                            </h2>

                            <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                role="presentation"
                                style="
                                    border: 1px solid #e8e8e8;
                                    border-radius: 8px;
                                ">
                                <tr>
                                    <td
                                        style="
                                            padding: 18px;
                                            font-size: 14px;
                                            line-height: 23px;
                                            color: #555555;
                                        ">
                                        <strong>Начин на доставка:</strong>

                                        @if ($order->delivery_method === 'office')
                                            До офис на куриер Speedy
                                        @else
                                            До личен адрес
                                        @endif

                                        <br>

                                        @if ($order->city)
                                            <strong>Град:</strong>
                                            {{ $order->city }}

                                            <br>
                                        @endif

                                        @if ($order->office_list)
                                            <strong>Офис:</strong>
                                            {{ $order->office_list }}

                                            <br>
                                        @endif

                                        @if ($order->personal_address)
                                            <strong>Адрес:</strong>
                                            {{ $order->personal_address }}

                                            <br>
                                        @endif

                                        <strong>Начин на плащане:</strong>

                                        @if ($order->payment_option === 'cash_on_delivery')
                                            При получаване
                                        @else
                                            {{ $order->payment_option }}
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    {{-- Invoice information --}}
                    @if ($order->request_invoice)
                        <tr>
                            <td style="padding: 25px 30px 5px;">
                                <h2
                                    style="
                                        margin: 0 0 15px;
                                        font-size: 20px;
                                        line-height: 28px;
                                        color: #222222;
                                    ">
                                    Фирмени данни
                                </h2>

                                <table width="100%" cellpadding="0" cellspacing="0" border="0"
                                    role="presentation"
                                    style="
                                        border: 1px solid #e8e8e8;
                                        border-radius: 8px;
                                    ">
                                    <tr>
                                        <td
                                            style="
                                                padding: 18px;
                                                font-size: 14px;
                                                line-height: 23px;
                                                color: #555555;
                                            ">
                                            @if ($order->company_name)
                                                <strong>Фирма:</strong>
                                                {{ $order->company_name }}

                                                <br>
                                            @endif

                                            @if ($order->company_mol)
                                                <strong>МОЛ:</strong>
                                                {{ $order->company_mol }}

                                                <br>
                                            @endif

                                            @if ($order->company_bulstat)
                                                <strong>ЕИК/Булстат:</strong>
                                                {{ $order->company_bulstat }}

                                                <br>
                                            @endif

                                            @if ($order->company_address)
                                                <strong>Адрес:</strong>
                                                {{ $order->company_address }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    @endif

                    {{-- Footer --}}
                    <tr>
                        <td align="center"
                            style="
                                padding: 35px 30px;
                                font-size: 13px;
                                line-height: 21px;
                                color: #777777;
                            ">
                            <p style="margin: 0 0 8px;">
                                Благодарим Ви, че избрахте Valente Optics.
                            </p>

                            <p style="margin: 0;">
                                При въпроси можете да се свържете с нас на
                                <strong>+359 89 3023731</strong>.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
