@extends('programming/python_linear')

@section('linear_output')
    <div class="from php to json">
        <?php
            $matrix = [];
            $r = [];
            $count = 0;
            foreach($_GET['params'] as $param){
                if($count % $_GET['column'] == 0){
                    $r = [];
                    array_push($r,$param);
                }else if($count % $_GET['column'] < $_GET['column'] - 1){
                    array_push($r,$param);
                }else if($count % $_GET['column'] == $_GET['column'] - 1){
                    array_push($r,$param);
                    array_push($matrix,$r);
                }
                $count++;
            }
            #json書き込み
            chdir('../app/Python/');
            $json = json_encode($matrix);
            $bytes = file_put_contents('./temporarily_saved/linear.json',$json);
        ?>
       <div clss="form python to php"
            style="font-weight:bold;
                    font-size:18px;
                    overflow:scroll;
                    height:300px;
                    background-color:whitesmoke;">
            <?php
                exec('python test.py',$outputs);
                foreach($outputs as $output){
                    echo $output.'<br>';
                }
            ?>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript"src="{{asset('js//programming/python/python_linear_output.js')}}"></script>
@endsection