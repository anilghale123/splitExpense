<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <main class="container-md">
        <header>
            <h1>Expenses tracker</h1>
        </header>
        <div>
            <a class="btn btn-primary" href="/create">Create New Expenses</a>
        </div>
        <section>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Category</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Split</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $value)
                    <tr>
                        <th scope="row">{{$value['id']}}</th>
                        <td>{{$value['title']}}</td>
                        <td>{{$value['amount']}}</td>
                        <td>{{$value['category']}}</td>
                        <td><button class="btn btn-primary"><a href="/edit/{{$value['id']}}">Edit</a></button></td>
                        <td><button class="btn btn-danger"><a href="/delete/{{$value['id']}}">Delete</a></button></td>
                        <td>
                        <form method="POST" action="/split/{{$value['id']}}" >
                        @csrf
                        <button class="btn btn-danger">Split</button>
                        </form>    
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>


        <section>
            <h1>Split Expenses</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name of People</th>
                        <th scope="col">Split Amount</th>
                       

                    </tr>
                </thead>
                <tbody>
                    @foreach($splitExpenses as $value)
                    <tr>
                        <th scope="row">{{$value['id']}}</th>
                        <td>{{$value['person_name']}}</td>
                        <td>{{$value['split_amount']}}</td>
                        
                

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>
