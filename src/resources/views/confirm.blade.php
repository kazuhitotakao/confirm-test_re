@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<!-- @php
    echo '<pre>';
    var_dump($contact);
    echo '<pre>';
@endphp -->
<div class="confirm__content">
    <div class="confirm__heading">
        <h2>Confirm</h2>
    </div>
    <form class="form" action="/thanks" method="post">
        @csrf
        <div class="confirm-table">
            <table class="confirm-table__inner">
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お名前</th>
                    <td class="confirm-table__text">
                        <input type="text" name="full_name" value="{{ $contact['last_name'] . '　' . $contact['first_name']}}" readonly />
                        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}" readonly />
                        <input type="hidden" name="first_name" value="{{ $contact['first_name']}}" readonly />
                    </td>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">性別</th>
                    <td class="confirm-table__text">
                        @if($contact['gender'] == '1')
                        <input type="text" name="gender-male" value="男性" readonly />
                        <input type="hidden" name="gender" value="1" readonly />
                        @elseif($contact['gender'] == '2')
                        <input type="text" name="gender-female" value="女性" readonly />
                        <input type="hidden" name="gender" value="2" readonly />
                        @else
                        <input type="text" name="gender-others" value="その他" readonly />
                        <input type="hidden" name="gender" value="3" readonly />
                        @endif
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">メールアドレス</th>
                    <td class="confirm-table__text">
                        <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">電話番号</th>
                    <td class="confirm-table__text">
                        <input type="tel" name="tel" value="{{ $contact['left-tel'].$contact['middle-tel'].$contact['right-tel']}}" readonly />
                        <input type="hidden" name="left-tel" value="{{ $contact['left-tel'] }}" readonly />
                        <input type="hidden" name="middle-tel" value="{{ $contact['middle-tel'] }}" readonly />
                        <input type="hidden" name="right-tel" value="{{ $contact['right-tel'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">住所</th>
                    <td class="confirm-table__text">
                        <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">建物名</th>
                    <td class="confirm-table__text">
                        <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                    </td>
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせの種類</th>
                    <td class="confirm-table__text">{{ $category->content }}</td>
                    <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                </tr>
                <tr class="confirm-table__row">
                    <th class="confirm-table__header">お問い合わせ内容</th>
                    <td class="confirm-table__text">
                        <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                    </td>
                </tr>
            </table>
        </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">送信</button>
            <button class="form__button-submit" type="submit" name='back' value="back">修正</button>
        </div>
    </form>
</div>
@endsection