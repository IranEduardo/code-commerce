@extends('store.index');

@section('content')

    <div class="col-sm-9 padding-right">
       <p><h4>Meus Pedidos</h4></p>
       @if ($orders)
          <table class="table table-sm ">
              <thead>
                 <tr>
                    <th>
                        #ID
                    </th>
                    <th>
                        Cliente
                    </th>
                    <th>
                        Total
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                    </th>
                 </tr>
              </thead>
              <tbody>

                @foreach($orders as $order)
                    <tr>
                        <td>
                            {{$order->id}}
                        </td>
                        <td>
                            {{$order->user->name}}
                        </td>
                        <td>
                            R$ {{number_format($order->total,2,",",".")}}
                        </td>
                        <td>
                            {{$order->getStatus()}}
                        </td>
                    </tr>

                @endforeach

              </tbody>
          </table>
       @else
           <p>Nao Existe Pedidos</p>
       @endif

    </div>

@stop