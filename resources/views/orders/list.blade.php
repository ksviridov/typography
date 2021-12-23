

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

                Ваша роль: {{$roles[auth()->user()->roles[0]->name]}}
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>

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
                                @if(auth()->user()->roles[0]->name === 'manager')
                                    <td><a href="{{route('edit_order', ['id' => $order->id])}}">Редактировать заказ</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
