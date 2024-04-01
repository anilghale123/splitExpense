<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form method="POST" action="/submit-split">
   @csrf
    <input type="text" name="person_name" placeholder="Enter names of people (comma-separated)">
    <input type="number" name="totalPeople" placeholder="Enter number of people">
    <input type="number" name="amount" value="{{$data['amount']}}">
    <button type="submit">Calculate Split</button>
  </form>
</body>

</html>