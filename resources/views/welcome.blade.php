<!DOCTYPE html>
<html>
    <head>
        <title>BBC North - Roman Numerals</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="screen" rel="stylesheet" type="text/css"  crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" media="screen" rel="stylesheet" type="text/css"  crossorigin="anonymous">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 3em;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">BBC North - Roman Numerals Generator</div>
                <h4>Please enter the decimal number to converted!</h4>
                <div class="col-xs-12">
                    <!-- Error Handling -->
                    @if (Session::has('status'))
                        <div class="alert alert-info">{{ Session::get('status') }}</div>
                        @endif
                    <!-- Form -->
                        {!! Form::open(array('action' => 'R2nController@roman', 'class' => 'form')) !!}

                        <div class="form-group">
                        {!! Form::label('Decimal Number') !!}
                        {!! Form::number('numeric', null,
                        array('required',
                        'class'=>'form-control')) !!}
                        </div>


                        <div class="form-group">
                        {!! Form::submit('Convert!',
                        array('class'=>'btn btn-primary')) !!}
                        </div>

                        {!! Form::close() !!}
                </div>
            </div>
        </div>
    </body>
</html>
