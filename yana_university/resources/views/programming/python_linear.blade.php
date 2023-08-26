@extends('programming.python')

@section('type_of_matrix')
    <form action="{{url('/programming/python/linear/output')}}"method="get">
        @csrf
        <table>
            <tr>
                <th>行数</th>
                <td><input id="row"name="row"type="type"value="{{$row}}"readonly></td>
            </tr>
            <tr>
                <th>列数</th>
                <td><input id="column"name="column"type="type"value="{{$column}}"readonly></td>
            </tr>
        </table>

        <div id="matrix_input_form">
            <p style="font-weight:bold;font-size:24px;">
                入力する行列
            </p>
        </div>
    </form>
    @yield('linear_output')
@endsection

@section('script')
    <script type="text/javascript"src="{{asset('/js/programming/python/python_linear.js')}}"></script>
@endsection