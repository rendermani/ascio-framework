<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Orders</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="container" style ="width:100%">
                <h1>Orders</h1>
                <p>Filter: 
                    <a href="{{ route('order.orders', ['status' => 'failed']) }}">Failed</a> |
                    <a href="{{ route('order.orders', ['status' => 'pending']) }}">Pending</a> |
                    <a href="{{ route('order.orders', ['status' => 'waiting']) }}">Waiting</a> |
                    <a href="{{ route('order.orders', ['status' => 'completed']) }}">Completed</a> |
                    <a href="{{ route('order.orders') }}">Reset</a>  
               <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Brand</th>
                            <th>Date</th>
                            <th>OrderId</th>
                            <th>Domain</th>
                            <th>Status</th>
                            <th>Messages</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->_account }}</td> 
                            <td>{{ $order->CreDate }}</td>
                            <td>{{ $order->OrderId }}</td>
                            <td>{{ $order->Domain }}</td>
                            <td>{{ $order->Status }}</td>                           
                            <td>
                                <ul> 
                                    @foreach($order->Message as $message)
                                    <li>{{ $message }}</li>   
                                    @endforeach
                                </ul>
                            </td>                           
                        </tr>
                        @endforeach                       
                    </tbody>
               </table>
               {{ $orders->links() }}

            </div>
        </div>
    </body>
</html>
