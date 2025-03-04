<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集</title>
</head>
<body>
    <h1>{{ $product->name }}の編集</h1>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">商品名:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}" required>

        <label for="price">値段:</label>
        <input type="text" id="price" name="price" value="{{ $product->price }}" required>

        <label for="description">商品説明:</label>
        <textarea id="description" name="description" required>{{ $product->description }}</textarea>

        <label for="image">商品画像:</label>
        <input type="file" id="image" name="image">

        <label for="season">季節:</label>
        <select name="season" id="season">
            <option value="春" {{ $product->season == '春' ? 'selected' : '' }}>春</option>
            <option value="夏" {{ $product->season == '夏' ? 'selected' : '' }}>夏</option>
            <option value="秋" {{ $product->season == '秋' ? 'selected' : '' }}>秋</option>
            <option value="冬" {{ $product->season == '冬' ? 'selected' : '' }}>冬</option>
        </select>

        <button type="submit">更新</button>
    </form>
</body>
</html>
