<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/forms.css">
</head>
<body>
    <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
        {{ csrf_field() }}
        <div class="form_items">
            <div class="form_items_inputTitle">
                <p>タイトル</p>
                @if ($errors->has('body'))
                    <span class="form_error_title">{{ $errors->first('body') }}</span>
                @endif
                <input class="form_item_inputTitle"
                       type="title"
                       name="title"
                       value="{{ old('title') }}"
                >
            </div>
            <div class="form_items_inputContent">
                <p>本文</p>
                @if ($errors->has('body'))
                    <span class="form_error_content">{{ $errors->first('body') }}</span>
                @endif
                <textarea class="form_item_inputContent"
                          name="content"
                >{{ old('body') }}</textarea>
            </div>
            <div class="form_items_submitBtn">
                <input class="form_item_submitBtn"
                       type="submit"
                       value="投 稿"
                >
            </div>
        </div>
    </form>
    <script>
    function checkSubmit(){
    if(window.confirm('投稿してよろしいですか？')){
        return true;
    } else {
        return false;
    }
    }
    </script>
</body>
</html>