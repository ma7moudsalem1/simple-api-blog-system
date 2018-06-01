<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #000;
                font-family: 'Raleway', sans-serif;
            }
            table{
                font-family: 'Arial', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron text-center">
                        <h1>Blog Api System</h1>
                        <p>This is just case study api and not present real database system.</p>
                    </div>
                </div>

                <div class="col-md-12">
                    <table class="table table-bordered">
                        <thead> 
                            <tr> 
                                <th>Route</th> 
                                <th>Method</th> 
                                <th>Auth</th> 
                                <th>Description</th> 
                            </tr> 
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ route('api.register') }}</td>
                                <td>POST</td>
                                <td>No</td>
                                <td>
                                    This route recieve : <br />
                                    Name     => String <br />
                                    E-mail   => Email <br />
                                    Password => String <br />
                                    If the process success return (User Token)
                                </td>
                            </tr>

                            <tr>
                                <td>{{ route('api.login') }}</td>
                                <td>POST</td>
                                <td>No</td>
                                <td>
                                    This route recieve : <br />
                                    E-mail   => Email <br />
                                    Password => String <br />
                                    If the process success return (User Token)
                                </td>
                            </tr>

                            <tr>
                                <td>{{ route('articles.index') }}</td>
                                <td>GET</td>
                                <td>No</td>
                                <td>
                                    This route recieve no data : <br>
                                    Return paginate articles data (10 per)
                                </td>
                            </tr>

                            <tr>
                                <td>{{ url('articles/') }}/{id}</td>
                                <td>GET</td>
                                <td>No</td>
                                <td>
                                    This route recieve no data : <br>
                                    Return single active ( status = 1 ) article 
                                </td>
                            </tr>

                            <tr>
                                <td>{{ route('articles.store') }}</td>
                                <td>POST</td>
                                <td>Yes</td>
                                <td>
                                    This route recieve : <br />
                                    Title     => String <br />
                                    Content   => Text <br />
                                    * User Id will set by user login
                                    <br />
                                    If the process success return this added data article
                                </td>
                            </tr>

                             <tr>
                                <td>{{ url('articles/') }}/{id}</td>
                                <td>PUT</td>
                                <td>Yes</td>
                                <td>
                                    This route recieve : <br />
                                    Title     => String <br />
                                    Content   => Text <br />
                                    * Non of this data is required <br>
                                    * Only creator this article can update this article
                                    <br />
                                    If the process success return this data article
                                </td>
                            </tr>

                            <tr>
                                <td>{{ url('articles/') }}/{id}</td>
                                <td>DELETE</td>
                                <td>Yes</td>
                                <td>
                                    This route recieve no data : <br />
                                    * Only creator this article can delete this article
                                    <br />
                                    If the process success return null response
                                </td>
                            </tr>

                             <tr>
                                <td>{{ route('comments.index', 'article-id') }}</td>
                                <td>GET</td>
                                <td>No</td>
                                <td>
                                    This route recieve no data : <br />
                                    Return paginate data (10 per page)
                                </td>
                            </tr>

                             <tr>
                                <td>{{ route('comments.index', 'article-id') }}/{id}</td>
                                <td>GET</td>
                                <td>No</td>
                                <td>
                                    This route recieve no data : <br />
                                    * Article must be active (status = 1) <br />
                                    Return single comment 
                                </td>
                            </tr>

                             <tr>
                                <td>{{ route('comments.store', 'article-id') }}</td>
                                <td>POST</td>
                                <td>YES</td>
                                <td>
                                    This route recieve  : <br />
                                    Comment => Text <br />
                                    * Article must be active (status = 1) <br />
                                    Return new single comment data
                                </td>
                            </tr>

                              <tr>
                                <td>{{ route('comments.index', 'article-id') }}/{id}</td>
                                <td>PUT</td>
                                <td>YES</td>
                                <td>
                                    This route recieve  : <br />
                                    Comment => Text <br />
                                    * Article must be active (status = 1) <br />
                                    * Only comment creator can be update the comment <br />
                                    Return updated single comment data
                                </td>

                                 <tr>
                                <td>{{ route('comments.index', 'article-id') }}/{id}</td>
                                <td>DELETE</td>
                                <td>YES</td>
                                <td>
                                    This route recieve no data  : <br />
                                    * Article must be active (status = 1) <br />
                                    * Only comment creator can be delete the comment <br />
                                    Return null
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
