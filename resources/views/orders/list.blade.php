

<style>
    .border-black {
        border: 1px solid black;
    }

    th {
        border: 1px solid black;
    }

    td {
        border: 1px solid black;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(auth()->user()->roles[0]->name === 'manager') <a style="background-color: #636b6f; color: white;" href="{{route('add_order')}}">Добавить заказ</a> @endif

                <br>
                <br>

                <table class="border-black">
                    <thead class="border-black">
                        <th>Номер заказа</th>
                        <th>Приоритет</th>
                        <th>Статус</th>
                        <th>Пожелания</th>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{$order->number}}</td>
                                <td>{{$order->priority}}</td>
                                <td>{{$order->status}}</td>
                                <td>{{$order->wishes}}</td>
                                <td><a href="{{route('edit_order', ['id' => $order->id])}}">Редактировать заказ</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
