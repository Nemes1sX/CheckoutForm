<div>
    <p>Full name: {{$firstName}} {{$lastName}}</p>
    <p>Country: {{$country}}</p>
    <p>Region: {{$region}}</p>
    <p>Address: {{$address}}</p>
    <table>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Currency</th>
        </tr>
        @foreach($cart as $item)
        <tr>
            <td>{{$item['name']}}</td>
            <td>{{$item['quantity']}}</td>
            <td>{{$item['price']}}</td>
            <td>{{$item['currency']}}</td>
        </tr>
        @endforeach
    </table>
</div>
