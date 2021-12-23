<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js" integrity="sha512-NFUcDlm4V+a2sjPX7gREIXgCSFja9cHtKPOL1zj6QhnE0vcY695MODehqkaGYTLyL2wxe/wtr4Z49SvqXq12UQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

                <div id="qrcode"></div>

                <table class="border-black">
                    <thead class="border-black">
                        <th>Номер заказа</th>
                        <th>Приоритет</th>
                        <th>Статус</th>
                        <th>Пожелания</th>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                            <tr id="{{$order->id}}">
                                <td data-value="{{$order->number}}">{{$order->number}}</td>
                                <td data-value="{{$order->priority}}">{{$order->priority}}</td>
                                <td data-value="{{$order->status}}">{{$order->status}}</td>
                                <td data-value="{{$order->wishes}}">{{$order->wishes}}</td>
                                <td class="qrcode"></td>
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


<script>
    const allTrs = document.querySelectorAll("tr")
    allTrs.forEach(tr=> {
       const allTds = tr.querySelectorAll("td")
       let allTdsConcat = ''
       allTds.forEach(td=> {
           if ( td.dataset.value !== undefined ) {
               allTdsConcat = allTdsConcat.concat(td.dataset.value+' ')
           }
       })
       const id = tr.id;
    })
    $('#qrcode').qrcode({width: 64,height: 64,text: "size doesn't matter"});
</script>