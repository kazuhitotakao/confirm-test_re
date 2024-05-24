@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin__content">
    <div class="section__title">
        <h2>Admin</h2>
    </div>
    <form class="search-form" action="/admin/search" method="get">
        @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{request('keyword')}}" placeholder="名前やメールアドレスを入力してください">
            <select class="search-form__item-select" name="gender" value="{{request('gender')}}">
                <option disabled selected>性別</option>
                <option value="1" @if( request('gender')==1 ) selected @endif>男性</option>
                <option value="2" @if( request('gender')==2 ) selected @endif>女性</option>
                <option value="3" @if( request('gender')==3 ) selected @endif>その他</option>
            </select>
            <select class="search-form__item-select" name="category_id">
                <option disabled selected>お問い合わせの種類</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}" @if( request('category_id')==$category->id ) selected @endif
                    >{{$category->content }}
                </option>
                @endforeach
            </select>
            <input class="search-form__item-input--date" type="date" name="created-at" value="{{request('date')}}">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
        </div>
        <div class="search-form__link">
            <a class="search-form__link-submit" href="/admin">リセット</a>
        </div>
    </form>
    <div class="export-form">
        <form action="{{'/admin/export?'.http_build_query(request()->query())}}" method="post">
            @csrf
            <input class="export__btn" type="submit" value="エクスポート">
        </form>
        {{ $contacts->appends(request()->query())->links('vendor.pagination.custom') }}
    </div>

    <div class="contacts-table">
        <table class="contacts-table__inner">
            <tr class="contacts-table__row">
                <th class="contacts-table__header">
                    <span class="contacts-table__header-span--name">お名前</span>
                    <span class="contacts-table__header-span--gender">性別</span>
                    <span class="contacts-table__header-span--email">メールアドレス</span>
                    <span class="contacts-table__header-span">お問い合わせの種類</span>
                </th>
            </tr>
            @foreach ($contacts as $contact)

            <tr class="contacts-table__row">
                <td class="contacts-table__item">
                    <form class="contacts-form" action="" method="">
                        <input class="contacts-form__item-input--name" type="text" name="full_name" value="{{ $contact['last_name'] . '　' . $contact['first_name']}}" readonly />
                        @if($contact['gender'] == '1')
                        <input class="contacts-form__item-input--gender" type="text" name="gender" value="男性" readonly />
                        @elseif($contact['gender'] == '2')
                        <input class="contacts-form__item-input--gender" type="text" name="gender" value="女性" readonly />
                        @else
                        <input class="contacts-form__item-input--gender" type="text" name="gender" value="その他" readonly />
                        @endif
                        <input class="contacts-form__item-input" type="text" name="email" value="{{$contact['email']}}" readonly />
                        <input class="contacts-form__item-input" value="{{ $contact['category']['content'] }}" readonly />
                        <div class="search-form__link--contact">
                            <a class="search-form__link-submit--contact" href="#{{ $contact['id'] }}">詳細</a>
                            <!-- <a class="search-form__link-submit--contact" href="#modal-01">詳細</a> -->
                        </div>
                    </form>
                    <div class="modal-wrapper" id="{{ $contact['id'] }}">
                        <!-- <div class="modal-wrapper" id="modal-01"> -->
                        <!-- modal -->
                        <a href="#!" class="modal-overlay"></a>
                        <div class="modal-window">
                            <div class="modal-content">
                                <div class="confirm__content">
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
                                                    <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
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
                                                <td class="confirm-table__text">
                                                    @if($contact['category_id'] == '1')
                                                    <input type="text" name="category_content" value="商品のお届けについて" readonly />
                                                    <input type="hidden" name="category_id" value="1" readonly />
                                                    @elseif($contact['category_id'] == '2')
                                                    <input type="text" name="category_content" value="商品の交換について" readonly />
                                                    <input type="hidden" name="category_id" value="2" readonly />
                                                    @elseif($contact['category_id'] == '3')
                                                    <input type="text" name="category_content" value="商品トラブル" readonly />
                                                    <input type="hidden" name="category_id" value="3" readonly />
                                                    @elseif($contact['category_id'] == '4')
                                                    <input type="text" name="category_content" value="ショップへのお問い合わせ" readonly />
                                                    <input type="hidden" name="category_id" value="4" readonly />
                                                    @else
                                                    <input type="text" name="category_content" value="その他" readonly />
                                                    <input type="hidden" name="category_id" value="5" readonly />
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr class="confirm-table__row">
                                                <th class="confirm-table__header">お問い合わせ内容</th>
                                                <td class="confirm-table__text">
                                                    <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <form class="form" action="/admin/delete" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <div class="form__button">
                                            <input type="hidden" name="id" value="{{ $contact['id'] }}" />
                                            <button class="form__button-submit" type="submit">削除</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <a href="" class="modal-close">×</a>
                        </div>
                    </div>

                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection