<html lang="en">
<head>

</head>
<body>
<div>
    Thank for your order
</div>
<div>
    Items you have bought:
</div>
@foreach ($items as $item)
    <div>
        <button type="button" class="btn btn-warning">{{$item->name}}</button>
        <button type="button" class="btn btn-primary">{{$item->price}}</button>
    </div>
@endforeach
</body>
</html>
