

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form method="post" action="{{route('save_order', ['id' => $order->id])}}">
                    @csrf

                    Добавить заказ

                    <br>
                    <br>

                    <label>
                        Priority
                        <select name="priority" >
                            <option value="{{$order->priority}}">{{(int) $order->priority}}</option>
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                        </select>
                    </label>

                    <br>
                    <br>

                    <label>
                        Status
                        <select name="status" >
                            <option>{{$order->status}}</option>
                            <option>Принят от клиента</option>
                            <option>Вёрстка</option>
                            <option>Вёрстка завершена</option>
                            <option>Вёрстка не требуется</option>
                            <option>Переплёт</option>
                            <option>Готов к выдаче</option>
                            <option>Завершён</option>
                        </select>
                    </label>

                    <br>
                    <br>

                    <label>
                        Wishes
                        <textarea name="wishes">{{$order->wishes}}</textarea>
                    </label>

                    <br>
                    <br>

                    <button type="submit">Создать</button>
                </form>
            </div>
        </div>
    </div>
</div>
